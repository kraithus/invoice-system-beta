<?php

namespace App\IssueReceipt;

use App\Models\Job;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Mail\Receipt;

class IssueReceipt
{
    public function sendReceiptMail($id)
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
            'receiptNum' => $job->quotation->invoice->receipt->id,
            'jobDate' => $job->created_at
        ];

        $pdfContents = Pdf::loadView('pdfs.receipt', $data)->output(); //Convert to string
        $pdfName = 'Receipt_' . $data['customerName'] . '-' . $data['receiptNum'] . '.pdf';
        Storage::disk('local')->put('/public/' . $pdfName, $pdfContents); // Write to disk

        $jobName = $job->name;
        $customerEmail = $job->customer->email;
        $customerName = $job->customer->name;
        $jobPrice = $job->quotation->price;

        Mail::to($customerEmail)->send(new Receipt($jobName, $customerName, $jobPrice, $pdfName));
    }

    public function resendReceiptMail($id)
    {
        // Catch the job ID
        $jobID = $id;

        // Get job ID
        $job = Job::find($jobID);

        // Get job details
        $jobName = $job->name;
        $customerEmail = $job->customer->email;
        $customerName = $job->customer->name;
        $jobPrice = $job->quotation->price;
        $receiptNum = $job->quotation->invoice->receipt->id;

        $pdfName = $customerName . '-' . $receiptNum . '.pdf';

        Mail::to($customerEmail)->send(new Receipt($jobName, $customerName, $jobPrice, $pdfName));
    }
}