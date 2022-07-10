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
}
