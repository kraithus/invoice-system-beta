<?php

namespace App\Http\Controllers;

use App\Mail\JobQuotation;
use App\Models\Quotation;
use App\Models\Customer;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    public function dataTables()
    {
        $userID = Auth::user()->id;
        $technicianJobs = User::find($userID)->jobs;

        return view('test.datatables-index', [
            'jobs' => $technicianJobs,
            'title' => 'Test Datatables'
        ]);
    }

    public function sendQuotationMail($id)
    {
        // Get the job ID
        $jobID = $id;

        // Get details for job matching ID
        $job = Job::find($jobID);
        $jobName = $job->name;
        $customerEmail = $job->customer->email;
        $customerName = $job->customer->name;
        $jobPrice = $job->customer->quotation->price;

        Mail::to($customerEmail)->send(new JobQuotation($customerName, $jobName, $jobPrice));
    }
}
