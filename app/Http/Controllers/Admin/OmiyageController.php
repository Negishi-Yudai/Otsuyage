<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Omiyage;

class OmiyageController extends Controller
{
    //
    public function create()
    {
        $omiyages = Omiyage::get();
        return view('admin.omiyage.create', ['omiyages' => $omiyages]);
    }
    
    public function store(Request $request)
    {
         $this->validate($request, Omiyage::$rules);
        $omiyage = new Omiyage;
        $form = $request->all();
        
        // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $omiyage->image_path = basename($path);
        } else {
            $omiyage->image_path = null;
        }
        
        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['image']);
        
        // データベースに保存する
        $omiyage->fill($form);
        $omiyage->save();
         return redirect('admin/omiyage/create');
    }
}
