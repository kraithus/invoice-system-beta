<?php

namespace App\InvoiceReminderWeekly;

use App\Mail\WeeklyInvoiceReminder;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Job;
use App\Models\Quotation;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class InvoiceReminderWeekly
{
    public function sendReminderMail()
    {   
        /**
         * Get outstanding invoices 1 week overdue
         */
        $outstandingInvoices = Invoice::outstanding()->where('created_at', '>=', today()->subDays(7))->get();

        /**
         * Get job details
         * Send email to each customer in the list
         */
        foreach($outstandingInvoices as $invoice)
        {   
            $customerEmail = $invoice->quotation->job->customer->email;
            Mail::to($customerEmail)->send(new WeeklyInvoiceReminder());
        }

        //echo 'Hi';
    }
}