<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RateLesson extends Model
{
    protected $table ='rate_lessons';
    protected $fillable =['lesson_id','user_id','rate','status'];

}
