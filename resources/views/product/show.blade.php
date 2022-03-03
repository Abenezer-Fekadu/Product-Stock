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
                <button id="intBtn"class="btn btn-success btn-sm" type="button" onclick="calculate_interest({{ $product }})">
                  Interest
                </button>
                <div class="interest" id="interest"></div>
              </div>

              <div class="d-flex justify-content-between pt-2">
                <p class="fw-bold mb-0">Product Details</p>
                <p class="text-muted mb-0"><span class="fw-bold me-4">Owner: </span>{{ $product->user->name }}</p>
              </div>
  
              <div class="d-flex justify-content-between pt-2">
                <p class="text-muted mb-0">Product Name : {{ $product->name }}</p>
                <p class="text-muted mb-0"><span class="fw-bold me-4">Contact: </span>{{ $product->user->phone }} </p>
              </div>
  
              <div class="d-flex justify-content-between">
                <p class="text-muted mb-0">Added Date : {{ $product->created_at }}</p>
                <p class="text-muted mb-0"><span class="fw-bold me-4">Total Price: </span> ${{$product->price *  $product->kilo }}</p>
              </div>
  
              <div class="d-flex justify-content-between mb-5">
                <p class="text-muted mb-0">Total Available Kilo : {{ $product->kilo }}</p>
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
<script type="text/javascript" src="{{ asset('custom/js/interest_calculate.js') }}""></script>
@endsection

