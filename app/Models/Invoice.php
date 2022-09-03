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
}


