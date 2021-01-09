<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class CommentController extends Controller
{
    public function create(Request $req){
        $user = Auth::user();
        $comment = new Comment();
        $comment->user_id = $user->id;
        $comment->product_id = $req->idHidden;
        $comment->title = $req->title;
        $comment->content = $req->content;
        $comment->likes = 55;
        $comment->save();
        
        //return redirect()->route('allproducts', ['id' => $req->idHidden, 'gender' => $req->sexHidden, 'category' => $req->catHidden]);
        return back();
    }
    public function like(Request $req){
        $comment = Comment::find($req->cIdHidden);
        $new_likes = $comment->likes + 1;
        $comment->likes = $new_likes;
        $comment->save();
        return back();
    }
}
