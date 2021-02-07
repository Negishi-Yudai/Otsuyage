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
    public function edit(Request $request)
  {
      // Obento Modelからデータを取得する
      $obento = Obento::find($request->id);
      if (empty($obento)) {
        abort(404);    
      }
      return view('admin.obento.edit', ['obento_form' => $obento]);
  }
    public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, Obento::$rules);
      // News Modelからデータを取得する
      $obento = Obento::find($request->id);
      // 送信されてきたフォームデータを格納する
      $obento_form = $request->all();
      if ($request->remove == 'true') {
          $obento_form['image_path'] = null;
      } elseif ($request->file('image')) {
          $path = $request->file('image')->store('public/image');
          $obento_form['image_path'] = basename($path);
      } else {
          if(isset($obento->image_path)){
            $obento_form['image_path'] = $obento->image_path;
          }
      }
      unset($obento_form['image']);
      unset($obento_form['_token']);

      // 該当するデータを上書きして保存する
      $obento->fill($obento_form)->save();

      return redirect('admin/obento/create');
  }
  public function delete(Request $request)
  {
      // 該当するobento Modelを取得
      $obento = Obento::find($request->id);
      // 削除する
      $obento->delete();
      return redirect('admin/obento/create');
  }
}
