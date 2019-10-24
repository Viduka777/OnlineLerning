<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\RateEducator;
use App\Models\RequestedLessions;
use App\Models\SuggestLessons;
use App\Models\UserLessonMark;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $layout = 'parent';
        $lessons = '';
        $new_educators = '';
        $new_lessions = '';
        $child_data = '';
        $pay_requests = '';
        $child_pay_requests = '';
        if (Auth::user()->user_regster_type == 'admin') {
            $layout = 'admin';
            $new_educators = User::where('user_regster_type', 'educator')->where('status', 0)->get();
            $new_lessions = Lesson::where('status', 0)->get();
//            dd($new_educators);
        } elseif (Auth::user()->user_regster_type == 'educator') {
            $layout = 'educator';
            $lessons = Lesson::where('user_id', Auth::user()->id)->get();
        } elseif (Auth::user()->user_regster_type == 'child') {
            $layout = 'child';
            $lessons = Lesson::where('lesson_category', 'level_' . Auth::user()->level)->get();
            $child_pay_requests = $this->getReqLessions();
//            dd($child_pay_requests);
        } elseif (Auth::user()->user_regster_type == 'parent') {
            $layout = 'parent';
            $pay_requests = $this->getPaymentsLessions();
        }
        return view('dashboard.' . $layout . '-dashboard')
            ->with('layout', $layout)
            ->with('new_educators', $new_educators)
            ->with('new_lessions', $new_lessions)
            ->with('child_pay_requests', $child_pay_requests)
            ->with('pay_requests', $pay_requests)
            ->with('lessons', $lessons);
    }

    public function addChild()
    {
        $layout = 'parent';
        if (Auth::user()->user_regster_type != 'parent') {
            return route('home');
        }
        $pay_requests = $this->getPaymentsLessions();
        return view('dashboard.parent.add-child')
            ->with('pay_requests', $pay_requests)
            ->with('layout', $layout);

    }


    public function saveChild(Request $request)
    {
        if (User::where('email', $request->email)->count()) {
            return redirect()->back()->withErrors(['Email already exists!']);
        }

//        $validator  =$request->validate([
//            'name' => 'required|max:255|min:5|string',
//            'email' => 'required|unique:users|max:100|min:5|email',
//            'dob' => 'required',
//            'password' => 'required|min:8|string|confirmed',
//
//        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->dob = Carbon::parse($request->dob)->format('Y-m-d');
        $user->password = bcrypt($request->password);
        $user->user_regster_type = 'child';
        $user->parent_id = Auth::user()->id;
        $user->status = 0;

        $res = $user->save();
        if ($res) {
            return redirect()->back()->with('message', 'Child Addedd Successfully!');
        } else {
            return redirect()->back()->withErrors(['Child not Added !']);
        }

    }

    public function listChild()
    {
        $layout = 'parent';
        $list = User::where('parent_id', Auth::user()->id)->get();
        $pay_requests = $this->getPaymentsLessions();
        return view('dashboard.parent.list-children')
            ->with('pay_requests', $pay_requests)
            ->with('children', $list)
            ->with('layout', $layout);

    }

    public function deleteChild($id)
    {
        $res = User::where('id', $id)->delete();

        if ($res) {
            if ($res) {
                return redirect()->back()->with('message', 'Child deleted Successfully!');
            } else {
                return redirect()->back()->withErrors(['Child not deleted !']);
            }
        }
    }

    public function allParentLessons()
    {
        $layout = 'admin';
        $lessons = Lesson::where('status', 1)->get();
        $pay_requests = $this->getPaymentsLessions();
        return view('dashboard.parent.list-lesson')
            ->with('pay_requests', $pay_requests)
            ->with('lessons', $lessons)
            ->with('pending', 0)
            ->with('layout', $layout);
    }

    public function suggestLessons(Request $request)
    {
//        dd($request->all());
        $les = new SuggestLessons($request->except(['_token']));
        $res = $les->save();
        $lesson_details = Lesson::where('id',$request->lesson_id)->first();
        if($lesson_details->price > 0){
            $les = new RequestedLessions();
            $les->lesson_id = $request->lesson_id;
            $les->child_id = $request->child_id;
            $les->parent_id = Auth::user()->id;
            $les->amount = $lesson_details->price;
            $res = $les->save();
        }
        return redirect()->back()->with('message', 'Lesson Suggested Successfully!');
    }

    public function allEducatorsParents()
    {
        $users = User::where('user_regster_type', 'educator')->where('status', 1)->get();
//        dd($users);
        $layout = 'admin';
        $pay_requests = $this->getPaymentsLessions();
        return view('dashboard.educator.list-educators')
            ->with('pay_requests', $pay_requests)
            ->with('layout', $layout)
            ->with('users', $users);
    }

    public function rateEducatorByParent(Request $request)
    {
//        dd($request->all());
        $rate = new RateEducator();
        $rate->educator_id = $request->educator_id;
        $rate->user_id = $request->user;
        $rate->rate = $request->rate;
        $rate->save();

        $user = User::where('id',$request->educator_id)->first();
//        dd($user);
        $dev=($user->rate == 0)?1:2;
        $rate_val = round(((int)$user->rate + (int)$request->rate)/$dev,0);
        $user->rate =$rate_val;
        $res =$user->save();


        return response()->json($res,200);
    }

    public function requestPayLessons(){
        $layout = 'admin';
        $lessons = DB::table('requested_lessions as rl')
            ->where('rl.status', 1)
            ->leftJoin('lessons as ls','ls.id','=','rl.lesson_id')
            ->select('rl.id as req_id','rl.lesson_id as lesson_id','rl.child_id as child_id','rl.parent_id as parent_id',
                'rl.amount as amount','ls.title as title','ls.description as description','ls.lesson_type as lesson_type',
                'ls.lesson_category as lesson_category','ls.rate as rate','ls.price as price','ls.id as id')
            ->get();
        $pay_requests = $this->getPaymentsLessions();
//        dd($lessons);
        return view('dashboard.parent.list-pay-lesson')
            ->with('pay_requests', $pay_requests)
            ->with('layout', $layout)
            ->with('lessons', $lessons);

    }

    private function getReqLessions(){
        $res = DB::table('requested_lessions as rl')
            ->where('parent_id',Auth::user()->id)
            ->where('rl.status', 0)
            ->where('rl.is_read', 0)
            ->leftJoin('lessons as ls','ls.id','=','rl.lesson_id')
            ->select('rl.id as req_id','rl.lesson_id as lesson_id','rl.child_id as child_id','rl.parent_id as parent_id',
                'rl.amount as amount','ls.title as title','ls.description as description','ls.lesson_type as lesson_type',
                'ls.lesson_category as lesson_category','ls.rate as rate','ls.price as price','ls.id as id',
                'rl.updated_at as created_at')
            ->get();

        return $res;
    }

    private function getPaymentsLessions(){
        $res = DB::table('requested_lessions as rl')
            ->where('parent_id',Auth::user()->id)
            ->where('rl.status', 1)
            ->leftJoin('lessons as ls','ls.id','=','rl.lesson_id')
            ->get();

        return $res;
    }

    public function childPapersView()
    {
        $layout = 'admin';
        $childs= User::where('parent_id',Auth::user()->id)->select('id')->get();
        $childs_id = array();
        foreach ($childs as $child){
            array_push($childs_id,$child->id);
        }
//        dd($childs_id);
        $papers = UserLessonMark::whereIn('user_id',$childs_id)->get()->groupBy('user_id');
//        dd($papers);
        $new_educators = '';
        $new_lessions = '';
        return view('dashboard.parent.list-papers')
            ->with('papers', $papers)
            ->with('new_educators', $new_educators)
            ->with('new_lessions', $new_lessions)
            ->with('layout', $layout);
    }


    public function childPapersViewSingle($id){
        $layout = 'admin';
        $papers = UserLessonMark::where('id',$id)->first();
        $paper = json_decode($papers->lesson_paper);
        $new_educators = '';
        $new_lessions = '';
        return view('dashboard.parent.list-paper-single')
            ->with('paper', $paper)
            ->with('new_educators', $new_educators)
            ->with('new_lessions', $new_lessions)
            ->with('layout', $layout);
    }
}
