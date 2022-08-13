<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Multichoise extends Model
{
    use HasFactory;
    protected $fillable=[
        'options',
        'status',
        'key',
        'day'
    ];
    protected $casts=[
        'options'=>'array'
    ];
}
