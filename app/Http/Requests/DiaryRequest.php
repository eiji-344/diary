<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiaryRequest extends FormRequest
{
    public function rules()
    {
        return [
            'diary.title' => 'required|string|max:100',
            'diary.date' => 'required|date',
            'diary.with' => 'required',
            'template.time' => 'required',
            'template.subtitle' => 'required',
            'template.text' => 'required',
            
        ];
    }
}