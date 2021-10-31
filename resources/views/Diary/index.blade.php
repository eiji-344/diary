<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Diary</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <a href="/login">マイページ</a>
        <a href="/users">ユーザ一覧</a>
        {{--<a href="/search">検索ページ</a>--}}
        <form action="/search"　method="GET">
            {{--　虫眼鏡のような画像を入れてわかりやすく --}}
            <input name="keyword" type="text" placeholder="キーワードを入力" value="{{ $params['keyword'] ?? null }}">
            <select class="form-control" name="with">
            <option selected="selected" value="">選択してください</option>
            <option value="">誰と</option>
            <option value="一人">一人</option>
            <option value="友達">友達</option>
            <option value="恋人">恋人</option>
            <option value="家族">家族</option>
            <option value="その他">その他</option>
            </select>
            <button type="submit">検索する</button>
        </form>
        <h1>Diary Name</h1>
        [<a href='/diaries/create'>create</a>]
        <div class='diaries'>
            @foreach ($diaries as $diary)
                <div class='diary'>
                    <h2><p class='body'>{{ $diary->date }}</p></h2>
                    <h2><a href="/diaries/{{ $diary->id }}">{{ $diary->title }}</a></h2>
                </div>
            @endforeach
        </div>
    </body>
</html>