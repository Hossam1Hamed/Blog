<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){

    }
    
    public function create(){
        $data['cats']=\App\Models\Category::select('id','name')->get();
        // $data['user']=Auth::user()->id;
        $data['user'] = Auth::user()->id;
        
        return view('post.create')->with($data);
    }
    public function store(Request $request){
        
        $data = $request->validate([
            'title'=>'required',
            'content'=>'required',
            'user_id'=>'required',
            'cat_id'=>'required',
        ]);
        Post::create($data);
        return redirect(route('home'));
    }

    public function edit($id){
        $data['post']= Post::findOrFail($id);

        $data['cats']=\App\Models\Category::select('id','name')->get();
        return view('post.edit')->with($data);
    }

    public function update(Request $request,$id){
        $data = $request->validate([
            'title'=>'required',
            'content'=>'required',
            'cat_id'=>'required',
        ]);
        $post = Post::find($id);
        $post->fill($request->all());
        $post->save();
        $data = ['user_id' => auth()->id()];
        return redirect(route('home'));
    }

    public function delete($id){

        Post::findOrFail($id)->delete();

        return back();
    }
}
