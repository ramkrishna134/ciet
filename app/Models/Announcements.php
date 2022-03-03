<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcements extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'category',
        'sub_category',
        'url',
        'lang',
        'expiry_date',
        'user_id',
        'status'
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
