<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Favorite;

class FavoriteController extends Controller
{
    public function store(Request $request, Favorite $favorite)
    {
        $user = auth()->user();
        $diary_id = $request->diary_id;
        $is_favorite = $favorite->isFavorite($user->id, $diary_id);
        //dd(1);

        if(!$is_favorite) {
            $favorite->storeFavorite($user->id, $diary_id);
            return back();
        }
        return back();
    }
    
    public function delete(Favorite $favorite)
    {
        $user_id = $favorite->user_id;
        $diary_id = $favorite->diary_id;
        $favorite_id = $favorite->id;
        $is_favorite = $favorite->isFavorite($user_id, $diary_id);
        //dd(2);

        if($is_favorite) {
            $favorite->destroyFavorite($favorite_id);
            return back();
        }
        return back();
    }
}
