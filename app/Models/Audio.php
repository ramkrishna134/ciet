<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'book_id',
        'file',
    ];


    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
