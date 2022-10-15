<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'quotation_id',
        'status',
    ];

    /**
     * Invoice belongs to a quotation
     */
    public function quotation()
    {
        return $this->belongsTo(Quotation::class);
    } 

    /**
     * Invoice has a receipt confirming payment
     */
    public function receipt()
    {
        return $this->hasOne(Receipt::class);
    }
 
    /**
     * Scope a query to update the specified invoice's
     * payment status
     * 
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUpdatePaymentStatus($query)
    {
       return $query->update(['payment_status' => 1]);
    }    

    /**
     * Scope a query to only include outstanding invoices.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeOutstanding($query)
    {
        $query->where('payment_status', 0);
    }   
    
    /**
     * Scope a query to only include paid invoices.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopePaid($query)
    {
        $query->where('payment_status', 1);
    }       
}


