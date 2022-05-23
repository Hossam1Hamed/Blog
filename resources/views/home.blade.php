@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Posts</h2>
    <a href="{{ route('post.create') }}">Add New Post</a>
    <table>
        <tr>
            <th>id</th>
            <th>title</th>
            <th>Content</th>
            <th>Tags</th>
            <th>Category</th>
            <th>Auther</th>
            <th>Date</th>
            <th>Comments</th>
            <th>Actions</th>
        </tr>
        @foreach($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->content}}</td>
            <td>
                <ul>
                    @foreach($post->tags as $tag)
                    <li>{{$tag -> name}}</li>
                    @endforeach
                </ul>
            </td>
            <td>
                @foreach($cats as $cat)
                    @if($post -> cat_id == $cat -> id)
                       {{$cat->name}}
                    @endif
                @endforeach
            </td>
            <td>
                @foreach($users as $user)
                    @if($post -> user_id == $user -> id)
                       {{$user->name}}
                    @endif
                @endforeach
            </td>
            <td>{{$post->created_at}}</td>
            <td><button><a href="{{route('post.comments',$post->id)}}">show</a></button></td>
            <td>
                <button><a href="{{route('post.edit',$post->id)}}">edit</a></button>
                <button><a href="{{route('post.delete',$post->id)}}">delete</a></button>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
