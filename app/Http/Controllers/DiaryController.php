<?php

namespace App\Http\Controllers;

use App\Diary;
use App\Template;
use App\User;
use Storage;
use App\Http\Requests\DiaryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    
    public function search(Request $request, Diary $diary, Template $template)
    {
        
        $keyword = $request->input('keyword');
        $with = $request->input('with');
        
        dd($request);
      
        $query = Diary::query();
    	 if (!empty($keyword)) {
            $query ->where('title', 'LIKE', "%{$keyword}%");
        }

        if (!empty($with)) {
            $query ->where('with', 'LIKE', $with);
        }
        
        $diaries = $query->get();
        
        dd($diaries);

        return view('index', compact('books', 'keyword', 'stock'));
        //return view('index')->with(['diaries' => $diary->get()]); 
    }
    
    // public function searchResult(Request $request)
    // {
    //     $params = $request->query();

    //     $results = Diary::serach($params)->get();

    //     return view('search')->with([
    //         //'diaries' => $diaries,
    //         'params' => $params,
    //     ]);
    // }
    
    
    public function show(Diary $diary, Template $template)
    {
        //二通りある
        //$templates = $diary->templates;
        $templates = $diary->templates()->get();

        return view('show')->with([
            'diary' => $diary,
            'templates' => $templates
            ]);
    }
    
    public function create(Diary $diary)
    {
        return view('create')->with(['diaries' => $diary->get()]);
    }
    
    public function store(Request $request,User $user, Diary $diary, Template $template)
    {
    $user_id = Auth::id();
    $diary_input = $request['diary'];
    
    $diary = Diary::create([
    'title' => $diary_input['title'],
    'date' => $diary_input['date'],
    'with' => $diary_input['with'],
    'user_id' => $user_id,
    ]);
    
    $template_inputs = $request['template'];
    foreach($template_inputs as $template_input){
        $image = $template_input['image'];
        $path = Storage::disk('s3')->putFile('diary-backet', $image, 'public');
        $template_input['image_path'] = $path;
        //$template_input['image_path'] = Storage::disk('s3')->url($path);
        $template_input['diary_id'] = $diary->id;
        $template = Template::create([
            'subtitle' => $template_input['subtitle'],
            'time' => $template_input['time'],
            'text' => $template_input['text'],
            'image_path' => $template_input['image_path'],
            'diary_id' => $template_input['diary_id'],
        ]);
    }
    
    return redirect('/diaries/'. $diary->id);
    }
    
    public function edit(Diary $diary, Template $template)
    {
        $templates = $diary->templates;
        return view('edit')->with([
                'diary' => $diary,
                'templates' => $templates
                ]);
    }

    public function update(Request $request, Diary $diary, Template $template)
    {
    $input_diary['user_id'] = Auth::id();
    $input_diary = $request['diary'];
    $diary->fill($input_diary)->save();

    $template_inputs = $request['template'];
    foreach($template_inputs as $template_input){
        //dd($template_input);
        if(count($template_input) == 5){
            if(isset($template_input['delete'])){
                //消去
                $template = Template::find($template_input['id']);
                $template->delete();
            }
            else{
                //画像を含め更新
                $old_template = Template::find($template_input['id']);
                $s3_delete = Storage::disk('s3')->delete($old_template->image_path);
                $image = $template_input['image'];
                $path = Storage::disk('s3')->putFile('diary-backet', $image, 'public');
                $template_input['image_path'] = $path;
                $template_input['diary_id'] = $diary->id;
                $template = Template::find($template_input['id']);
                $template->fill($template_input)->save();
            }
        }else if(count($template_input) == 6){
            //消去
            $template = Template::find($template_input['id']);
            $template->delete();
        }else{
        //画像以外を更新
        $template_input['diary_id'] = $diary->id;
        $template = Template::find($template_input['id']);
        $template->fill($template_input)->save();
        }
    }
        
    
        return redirect('/diaries/' . $diary->id);
    }
    
    public function delete(Diary $diary)
    {
    $diary->delete();
    return redirect('/');
    }

}
?>