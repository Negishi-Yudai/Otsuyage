<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Comment;

use App\Omiyage;

use App\Obento;

use Illuminate\Support\Facades\Auth; //追加

class CommentController extends Controller
{
    //
     public function create(Request $request)
    {
        if($request->syurui != '' && $request->id != '') {
            $tennmei = '';
            $gaiyou = '';
            if($request->syurui == 'omiyage') {
                $omiyage = Omiyage::find($request->id);
                $tennmei = $omiyage->tennmei;
                $gaiyou = $omiyage->gaiyou;
            }     
            if($request->syurui == 'obento') {
                $obento = Obento::find($request->id);
                $tennmei = $obento->tennmei;
                $gaiyou = $obento->gaiyou;    
            }
            $comments = Comment::get();
            return view('admin.comment.create', ['comments' => $comments, 'tennmei' => $tennmei, 'gaiyou' => $gaiyou, 'syurui' => $request->syurui, 'omiyage_or_obento_id' => $request->id]);
        }
    }
     public function store(Request $request)
    {
         $this->validate($request, Comment::$rules);
        $comment = new Comment;
        $form = $request->all();
        
        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        
        $comment->user_id = Auth::id();
        // データベースに保存する
        $comment->fill($form);
        $comment->save();
        if($request->syurui == "omiyage") {
            return redirect('admin/omiyage/create');
        } else {
            return redirect('admin/obento/create');
        }
    }
}
