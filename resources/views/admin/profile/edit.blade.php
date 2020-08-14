@extends('layouts.admin')
@section('title','my　プロフィール')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>my プロフィール</h2>
                <form action="{{ action('Admin\ProfileController@update') }}" method='post' enctype="multipart/form-data">
                   
                    @if (count($errors) > 0)
                    
                       <ul>
                           @foreach($errors->all() as $e)
                               <li>{{ $e }}</li>
                           @endforeach
                       </ul>
                    @endif
                     <div class="form-group row">
                        <label class="col-md-2" for="title">名前</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">性別</label>
                        <div class="col-md-10">
                            <input id="men" name="gender" type="radio" value="男"><label for="men">男</label>
                            <input id="women" name="gender" type="radio" value="女"><label for="women">女</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">趣味</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="hobby" value="{{ old('hobby')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">自己紹介欄</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="introduction" value="{{ old('introduction')}}">
                        </div>
                    </div> 
                      {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection    