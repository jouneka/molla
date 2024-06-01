
@extends('layout.maintain')
@section('content')
    <div id="content">

        <div class="container">
            <form action="{{route('store')}}" method="get">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input  name ="title" type="text" class="form-control" id="title" >
                </div>

                <div class="form-group">
                    <label for="description" >Description</label>
                    <textarea  name ="description"  class="form-control" id="description" ></textarea>
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

                        <select name="is-active" class="form-control">
                            <option value="1">Enable</option>
                            <option value="0">able</option>
                        </select>

                </div>

                <div class="form-group">

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

