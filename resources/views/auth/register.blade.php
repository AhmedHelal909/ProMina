@extends('layouts.app')

@section('content')
<div class="account-pages">
<div class="container">
    <div class="row align-items-center">
       
        <div class="col-12 ">
            <div class="card mb-0">
                {{-- <div class="card-header">{{ $title ?? "" }} {{ __('Register') }}</div> --}}

                <div class="card-body">
                    <div class="p-2">
                        <h4 class="text-muted float-right font-18 mt-4">Register</h4>
                        <div>
                            <a href="index.html" class="logo logo-admin"><img src="assets/images/logo_dark.png" height="28" alt="logo"></a>
                        </div>
                    </div>
                    <div class="p-2">

                    @isset($route)
                        <form method="POST" action="{{ $route }}" class="form-horizontal m-t-20">
                    @else
                        <form method="POST" action="{{ route('register') }}" class="form-horizontal m-t-20">
                    @endisset
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-12">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        @php
                        @endphp
                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-end">{{ __('site.type') }}</label>
                            <div class="col-12">
                                <select class="form-control" name="type" id="">
                                    @foreach(App\Enum\GuardEnum::getList() as $key=>$value)
                                    <option value="{{$key}}">{{__('site.'.$value)}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group text-center row m-t-20">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection