<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Post;
use App\Category;
use App\Cute;
use App\Cool;
use App\Weird;

class PostController extends Controller
{
    public function index(Post $post)
    {
    //     $user = Auth::user();
    //     $category_id = $user->category_id;
    //     $posts = Category::find($category_id)->getByCategory();
        return view('posts/index')->with(['posts' => $post->get()]);
    }
    
    public function show(Post $post)
    {
        //dd($post->images_url);
        return view('posts/show')->with(['post' => $post]);
    }
    
    public function create(Category $category)
    {
        return view('posts/create')->with(['categories' => $category->get()]);;
    }
    
    public function store(PostRequest $request, Post $post)
    {
        $input = $request['post'];

        $post->images_url="test";
        $post->user_id=\Auth::id();
        $post->size_mm=1.0;

        $filename=time().'.'.$input["images_url"]->getClientOriginalName();
        $img=$input["images_url"]->storeAs('',$filename,['disk'=>'public']);
        
        //ユーザ_id保存
        $input['user_id']=3; 
        $input["images_url"]=$filename;
        //dd($input);
        //ユーザークラスのインスタンス化
        $post = new Post();

        //imgpathカラムに画像パスを挿入

        $post->fill($input)->save();
        return redirect('/');
    }
    
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
    
    public function cute(Post $post)
    {
         $cute=Cute::where("user_id",Auth::id())->where("post_id",$post->id);
        if($cute->exists()){
            $cute->delete();
        }else{
            $cute=new Cute();
            $cute->user_id=Auth::id();
            $cute->post_id=$post->id;
            $cute->save();
        }
        return redirect('/posts/'.$post->id);
    }
    
     public function cool(Post $post)
    {
        $cool=Cool::where("user_id",Auth::id())->where("post_id",$post->id);
        if($cool->exists()){
            $cool->delete();
        }else{
            $cool=new Cool();
            $cool->user_id=Auth::id();
            $cool->post_id=$post->id;
            $cool->save();
        }
        return redirect('/posts/'.$post->id);
    }
    
     public function weird(Post $post)
    {
         $weird=Weird::where("user_id",Auth::id())->where("post_id",$post->id);
        if($weird->exists()){
            $weird->delete();
        }else{
            $weird=new Weird();
            $weird->user_id=Auth::id();
            $weird->post_id=$post->id;
            $weird->save();
        }
        return redirect('/posts/'.$post->id);
    }

    public function test_create()
    {
        return view('posts/test_create');
    }
    
}
