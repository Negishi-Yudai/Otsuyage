@extends('layouts.admin')
@section('title', 'コメント')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>コメント</h2>
                <form action="{{ action('Admin\OmiyageController@store') }}" method="post" enctype="multipart/form-data">

                   // 以下を追記

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="comment">コメント</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="comment" value="{{ old('comment') }}">
                        </div>
                    </div>
                    {{ csrf_field() }}
                     <div class="text-center mb-4">
                    <input type="submit" class="btn btn-primary" value="投稿">
                </form>
            </div>
            
        </div>
    </div>
@endsection