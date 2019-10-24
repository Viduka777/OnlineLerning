<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    public function showLoginForm()
    {
       return view('member.member-login');
    }

    public function showRegisterForm()
    {
        return view('member.member-register');
    }
}
