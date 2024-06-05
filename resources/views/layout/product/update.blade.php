@extends('layout.maintain')
@section('content')

    <div id="content">

        <div class="container">
            <form action="{{route('update',$product->id)}}" method="post">
                @csrf
                @method('patch')
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input  name ="title" type="text" class="form-control" id="title" >
                </div>

                <div class="form-group">
                    <label for="descript" >Description</label>
                    <input  name ="descript"  class="form-control" id="descript" >
                </div>

                <div class="form-group">
                    <label for="content" >Content</label>
                    <textarea  name ="content"  class="form-control" id="content" ></textarea>
                </div>

                <div class="form-group">
                    <label for="price" >Price</label>
                    <input  name ="price" type="text" class="form-control" id="price" >
                </div>
                <div class="form-group">
                    <select name="is_active" class="form-control">
                        <option value="1">able</option>
                        <option value="0">unable</option>
                    </select>
                </div>

                <div class="form-group">
                     <label>status</label>
                    <select name="status" class="form-control">
                        <option value="1">DRAFT</option>
                        <option value="0">PUBLISHED</option>
                    </select>

                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>

@endsection
