<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SystemUser extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=[
        'name',
        'meli',
        'sim',
        'mobile_model',
        'mobile_id',
        'laptop_model',
        'laptop_id',
        'laptop_case',
        'tv_model',
        'tv_id'

    ];
}
