@extends('layout.maintain')
@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Active</th>
                <th>Created at</th>
                <th>Operations</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$product->title}}</td>
                    <td>{{$product->descript}}</td>
                    <td>{{$product->is_active?'True':'False'}}</td>
                    <td>{{$product->status}}</td>
                    <td>{{$product->created_at}}</td>
                    <td>
                        <a href="{{route('edit',$product->id)}}" methods="get" class="btn btn-info btn-sm">
                            Edit
                        </a>
                        <form class="d-inline" action="{{--route('product.destroy',$product->id)--}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
