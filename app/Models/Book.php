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
    ];

    public function users() {
        return $this->belongsToMany(User::class, 'user_books', 'book_id', 'user_id')->withTimeStamps()->withPivot('status');
    }
}
