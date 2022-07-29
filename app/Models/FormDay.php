<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormDay extends Model
{
    use HasFactory;

    protected $fillable = ['form','id_day'];
    protected $casts = [
        'form' => 'json',
    ];
}
