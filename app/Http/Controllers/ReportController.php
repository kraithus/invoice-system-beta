<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Invoice;
use App\Models\Quotation;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function outstandingInvoices()
    {   
        $invoices = Invoice::outstanding()->get();
        $data = [
            'invoices' => $invoices,
            'title' => 'Outstanding Invoices',
        ];

        return view('admin.reports.outstanding-invoices', $data);
    }

    public function quotationsPendingEscalation()
    {   
        $quotations = Quotation::pendingescalation()->get();
        $data = [
            'quotations' => $quotations,
            'title' => 'Quotations Pending Escalation',
        ];

        return view('admin.reports.quotations-pending-escalation', $data);
    }
}
