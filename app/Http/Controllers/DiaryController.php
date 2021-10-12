<?php

namespace App\Http\Controllers;

use App\Diary;
use App\Template;
use App\Http\Requests\DiaryRequest;
use Illuminate\Http\Request;

class DiaryController extends Controller
{
    //一覧画面のときに用いる
    public function template() {
        Diary::find(1)->diaries;
        Template::find(1)->diary->title;
        Template::all();
        Diary::with("diaries");
    }
    
    public function index(Diary $diary)
    {
        return view('index')->with(['diaries' => $diary->get()]); 
    }
    
    public function show(Diary $diary)
    {
    return view('show')->with(['diary' => $diary]);
    }
    
    public function create(Diary $diary)
    {
        $templates = $diary->templates()->get();
        //withメソッドで渡す
        return view('create')->with(['diaries' => $diary->get()]);
    }
    
    public function store(Request $request, Diary $diary, Template $template)
    {
    $diary_input = $request['diary'];
    //$date = strtotime($diary_input['date']);
     $diary = Diary::create([
    'title' => $diary_input['title'],
    'date' => $diary_input['date'],
    ]);
    //$diary->fill($diary_input)->save();
    $template_input = $request['template'];
    dd($template_input);
    $template_input['diary_id'] = $diary->id;
    $template->fill($template_input)->save();
    
    return redirect('/diaries/' . $diary->id);
    }
    
    public function edit(Diary $diary)
    {
    return view('edit')->with(['diary' => $diary]);
    }

    public function update(DiaryRequest $request, Diary $diary)
    {
    $input_diary = $request['diary'];
    $diary->fill($input_diary)->save();
    return redirect('/diaries/' . $diary->id);
    }
    
    public function delete(Diary $diary)
    {
    $diary->delete();
    return redirect('/');
    }

}
?>