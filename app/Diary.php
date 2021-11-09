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
    
    // public function getByLimit(int $limit_count = 100) {
    //     return $this->orderBy('updated_at','DESC')->limit($limit_count)->get();
    // }
    
    public function getPaginateByLimit(int $limit_count = 10) {
        return $this->orderBy('updated_at','DESC')->paginate($limit_count);
    }
    
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
    
    // public function users()
    // {
    //     return $this->belongsToMany('App\User')->withTimestamps();
    // }
    
    public function getUserTimeLine(Int $user_id)
    {
        return $this->where('user_id', $user_id)->orderBy('created_at', 'DESC')->paginate(50);
    }

    public function getDiaryCount(Int $user_id)
    {
        return $this->where('user_id', $user_id)->count();
    }
    
    // 一覧画面
    // public function getTimeLines(Int $user_id, Array $follow_ids)
    // {
    //     // 自身とフォローしているユーザIDを結合する
    //     $follow_ids[] = $user_id;
    //     return $this->whereIn('user_id', $follow_ids)->orderBy('created_at', 'DESC')->paginate(50);
    // }
    
}
