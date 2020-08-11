<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    //
  public function add()
    {
        return view('admin.profile.create');
    }

    public function create()
    {
        return redirect('admin/profile/create');
    }

    public function edit()
    {
        return view('admin.profile.edit');
    }

    public function update()
{
        return redirect('admin/profile/edit');
    {
      $this->validate($request, Profile::$rules);
      
      $news = new profile;
      $form = $request->all();
      // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
      if (isset($form['image'])) {
        $path = $request->file('image')->store('public/image');
        $news->image_path = basename($path);
      } else {
          $news->image_path = null;
      }
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      unset($form['image']);
      // データベースに保存する
      $news->fill($form);
      $news->save();
      return redirect('admin/profile/create');
    }
}
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title !='') {
            $posts = Profile::Where('title', $cond_title)->get();
        }else{
           $posts = Prifile::all();    
        }
        return view('admin.profile.index',['posts' => $posts, 'cond_title' => $cond_title]);
        }
    
    public function cereate(Request $request)
    {
        $news = Profile::find($request->id);
        if (empty($news)) {
          abort(404);     
        }
        return view('admin.profile.edit',['profile_form' => $news]);
    }
    
     public function update(Request $request)
    {
       
        $this->validate($request, profile::$rules);
        $this = profile::find($request->id);
        $news_form = $request->all();
       
        unset($news_form['_token']);
       
        $news->fill($news_form)->save();
       
        return redirect('admin/profile');
        }
}