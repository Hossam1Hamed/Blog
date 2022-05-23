<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{

    //take id of post
    public function getCommentsByPost($id){
        $data['comments'] = Comment::where('post_id',$id)->get();
        return view('comment.index')->with($data);
    }

    public function create($id){
        $data['post'] = Post::where('id',$id)->get();
        
        return view('comment.create')->with($data);
    }
    public function store(Request $request){
        $data = $request->validate([
            'content'=>'required',
            'post_id' =>'required',
        ]);
        Comment::create($data);
        return redirect(route('post.comments',$request['post_id']));
    }

    public function edit($id){
        $data['comment']= Comment::findOrFail($id);
        
        return view('comment.edit')->with($data);
    }

    public function update(Request $request){
        $data = $request->validate([
            'content'=>'required',
        ]);
        $comment = Comment::findOrFail($request->id)->update($data);
        return redirect(route('post.comments',$request->post_id));
    }

    public function delete($id){

        Comment::findOrFail($id)->delete();

        return back();
    }
}
