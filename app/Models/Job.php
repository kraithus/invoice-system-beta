<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'customer_id',
        'technician_id',
    ];

    /**
     * Get the customer that owns the job.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get the technician aka user that owns the job.
     */
    public function technician()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the quotation for this job
     */
    public function quotation()
    {
        return $this->hasOne(quotation::class);
    }

    /**
     * Using the quotation, get the invoice for this job
     */
    public function quotationInvoice()
    {
        return $this->hasOneThrough(Quotation::class, Invoice::class);
    }
}


