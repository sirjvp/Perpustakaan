<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'synopsis',
        'genre',
        'cover_image',
        'publication_date',
        'submitted_by',
        'status',
        'borrowed_date',
        'return_date'
    ];
}
