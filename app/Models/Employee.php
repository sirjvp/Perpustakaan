<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_position',
        'hire_date',
    ];

    public function users() {
        return $this->morphMany('App\Models\User', 'role');
    }
}
