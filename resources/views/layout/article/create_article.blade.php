@extends('layout.maintain')
@section('content')
    <div>
        <form action="{{route('article')}}" method="get">
            <div>
                <label for="title">title</label>
                <input type="text" name="title">
            </div>
            <div>
                <label for="content">content</label>
                <input type="text" name="content">
            </div>
            <button type="submit">submit</button>

        </form>
    </div>
@endsection
