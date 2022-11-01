<?php

namespace App\Http\Controllers;

use App\IssueReceipt\IssueReceiptFacade;
use Illuminate\Http\Request;

class ReceiptIssueController extends Controller
{
    public function viewPDF($id)
    {
        return IssueReceiptFacade::viewReceiptPDF($id);
    }
}
