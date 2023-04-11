@extends('layouts.app')

@section('content')
<div class="account-pages">
<div class="container">
    <div class="row align-items-center">
        <div class="col-lg-3">
        </div>
        <div class="col-lg-6">
            <div class="card mb-0">
                {{-- <div class="card-header">{{ $title ?? "" }} {{ __('Login') }}</div> --}}

                <div class="card-body">
                    <div class="p-2">
                        <h4 class="text-muted float-right font-18 mt-4">{{__('site.login')}}</h4>
                        <div>
                            <a href="{{route('dashboard.home')}}" class="logo logo-admin">

                                <img src="{{ asset('assets/images/logo_dark.png') }}" width="100" alt=""></a>
                                
                             
                            </a>
                        </div>
                    </div>
                    <div class="p-2">
                    @isset($route)
                        <form method="POST" action="{{ $route }}" class="form-horizontal m-t-20" >
                    @else
             
                    <form  class="form-horizontal m-t-20" method="POST" action="{{  route('login') }}">

                    @endisset
                    
                        @csrf

                        <div class="form-group row">

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="custom-control custom-checkbox">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center row m-t-20">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">
                                    {{ __('Login') }}
                                </button>

                        
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
        </div>
    </div>
</div>
</div>
@endsection