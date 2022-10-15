<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Quotation;
use App\IssueInvoice\IssueInvoiceFacade;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all invoices
        $data = [
            'invoices' => Invoice::all(),
            'title' => 'Invoices'
        ];    

        // Load view with jobs data
        return view('admin.invoices-index', $data);
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
        $quotationID = $request->quotation_id;

        $invoice = new Invoice;

        $invoice->quotation_id = $quotationID;

        /**
         * Compute invoice number. Get
         */
        $maxInvoiceID = Invoice::max('id');
        $newInvoiceNum = $maxInvoiceID + 1;
        $invoice->inv_number = 'INV00' . $newInvoiceNum;

        $invoice->save();

        // Get quotation information
        $quotation = Quotation::find($quotationID);
        $jobID = $quotation->job_id;

        // Find invoice
        $latestInvoice = Invoice::find($newInvoiceNum);
        // Update quotation of which invoice belongs to using scope
        $quotation = $latestInvoice->quotation()->updateinvoicestatus();

        /**
         * Send JOB id to a facade... which calls the function to send the email
         */
        IssueInvoiceFacade::sendInvoiceMail($jobID);

        return redirect()->route('cpanel')->with('message', 'Email Sent! Have a good day');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        // Get invoice
        $invoice = Invoice::find($id);

        // Pass data for the view to array
        $data = [
            'title' => 'Update Invoice',
            'invoice' => $invoice,
        ];
        return view('admin.invoice.edit', $data);
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
