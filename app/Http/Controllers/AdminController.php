<?php

namespace App\Http\Controllers;

use App\Models\CourseUser;
use App\Models\EducatorPayment;
use App\Models\Lesson;
use App\Models\Payment;
use App\Models\Question;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
    public function addGeneralQuestion()
    {
        $new_educators = User::where('user_regster_type', 'educator')->where('status', 0)->get();
        $new_lessions = Lesson::where('status', 0)->get();
        $layout = 'admin';
        return view('dashboard.admin.add-general-question')
            ->with('new_educators', $new_educators)
            ->with('new_lessions', $new_lessions)
            ->with('layout', $layout);
    }

    public function saveGeneralQuestion(Request $request)
    {
        $request->merge(['status' => 1]);
        $request->merge(['image' => ($request->hasfile('file'))?$this->saveLesson($request):null]);
//        dd($request->all());
        $lession = new Question($request->except('_token'));
        $lession->save();
        return redirect()->back()->with('message', 'Lesson Added Successfully!');
    }

    public function saveLesson($request)
    {
        $dir = './uploads/questions/';
        $file = $request->file; //file field
        $ext = $file->guessExtension(); //get file extenstion
        $name = 'que-' . uniqid() . '.' . $ext; //create file name
        $res = Input::file('file')->move($dir . '/' . $request->lesson_type, $name); //path to save file

        $request->merge(['file_path' => $dir . '/' . $request->lesson_type . '/' . $name]);
        return $name;
    }

    public function listGeneralQuestion()
    {
        $ques = Question::all();
        $layout = 'admin';
        $new_educators = User::where('user_regster_type', 'educator')->where('status', 0)->get();
        $new_lessions = Lesson::where('status', 0)->get();
        return view('dashboard.admin.list-general-questions')
            ->with('layout', $layout)
            ->with('new_educators', $new_educators)
            ->with('new_lessions', $new_lessions)
            ->with('ques', $ques);
    }

    public function deactivateGeneralQuestion($id)
    {
        $que = Question::where('id', $id)->update(['status' => 0]);
        return redirect()->back()->with('message', 'Question Deactivated Successfully!');

    }

    public function activateGeneralQuestion($id)
    {
        $que = Question::where('id', $id)->update(['status' => 1]);
        return redirect()->back()->with('message', 'Question Activated Successfully!');

    }

    public function deleteGeneralQuestion($id)
    {
        $que = Question::where('id', $id)->delete();
        return redirect()->back()->with('message', 'Question Deleted Successfully!');

    }

