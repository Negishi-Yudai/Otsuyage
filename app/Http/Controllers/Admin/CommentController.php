<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Comment;

use App\Omiyage;

use App\Obento;
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
            return view('admin.comment.create', ['comments' => $comments, 'tennmei' => $tennmei, 'gaiyou' => $gaiyou]);
        }
    }
}
