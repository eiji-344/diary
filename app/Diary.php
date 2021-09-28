<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
    'title',
    'body',
    ];
}
