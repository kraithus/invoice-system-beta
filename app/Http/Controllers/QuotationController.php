<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Quotation;
use App\Models\Customer;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user_id = Auth::user()->id;
        $technicianJobs = User::find($user_id)->job;

        foreach ($technicianJobs as $technicianJob) {
        $customerJob = Job::find($technicianJob->customer_id)->customer;
        }

        return view('quotation.index', [
            'jobQuotations' => $technicianJobs,
            'customers' => $customerJob
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $user_id = Auth::user()->id; // Pass this to user model to identify the technicians latest job
        $user = User::find($user_id);

        return view('quotation.add', [
            'latestJob' => $user->latestJob
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'job_id' => 'required',
            'price' => 'integer'
        ]);

        $quotation = new Quotation;

        $quotation->job_id = $request->job_id;
        $quotation->price = $request->price;

        $quotation->save();

        return redirect()->route('quotation.index')->with('message', 'Quotation price set');

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
