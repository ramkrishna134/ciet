<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $fillable = [
        'name' ,
        'image' ,
        'post' ,
        'subject' ,
        'number',
        'profile',
        'category',
        'department_id',
        'status',
        'lang',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
