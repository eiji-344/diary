<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Diary;
use App\Template;
use App\User;
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
    
    
}
