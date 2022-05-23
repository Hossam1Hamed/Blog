@extends('layouts.app')

@section('content')


    <form method="POST" action="{{ route('post.store')}}">
    @csrf
        <h1>Add New Post </h1>
        
        <input type="hidden" name="user_id" value="{{$user}}">
        <div>
            <label for=""><h3>title</h3></label>
            <input type="text" name="title" auto-complete="off" placeholder="enter title">
        </div>
        <div>
            <label for=""><h3>Content</h3></label>
            <h5><textarea name="content" rows="20" cols="100"> </textarea></h5>
        </div>
        <div>
                <label for="">Choose Your Post Category</label><div></div>
                <select name="cat_id">
                    <option selected>....</option>
                    @foreach($cats as $cat)
                        <option name="cat_id" value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                </select>
            </div>
        <div>
            <input type="submit" value="ADD">
        </div>    
    </form>


@endsection