<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Diary</title>
    </head>
    <body>
        <h1>Diary Name</h1>
        <form action="/diaries" method="POST">
            @csrf
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="diary[title]" placeholder="タイトル" value="{{ old('diary.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('diary.title') }}</p>
            </div>
            <div class="body">
                <h2>Body</h2>
                <textarea name="diary[body]" placeholder="今日も1日お疲れさまでした。">{{ old('diary.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('diary.body') }}</p>
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/">back</a>]</div>
    </body>
</html>