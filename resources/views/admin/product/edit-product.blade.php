@extends('admin.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Modify Product</h3>
                        <h5 class="text-center" style="color: green">{{session('message')}}</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('update.product')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$product->id}}">
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputEmail" type="text" name="name" value="{{$product->name}}"/>
                                <label for="inputEmail">Product Name</label>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control" id="inputLastName" type="text" name="brand_name" value="{{$product->brand_name}}"/>
                                        <label for="inputLastName">Brand Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputFirstName" type="text" name="category_name" value="{{$product->category_name}}"/>
                                        <label for="inputFirstName">Category Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <textarea name="description" cols="30" rows="10" class="form-control">{{$product->description}}</textarea>
                                    <label for="inputPassword">Description</label>
                                </div>
                            </div>
                            <div class="col-md-12 my-2">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input type="file" name="image" id="" class="form-control">
                                    <img src="{{asset($product->image)}}" alt="" srcset="" class="img-fluid">
                                </div>
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
