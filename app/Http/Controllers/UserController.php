<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //マイページ画面表示
    public function index()
    {
        return view('users/mypage')
        ->with(['posts' => \Auth::user()->posts()->orderBy('updated_at', 'DESC')->get()])
        ->with(['follows' =>\Auth::user()->follows()->get()])->with(['followers' => \Auth::user()->followers()->get()]);
    }
    
    //ユーザーページ画面表示
    public function show(User $user)
    {
        return view('users/show')
        ->with(['user' => $user])->with(['posts' => $user->posts()->orderBy('updated_at', 'DESC')->get()])
        ->with(['follows' => $user->follows()->get()])->with(['followers' => $user->followers()->get()]);
    }
    
    public function edit()
    {
        return view('users/edit');
    }
    
    public function update(Request $request)
    {
        $input_user = $request['user'];
        \Auth::user()->fill($input_user)->save();
        return redirect('/mypage');
    }
    
    public function follow(User $user)
    {
        $user->followers()->attach(\Auth::id());
        
        return redirect('/users/' . $user->id );
    }
    
    public function unfollow(User $user)
    {
        $user->followers()->detach(\Auth::id());
        
        return redirect('/users/' . $user->id );
    }
}
