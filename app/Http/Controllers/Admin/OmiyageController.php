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
     public function edit(Request $request)
  {
      // Omiyage Modelからデータを取得する
      $omiyage = Omiyage::find($request->id);
      if (empty($omiyage)) {
        abort(404);    
      }
      return view('admin.omiyage.edit', ['omiyage_form' => $omiyage]);
  }
    public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, Omiyage::$rules);
      // News Modelからデータを取得する
      $omiyage = Omiyage::find($request->id);
      // 送信されてきたフォームデータを格納する
      $omiyage_form = $request->all();
      if ($request->remove == 'true') {
          $omiyage_form['image_path'] = null;
      } elseif ($request->file('image')) {
          $path = $request->file('image')->store('public/image');
          $omiyage_form['image_path'] = basename($path);
      } else {
          if(isset($omiyage->image_path)){
            $omiyage_form['image_path'] = $omiyage->image_path;
          }
      }
      unset($omiyage_form['image']);
      unset($omiyage_form['_token']);

      // 該当するデータを上書きして保存する
      $omiyage->fill($omiyage_form)->save();

      return redirect('admin/omiyage/create');
  }
  public function delete(Request $request)
  {
      // 該当するomiyage Modelを取得
      $omiyage = Omiyage::find($request->id);
      // 削除する
      $omiyage->delete();
      return redirect('admin/omiyage/create');
  }
}
