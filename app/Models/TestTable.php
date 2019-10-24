<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestTable extends Model
{

    protected $fillable= ['username'];
    public $timestamps = false;
}
