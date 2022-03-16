@extends('layouts.app')

@section('title')
    All Products
@endsection


@section('link')
    <link href="{{ asset('custom/css/all.css') }}" rel="stylesheet" />
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

<div class=" m-5">
    <div class="d-flex justify-content-between">
        <h4>Number of Products: {{ $product_count }}</h4>
        <a href="{{route('product.create')}}" class="btn btn-outline-success btn-md">New</a>
    </div>

    <div id="mobile-filter">
        <p class="pl-sm-0 pl-2"> Home | <b>All Products</b></p>
        <div class="border-bottom pb-2 ml-2">
            <h4 id="burgundy">Filters</h4>
        </div>
        <div class="py-2 border-bottom ml-3">
            <h6 class="font-weight-bold">Categories</h6>
            <div id="orange"><span class="fa fa-minus"></span></div>
            <form>
                <div class="form-group"> <input type="checkbox" id="artisan"> <label for="artisan">Electronics</label> </div>
                <div class="form-group"> <input type="checkbox" id="breakfast"> <label for="breakfast">Furnitures</label> </div>
                <div class="form-group"> <input type="checkbox" id="healthy"> <label for="healthy">Clothes</label> </div>
            </form>
        </div>
        <div class="py-2 border-bottom ml-3">
            <h6 class="font-weight-bold">Accompainments</h6>
            <div id="orange"><span class="fa fa-minus"></span></div>
            <form>
                <div class="form-group"> <input type="checkbox" id="tea"> <label for="tea">Chairs</label> </div>
                <div class="form-group"> <input type="checkbox" id="cookies"> <label for="cookies">Phones</label> </div>
                <div class="form-group"> <input type="checkbox" id="pastries"> <label for="pastries">Tef</label> </div>
                <div class="form-group"> <input type="checkbox" id="dough"> <label for="dough">Wheet</label> </div>
                <div class="form-group"> <input type="checkbox" id="choco"> <label for="choco">EarPods</label> </div>
            </form>
        </div>
        <div class="py-2 ml-3">
            <h6 class="font-weight-bold">Top Offers</h6>
            <div id="orange"><span class="fa fa-minus"></span></div>
            <form>
                <div class="form-group"> <input type="checkbox" id="25off"> <label for="25">25% off</label> </div>
                <div class="form-group"> <input type="checkbox" id="5off"> <label for="5off" id="off">5% off on artisan breads</label> </div>
            </form>
        </div>
    </div>
    
    <!-- Sidebar filter section -->
    <section id="sidebar">
        <p> Home | <b>All Products</b></p>
        <div class="border-bottom pb-2 ml-2">
            <h4 id="burgundy">Filters</h4>
        </div>
        <div class="py-2 border-bottom ml-3">
            <h6 class="font-weight-bold">Categories</h6>
            <div id="orange"><span class="fa fa-minus"></span></div>
            <form>
                <div class="form-group"> <input type="checkbox" id="artisan"> <label for="artisan">Electronics</label> </div>
                <div class="form-group"> <input type="checkbox" id="breakfast"> <label for="breakfast">Furnitures</label> </div>
                <div class="form-group"> <input type="checkbox" id="healthy"> <label for="healthy">Clothes</label> </div>
            </form>
        </div>
        <div class="py-2 border-bottom ml-3">
            <h6 class="font-weight-bold">Accompainments</h6>
            <div id="orange"><span class="fa fa-minus"></span></div>
            <form>
                <div class="form-group"> <input type="checkbox" id="tea"> <label for="tea">Chairs</label> </div>
                <div class="form-group"> <input type="checkbox" id="cookies"> <label for="cookies">Phones</label> </div>
                <div class="form-group"> <input type="checkbox" id="pastries"> <label for="pastries">Tef</label> </div>
                <div class="form-group"> <input type="checkbox" id="dough"> <label for="dough">Wheet</label> </div>
                <div class="form-group"> <input type="checkbox" id="choco"> <label for="choco">EarPods</label> </div>
            </form>
        </div>
        <div class="py-2 ml-3">
            <h6 class="font-weight-bold">Top Offers</h6>
            <div id="orange"><span class="fa fa-minus"></span></div>
            <form>
                <div class="form-group"> <input type="checkbox" id="25off"> <label for="25">25% off</label> </div>
                <div class="form-group"> <input type="checkbox" id="5off"> <label for="5off" id="off">5% off on artisan breads</label> </div>
            </form>
        </div>
    </section>

    <section id="products">
        <div class="container py-3">
            @if ($product_count > 0)
                @foreach ($products as $key=>$product)
                <div class="row justify-content-center mb-3">
                    <div class="col-md-12 col-xl-10">
                        <div class="card shadow-0 border rounded-3 w-auto h-auto">
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
                                        <h5> <a href="{{ route('product.show', $product->id) }}" style="text-decoration: none; color:black">{{ $product->name }}</a></h5>
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
                                            <div class="d-flex justify-content-center mt-2">                                            
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
    </section>
</div>
@endsection



@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript" src="{{ asset('custom/js/update.js') }}""></script>
@endsection

