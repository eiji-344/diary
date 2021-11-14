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
            <h1 class="title my-4 mx-4">{{ $diary->title }}</h1>
            <h3>Date</h3>
            <h4 class="mb-4">{{ $diary->date }}</h4>
            <h3>誰と: {{ $diary->with }}</h3>
            
            <table class="templat table-bordered table-hover">
                <thead>
                   <tr>
                    <th class="col-md-1 text-center"><h2>Time</h2></th>
        　           <th class="col-md-1 text-center"><h2>Subtitle</h2></th>
        　           <th class="col-md-2 text-center"><h2>Text</h2></th>
        　           <th class="col-md-4 text-center"><h2>Image</h2></th>
        　           <th class="col-md-2 text-center"><h2>Address</h2></th>
                   </tr> 
                </thead>
                @foreach ($templates as $template)
                <tbody>
                   <tr>
                       <td>{{ $template->time }}</td>
                       <td>{{ $template->subtitle }}</td>
                       <td>{{ $template->text }}</td>
                       <td><img src="https://diary-backet.s3.ap-northeast-1.amazonaws.com/{{ $template->image_path }}" width="600" height="300"></td>
                       <td>{{ $template->address }}</td>
                   </tr>
                </tbody>
                @endforeach
        　  </table>
        </div>
        
        {{--<div class="d-flex align-items-center">
            @if (!in_array(Auth::user()->id, array_column($timeline->favorites->toArray(), 'user_id'), TRUE))
                <form method="POST" action="{{ url('favorites/') }}" class="mb-0">
                    @csrf

                    <input type="hidden" name="diary_id" value="{{ $timeline->id }}">
                    <button type="submit" class="btn p-0 border-0 text-primary">イイね<i class="far fa-heart fa-fw"></i></button>
                </form>
            @else
                <form method="POST"action="{{ url('favorites/delete/'.array_column($timeline->favorites->toArray(), 'id', 'user_id')[Auth::user()->id]) }}" class="mb-0">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn p-0 border-0 text-danger">イイね<i class="fas fa-heart fa-fw"></i></button>
                </form>
            @endif
            <p class="mb-0 text-secondary">{{ count($timeline->favorites) }}</p>
        </div>--}}
        
        {{--<div class="row justify-content-center">
            <div class="col-md-3">
                <form action="{{ route('favorites', $diary) }}" method="POST">
                    @csrf
                    <input type="submit" value="&#xf164;いいね" class="fas btn btn-success">
                </form>
            </div>
            <div class="col-md-3">
                <form action="{{ route('unfavorites', $diary) }}" method="POST">
                    @csrf
                    <input type="submit" value="&#xf164;いいね取り消す" class="fas btn btn-danger">
                </form>
            </div>
    　　</div>--}}
        
        <p class="edit mt-5"><a href="/diaries/{{ $diary->id }}/edit">編集する</a></p>
        <form action="/diaries/{{ $diary->id }}" id="form_delete" method="post">
            @csrf
            @method('delete')
            <input type="submit" style="display:none">
            <p class="delete text-primary"><span onclick="return deleteDiary(this);">削除する</span></p>
        </form>
        <div class="footer">
            <a class="mt-3" href="/">戻る</a>
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

