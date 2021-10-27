<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $fillable = [
    'time',
    'subtitle',
    'text',
    'image_path',
    'diary_id'
    ];
    
    public function diary() {
        return $this->belongsTo("App\Diary");
    }
}
