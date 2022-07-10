<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Post;
use App\Category;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit()]);
    }
    
    public function show(Post $post)
    {
        return view('posts/show')->with(['post' => $post]);
    }
    
    public function create(Category $category)
    {
        return view('posts/create')->with(['categories' => $category->get()]);;
    }
    
    /*
    public function store(PostRequest $request, Post $post)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    */
    
    public function edit(Post $post)
    {
        return view('posts/edit')->with(['post' => $post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
        
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
    
    public function test_create()
    {
        return view('posts/test_create');
    }
    
    //作成したコントローラーに記述
    //$request->inputのname属性でつけた名前でデータがとれる。(この場合imgpath)
    
    public function store(Request $request){
        //strage/app/imgsに画像を保存
        $input = $request['post'];
        $filename=time().'.'.$input["images_url"]->getClientOriginalName();
        $img=$input["images_url"]->storeAs('',$filename,['disk'=>'public']);
         
        //ユーザークラスのインスタンス化
        $post = new Post();

        //imgpathカラムに画像パスを挿入
        $post->fill($input)->save();
        return redirect('/');
    }
    
}
