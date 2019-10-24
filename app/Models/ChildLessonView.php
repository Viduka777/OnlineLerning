<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChildLessonView extends Model
{
    protected $table="child_lesson_view";
    protected $filables = ['user_id','lesson_id','status','views'];

    public static function childLesson(){
        $res = DB::table('child_lesson_view as cu')
            ->leftJoin('lessons as ls','cu.lesson_id','=','ls.id')
            ->leftJoin('users as us','cu.user_id','=','us.id')
            ->where('ls.user_id',Auth::user()->id)
            ->get();
        return $res;
    }

    public function lessons()
    {
        return $this->hasMany('App\Models\Lesson');
    }
}
