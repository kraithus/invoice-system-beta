<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    
    /**
     * District belongs to a region
     */
    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
