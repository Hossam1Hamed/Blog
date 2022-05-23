@extends('layouts.app')

@section('content')
    <h1>Edit Comment</h1>
    <form method="post" action="{{ route('comment.update') }}">
    @csrf
    {{ method_field('put') }}
    <!-- @method('PUT') -->
        <input type="hidden" name="id" value="{{$comment->id}}">
        
        <div>
            <label for=""><h3>comment</h3></label>
            <h5><textarea name="content" rows="5" cols="100" value="">{{$comment->content}}</textarea></h5>
        </div>
        <input type="hidden" name="post_id" value="{{$comment->post_id}}">
        <div>
            <input type="submit" value="update">
        </div>    
    </form>


@endsection