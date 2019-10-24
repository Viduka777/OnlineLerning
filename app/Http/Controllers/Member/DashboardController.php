<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function parentDashboard(){
        return 'parent view';
    }
    public function educatorDashboard(){
        return 'educator view';
    }
}
