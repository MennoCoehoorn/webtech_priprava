<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Picture;
use Illuminate\Support\Facades\DB;

class SizeController extends Controller
{
    public function listall(){
        return Size::all()->toJson(JSON_PRETTY_PRINT);
    }
}
