<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaticForm extends Model
{
    use HasFactory;
    protected $fillable=['form','name','link'];
    protected $casts=[
        'form'=>'array'
    ];
}
