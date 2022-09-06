<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'name',
    ];

    /**
     * Customer has many jobs
     */
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    /**
     * Customer has a quotation through a job
     */

    public function quotation()
    {
        return $this->hasOneThrough(Quotation::class, Job::class);
    }

    /**
     * Customer has many quotations through jobs
     */
    public function quotations()
    {
        return $this->hasManyThrough(Quotation::class, Job::class);
    }   
}
