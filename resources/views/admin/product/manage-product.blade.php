@extends('admin.master')
@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-10 offset-1">
                <div class="card">
                    <div class="card-header"><h3 class="text-center">Product List</h3></div>
                    <div class="card-body">
                        <table  id="datatablesSimple" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Product Name</th>
                                <th>Category Name</th>
                                <th>Brand Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @php $i=1 @endphp
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->category_name}}</td>
                                    <td>{{$product->brand_name}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>
                                        <img src="{{$product->image}}" alt="" class="img-fluid">
                                    </td>
                                    <td>
                                        {{$product->status ==1 ? 'Published': 'Unpublished'}}
                                    </td>
                                    <td class="btn-group">
                                        <a href="{{route('edit.product', ['id'=> $product->id])}}" class="btn btn-outline-primary">Edit</a>
                                        @if($product->status ==1)
                                            <a href="{{route('status.product', ['id'=> $product->id])}}" class="btn btn-outline-warning mx-2">Unpublish</a>
                                        @else
                                            <a href="{{route('status.product', ['id'=> $product->id])}}" class="btn btn-outline-success mx-2">Publish</a>
                                        @endif

                                        <form action="{{route('delete.product', ['id'=> $product->id])}}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$product->id}}">
                                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are Your Sure You Want to delete this content?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
