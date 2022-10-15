<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Quotation;
use App\Models\Receipt;
use App\IssueReceipt\IssueReceiptFacade;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([
            'payment_method' => 'required',
        ]);

        $invoiceID = $request->invoice_id;
        $payment_method = $request->payment_method;

        $receipt = Receipt::create([
            'invoice_id' => $invoiceID,
            'payment_method' => $payment_method,
        ]);

        $receipt->save();

        // Get ID of latest receipt
        $latestReceipt = Receipt::find($receipt->id);

        // Update parent invoice of receipt
        $invoice = $latestReceipt->invoice()->updatepaymentstatus();

        // Get job receipt is for
        // Chain query
        $jobID = $latestReceipt->invoice->quotation->job_id;

        /**
         * Send JOB id to a facade which mails the receipt to client
         */
        IssueReceiptFacade::sendReceiptMail($jobID);

        return redirect()->route('cpanel')->with('message', 'Receipt generated and mailed to client');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
