<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TestText;

class TestTextController extends Controller
{
    public function update(Request $req){
        $test_text = TestText::find(1);
        $test_text->text = $req->modify;
        $test_text->save();
        return redirect('users');
    }
}
