@extends('layouts.app')


@section('title')
   Ware House - Register
@endsection


@section('content')

<section class="vh-100 mb-5">
    <h1 class="text-center">Register</h1>
    <div class="container py-5 h-100">
      <div class="row d-flex align-items-center justify-content-center h-100">

        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-outline mb-3">
                    <label for="name" class="form-label">{{ __('Name') }}</label>

                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>


                <div class="form-outline mb-3">
                    <label class="form-label" for="email">{{ __('Email Address') }}</label>
                    <input type="email" id="email"class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
    

                <div class="form-outline mb-3">
                    <label for="phone" class="form-label">{{ __('Phone') }}</label>
                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

            <!-- Password input -->
                <div class="form-outline mb-3">
                    <label class="form-label" for="password">{{ __('Password') }}</label>
                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>


                <div class="form-outline mb-3">
                    <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>


            <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-md btn-block">Register</button>

        </form>
        </div>
        <div class="col-md-8 col-lg-7 col-xl-6">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg" class="img-fluid" alt="Phone image">
        </div>
    </div>
    </div>
</section>

@endsection
