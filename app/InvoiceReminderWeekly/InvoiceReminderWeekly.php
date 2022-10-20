<?php

namespace App\InvoiceReminderWeekly;

use App\Mail\WeeklyInvoiceReminder;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Job;
use App\Models\Quotation;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Mail\SentMessage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

class InvoiceReminderWeekly
{
    public function sendReminderMail()
    {   
        /**
         * Get outstanding invoices
         */
        $outstandingInvoices = Invoice::outStanding()->createdOverAWeekAgo()->reminderNotSent()->orWhere->reminderSentOverAWeekAgo()->get();

        /**
         * Get job details
         * Send email to each customer in the list
         */
        foreach($outstandingInvoices as $invoice)
        {   
            $customerEmail = $invoice->quotation->job->customer->email;

            // Query to fetch invoice ID
            $id = $invoice->id;

            try {
            Mail::to($customerEmail)->send(new WeeklyInvoiceReminder());
            // Query to update each invoice
            $updateInvoice = Invoice::updateReminderTime($id);    
            echo 'SuckSessu';
            
            }  catch (TransportExceptionInterface $e) {
               echo 'Fail <br><br>';
            }
        }
    }
}