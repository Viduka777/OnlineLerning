<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Lesson extends Model
{
    protected $fillable = [
        'title','description', 'lesson_type', 'lesson_category','rate','created_at','updated_at','status','price','reject_reason'
    ];

    public static function myLessions(){
        $res = DB::table('course_users as cu')
            ->where('cu.user_id',Auth::user()->id)
            ->leftJoin('lessons as ls','cu.course_id','=','ls.id')
            ->get();
        return $res;
    }

    public function childlessonviews()
    {
        return $this->hasMany('App\Models\ChildLessonView');
    }
}
