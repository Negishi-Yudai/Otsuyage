<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Comment;

class CommentController extends Controller
{
    //
     public function create()
    {
        $comments = Comment::get();
        return view('admin.comment.create', ['comments' => $comments]);
    }
}
