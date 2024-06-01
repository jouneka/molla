@extends('layout.maintain')
@section('content')
    <article>
        <h1>{{$article->title}}</h1>
        <p>{{$article->content}}</p>
    </article>
    <section>
        <h2>comments</h2>
        @foreach($article->comments as $comment)
            <div>
                <strong>{{$comment->author}}</strong>
                <p>{{$comment->comment}}</p>
            </div>
        @endforeach
    </section>
    <section>
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
        </form>
    </section>
@endsection
