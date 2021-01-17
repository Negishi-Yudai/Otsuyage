@extends('layouts.front')
@section('title', 'Otsuyage')

@section('content')
<html>
<head>
    <meta charset="utf-8"/>
    <title>シングルカラム</title>
    <link rel="stylesheet" href="css/singleColumn.css">
</head>

<body>
    <header class="header">
       <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <a href="" class="navbar-black">
                <h1>Otsuyage</h1></a>
            </div>
        </div>
    </div> 
     <div>
      <h2 class="text-center">～地元自慢の品をあなたに～</h2><br>
    </div>
    </header>
    <div class="glovalNavigation">
        <nav class="navbar-expand navbar-light bg-light">
            
            <!-- メニュー項目 -->
            <ul class="navbar-nav">
                <li class="nav-item active"><a href="{{ action('Admin\OmiyageController@create') }}">お土産</a></li>
                <li class="nav-item"><a href="{{ action('Admin\ObentoController@create') }}">お弁当</a></li>
                <li class="nav-item dropdown">
                    <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">情報</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="">検索</a>
                        <a class="dropdown-item" href="">マイページ</a>
                    </div>
                </li>
                @guest
                 <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                @else
                <li class="nav-item"><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a></li>
                @endguest                    
            </ul>
        </nav>
        </nav>
    <div class="content">
        <h3>Otsuyageとは…<br>
コロナ影響を受けた観光業のお店を中心に少しでも貢献したい、<br>このサイトを利用することで自分の知らないお土産に出会うきっかけを与えたいという思いから、<br>
経営回復を目指すお店や経営回復を応援したいお客さん向けのサービスです。　
</h3>
<div class="slider">
    <div class="slider__content"><img src="{{ asset('storage/image/845c8584f691c6b755d82dd0b5e2beff_t.jpeg') }}"></div>
    <div class="slider__content"><img src="{{ asset('storage/image/6579646.jpg') }}"></div>
    <div class="slider__content"><img src="{{ asset('storage/image/d79791168f0ed405c61c6a27089ef202_t.jpeg') }}"></div>
</div>
    </div>
    <div class="localNavigation">
        
    </div>
    <footer class="footer">
        <p>Copyright © 2021 Otsuyage All Rights Reserved.</p>
    </footer>
</body>
@endsection