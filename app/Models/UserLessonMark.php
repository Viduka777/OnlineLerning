<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserLessonMark extends Model
{
    protected $table = 'user_lesson_mark';
    public $timestamps = false;
    protected $fillable =['lesson_paper','user_id','lesson_id','mark','status'];

    public static function myTests(){
        $res = DB::table('user_lesson_mark as cu')
            ->where('cu.user_id',Auth::user()->id)
            ->leftJoin('lessons as ls','cu.lesson_id','=','ls.id')
            ->get();
        return $res;
    }
}
