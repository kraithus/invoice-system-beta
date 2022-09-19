<?php

namespace App\Http\Controllers;

use App\Charts\WeeklyJobs;
use App\Charts\WeeklyRevenue;
use App\Models\Job;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {   
        /**
         * Query the data
         */
        $todayJobs = Job::where('created_at', '>=', today())->count();
        $yesterdayJobs = Job::where('created_at', '>=', today()->subDays(1))->where('created_at', '<', today())->count();
        $jobs2DaysAgo = Job::where('created_at', '>=', today()->subDays(2))->where('created_at', '<', today()->subDays(1))->count();

        /**
         * Instance of chart
         */
        $chart = new WeeklyJobs;
        $chart->labels=(['2 Days ago', 'Yesterday', 'Today']);
        $chart->dataset('Jobs', 'line', [$jobs2DaysAgo, $yesterdayJobs, $todayJobs])->options([
            ['scales' => 
                ['y' => 
                    ['ticks' => 'stepSize: 1']
                ]    
            ]
        ]);

        return view('admin.index', compact('chart'));
    }    

    public function jobsDone()
    {   
        // Get all jobs
        $data = [
            'jobs' => Job::all(),
            'title' => 'Jobs Done'
        ];    

        // Load view with jobs data
        return view('admin.jobs-index', $data);
    }

    public function dataExport()
    {   
        $from = date('Y-01-01');
        $to = date('Y-m-d');
        $period = CarbonPeriod::create($from, '1 month', $to);

        $data = [
            'title' => 'Export Tables',
            'period' => $period
        ];

        return view('admin.export-data', $data);
    }

    /**
     * Send chosen month for report generation.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function monthlyJobsTable(Request $request)
    {   
        $request->validate([
            'month' => 'required', 'number'
        ]);

        $year = date('Y');
        $month = $request->month;
        $yearMonth = $year . '-' . $month;

        $jobs = Job::where('created_at', 'LIKE',  $yearMonth . '%')->get();

        $monthString = Carbon::create($yearMonth . '-01');

        $monthName = $monthString->format('F');

        $title = 'Job Report for ' . $monthName . ' of ' . $year; 

        $data = [
            'title' => $title,
            'year' => $year,
            'month' => $month,
            'jobs' => $jobs,
        ];

        return view('admin.table-template', $data);
    }
}
