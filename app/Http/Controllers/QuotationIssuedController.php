<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\District;
use App\Models\Job;
use App\Mail\JobQuotation;
use App\Models\Quotation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class QuotationIssuedController extends Controller
{
    public function dataTables()
    {
        $userID = Auth::user()->id;
        $technicianJobs = User::find($userID)->jobs;

        return view('test.datatables-index', [
            'jobs' => $technicianJobs,
            'title' => 'Test Datatables'
        ]);
    }

    public function sendQuotationMail($id)
    {
        // Get the job ID
        $jobID = $id;

        // Get details for job matching ID
        $job = Job::find($jobID);

        $jobName = $job->name;
        $customerEmail = $job->customer->email;
        $customerName = $job->customer->name;
        $jobPrice = $job->quotation->price;

        //Put PDF data in array
        $data = [
            'jobName' => $job->name,
            'customerEmail' => $job->customer->email,
            'customerName' => $job->customer->name,
            'customerPhone' => $job->customer->phone,
            'customerOrganisation' => $job->customer->organisation,
            'customerAddress' => $job->customer->address_1,
            'customerDistrict' => $job->customer->district->name,
            'jobPrice' => $job->quotation->price
        ];

        $pdfContents = Pdf::loadView('pdfs.quotation', $data)->output(); //Convert to string
        $pdfName = $data['customerName'] . '-' . $jobID . '.pdf';
        Storage::disk('local')->put('/public/' . $pdfName, $pdfContents); // Write to disk

        Mail::to($customerEmail)->send(new JobQuotation($jobName, $customerName, $jobPrice, $pdfName));

        return redirect()->route('quotation.index')->with('message', 'Email Sent! Have a good day');
    }

    public function viewQuotationPDF($id)
    {
        // Get the job ID
        $jobID = $id;

        // Get details for job matching ID
        $job = Job::find($jobID);

        $data = [
            'jobName' => $job->name,
            'customerEmail' => $job->customer->email,
            'customerName' => $job->customer->name,
            'customerPhone' => $job->customer->phone,
            'customerOrganisation' => $job->customer->organisation,
            'customerAddress' => $job->customer->address_1,
            'customerDistrict' => $job->customer->district->name,
            'jobPrice' => $job->quotation->price
        ];

        $pdf = Pdf::loadView('pdfs.quotation-test', $data);
        return $pdf->stream();
    }
}
