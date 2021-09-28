<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Diary</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Diary Name</h1>
        [<a href='/diaries/create'>create</a>]
        <div class='diaries'>
            @foreach ($diaries as $diary)
                <div class='diary'>
                    <h2><a href="/diaries/{{ $diary->id }}">{{ $diary->title }}</a></h2>
                    <p class='body'>{{ $diary->body }}</p>
                </div>
            @endforeach
        </div>
    </body>
</html>