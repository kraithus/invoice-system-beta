<?php

namespace App\Http\Controllers;

use App\Charts\WeeklyJobs;
use App\Charts\WeeklyRevenue;
use App\Models\Job;
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
        $chart->dataset('Jobs this week', 'line', [$jobs2DaysAgo, $yesterdayJobs, $todayJobs])->options([
            ['scales' => 
                ['y' => 
                    ['ticks' => 'stepSize: 1']
                ]    
            ]
        ]);

        return view('admin.index', compact('chart'));
    }    
}
