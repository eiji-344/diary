<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Diary extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
    'title',
    'date',
    'with',
    'user_id',
    ];
    
    public function templates() {
        return $this->hasMany("App\Template");
    }
    
     public function favorites()
    {
        return $this->hasMany("App\Favorite");
    }
    
    public function user() {
        return $this->belongsTo("App\User");
    }
    
    // public function scopeSerach(Builder $query, array $params): Builder {
        
    // parent::boot();
    
    // if (!empty($params['with'])) 
    //     $query->where('with', $params['with']);

    // if (!empty($params['keyword'])) {
    //     $query->where(function ($query) use ($params) {
    //         $query->where('title', 'like', '%' . $params['keyword'] . '%');
    //     });
    // }
    //     return $query;
    // }
    
}
