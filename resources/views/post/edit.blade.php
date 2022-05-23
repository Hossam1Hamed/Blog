@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>
    <form method="post" action="{{ route('post.update',$post->id ) }}">
    @csrf
    {{ method_field('put') }}
    <!-- @method('PUT') -->
        <input type="hidden" name="id" value="{{$post->id}}">
        <div>
            <label for=""><h3>title</h3></label>
            <input type="text" name="title" auto-complete="off" value="{{$post->title}}">
        </div>
        <div>
            <label for=""><h3>Content</h3></label>
            <h5><textarea name="content" rows="15" cols="100" value="">{{$post->content}}</textarea></h5>
        </div>
        <div>
                <label for="">Choose Your Post Category</label><div></div>
                <select name="cat_id">
                    <!-- <option selected>{{$post->cat_id}}</option> -->
                    @foreach($cats as $cat)
                        <option name="cat_id" value="{{$cat->id}}" {{ ($post->cat_id == $cat->id)? 'selected' : ''}}>{{$cat->name}}</option>
                    @endforeach
                </select>
            </div>
        <div>
            <input type="submit" value="update">
        </div>    
    </form>


@endsection