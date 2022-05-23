@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Comments</h2>
    <form action="{{ route('comment.create',$comments[0]->post_id)}}" method="POST">
        @csrf
        {{ method_field('POST') }}
        <button type="submit">Add New Comment</button>
    </form>
    
    <table>
        <tr>
            <th>id</th>
            <th>Content</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
        @foreach($comments as $comment)
        <tr>
            <td>{{$comment->id}}</td>
            <td>{{$comment->content}}</td>
            <td>{{$comment->created_at}}</td>
            <td>
                <button><a href="{{route('comment.edit',$comment->id)}}">edit</a></button>
                <button><a href="{{route('comment.delete',$comment->id)}}">delete</a></button>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
