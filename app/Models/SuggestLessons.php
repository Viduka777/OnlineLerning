<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SuggestLessons extends Model
{
    protected $table = 'suggested_lessons';
    protected $fillable =['lesson_id','child_id'];

    public static function mySug(){
        $res = DB::table('suggested_lessons as cu')
            ->where('cu.child_id',Auth::user()->id)
            ->where('cu.status',0)
            ->leftJoin('lessons as ls','cu.lesson_id','=','ls.id')
//            ->where('ls.price','>=',0)
            ->get();
        return $res;
    }
}
