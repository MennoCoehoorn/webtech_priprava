<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Size;
use Illuminate\Support\Facades\DB;

class ColorController extends Controller
{
    public function listall(){
        return Size::all()->toJson(JSON_PRETTY_PRINT);
    }
}
