<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RateEducator extends Model
{
    protected $table ='rate_educators';
    protected $fillable =['educator_id','user_id','rate','status'];

}
