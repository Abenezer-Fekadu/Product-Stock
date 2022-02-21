@extends('layouts.app')
@section('title')
    Details - {{ $product->name }}
@endsection
@section('content')

<section class="h-100 gradient-custom">
    <h1 class="text-center pt-5">Product Details</h1>
    <div class="container py-3 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-10 col-xl-8">
          <div class="card" style="border-radius: 10px;">
            <div class="card-body p-4">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <p class="lead fw-normal mb-0" style="color: #a8729a;">Product</p>
                <p class="small text-muted mb-0">Product ID : {{ $product->id }} </p>
              </div>
              <div class="card shadow-0 border mb-4">

              <?php
                  echo "<div id='demo'></div>";
                  echo "<script type='text/javascript'>calculate($product);</script>";
              ?>
              </div>
  
              <div class="d-flex justify-content-between pt-2">
                <p class="fw-bold mb-0">Product Details</p>
                <p class="text-muted mb-0"><span class="fw-bold me-4">Owner</span> {{ $product->user->name }}</p>

              </div>
  
              <div class="d-flex justify-content-between pt-2">
                <p class="text-muted mb-0">Product Name : {{ $product->name }}</p>
                <p class="text-muted mb-0"><span class="fw-bold me-4">Contact</span> {{ $product->user->phone }} </p>
              </div>
  
              <div class="d-flex justify-content-between">
                <p class="text-muted mb-0">Added Date : {{ $product->created_at }}</p>
                <p class="text-muted mb-0"><span class="fw-bold me-4">Original Price</span> ${{$product->price}}</p>
              </div>
  
              <div class="d-flex justify-content-between mb-5">
                <p class="text-muted mb-0">Last Update : {{ $product->updated_at }}</p>
                @if ($product->status == 1)
                <p class="text-success mb-0"><span class="fw-bold me-4">Status</span> Available </p>
                @else
                <p class="text-danger mb-0"><span class="fw-bold me-4">Status</span> Not Available </p>
                @endif

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection



@section('scripts')

<script type="text/javascript">
  


function calculate(product){

    productDate = Date.parse(product.created_at);
    today = Date.now();

    difference = (today.valueOf() - productDate.valueOf()) 
    
    // hour = (difference/1000/60/60)

    day = new Date(difference).getDate()

    price = product.price
    
    if (day > 2 ){
      for (var i = 0; i < day; i++){
        date = new Date(productDate)
        
        date.setDate(date.getDate() + i+1);  
        price += product.price * (2/10)
        document.getElementById("demo").innerHTML += 
        `<div class="card-body">
                  <div class="row">
                    <div class="col-md-2">
                      <img src="{{ asset('storage/main_product/'.$product->main_image )}}" class="img-fluid" alt="{{ $product->name }}">
                    </div>
                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                      <p class="text-muted mb-0">{{ $product->name }}</p>
                    </div>
                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                      <p class="text-muted mb-0 small">{{ $product->category }}</p>
                    </div>
                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                      <p class="text-muted mb-0 small">{{ $product->description }}</p>
                    </div>
                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                      <p class="text-muted mb-0 small">{{ $product->address }}</p>
                    </div>
                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                      <p class="text-muted mb-0 small">$${price}</p>
                    </div>
                  </div>
                  <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
                  <div class="row d-flex align-items-center">
                    <div class="col-md-2">
                      <p class="text-muted mb-0 small">20% interest</p>
                    </div>
                    <div class="col-md-10">

                      <div class="d-flex justify-content-around mb-1">
                        <p class="text-muted mt-1 mb-0 small ms-xl-5">${date.toLocaleDateString()}</p>
                        <p class="text-muted mt-1 mb-0 small ms-xl-5">updated</p>
                      </div>
                    </div>
                  </div>
                </div>
        `;
      }
    }
      else{
        document.getElementById("demo").innerHTML += 
        `<div class="card-body">
                  <div class="row">
                    <div class="col-md-2">
                      <img src="{{ asset('storage/main_product/'.$product->main_image )}}" class="img-fluid" alt="{{ $product->name }}">
                    </div>
                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                      <p class="text-muted mb-0">{{ $product->name }}</p>
                    </div>
                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                      <p class="text-muted mb-0 small">{{ $product->category }}</p>
                    </div>
                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                      <p class="text-muted mb-0 small">{{ $product->description }}</p>
                    </div>
                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                      <p class="text-muted mb-0 small">{{ $product->address }}</p>
                    </div>
                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                      <p class="text-muted mb-0 small">${{ $product->price }}</p>
                    </div>
                  </div>
                  <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
                  <div class="row d-flex align-items-center">
                    <div class="col-md-2">
                      <p class="text-muted mb-0 small">Track Order</p>
                    </div>
                    <div class="col-md-10">

                      <div class="d-flex justify-content-around mb-1">
                        <p class="text-muted mt-1 mb-0 small ms-xl-5">Out for delivary</p>
                        <p class="text-muted mt-1 mb-0 small ms-xl-5">{{ $product->status }}</p>
                      </div>
                    </div>
                  </div>
                </div>
        `;
      
    }  


}
</script>


@endsection

