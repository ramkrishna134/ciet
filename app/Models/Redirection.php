<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Redirection extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_url',
        'to_url',
        'method',
        'status',
    ];
}
