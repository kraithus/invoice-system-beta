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
     * @param \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUpdatePaymentStatus($query)
    {
       return $query->update(['payment_status' => 1]);
    }    

    /**
     * Scope a query to update the specified invoice's
     * reminder time
     * 
     * @param \Illuminate\Database\Eloquent\Builder  $query
     * @param int  $id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUpdateReminderTime($query, $id)
    {
       return $query->where('id', $id)->update(['reminder_sent_at' => date("Y-m-d H:i:s")]);
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

    /**
     * Scope a query to only include invoices which
     * were created a exactly 30 days ago or more
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeCreatedOverAWeekAgo($query)
    {
        $query->where('created_at', '<=', today()->subDays(30));
    }    

    /**
     * Scope a query to only include invoices which no
     * reminder has been sent
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeReminderNotSent($query)
    {
        $query->whereNull('reminder_sent_at');
    }       

    /**
     * Scope a query to only include invoices which
     * today is >= 30 days from the reminder
     * sent date
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeReminderSentOverAWeekAgo($query)
    {
        $query->where('reminder_sent_at', '<=', today()->subDays(30));
    }      
}


