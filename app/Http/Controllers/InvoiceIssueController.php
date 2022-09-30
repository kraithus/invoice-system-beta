<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\District;
use App\Models\Job;
use App\Mail\InvoiceIssue;
use App\Models\Quotation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceIssueController extends Controller
{
    public function sendInvoiceMail($id)
    {
        // Catch the job ID
        $jobID = $id;

        // Get details for job matching ID
        $job = Job::find($jobID);

        //Put PDF data in array
        $data = [
            'jobName' => $job->name,
            'customerEmail' => $job->customer->email,
            'customerName' => $job->customer->name,
            'customerPhone' => $job->customer->phone,
            'customerOrganisation' => $job->customer->organisation,
            'customerAddress' => $job->customer->address_1,
            'customerDistrict' => $job->customer->district->name,
            'jobPrice' => $job->quotation->price,
            'quotationNum' => $job->quotation->qtn_number,
            'jobDate' => $job->created_at
        ];

        $pdfContents = Pdf::loadView('pdfs.invoice', $data)->output(); //Convert to string
        $pdfName = $data['customerName'] . '-' . $jobID . '.pdf';
        Storage::disk('local')->put('/public/' . $pdfName, $pdfContents); // Write to disk

        $jobName = $job->name;
        $customerEmail = $job->customer->email;
        $customerName = $job->customer->name;
        $jobPrice = $job->quotation->price;

        Mail::to($customerEmail)->send(new InvoiceIssue($jobName, $customerName, $jobPrice, $pdfName));

        return redirect()->route('quotation.index')->with('message', 'Email Sent! Have a good day');
    }

    public function viewInvoicePDF($id)
    {
        // Catch the job ID
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
            'jobPrice' => $job->quotation->price,
            'quotationNum' => $job->quotation->qtn_number,
            'jobDate' => $job->created_at
        ];

        $pdf = Pdf::loadView('pdfs.invoice', $data);
        return $pdf->stream();
    }
}
