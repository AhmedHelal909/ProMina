@extends('layouts.app')

@section('content')
<div class="btn-group m-b-10">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{__('site.choose_lang')}}</button>
    <div class="dropdown-menu">
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" hreflang="{{ $localeCode }}">{{ $properties['native'] }}</a>
        @endforeach
       
    </div>
</div>
<div class="wrapper">

    <section class="height-100vh d-flex align-items-center page-section-ptb login"
             style="background-image: url('{{ asset('assets/images/sativa.png')}}');">
        <div class="container">
            <div class="row justify-content-center no-gutters vertical-align align-items-center">

                <div style="border-radius: 15px;" class="col-lg-8 col-md-8 bg-white">
                    <div class="login-fancy pb-40 clearfix">
                        <h3 style="font-family: 'Cairo', sans-serif; text-align:center;" class="mb-30">{{__('site.choose_login')}}</h3>
                        <div class="form-inline">
                            <a class="btn btn-default col-lg-3" title="{{__('site.web')}}" href="{{route('login')}}">
                                <img alt="user-img" width="100px;" src="{{URL::asset('uploads/globals/company.png')}}">
                            </a>
                            <a class="btn btn-default col-lg-3" title="{{__('site.vendor')}}" href="{{route('vendor.login-view')}}">
                                <img alt="user-img" width="100px;" src="{{URL::asset('uploads/globals/vendor.png')}}">
                            </a>
                            <a class="btn btn-default col-lg-3" title="{{__('site.delivery')}}" href="{{route('delivery.login-view')}}">
                                <img alt="user-img" width="100px;" src="{{URL::asset('uploads/globals/delivery.png')}}">
                            </a>
                        </div>
                        <h4 style="text-align:center"><a href="{{route('register')}}">{{__('site.Register')}}</a></h4>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=================================
login-->

</div>
@endsection
