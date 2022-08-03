<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $fillable=['answer','day','time','phone'];
    protected $casts=[
        'answer'=>'array'
    ];
}
