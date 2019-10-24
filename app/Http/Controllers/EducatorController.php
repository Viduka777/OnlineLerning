<?php

namespace App\Http\Controllers;

use App\Models\ChildLessonView;
use App\Models\Lesson;
use App\Models\LessonQuestion;
use App\Models\UserLessonMark;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class EducatorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function myLessons()
    {
        $layout = 'educator';
        $lessons = Lesson::where('user_id', Auth::user()->id)->with(['childlessonviews'])->get();
//dd($lessons);
        return view('dashboard.educator.list-lesson')
            ->with('lessons', $lessons)
            ->with('layout', $layout);
    }

    public function addLesson()
    {
//        $lessions =
        $layout = 'educator';
        return view('dashboard.educator.add-lession')->with('layout', $layout);
    }

    public function saveLesson(Request $request)
    {
        $dir = './uploads/';
        $file_name = $dir . "edu-" . Auth::user()->id;

        if (!file_exists($file_name)) {
            mkdir($file_name, 0777, true);
        }
        if (!file_exists($file_name . '/' . $request->lesson_type)) {
            mkdir($file_name . '/' . $request->lesson_type, 0777, true);
        }
        $file = $request->file; //file field
        $ext = $file->guessExtension(); //get file extenstion
        $name = $request->lesson_type . '-' . $request->lesson_category . '-' . uniqid() . '.' . $ext; //create file name
        $res = Input::file('file')->move($file_name . '/' . $request->lesson_type, $name); //path to save file

        $request->merge(['file_path' => $file_name . '/' . $request->lesson_type . '/' . $name]);
//        dd($request->all());
        $lesson = new Lesson($request->except('_token', 'file'));
        $lesson->user_id = Auth::user()->id;
        $lesson->age = $request->age;
        $lesson->file_path = $request->file_path;
        $lesson->status = 0;
        $resu = $lesson->save();

        if ($resu) {
            return redirect()->back()->with('message', 'Lesson Addedd Successfully!');
        } else {
            return redirect()->back()->withErrors(['Lesson not Added !']);
        }
    }

    public function deactive_lession($id)
    {
        $lession = Lesson::where('id', $id)->first();
        $lession->status = 0;
        $res = $lession->save();
        if ($res) {
            return redirect()->back()->with('message', 'Lesson Deactivated Successfully!');
        } else {
            return redirect()->back()->withErrors(['Lesson not Deactivated !']);
        }
    }

    public function active_lession($id)
    {
        $lession = Lesson::where('id', $id)->first();
        $lession->status = 1;
        $res = $lession->save();
        if ($res) {
            return redirect()->back()->with('message', 'Lesson Activated Successfully!');
        } else {
            return redirect()->back()->withErrors(['Lesson not Activated !']);
        }
    }

    public function delete_lession($id)
    {
        $res = Lesson::where('id', $id)->delete();
        if ($res) {
            return redirect()->back()->with('message', 'Lesson Deleted Successfully!');
        } else {
            return redirect()->back()->withErrors(['Lesson not Deleted !']);
        }
    }

    public function addLessionTest()
    {
        $layout = 'educator';
        $lessions = Lesson::where('user_id', Auth::user()->id)->where('status', 1)->get();
        return view('dashboard.educator.add-test')
            ->with('layout', $layout)
            ->with('lessions', $lessions);
    }

    public function saveLessionTest(Request $request)
    {
        $request->merge(['status' => 1]);
        $request->merge(['image' => ($request->hasfile('file')) ? $this->saveTestImg($request) : null]);
//        dd($request->all());
        $lession = new LessonQuestion($request->except('_token'));
        $lession->save();
        return redirect()->back()->with('message', 'Lesson test Added Successfully!');
    }


    public function saveTestImg($request)
    {
        $dir = './uploads/tests/';
        $file = $request->file; //file field
        $ext = $file->guessExtension(); //get file extenstion
        $name = 'test-' . uniqid() . '.' . $ext; //create file name
        $res = Input::file('file')->move($dir . '/' . $request->lesson_type, $name); //path to save file

        $request->merge(['file_path' => $dir . '/' . $request->lesson_type . '/' . $name]);
        return $name;
    }

    public function childLessonViews()
    {
        $layout = 'educator';
        $lessons = ChildLessonView::childLesson();
//dd($lessons);
        return view('dashboard.educator.list-followers')
            ->with('lessons', $lessons)
            ->with('layout', $layout);
    }

    public function lessonFollowersView($id)
    {
        $followes = DB::table('course_users')->where('course_id', $id)
            ->leftJoin('users', 'users.id', '=', 'course_users.user_id')->get();
        $layout = 'admin';
        $new_educators = '';
        $new_lessions = '';
        $course = Lesson::where('id', $id)->first();
        return view('dashboard.educator.list-followers_2')
            ->with('followes', $followes)
            ->with('course', $course)
            ->with('new_educators', $new_educators)
            ->with('new_lessions', $new_lessions)
            ->with('layout', $layout);
    }

    public function childPapersView()
    {
        $layout = 'admin';
        $lessons = Lesson::where('user_id',Auth::user()->id)->get();
        $lesson_ids = array();
//        dd($lessons);
        if(count($lessons)){
            foreach ($lessons as $lesson){
                array_push($lesson_ids,$lesson->id);
            }
        }
//        dd($lesson_ids);
        $papers = UserLessonMark::whereIn('lesson_id',$lesson_ids)->get()->groupBy('user_id');
//        dd($papers);
        $new_educators = User::where('user_regster_type', 'educator')->where('status', 0)->get();
        $new_lessions = Lesson::where('status', 0)->get();
        return view('dashboard.educator.list-papers')
            ->with('papers', $papers)
            ->with('new_educators', $new_educators)
            ->with('new_lessions', $new_lessions)
            ->with('layout', $layout);
    }


    public function childPapersViewSingle($id){
        $layout = 'admin';
        $papers = UserLessonMark::where('id',$id)->first();
        $paper = json_decode($papers->lesson_paper);
        $new_educators = User::where('user_regster_type', 'educator')->where('status', 0)->get();
        $new_lessions = Lesson::where('status', 0)->get();
        return view('dashboard.educator.list-paper-single')
            ->with('paper', $paper)
            ->with('new_educators', $new_educators)
            ->with('new_lessions', $new_lessions)
            ->with('layout', $layout);
    }

    public function archivePayments(){
        $layout = 'admin';
        $payments = DB::table('payment_educators')
            ->leftJoin('users', 'users.id', '=', 'payment_educators.user_id')
            ->where('user_id',Auth::user()->id)
            ->where('payment_educators.status',1)
            ->get();
         //   dd($payments);
        $new_educators = '';
        $new_lessions = '';
        return view('dashboard.admin.list-payments-history')
            ->with('layout', $layout)
            ->with('new_educators', $new_educators)
            ->with('new_lessions', $new_lessions)
            ->with('payments', $payments);
    }
}
