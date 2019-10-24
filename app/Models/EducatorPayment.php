<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducatorPayment extends Model
{
    protected $table = 'payment_educators';
    protected $fillable =['user_id','payment','paid_by','status'];
}
