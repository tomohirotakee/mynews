<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\profile;

class ProfileController extends Controller
{
    //
  public function add()
    {
        return view('admin.profile.create');
    }

    public function edit(Request $request)
  {
      // News Modelからデータを取得する
      $news = Profile::find($request->id);
      if (empty($news)) {
        abort(404);    
      }
      return view('admin.profile.edit', ['news_form' => $news]);
  }

    public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, Profile::$rules);
      // News Modelからデータを取得する
      $news = Profile::find($request->id);
      // 送信されてきたフォームデータを格納する
      $news_form = $request->all();
      unset($news_form['_token']);

      // 該当するデータを上書きして保存する
      $news->fill($news_form)->save();

      return redirect('admin/profile');
  }
    
    public function index(Request $request)
    {
        $cond_name = $request->cond_name;
        if ($cond_name !='') {
            $posts = Profile::Where('name', $cond_name)->get();
        }else{
           $posts = Profile::all();    
        }
        return view('admin.profile.index',['posts' => $posts, 'cond_name' => $cond_name]);
        }
    
    public function create(Request $request)
  {

      // Varidationを行う
      $this->validate($request, Profile::$rules);

      $news = new Profile;
      $form = $request->all();


      unset($form['_token']);
      unset($form['image']);
      // データベースに保存する
      $news->fill($form);
      $news->save();

      return redirect('admin/profile/create');
  }
}