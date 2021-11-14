<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@extends('layouts.app')
    <head>
        <meta charset="utf-8">
        <title>Diary</title>
    </head>
@section('content')
    <body>
        <h1 class="title my-4 mx-4">編集画面</h1>
        <div class="content">
            <form action="/diaries/{{ $diary->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class='content__diary'>
                    <h3>タイトル</h3>
                    <input class="mb-4" type='text' name='diary[title]' value="{{ $diary->title }}">
                    <h3>Date</h3>
                    <input class="mb-4" type="date"name="diary[date]" value="{{ $diary->date }}"/>
                    <select name="diary[with]">
                    <option hidden>{{ $diary->with }}</option>
                    <option value="">誰と</option>
                    <option value="一人">一人</option>
                    <option value="友達">友達</option>
                    <option value="恋人">恋人</option>
                    <option value="家族">家族</option>
                    <option value="その他">その他</option>
                    </select>
                </div>
                
                <div class='content__template'>
                <table id="template"class="table-bordered table-hover">
                    <thead>
                      <tr>
                        <th class="col-md-1 text-center"><h2>Time</h2></th>
        　               <th class="col-md-1 text-center"><h2>Subtitle</h2></th>
        　               <th class="col-md-2 text-center"><h2>Text</h2></th>
        　               <th class="col-md-4 text-center"><h2>Image</h2></th>
        　               <th class="col-md-1 text-center"><h2>Image_change</h2></th>
        　               <th class="col-md-1 text-center"><h2>Address</h2></th>
        　               <th class="col-md-1 text-center"><h2>delete</h2></th>
                      </tr> 
                    </thead>
                    <tbody>
                      @foreach ($templates as $template)　
                      <input type="hidden" name="template[{{ $template->id }}][id]" value="{{ $template->id }}"/>
                      <tr>
                        <td><input type="time" name="template[{{ $template->id }}][time]" value="{{ $template->time }}"/></td>
                        <td><input type="title" name="template[{{ $template->id }}][subtitle]" value="{{ $template->subtitle }}"/></td>
        　               <td><textarea name="template[{{ $template->id }}][text]">{{ $template->text }}</textarea></td>
        　               <td><img src="https://diary-backet.s3.ap-northeast-1.amazonaws.com/{{ $template->image_path }}" width="600" height="300"></td>
        　               <td><input type="file" name="template[{{ $template->id }}][image]"/></td>
        　               <td><input type="title" name="template[{{ $template->id }}][address]" value="{{ $template->address }}"/></td>
        　               <td><input class="mx-5" type="checkbox" name="template[{{ $template->id }}][delete]" value="delete"/></td>
                      </tr>
                      @endforeach
                    </tbody>
        　       </table>
                </div>
                <button class="btn btn-primary ml-3 my-5" type="submit" value="保存">保存</button>
            </form>
        </div>
        <a class="mt-3" href="/">戻る</a>
    </body>
 @endsection
</html>
