<?php

namespace App\Http\Controllers;

use App\Diary;
use App\Http\Requests\DiaryRequest;

class DiaryController extends Controller
{
    public function index(Diary $diary)
    {
        return view('index')->with(['diaries' => $diary->get()]);  
    }
    
    public function show(Diary $diary)
    {
    return view('show')->with(['diary' => $diary]);
    }
    
    public function create()
    {
    return view('create');
    }
    
    public function store(DiaryRequest $request, Diary $diary)
    {
    $input = $request['diary'];
    $diary->fill($input)->save();
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