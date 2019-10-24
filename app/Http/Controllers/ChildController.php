<?php

namespace App\Http\Controllers;

use App\Models\ChildLessonView;
use App\Models\CourseUser;
use App\Models\Game;
use App\Models\Lesson;
use App\Models\LessonQuestion;
use App\Models\Question;
use App\Models\RateLesson;
use App\Models\RequestedLessions;
use App\Models\SuggestLessons;
use App\Models\UserLessonMark;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChildController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function questions()
    {
        if (Auth::user()->is_completed) {
            return redirect('/home');
        }
        $questions = Question::where('status', 1)->inRandomOrder()->get();
        return view('child.questions')
            ->with('questions', $questions);
    }


    public function check_answer(Request $request)
    {
        $questions = Question::where('id', $request->question_id)->where('correct_answer', $request->answer)->count();
        return $questions;
    }


    public function save_answer(Request $request)
    {
        if ($request->score_final >= 14) {
            $level = 3;
        } elseif ($request->score_final >= 6) {
            $level = 2;
        } else {
            $level = 1;
        }

        $user = User::where('id', $request->user_id)->first();
        $user->score = $request->score_final;
        $user->level = $level;
        $user->is_completed = 1;

        $res = $user->save();
        if ($res) {
            return 'success';
        } else {
            return 'error';

        }
    }

    public function findCourse()
    {
        if (!Auth::user()->is_completed) {
            return redirect('/home');
        }
        if (Auth::user()->level == 1) {
            $levels = ['level_1'];
        } elseif (Auth::user()->level == 2) {
            $levels = ['level_1', 'level_2'];
        } else {
            $levels = ['level_1', 'level_2', 'level_3'];
        }

        RequestedLessions::where('child_id', Auth::user()->id)->where('status', 0)->update(['is_read' => 1]);

        $courses = Lesson::whereIn('lesson_category', $levels)->where('status', 1)->get();
        $cu = CourseUser::where('user_id', Auth::user()->id)->get();
        return view('child.find-course')
            ->with('courses', $courses)
            ->with('fil', '')
            ->with('type', 'all')
            ->with('cu', $cu);
    }

    public function filterCourses($fil = null, $type = null)
    {
        if (!Auth::user()->is_completed) {
            return redirect('/home');
        }
//        dd(Auth::user()->level);
        if (Auth::user()->level == 1) {
            $levels = ['level_1'];
        } elseif (Auth::user()->level == 2) {
            $levels = ['level_1', 'level_2'];
        } else {
            $levels = ['level_1', 'level_2', 'level_3'];
        }
        RequestedLessions::where('child_id', Auth::user()->id)->where('status', 0)->update(['is_read' => 1]);
        if ($fil == 'free') {
            $a = Lesson::whereIn('lesson_category', $levels)
                ->where('price', '==', 0);
            if ($type != 'all') {
                $a->where('lesson_type', $type);
            }
            $courses = $a->where('status', 1)
                ->get();
        } else if ($fil == 'paid') {
            $a = Lesson::whereIn('lesson_category', $levels)
                ->where('price', '>', 0);
            if ($type != 'all') {
                $a->where('lesson_type', $type);
            }
            $courses = $a->where('status', 1)
                ->get();
        } else {
            $a = Lesson::whereIn('lesson_category', $levels);
            if ($type != 'all') {
                $a->where('lesson_type', $type);
            }
            $courses = $a->where('status', 1)
                ->get();
        }
        $cu = CourseUser::where('user_id', Auth::user()->id)->get();

        return view('child.find-course')
            ->with('courses', $courses)
            ->with('fil', $fil)
            ->with('type', $type)
            ->with('cu', $cu);
    }

    public function viewCourse($id)
    {
        $overlay = false;
        $sugg = SuggestLessons::where('lesson_id', $id)->update(['status' => 1]);

        $c = ChildLessonView::where('user_id', Auth::user()->id)->where('lesson_id', $id)->first();
        $cu = CourseUser::where('user_id', Auth::user()->id)->where('course_id', $id)->get();
        $data = Lesson::where('id', $id)->where('status', 1)->first();

        if ($data->price > 0) {
            if (!count($cu)) {
                $overlay = true;
//                dd($overlay);
            }
        }
        $tests = LessonQuestion::where('lesson_id', $id)->where('status', 1)->get();
        $data->views = $data->views + 1;
        $data->save();

//        if ()
        if (is_null($c)) {
            $chilView = new ChildLessonView();
            $chilView->views = 1;
        } else {
            $chilView = $c;
            $chilView->views = $chilView->views + 1;

        }
        $chilView->user_id = Auth::user()->id;
        $chilView->lesson_id = $id;
        $resCh = $chilView->save();

        $lessonMarks = UserLessonMark::where('lesson_id', $id)->where('user_id', Auth::user()->id)->first();

        return view('child.view-course')
            ->with('tests', $tests)
            ->with('lessonMarks', $lessonMarks)
            ->with('overlay', $overlay)
            ->with('data', $data);
    }

    public function viewSuggestCourse($id)
    {
        $overlay = false;
        $c = ChildLessonView::where('user_id', Auth::user()->id)->where('lesson_id', $id)->first();
        $cu = CourseUser::where('user_id', Auth::user()->id)->where('course_id', $id)->get();
        $data = Lesson::where('id', $id)->where('status', 1)->first();
        if ($data->price > 0) {
            if (!count($cu)) {
                $overlay = true;
//                dd($overlay);
            }
        }
        $sugg = SuggestLessons::where('lesson_id', $id)->update(['status' => 1]);
        $chilView = new ChildLessonView();
        $chilView->user_id = Auth::user()->id;
        $chilView->lesson_id = $id;
        $resCh = $chilView->save();

        $lessonMarks = UserLessonMark::where('lesson_id', $id)->where('user_id', Auth::user()->id)->first();

        $tests = LessonQuestion::where('lesson_id', $id)->where('status', 1)->get();
        $data->views = $data->views + 1;
        $data->save();
        return view('child.view-course')
            ->with('tests', $tests)
            ->with('lessonMarks', $lessonMarks)
            ->with('overlay', $overlay)
            ->with('data', $data);
    }

    public function myCourses()
    {
        $courses = Lesson::myLessions();
        return view('child.my-course')
            ->with('courses', $courses);
    }

    public function myTests()
    {
        $courses = UserLessonMark::myTests();
//        dd($courses);
        return view('child.my-tests')
            ->with('courses', $courses);
    }

    public function mySuggests()
    {
        $courses = SuggestLessons::mySug();
//        dd($courses);
        return view('child.my-suggesions')
            ->with('courses', $courses);
    }


    public function allGames()
    {
        $games = Game::all();
        return view('child.list-games')
            ->with('games', $games);
    }

    public function viewGame($id)
    {
        $game = Game::where('id', $id)->first();
        return view('child.view-game')
            ->with('game', $game);
    }

    public function lessonRequest(Request $request)
    {
        $les = new RequestedLessions();
        $les->lesson_id = $request->course_id;
        $les->child_id = Auth::user()->id;
        $les->parent_id = Auth::user()->parent_id;
        $les->amount = $request->amount;
        $res = $les->save();
        return redirect()->back()->with('success', 'Request sent to parent Successfully!');

    }

    public function readNotiChild()
    {
        RequestedLessions::where('child_id', Auth::user()->id)->where('status', 0)->update(['is_read' => 1]);
        return redirect()->back();
    }

    public function rateEducatorByChild(Request $request)
    {
//        dd($request->all());
        $rate = new RateLesson();
        $rate->lesson_id = $request->lesson;
        $rate->user_id = $request->user;
        $rate->rate = $request->rate;
        $rate->save();

        $user = Lesson::where('id', $request->lesson)->first();
//        dd($user);
        $dev = ($user->rate == 0) ? 1 : 2;
        $rate_val = round(((int)$user->rate + (int)$request->rate) / $dev, 0);
        $user->rate = $rate_val;
        $res = $user->save();


        return response()->json($res, 200);
    }

    public function Lessonquestions($id)
    {
//        dd(Auth::user()->id);
//        dd(count(UserLessonMark::where('lesson_id',$id)->where('user_id',Auth::user()->id)->get()));
        if (count(UserLessonMark::where('lesson_id', $id)->where('user_id', Auth::user()->id)->get())) {
            return redirect()->back()->with('error', 'You already Answered to these test');
        }
        $questions = LessonQuestion::where('status', 1)
            ->where('lesson_id', $id)
            ->inRandomOrder()->get();
        return view('child.lesson-questions')
            ->with('questions', $questions)
            ->with('id', $id);
    }


    public function check_answer_test(Request $request)
    {
        $questions = LessonQuestion::where('id', $request->question_id)->where('correct_answer', $request->answer)->count();
        return $questions;
    }

    public function save_answer_test(Request $request)
    {

        $user = new UserLessonMark();
        $user->user_id = Auth::user()->id;
        $user->lesson_id = $request->lesson_id;
        $user->mark = $request->score_final;
        $user->lesson_paper = $request->que_res;

        $this->addScore($request->score_final);

        $res = $user->save();
        if ($res) {
            return 'success';
        } else {
            return 'error';

        }
    }

    public function LessonquestionsRetake($id)
    {
//
        $questions = LessonQuestion::where('status', 1)
            ->where('lesson_id', $id)
            ->inRandomOrder()->get();
        return view('child.lesson-questions-retake')
            ->with('questions', $questions)
            ->with('id', $id);
    }

    public function save_answer_test_retake(Request $request)
    {

        $user = UserLessonMark::where('lesson_id', $request->lesson_id)->where('user_id', Auth::user()->id)->first();
        $user->user_id = Auth::user()->id;
        $user->lesson_id = $request->lesson_id;
        $user->mark = $request->score_final;
        $user->lesson_paper = $request->que_res;

        $this->addScore($request->score_final);

        $res = $user->save();
        if ($res) {
            return 'success';
        } else {
            return 'error';

        }
    }


    private function calLevel($score)
    {
        if ($score >= 14) {
            return 3;
        } elseif ($score >= 6) {
            return 2;
        } else {
            return 1;
        }
    }

    private function addScore($mark)
    {
        $user = User::where('id',Auth::user()->id)->first();
        $final_score = $user->score + ($mark / 10);
        $user->score = $final_score;
        $user->level = $this->calLevel($final_score);
//dd($user);
        $user->save();

    }
}
