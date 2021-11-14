<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@extends('layouts.app')
    <head>
        <meta charset="utf-8">
        <title>Diary</title>
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="{{ asset('js/templatebtn.js') }}"></script>
    </head>

@section('content')

    <body>
        <h1 class="my-4 mx-4">Diary</h1>
        <form action="/diaries" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="diary[title]" placeholder="タイトル" value="{{ old('diary.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('diary.title') }}</p>
            </div>
            <div class="body">
                <h2>Date</h2>
                <input class="mb-5" type="date" name="diary[date]" value="{{ old('diary.date') }}"/>
                
            <select name="diary[with]">
            <option value="">誰と</option>
            <option value="一人">一人</option>
            <option value="友達">友達</option>
            <option value="恋人">恋人</option>
            <option value="家族">家族</option>
            <option value="その他">その他</option>
            </select> 
            
            <p class="date__error" style="color:red">{{ $errors->first('diary.date') }}</p>
            <p class="with__error" style="color:red">{{ $errors->first('diary.with') }}</p>
            
            <table id="template"class="template table-bordered table-hover">
                <thead>
                   <tr>
                    <th class="col-md-1 text-center"><h2>Time</h2></th>
        　           <th class="col-md-1"><h2>Subtitle</h2></th>
        　           <th class="col-md-2"><h2>Text</h2></th>
        　           <th class="col-md-2"><h2>Image</h2></th>
        　           <th class="col-md-2"><h2>Address</h2></th>
                   </tr> 
                </thead>
                <tbody>
                   <tr>
                    <td><input type="time" name="template[0][time]" value="{{ old('template.time') }}"/></td>
                    <td><input type="subtitle" name="template[0][subtitle]" value="{{ old('template.subtitle') }}"/></td>
        　           <td><textarea name="template[0][text]" placeholder="〇〇に行った" cols=30 rows=3>{{ old('template.text') }}</textarea></td>
        　           <td><input type="file" name="template[0][image]"/></td>
        　           <td><input type="text" name="template[0][address]" placeholder="入力しなくてもよいです" value="{{ old('template.address') }}" /></td>
                   </tr>
                </tbody>
        　  </table>
        　  
        　  <p class="time__error" style="color:red">{{ $errors->first('template.time') }}</p>
            <p class="subtitle__error" style="color:red">{{ $errors->first('template.subtitle') }}</p>
            <p class="text__error" style="color:red">{{ $errors->first('template.text') }}</p>
        　  
        　  </div>
        　　<button class="btn btn-primary" type="button" id="add_template">追加</button>
            <button class="btn btn-primary ml-3" type="submit" value="保存"/>保存</button>
        </form>
        <div class="back"><a href="/">戻る</a></div>
    </body>
 @endsection
 </html>
 