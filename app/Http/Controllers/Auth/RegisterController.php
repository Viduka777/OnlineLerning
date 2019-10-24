<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $cer = null;

//        dd();
        if (isset($data['certificates'])){
            foreach ($data['certificates'] as $c){
                $cer = $cer . $this->saveTestImg($c). ',';
            }
        }
//        dd($cer);
        return User::create([
            'title' => $data['title'],
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'occupation' => $data['occupation'],
            'password' => bcrypt($data['password']),
            'user_regster_type' => $data['user_regster_type'],
            'gender' => $data['gender'],
            'certificates' => rtrim($cer,','),
            'education_qualifications' => $data['education_qualifications'],
        ]);
    }

    public function saveTestImg($request)
    {
//        dd($request->guessExtension());
        $dir = './uploads/certificates/';
        $file = $request; //file field
        $ext = $file->guessExtension(); //get file extenstion
        $name = 'certificates-' . uniqid(). rand(10,100000) . '.' . $ext; //create file name
        $res = $request->move($dir . '/' , $name);
//        $res = Input::file('certificates')->move($dir . '/' , $name); //path to save file

//        $request->merge(['file_path' => $dir . '/' . $name]);
        return $name;
    }

    public static function getUserDetails($id){
        return User::where('id',$id)->first();
    }
}
