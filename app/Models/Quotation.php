<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'job_id',
        'price',
    ];

    /**
     * Quotation belongs to a job
     */
    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    /**
     * Quotation has an invoice
     */
    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }

    /**
     * Scope a query to update the specified quotation
     * 
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUpdateInvoiceStatus($query)
    {
       return $query->update(['invoice_status' => 1]);
    }
}
