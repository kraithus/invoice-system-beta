<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JobQuotation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($jobName, $customerName, $jobPrice, $pdfName)
    {
        $this->customerName = $customerName;
        $this->jobName = $jobName;
        $this->jobPrice = $jobPrice;
        $this->pdfName = $pdfName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        $customerName = $this->customerName;
        $jobName = $this->jobName;
        $jobPrice = $this->jobPrice;
        $pdfName = $this->pdfName;

        return $this->subject('Job Quotation')
                    ->attach(public_path('\\storage\\') . $pdfName, [
                    'mime' => 'application/pdf',
                    ])
                    ->markdown('emails.job-quotation', [
                        'customerName' => $customerName,
                        'jobName' => $jobName,
                        'jobPrice' => $jobPrice
                    ]);
    }
}
