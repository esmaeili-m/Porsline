<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    use HasFactory;
    protected $fillable=['date','days'];
    public function forms(){
        return $this->belongsTo(FormDay::class,'id','id_day');
    }
    public function anserw(){
        return $this->hasMany(Answer::class,'day','id');
    }
}