//    END Genaral Qustions

    public function listChild()
    {
        $users = User::where('user_regster_type', 'educator')->where('status', 0)->get();
//        dd($users);
        $layout = 'admin';
        $new_educators = User::where('user_regster_type', 'educator')->where('status', 0)->get();
        $new_lessions = Lesson::where('status', 0)->get();
        return view('dashboard.admin.list-child')
            ->with('pending', 1)
            ->with('layout', $layout)
            ->with('new_educators', $new_educators)
            ->with('new_lessions', $new_lessions)
            ->with('users', $users);
    }

    public function allChild()
    {
        $users = User::where('user_regster_type', 'educator')->get();
//        dd($users);
        $layout = 'admin';
        $new_educators = User::where('user_regster_type', 'educator')->where('status', 0)->get();
        $new_lessions = Lesson::where('status', 0)->get();
        return view('dashboard.admin.list-child')
            ->with('pending', 0)
            ->with('layout', $layout)
            ->with('new_educators', $new_educators)
            ->with('new_lessions', $new_lessions)
            ->with('users', $users);
    }

    public function activeChild()
    {
        $users = User::where('user_regster_type', 'educator')->where('status', 1)->get();
//        dd($users);
        $layout = 'admin';
        $new_educators = User::where('user_regster_type', 'educator')->where('status', 0)->get();
        $new_lessions = Lesson::where('status', 0)->get();
        return view('dashboard.admin.list-child')
            ->with('pending',0)
            ->with('layout', $layout)
            ->with('new_educators', $new_educators)
            ->with('new_lessions', $new_lessions)
            ->with('users', $users);
    }

    public function deactivateChild($id)
    {
        $que = User::where('id', $id)->update(['status' => 0]);
        return redirect()->back()->with('message', 'User Deactivated Successfully!');

    }

    public function activateChild($id)
    {
        $que = User::where('id', $id)->update(['status' => 1]);
        return redirect()->back()->with('message', 'User Activated Successfully!');

    }

    public function rejectChild($id)
    {
        $que = User::where('id', $id)->update(['status' => -1]);
        return redirect()->back()->with('message', 'User Reject Successfully!');

    }

    public function deleteChild($id)
    {
        $que = User::where('id', $id)->delete();
        return redirect()->back()->with('message', 'User Deleted Successfully!');

    }

    //lessons
    public function allLessons()
    {
        $layout = 'admin';
        $lessons = Lesson::get();
        $new_educators = User::where('user_regster_type', 'educator')->where('status', 0)->get();
        $new_lessions = Lesson::where('status', 0)->get();
        return view('dashboard.admin.list-lesson')
            ->with('lessons', $lessons)
            ->with('pending', 0)
            ->with('new_educators', $new_educators)
            ->with('new_lessions', $new_lessions)
            ->with('layout', $layout);
    }

    public function pendingLessions()
    {
        $layout = 'admin';
        $new_educators = User::where('user_regster_type', 'educator')->where('status', 0)->get();
        $new_lessions = Lesson::where('status', 0)->get();
        $lessons = Lesson::where('status', 0)->get();
        return view('dashboard.admin.list-lesson')
            ->with('lessons', $lessons)
            ->with('pending', 1)
            ->with('new_educators', $new_educators)
            ->with('new_lessions', $new_lessions)
            ->with('layout', $layout);
    }

    public function rejectLession(Request $request)
    {
        $lession = Lesson::where('id', $request->id)->first();
        $lession->status = -1;
        $lession->reject_reason = $request->reason;
        $res = $lession->save();
        return response()->json(['res' => $res], 200);
    }

//    followers

    public function lessonFollowersView($id)
    {
        $followes = DB::table('course_users')->where('course_id', $id)
            ->leftJoin('users', 'users.id', '=', 'course_users.user_id')->get();
        $layout = 'admin';
        $new_educators = User::where('user_regster_type', 'educator')->where('status', 0)->get();
        $new_lessions = Lesson::where('status', 0)->get();
        $course = Lesson::where('id', $id)->first();
        return view('dashboard.admin.list-followers')
            ->with('followes', $followes)
            ->with('course', $course)
            ->with('new_educators', $new_educators)
            ->with('new_lessions', $new_lessions)
            ->with('layout', $layout);
    }

    public function listPayments()
    {
        $layout = 'admin';
        $payments = DB::table('payments')
            ->leftJoin('lessons', 'lessons.id', '=', 'payments.bill_id')
            ->leftJoin('users', 'users.id', '=', 'payments.customer_id')
            ->where('payments.status',1)
            ->get()->groupBy('bill_id');
        //dd($payments);/
        $new_educators = User::where('user_regster_type', 'educator')->where('status', 0)->get();
        $new_lessions = Lesson::where('status', 0)->get();
        return view('dashboard.admin.list-payments')
            ->with('layout', $layout)
            ->with('new_educators', $new_educators)
            ->with('new_lessions', $new_lessions)
            ->with('payments', $payments);
    }

    public function payPayments($user_id,$amount)
    {
        $update = Payment::where('customer_id', $user_id)->update(['status'=>0]);

        $save = new EducatorPayment();
        $save->user_id = $user_id;
        $save->payment =$amount;
        $save->paid_by = Auth::user()->id;
        $res = $save->save();

        if ($res){
            return redirect()->back()->with('message', 'Educator Paid Successfully!');
        }else{
            return redirect()->back()->withErrors(['Educator not Paid!']);
        }

    }

    public function archivePayments(){
        $layout = 'admin';
        $payments = DB::table('payment_educators')
            ->leftJoin('users', 'users.id', '=', 'payment_educators.user_id')
            ->where('payment_educators.status',1)
            ->get();
        $new_educators = User::where('user_regster_type', 'educator')->where('status', 0)->get();
        $new_lessions = Lesson::where('status', 0)->get();
        return view('dashboard.admin.list-payments-history')
            ->with('layout', $layout)
            ->with('new_educators', $new_educators)
            ->with('new_lessions', $new_lessions)
            ->with('payments', $payments);
    }
}
