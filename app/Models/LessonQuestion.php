<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LessonQuestion extends Model
{
    protected $table ='lesson_questions';
    protected $fillable = [
        'question_title', 'questions_description', 'answer_1', 'answer_2', 'answer_3', 'answer_4', 'correct_answer',
        'created_at', 'updated_at', 'status', 'image','lesson_id'
    ];
}
