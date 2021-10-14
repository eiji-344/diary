<!doctype html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Diaries</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        <div class="content">
            <h1 class="title">{{ $diary->title }}</h1>
            <h3>Date</h3>
            <p>{{ $diary->date }}</p>
            {{--<div class="content__diary">
                <h3>本文</h3>
                <p>{{ $template->time }}</p>
                <p>{{ $diary->date }}</p>
                <p class='updated_at'>{{ $diary->updated_at }}</p>
            </div>--}}
            <table class="template">
                <thead>
                   <tr>
                    <th><h2>Time</h2></th>
        　           <th><h2>Subtitle</h2></th>
        　           <th><h2>Text</h2></th>
                   </tr> 
                </thead>
                @foreach ($templates as $template)
                <tbody>
                   <tr>
                       <td>{{ $template->time }}</td>
                       <td>{{ $template->subtitle }}</td>
                       <td>{{ $template->text }}</td>
                   </tr>
                </tbody>
                @endforeach
        　  </table>
        </div>
        <p class="edit">[<a href="/diaries/{{ $diary->id }}/edit">edit</a>]</p>
        <form action="/diaries/{{ $diary->id }}" id="form_delete" method="post">
            @csrf
            @method('delete')
            <input type="submit" style="display:none">
            <p class='delete'>[<span onclick="return deleteDiary(this);">delete</span>]</p>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        <script>
        function deleteDiary(e) {
            'use script';
            if (confirm('消去すると復元できません。\n本当に削除しますか？')) {
                document.getElementById('form_delete').submit();
            }
        }
        </script>
    </body>
</html>

