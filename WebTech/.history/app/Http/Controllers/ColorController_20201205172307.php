<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Co;
use Illuminate\Support\Facades\DB;

class ColorController extends Controller
{
    public function listall(){
        return Color::all()->toJson(JSON_PRETTY_PRINT);
    }
}
