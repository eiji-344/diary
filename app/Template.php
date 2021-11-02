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
    'address',
    'diary_id',
    'user_id'
    ];
    
    public function diary() {
        return $this->belongsTo("App\Diary");
    }
}
