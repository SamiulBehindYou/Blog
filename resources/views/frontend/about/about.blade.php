@extends('frontend.layout')
@section('main')

    <!--about-us-->
    <section class="about-us">
        <div class="container-fluid">
            <div class="about-us-area">
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <div class="image text-center">
                            <img src="{{ asset('uploads/about').'/'.$about->image }}" alt="">
                        </div>

                        <div class="description">
                            <h1>{{ $about->title }}</h1>
                            <div class="container">{!! $about->description !!}</div>

                            <a href="{{ route('contact') }}" class="btn-custom">Contact us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
