<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Diary</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        @extends('layouts.app')

        @section('content')
        <a href="/login">マイページ</a>
        <div class="back"><a href="/">トップページ</a></div>
        <h1>ユーザ一覧</h1>
        
        
        
        @foreach ($all_users as $user)
            <div class="d-flex flex-row">
                <a href="{{ url('users/' .$user->id) }}" class="text-secondary">{{ $user->name }}</a>
            </div>
            @if (auth()->user()->isFollowed($user->id))
                <div class="px-2">
                    <span class="px-1 bg-secondary text-light">フォローされています</span>
                </div>
            @endif
            <div class="d-flex justify-content-end flex-grow-1">
                @if (auth()->user()->isFollowing($user->id))
                    <form action="{{ route('unfollow', ['user' => $user->id]) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <button type="submit" class="btn btn-danger">フォロー解除</button>
                    </form>
                @else
                    <form action="{{ route('follow', ['user' => $user->id]) }}" method="POST">
                        {{ csrf_field() }}

                        <button type="submit" class="btn btn-primary">フォローする</button>
                    </form>
                @endif
            </div>
            
        @endforeach
        <div class="d-flex justify-content-start">
        {{ $all_users->links() }}
        </div>
        @endsection
    </body>
</html>