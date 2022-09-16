<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\Job;
use App\Models\Quotation;
use App\Models\User;
use Illuminate\Http\Request;

class JobController extends Controller
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
        //Get customer list
        $customers = Customer::all();
        return view('job.add', [
            'customers' => $customers
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
        $request->validate([
            'name' => 'required',
            'customer_id' => 'required', 'integer', 'number',
            'price' => 'required', 'number'
        ]);

        $job = new Job;

        $userID = Auth::user()->id;

        $job->name = $request->name;
        $job->customer_id = $request->customer_id;
        $job->technician_id = $userID;

        $job->save();

        // Get ID of latest Technician job
        $latestJob = User::find($userID)->latestJob;
        $latestJobID = $latestJob->id;

        // Save quotation details
        $quotation = new Quotation;

        $quotation->job_id = $latestJobID;
        $quotation->price = $request->price;

        $quotation->save();

        return redirect()->route('dashboard')->with('message', 'Your latest job details have been saved');
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
