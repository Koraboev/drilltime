@extends('layout.main')
@section('title', $metaTitle ?? 'About')
@section('description', $metaDescription ?? 'About Haqida O Nas')
@section('content')

    @php
        $lang=app()->getLocale();
    @endphp
    <div data-src="assets/img/about-page-title.jpg" class="ak-bg">
        <div class="ak-height-50 ak-height-lg-40"></div>
        <div class="container">
            <div class="common-page-title">
                <h1 class="page-title">{{__('main.About')}}</h1>
                <div class="d-flex gap-2 align-items-center">
                    <a href="{{route('home', $lang)}}">{{__('main.home')}}</a>
                    <p>/ {{__('main.About')}} </p>
                </div>
            </div>
            <div class="primary-color-border"></div>
        </div>
    </div>
    <!-- End common page title  -->

    <!-- Start Why Choose Us -->
    <div class="ak-height-125 ak-height-lg-80"></div>
    <section class="container">
        <div class="choose-us-container-extents">
            <div class="choose-us-contain">
                <div class="choose-us-info" data-aos="fade-up">
                    <div class="ak-section-heading ak-style-1">
                        <h2 class="mb-3">{{$about->{'title_'.$lang} }}</h2>
                        <p class="ak-section-subtitle">{!! $about->{'description_'.$lang} !!}</p>
                    </div>
                    <div class="ak-height-40 ak-height-lg-30"></div>
                    <a href="{{route('contact', app()->getLocale())}}" class="common-btn btn px-4 py-2 h-100 fs-32px font-montserrat">
                        {{__('main.contact')}}
                    </a>
                </div>
                <div class="choose-us-img" data-aos="fade-up" >
                    @if ($about->getFirstMedia('about-image'))
                        <img src="{{ $about->getFirstMedia('about-image')->getUrl() }}" alt="About Image">
                    @else
                        <p>Rasm mavjud emas.</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- End Why Choose Us -->

    <!-- Start Trusted Client -->
    <div class="ak-height-125 ak-height-lg-80"></div>
    <div class="container">
        <div class="ak-slider ak-trusted-client-slider">
            <h3 class="text-left">{{__('main.TrustedClient')}}</h3>
            <div class="swiper-wrapper m-5">
                @foreach($partners as $partner)
                    <div class="swiper-slide">
                        <div class="trusted-client mx-1">
                            @if($partner->getFirstMedia('partner-image'))
                                <img src="{{ $partner->getFirstMedia('partner-image')->getUrl() }}" alt=""
                                     style="width: 100% ; height: 100px; object-fit: contain; border-radius: 8px;">
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Trusted Client -->
@endsection
