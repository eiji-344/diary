<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    // use SoftDeletes;
    
    protected $fillable = [
    'title',
    'date',
    ];
    
    public function templates() {
        return $this->hasMany("App\Template");
    }
}
