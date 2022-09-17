<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Charts\WeeklyJobs;
use App\Mail\JobQuotation;
use App\Models\Quotation;
use App\Models\Customer;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

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
        $jobPrice = $job->quotation->price;

        Mail::to($customerEmail)->send(new JobQuotation($customerName, $jobName, $jobPrice));
    }

    public function generateQuotationPDF($id)
    {
        // Get the job ID
        $jobID = $id;

        // Get details for job matching ID
        $job = Job::find($jobID);

        $data = [
            'jobName' => $job->name,
            'customerEmail' => $job->customer->email,
            'customerName' => $job->customer->name,
            'jobPrice' => $job->quotation->price
        ];

        $pdf = Pdf::loadView('pdfs.quotation', $data)->output();
        Storage::disk('local')->put('heya.pdf', $pdf);
    }

    public function showCustomers()
    {
        return view('test.customer-live-search');
    }

    public function chartTest()
    {   
        /**
         * Query the data
         */
        $todayJobs = Job::where('created_at', today())->count();
        $yesterdayJobs = Job::where('created_at', today()->subDays(1))->count();
        $jobs2DaysAgo = Job::where('created_at', today()->subDays(2))->count();

        /**
         * Instance of chart
         */
        $chart = new WeeklyJobs;
        $chart->labels=(['2 Days ago', 'Yesterday', 'Today']);
        $chart->dataset('My dataset', 'line', [$jobs2DaysAgo, $yesterdayJobs, $todayJobs]);
    }
}
