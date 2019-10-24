<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
   protected $fillable = ['customer_id','account_no','payment_method','card_name','card_last_digit','total_amount','invoice_no'];
}
