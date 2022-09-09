<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Quotation;
use App\Models\Customer;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;

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
}
