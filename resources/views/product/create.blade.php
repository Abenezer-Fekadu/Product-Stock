@extends('layouts.app')
@section('title')
    Add Product
@endsection

@section('content')
<div class="container vh-100 mt-5">
    <h1 class="text-center pt-5">Add New Product</h1>        
    <div class="card mt-2">
        <div class="card-body">
            @include('layouts.frontend.errors')
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="form-group col-md-6 ">
                        <label class="mb-2" for="address">Name</label>
                        <input type="text" class="form-control" placeholder="Name" id="address" name="name" value="{{ old('name') }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label class="mb-2" for="address">Address</label>
                        <input type="text" class="form-control" placeholder="Enter address" id="address" name="address" value="{{ old('address') }}">
                    </div>
                </div>

                <div class="row mb-3"> 
                    <div class="form-group col-md-4">
                        <label class="mb-2" for="category">Category</label>
                            <select class="form-control" id="category" name="category">
                                <option selected>{{ old('category') }}</option>
                                <option value="Furniture">Furniture</option>
                                <option value="Electronics">Electronics</option>
                                <option value="HouseHold">HouseHold</option>
                            </select>
                        {{-- <input type="text" class="form-control" placeholder="Electronics" id="category" name="category" value="{{ old('category') }}"> --}}
                    </div>
                    <div class="form-group col-md-4">
                        <label class="mb-2" for="kilo">Kilo</label>
                        <input type="number" class="form-control" placeholder="4" id="kilo" name="kilo" value="{{ old('kilo') }}">
                    </div>
                    
                    <div class="form-group col-md-4">
                        <label for="date" class="mb-2">Date</label>
                        <div id="datepicker" class="form-group date">
                            <input type="text" class="form-control" id="date"/>
                            <span class="form-group-append">
                            <span class="form-group-text bg-light d-block">
                                <i class="fa fa-calendar"></i>
                            </span>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="form-group col-md-6">
                        <label class="mb-2" for="price">Price</label>
                        <input type="number" class="form-control" placeholder="30.0" id="price" name="price" value="{{ old('price') }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="mb-2" for="description">Description</label>
                        <textarea  class="form-control" message="Item Description" id="description" name="description" value="{{ old('description') }}"> </textarea>
                    </div>                            
                </div>

                <div class="row mb-3">
                    <div class="form-group col-md-6">
                        <label class="mb-2" for="main_image">Main Image</label>
                        <input type="file" name="main_image" class="form-control" id="main_image" />
                    </div>

                    <div class="form-group col-md-6">
                        <label class="mb-2" for="images">Product Images</label>
                        <input type="file" name="images[]" class="form-control" id="images" multiple/>
                    </div>
                </div>

                <div class="form-group">
                        <button type="submit" class="btn btn-success mx-2">Add</button>
                        <a href="{{ URL::previous() }}" class="btn btn-danger wave-effect" >Back</a>
                </div> 
            </form>
        </div> <!-- /.card-body -->
    </div><!-- /.card -->
</div><!-- /.container -->
@endsection



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
@section('scripts')
<script type="text/javascript" src="{{ asset('custom/js/date.js') }}"></script>
@endsection
