<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Diary</title>
    </head>
    <body>
        <h1 class="title">編集画面</h1>
        <div class="content">
            <form action="/diaries/{{ $diary->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class='content__diary'>
                    <h2>タイトル</h2>
                    <input type='text' name='diary[title]' value="{{ $diary->title }}">
                    <h3>Date</h3>
                    <input type="date"name="diary[date]" value="{{ $diary->date }}"/>
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
                <table id="template"class="template">
                    <thead>
                      <tr>
                        <th><h2>Time</h2></th>
        　               <th><h2>Subtitle</h2></th>
        　               <th><h2>Text</h2></th>
        　               <th><h2>Image</h2></th>
        　               <th><h2>Image_change</h2></th>
        　               <th><h2>delete</h2></th>
                      </tr> 
                    </thead>
                    <tbody>
                      @foreach ($templates as $template)　
                      <input type="hidden" name="template[{{ $template->id }}][id]" value="{{ $template->id }}"/>
                      <tr>
                        <td><input type="time" name="template[{{ $template->id }}][time]" value="{{ $template->time }}"/></td>
                        <td><input type="subtitle" name="template[{{ $template->id }}][subtitle]" value="{{ $template->subtitle }}"/></td>
        　               <td><textarea name="template[{{ $template->id }}][text]">{{ $template->text }}</textarea></td>
        　               <td><img src="https://diary-backet.s3.ap-northeast-1.amazonaws.com/{{ $template->image_path }}"></td>
        　               <td><input type="file" name="template[{{ $template->id }}][image]"/></td>
        　               <td><input type="checkbox" name="template[{{ $template->id }}][delete]" value="delete"/></td>
                      </tr>
                      @endforeach
                    </tbody>
        　       </table>
                </div>
                <input type="submit" value="保存">
            </form>
        </div>
        <div class="back">[<a href="/">back</a>]</div>
    </body>
</html>
