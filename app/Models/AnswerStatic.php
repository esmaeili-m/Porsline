<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerStatic extends Model
{
    protected $fillable=[
        'answer','link','time','phone'
    ];
    protected $casts=[
        'answer'=>'array'
    ];
    use HasFactory;
}
