<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'message',
        'controller_id',
        'technician_id',
        'status',
    ];

    /**
     * Notification was sent by controller X
     */
    public function controller()
    {
        return $this->belongsTo(User::class, 'controller_id');
    }

    /**
     * Notification was sent to technician X
     */
    public function technician()
    {
        return $this->belongsTo(User::class, 'technician_id');
    }

}
