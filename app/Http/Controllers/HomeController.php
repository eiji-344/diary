<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DiaryRequest;
use App\Diary;
use App\Template;
use App\User;
use App\Follower;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(User $user, Diary $diary, Template $template)
    {
        $user = Auth::user();
        $diaries = $user->diaries()->get();
        
        //dd($diaries);
        return view('home')->with([
            'user' => $user,
            'diaries' => $diaries, 
            ]);
    }
    
    public function followShow(User $user, Diary $diary, Template $template)
    {
        $user = Auth::user();
        $diaries = $user->diaries()->get();
        $user_id = Auth::id();
        $following_ids = $user->isFollowing($user->id);
        
        //dd($diaries);
        dd($following_ids);
        return view('followShow')->with([
            'user' => $user,
            'diaries' => $diaries, 
            'following_ids' => $following_ids, 
            ]);
    }
    
    public function favoriteShow(User $user, Diary $diary, Template $template)
    {
        $user = Auth::user();
        $diaries = $user->diaries()->get();
        
        //dd($diaries);
        return view('followShow')->with([
            'user' => $user,
            'diaries' => $diaries, 
            ]);
    }
    
    // public function index(User $user, Diary $diary, Follower $follower)
    // {
    //     $login_user = Auth::user();
    //     $is_following = $login_user->isFollowing($user->id);
    //     $is_followed = $login_user->isFollowed($user->id);
    //     $timelines = $diary->getUserTimeLine($user->id);
    //     $diary_count = $diary->getDiaryCount($user->id);
    //     $follow_count = $follower->getFollowCount($user->id);
    //     $follower_count = $follower->getFollowerCount($user->id);

    //     return view('home', [
    //         'user'           => $user,
    //         'is_following'   => $is_following,
    //         'is_followed'    => $is_followed,
    //         'timelines'      => $timelines,
    //         'diary_count'    => $diary_count,
    //         'follow_count'   => $follow_count,
    //         'follower_count' => $follower_count
    //     ]);
        
        
    // }
    
    
}
