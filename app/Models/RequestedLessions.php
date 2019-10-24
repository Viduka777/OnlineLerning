<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestedLessions extends Model
{
    protected $table ='requested_lessions';
    protected $fillable =['educator_id','child_id','parent_id','amount','status','is_read'];
}
