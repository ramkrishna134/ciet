<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo',
        'link',
        'lang',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
