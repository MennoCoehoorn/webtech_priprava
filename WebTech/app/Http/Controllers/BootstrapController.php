<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

use App\Models\User;
use App\Models\Role;
use App\Models\Picture;
use App\Models\Article;


class BootstrapController extends Controller
{
    public function index(){
        $users = User::with('roles','deliveryinfo')->get();
        $articles = Article::with('picture')->get();
        return view('bootstrap',['users'=>$users,'articles'=>$articles]);
    }
}
