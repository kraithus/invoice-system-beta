<?php

namespace App\IssueInvoice;

use App\Models\Job;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Mail\InvoiceIssue;

class IssueInvoice
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
            'invoiceNum' => $job->quotation->invoice->inv_number,
            'jobDate' => $job->created_at
        ];

        $pdfContents = Pdf::loadView('pdfs.invoice', $data)->output(); //Convert to string
        $pdfName = $data['customerName'] . '-' . $data['invoiceNum'] . '.pdf';
        Storage::disk('local')->put('/public/' . $pdfName, $pdfContents); // Write to disk

        $jobName = $job->name;
        $customerEmail = $job->customer->email;
        $customerName = $job->customer->name;
        $jobPrice = $job->quotation->price;

        Mail::to($customerEmail)->send(new InvoiceIssue($jobName, $customerName, $jobPrice, $pdfName));
    }

    public function resendInvoiceMail($id)
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
        $invoiceNum = $job->quotation->invoice->inv_number;

        $pdfName = $customerName . '-' . $invoiceNum . '.pdf';

        Mail::to($customerEmail)->send(new InvoiceIssue($jobName, $customerName, $jobPrice, $pdfName));
    }
}