<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webinar extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'res_person',
        'ppt',
        'video',
        'web_date',
        'user_id',
        'status',
        'lang'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
