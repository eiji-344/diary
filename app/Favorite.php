<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    public $timestamps = false;
    
    // いいねしているかどうかの判定処理
    public function isFavorite(Int $user_id, Int $diary_id) 
    {
        return (boolean) $this->where('user_id', $user_id)->where('diary_id', $diary_id)->first();
    }

    public function storeFavorite(Int $user_id, Int $diary_id)
    {
        $this->user_id = $user_id;
        $this->diary_id = $diary_id;
        $this->save();

        return;
    }

    public function destroyFavorite(Int $favorite_id)
    {
        return $this->where('id', $favorite_id)->delete();
    }

}
