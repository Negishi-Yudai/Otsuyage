@extends('layouts.admin')
@section('title', 'お弁当の新規作成')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>お弁当新規作成</h2>
                <form action="{{ action('Admin\ObentoController@store') }}" method="post" enctype="multipart/form-data">

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
                            <input type="text" class="form-control" name="tennmei" value="{{ old('tennmei') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="gaiyou">概要</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="gaiyou" rows="20">{{ old('gaiyou') }}</textarea>
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
                    <input type="submit" class="btn btn-primary" value="投稿">
                </form>
            </div>
            <h2>投稿一覧</h2>
             @if (count($obentos) > 0)
                <div class="items">
                    @foreach($obentos->all() as $obento)
                        <div class="item">
                            <div class="image">
                            @if ($obento->image_path)
                                <img src="{{ asset('storage/image/' . $obento->image_path) }}">
                    　　　　@endif
                    　　　　</div>
                    　　　　<div class="gaiyou">
                                <div class="tennmei">{{ $obento->tennmei }}</div>
                                <div class="gaiyou">{{ $obento->gaiyou }}</div>
                                <div class="nav-item active"><a href="{{ action('Admin\CommentController@create',['id' => $obento->id, 'syurui' => 'obento']) }}">コメントする</a></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection