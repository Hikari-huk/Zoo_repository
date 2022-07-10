<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //マイページ画面表示
    public function index()
    {
        return view('users/mypage')->with(['posts' => \Auth::user()->posts()->orderBy('updated_at', 'DESC')->get()]);
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
}
