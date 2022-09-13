<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\Job;
use App\Models\Quotation;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {   

        $technicianID = Auth::user()->id;
        $countCustomers = Job::where('technician_id', $technicianID)->distinct()->count('customer_id');
        $countJobs = Job::where('technician_id', $technicianID)->count();
        $countQuotations = User::find($technicianID)->quotations->count();

        $data = [
            'customerNum' => $countCustomers,
            'jobNum' => $countJobs,
            'quotationNum' => $countQuotations
        ];

        return view('dashboard', $data);
    }
}
