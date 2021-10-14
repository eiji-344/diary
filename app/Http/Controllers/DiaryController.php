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
    
    public function show(Diary $diary, Template $template)
    {
        $templates = $diary->templates;

        return view('show')->with([
            'diary' => $diary,
            'templates' => $templates
            ]);
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
    
    $template_inputs = $request['template'];
    foreach($template_inputs as $template_input){
        $template_input['diary_id'] = $diary->id;
        $template = Template::create([
        'subtitle' => $template_input['subtitle'],
        'time' => $template_input['time'],
        'text' => $template_input['text'],
        'diary_id' => $template_input['diary_id'],
    ]);
    }
    
    
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