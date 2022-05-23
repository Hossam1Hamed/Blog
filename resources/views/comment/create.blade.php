@extends('layouts.app')

@section('content')

    <form method="POST" action="{{ route('comment.store')}}">
    @csrf
        <h1>Add New Comment </h1>
        <div>
            <label for=""><h3>Content</h3></label>
            <h5><textarea name="content" rows="5" cols="100"> </textarea></h5>
        </div>
        <input type="hidden" name="post_id" value="{{$post[0]->id}}">
        <input type="submit" value="ADD">
        </div>    
    </form>


@endsection