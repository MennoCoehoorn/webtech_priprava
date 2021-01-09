<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TestText;

class UserController extends Controller
{
    public function index(){
        $logged_user = Auth::user();
        $test_text = TestText::find(1);
        return view('users',['user' => $logged_user, 'test_text'=>$test_text]);
    }
}
