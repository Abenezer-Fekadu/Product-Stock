@extends('layouts.app')
@section('title')
    Add Product
@endsection
@section('content')
<div class="vh-100 mt-5">
    <h1 class="text-center pt-5">Add New Product</h1>
        
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card mt-2">
                <!-- /.card-header -->
                <div class="card-body">
                    @include('layouts.frontend.errors')

                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="address">Name: </label>
                            <input type="text" class="form-control" placeholder="Name" id="address" name="name" value="{{ old('name') }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="address">Address: </label>
                            <input type="text" class="form-control" placeholder="Enter address" id="address" name="address" value="{{ old('address') }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="number_of_room">Category: </label>
                            <input type="text" class="form-control" placeholder="Electronics" id="category" name="category" value="{{ old('category') }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="number_of_toilet">Description: </label>
                            <input type="text" class="form-control" placeholder="Item Description" id="description" name="description" value="{{ old('description') }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="number_of_belcony">Kilo: </label>
                            <input type="numeric" class="form-control" placeholder="2.0" id="kilo" name="kilo" value="{{ old('kilo') }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="number_of_belcony">Price: </label>
                            <input type="numeric" class="form-control" placeholder="30.0" id="price" name="price" value="{{ old('price') }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="main_image">Main Image: </label>
                            <input type="file" name="main_image" class="form-control" id="main_image">
                        </div>
    
                        <div class="form-group mb-3">
                            <label for="images">Product Images: </label>
                            <input type="file" name="images[]" class="form-control" multiple="true" id="images">
                        </div>

                        <div class="form-group">
                                <button type="submit" class="btn btn-success mx-2">Add</button>
                                <a href="{{ URL::previous() }}" class="btn btn-danger wave-effect" >Back</a>
                        </div> 
                    </form>
                </div> <!-- /.card-body -->
            </div><!-- /.card -->
        </div>
    </div>
</div><!-- /.container -->

@endsection