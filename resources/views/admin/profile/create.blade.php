@extends('layouts.admin')
@section('title','my　プロフィール')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>my プロフィール</h2>
                <from action="{{ action('Admin\ProfileController@create') }}" method='post' enctype="multipart/form-data">
                   
                    @if (count($errors) > 0)
                    
                       <ul>
                           @foreach($errors->all() as $e)
                               <li>{{ $e }}</li>
                           @endforeach
                       </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">名前</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="name rows=20">{{old('name')}}</textarea>    
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">性別</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="gender rows=20">{{old('gender')}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">趣味</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="hobby rows=20">{{old('hobby')}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">自己紹介欄</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction rows=20">{{old('introduction')}}</textarea>
                        </div>
                    </div>    
            </div>
        </div>
    </div>
@endsection    