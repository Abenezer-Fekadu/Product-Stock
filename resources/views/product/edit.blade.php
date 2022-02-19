@extends('layouts.app')
@section('title')
   Edit product - {{ $product->address }}
@endsection
@section('content')
<div class="vh-100 mt-5">
    <h1 class="text-center pt-5">Edit Product</h1>
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card mt-3">
                    <div class="card-header">
                    <!-- /.card-header -->
                    <div class="card-body">
                    @include('layouts.frontend.errors')

                    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="name">Name: </label>
                                <input type="text" class="form-control" placeholder="Enter name" id="name" name="name" value="{{ old('name', $product->name) }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="address">Address: </label>
                                <input type="text" class="form-control" placeholder="Enter address" id="address" name="address" value="{{ old('address', $product->address) }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="category">Category: </label>
                                <input type="text" class="form-control" placeholder="category" id="category" name="category" value="{{ old('category',$product->category) }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="description">Description: </label>
                                <input type="text" class="form-control" placeholder="description" id="v" name="description" value="{{ old('description',$product->description) }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="price">Price:  </label>
                                <input type="text" class="form-control" placeholder="price" id="price" name="price" value="{{ old('price',$product->price) }}">
                            </div>

      
                            <div class="form-group mb-3">
                                <label for="main_image">Main Image</label>
                                <input type="file" name="main_image" class="form-control" id="main_image">
                            </div>
        
                            <div class="form-group mb-3">
                                <label for="images">Product Images</label>
                                <input type="file" name="images[]" class="form-control" multiple="true">
                            </div>

                            <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-success mx-2">Update</button>
                                    <a href="{{ URL::previous() }}" class="btn btn-danger wave-effect" >Back</a>
                            </div> 
                    </form>

                </div>      
                </div>
            </div>
        </div>
    </div><!-- /.container -->
 @endsection