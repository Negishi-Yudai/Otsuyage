<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Obento;

class ObentoController extends Controller
{
    //
    public function create()
    {
        $obentos = Obento::get();
        return view('admin.obento.create', ['obentos' => $obentos]);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, Obento::$rules);
        $obento = new Obento;
        $form = $request->all();
        
        // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $obento->image_path = basename($path);
        } else {
            $obento->image_path = null;
        }
        
        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['image']);
        
        // データベースに保存する
        $obento->fill($form);
        $obento->save();
        return redirect('admin/obento/create');
    }
}
