<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'invoice_id',
        'payment_method',
    ];

    /**
     * Receipt is tied to an invoice
     */
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    } 
}
