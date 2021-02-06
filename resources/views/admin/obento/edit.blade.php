@extends('layouts.admin')
@section('title', 'お弁当編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>お弁当編集</h2>
                <form action="{{ action('Admin\ObentoController@update') }}" method="post" enctype="multipart/form-data">

                   // 以下を追記

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="tennmei">店名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="tennmei" value="{{$obento_form->tennmei}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="gaiyou">概要</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="gaiyou" rows="20">{{$obento_form->gaiyou}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="title">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    {{ csrf_field() }}
                     <div class="text-center mb-4">
                        <input type="hidden" name="id" value="{{$obento_form->id}}">
                    <input type="submit" class="btn btn-primary" value="再投稿">
                </form>
            </div>
        </div>
    </div>
@endsection