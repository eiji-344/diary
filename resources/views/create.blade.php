<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Diary</title>
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="{{ asset('js/templatebtn.js') }}"></script>
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
                <h2>Date</h2>
                <input type="date"name="diary[date]"/>
            </div>
            <table id="template"class="template">
                <thead>
                   <tr>
                    <th><h2>Time</h2></th>
        　           <th><h2>Subtitle</h2></th>
        　           <th><h2>Text</h2></th>
                   </tr> 
                </thead>
                <tbody>
                   <tr>
                    <td><input type="time" name="template[0][time]"/></td>
                    <td><input type="subtitle" name="template[0][subtitle]"/></td>
        　           <td><textarea name="template[0][text]" placeholder="〇〇に行った">{{ old('template.text') }}</textarea></td>
                   </tr>
                </tbody>
        　  </table>
        　　{{--<input type="button" value="追加" onclick="OnButtonClick()"/>--}}
        　　<button type="button" id="test_jquery">追加</button>
        　　{{--<button type="button" id="form-button">追加</button>--}}
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/">back</a>]</div>
    </body>
</html>


 
 