<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <head>
        <meta charset="utf-8">
        <title>Diary</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>検索ページ</h1>
        <form action="/search/result"　method="GET">
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
        <div class="back">[<a href="/">back</a>]</div>
    </body>
</html>