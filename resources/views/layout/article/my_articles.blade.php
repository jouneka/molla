@extends('layout.maintain')
@section('content')
    @foreach($articles as $article)
    <div>
        <article>
            <h1>{{$article->title}}</h1>
            <p>{{$article->content}}</p>
        </article>
        <h2>add comment</h2>
        <form action="{{route('comment',$article->id)}}" method="post">
            @csrf
            @method('patch')
            <input type="hidden" value="{{$article->id}}">
            <div>
                <label for="author">Name:</label>
                <input type="text" name="author">
            </div>
            <div>
                <label for="comment">comment:</label>
                <input type="text" name="comment">
            </div>
            <button type="submit">Submit</button>
        @foreach($article->comments as $comment)
            <div>
                <strong>{{$comment->author}}</strong>
                <p>{{$comment->comment}}</p>
            </div>
        @endforeach
    </div>
    @endforeach
@endsection
