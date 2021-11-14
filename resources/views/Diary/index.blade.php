<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@extends('layouts.app')
    <head>
        <meta charset="utf-8">
        <title>Diary</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
@section('content')

    <body>
        <a class="mb-3 mx-3" href="/login">マイページ</a>
        <a class="mb-3" href="/users">ユーザ一覧</a>
        
        {{--<a href="/search">検索ページ</a>--}}
        <form action="/search"　method="GET">
            @csrf
            {{--　虫眼鏡のような画像を入れてわかりやすく --}}
            <div class="row">
            <input class="col-md-3 mx-3" name="keyword" type="text" placeholder="キーワードを入力" value="{{ $params['keyword'] ?? null }}">
            <select class="form-control col-md-3 mx-3" name="with">
            <option selected="selected" value="">選択してください</option>
            <option value="">誰と</option>
            <option value="一人">一人</option>
            <option value="友達">友達</option>
            <option value="恋人">恋人</option>
            <option value="家族">家族</option>
            <option value="その他">その他</option>
            </select>
            <button class="col-md-2 mx-3" type="submit">検索する</button>
            </div>
        </form>
        
        <h1 class="my-4 mx-4">Diary</h1>
        <a class="btn-default btn-lg" href='/diaries/create'>create</a>
        
        <div class="container">
        <div class='diaries'>
            <div class="row">
            @foreach ($diaries as $diary)
                <div class='col-md-4 my-3'>
                    <h3><p class='body'>{{ $diary->date }}</p></h2>
                    <h2><a href="/diaries/{{ $diary->id }}">{{ $diary->title }}</a></h2>
                </div>
            @endforeach
            </div>
        </div>
        </div>
        
        <div class='paginate mt-3'>
            {{ $diaries->links() }}
        </div>
    </body>
@endsection
</html>