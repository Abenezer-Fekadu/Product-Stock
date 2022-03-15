@extends('layouts.app')

@section('title')
    Details - {{ $product->name }}
@endsection

@section('link')
    <link rel='stylesheet' href='https://sachinchoolur.github.io/lightslider/dist/css/lightslider.css'>
    <link href="{{ asset('custom/css/card.css') }}" rel="stylesheet" />
@endsection


@section('content')
<section class="h-100 gradient-custom">
  <h1 class="text-center py-5">Product Details</h1>
  <div class="container-fluid mb-3 h-100">
      <div class="row no-gutters">
          <div class="col-md-5 pr-2">
              <div class="card">
                  <div class="demo">
                      <ul id="lightSlider">
                        @foreach(json_decode($product->images) as $pic)
                          <li data-thumb="{{ asset('images/'.$pic) }}"> 
                            <img src="{{ asset('images/'.$pic) }}" /> 
                          </li>
                        @endforeach                    
                      </ul>
                  </div>
              </div>

              <div class="card mt-2">
                  <h6>Interest</h6>
                  <div class="d-flex flex-row">
                      <div class="stars"> 
                        <i class="fa fa-star"></i> 
                        <i class="fa fa-star"></i> 
                        <i class="fa fa-star"></i> 
                        <i class="fa fa-star"></i> 
                      </div> 
                      <button id="intBtn"class="btn btn-success btn-sm" type="button" onclick="calculate_interest({{ $product }})">
                        View
                      </button>
                  </div>
                  <hr>
                  <div class="interest" id="interest"></div>
              </div>
          </div>

          <div class="col-md-7">
              <div class="card">
                  <div class="d-flex flex-row align-items-center">
                      <div class="p-ratings"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div> <h6 class="ml-1">Product ID : {{ $product->id }}</h6>
                  </div>

                  <div class="about"> 
                      <h6 class="font-weight-bold">Name: {{ $product->name }}</h6>
                      <h6 class="font-weight-bold">Kilo : {{ $product->kilo }}</h6>
                      <h6 class="font-weight-bold">Price: <span class="text-danger">${{ $product->price }}</span>/kilo</h6>
                  </div>
                  <div class="buttons">
                    <a href="{{ route('product.status', $product->id) }}"  class="btn btn-warning btn-long">Status</a>
                    <a href="{{ route('product.edit', $product->id) }}"  class="btn btn-outline-info btn-long cart">Edit</a>

                    <button class="btn btn-danger btn-sm" type="button" onclick="deleteproduct({{ $product->id }})">
                      Delete
                    </button>
    
                    <form id="delete-form-{{ $product->id }}" action="{{ route('product.destroy',$product->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                  </div>
                  <hr>
                  <div class="product-description">
                      <div class="d-flex flex-row align-items-center"> <i class="fa fa-calendar-check-o"></i><h6 class="ml-1">Date:  {{ $product->updated_at }}</h6> </div>
                      <div class="mt-2"> <h5 class="font-weight-bold">About the Product</h5>
                          <p>{{ $product->description }}</p>
              
                          <div class="bullets">
                              <div class="d-flex align-items-center"> <span class="dot"></span> <span class="bullet-text">Best in Quality</span> </div>
                              <div class="d-flex align-items-center"> <span class="dot"></span> <span class="bullet-text">Anti-creak joinery</span> </div>
                              <div class="d-flex align-items-center"> <span class="dot"></span> <span class="bullet-text">Sturdy laminate surfaces</span> </div>
                              <div class="d-flex align-items-center"> <span class="dot"></span> <span class="bullet-text">Relocation friendly design</span> </div>
                              <div class="d-flex align-items-center"> <span class="dot"></span> <span class="bullet-text">High gloss, high style</span> </div>
                              <div class="d-flex align-items-center"> <span class="dot"></span> <span class="bullet-text">Easy-access hydraulic storage</span> </div>
                          </div>
                      </div>
                  </div> 
                  <div class="d-flex  my-3">
                    @if ($product->status == 1)
                    <h6 class="font-weight-bold">Status: <span class="text-success mb-0"> Available</span></h6>
                    @else
                    <h6 class="font-weight-bold">Status: <span class="text-danger mb-0"> Unavailable</span></h6>
                    @endif
                  </div>
              </div>

              <div class="card mt-2"> <span>Similar items:</span>
                  <div class="similar-products mt-2 d-flex flex-row">
                      <div class="card border p-1" style="width: 9rem;margin-right: 3px;"> <img src="https://i.imgur.com/KZpuufK.jpg" class="card-img-top" alt="...">
                          <div class="card-body">
                              <h6 class="card-title">$1,999</h6>
                          </div>
                      </div>
                      <div class="card border p-1" style="width: 9rem;margin-right: 3px;"> <img src="https://i.imgur.com/GwiUmQA.jpg" class="card-img-top" alt="...">
                          <div class="card-body">
                              <h6 class="card-title">$1,699</h6>
                          </div>
                      </div>
                      <div class="card border p-1" style="width: 9rem;margin-right: 3px;"> <img src="https://i.imgur.com/c9uUysL.jpg" class="card-img-top" alt="...">
                          <div class="card-body">
                              <h6 class="card-title">$2,999</h6>
                          </div>
                      </div>
                      <div class="card border p-1" style="width: 9rem;margin-right: 3px;"> <img src="https://i.imgur.com/kYWqL7k.jpg" class="card-img-top" alt="...">
                          <div class="card-body">
                              <h6 class="card-title">$3,999</h6>
                          </div>
                      </div>
                      <div class="card border p-1" style="width: 9rem;"> <img src="https://i.imgur.com/DhKkTrG.jpg" class="card-img-top" alt="...">
                          <div class="card-body">
                              <h6 class="card-title">$999</h6>
                          </div>
                      </div>
                  </div>
              </div>

          </div>
      </div>
  </div>
</section>
@endsection




<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js'></script>
<script src='https://sachinchoolur.github.io/lightslider/dist/js/lightslider.js'></script>

@section('scripts')
<script type="text/javascript" src="{{ asset('custom/js/interest_calculate.js') }}"></script>
@endsection

