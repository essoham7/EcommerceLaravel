@extends('layouts.store')

@section('store')


<!-- ============================ COMPONENT LOGIN   ================================= -->
<div class="card mx-auto col-md-4">
    <div class="card-body">
    <h4 class="card-title mb-4">{{ isset($url) ? ucwords($url) : ""}} {{ __('Login') }}</h4>
    @isset($url)
     <form method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
        @else
         <form method="POST" action="{{ route('login') }}">
            @endisset
            @csrf
            <a href="#" class="btn btn-facebook btn-block mb-2"> <i class="fab fa-facebook-f"></i> &nbsp  Sign in with Facebook</a>
            <a href="#" class="btn btn-google btn-block mb-4"> <i class="fab fa-google"></i> &nbsp  Sign in with Google</a>

            <!-- email// -->
            <div class="form-group">
                <label>{{ __('Email') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('E-mail') }}" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <!-- end email// -->
            <!-- form-group// -->

            <!-- password// -->
            <div class="form-group ">
                <label>{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ __('Password') }}">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <!-- end password.request// -->
            <!-- form-group// -->

            <!-- password.request// -->

            <div class="form-group">
                @if (Route::has('password.request'))
                <a class="float-right" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
                <!-- end password.request// -->

                <!--  form-check .// -->
                <label class="float-left custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <div class="custom-control-label"> {{ __('Remember Me') }} </div> </label>
                </div>
                <!-- end form-check .// -->

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"> {{ __('Login') }}  </button>
                </div> <!-- form-group// -->

            </form>
    </div> <!-- card-body.// -->
  </div> <!-- card .// -->

   <p class="text-center mt-4">Don't have account? <a href="{{ route('register') }}">Sign up</a></p>
   <br><br>
<!-- ============================ COMPONENT LOGIN  END.// ================================= -->

@endsection
