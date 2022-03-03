@extends('layouts.app')

@section('title')
    All Products
@endsection


@section('content')
<!-- App badge section-->
<section class="bg-gradient-primary-to-secondary mb-3" id="download">
    <div class="container px-5">
        <div class="d-flex flex-column flex-lg-row align-items-center justify-content-center">
            <h2 class="text-center text-white font-alt mt-5">Your Products</h2>
        </div>
    </div>
</section>

<div class="container mt-5">
    <div class="d-flex justify-content-between">
        <h2>Number of Products: {{ $product_count }}</h2>
        <a href="{{route('product.create')}}" class="btn btn-outline-success btn-md">New</a>
    </div>

    <div class="container py-3">
        @if ($products->count() > 0)
            @foreach ($products as $key=>$product)
            <div class="row justify-content-center mb-3">
                <div class="col-md-12 col-xl-10">
                    <div class="card shadow-0 border rounded-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                    <div class="bg-image hover-zoom ripple rounded ripple-surface">
                                        <a href="{{ asset('storage/main_product/'.$product->main_image) }}">
                                            <img
                                            src="{{ asset('storage/main_product/'.$product->main_image) }}"
                                            class="w-100"/>
                                        </a>

                                        <a href="#!">
                                            <div class="hover-overlay">
                                            <div
                                                class="mask"
                                                style="background-color: rgba(253, 253, 253, 0.15);"
                                            ></div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-lg-6 col-xl-6">
                                    <h5>{{ $product->name }}</h5>
                                    <div class="d-flex flex-row">
                                        <span>{{ $product->address}}</span>
                                        <span class="text-primary"> - </span>
                                        <span>{{ $product->user->phone }}</span>
                                    </div>
                                    <div class="mt-1 mb-0 text-muted small">
                                        <span>{{ $product->category }}</span>
                                    </div>
                                    <div class="mb-2 text-muted small">
                                        <span>{{ $product->created_at}}</span>

                                    </div>
                                    <p class="text-truncate mb-4 mb-md-0">
                                        {{ $product->description }}
                                    </p>
                                </div>

                                <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                                    <div class="d-flex flex-row align-items-center mb-1">
                                        <h4 class="mb-1 me-0"> Price/Kilo: ${{ $product->price}}</h4>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-1">
                                        <h4 class="mb-1 me-0">Kilo: {{$product->kilo }}</h4>
                                    </div>
                                    @if ($product->status == 1)
                                        <h6 class="text-success">Available</h6>
                                    @else
                                        <h6 class="text-danger">Not Available</h6>
                                    @endif

                                    <div class="d-flex flex-column mt-4">
                                        <a href="{{ route('product.show', $product->id) }}"  class="btn btn-primary btn-sm">Details</a>
                                        <div class="d-flex justify-content-center mt-2">
                                            
                                            <a href="{{ route('product.status', $product->id) }}"  class="btn btn-warning btn-sm ">Status</a>
                                            <a href="{{ route('product.edit', $product->id) }}"  class="btn btn-outline-info btn-sm mx-2">Edit</a>

                                            <button class="btn btn-danger btn-sm" type="button" onclick="deleteproduct({{ $product->id }})">
                                                Delete
                                            </button>
                            
                                            <form id="delete-form-{{ $product->id }}" action="{{ route('product.destroy',$product->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else 
                <h2 class="text-center text-info font-weight-bold m-3">No Product Found</h2>
            @endif
        <div class="pagination">
            {{ $products->links() }}
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript" src="{{ asset('custom/js/update.js') }}""></script>
@endsection

