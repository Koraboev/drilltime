@extends('layout.main')
@section('title', $metaTitle ?? 'Delivery')
@section('description', $metaDescription ?? 'Yetkazib berish')
@section('content')

    @php
        $lang=app()->getLocale();
    @endphp


    <div class="ak-height-50 ak-height-lg-40"></div>
    <div class="container">
        <div class="d-md-flex justify-content-between align-items-center">
            <div class="common-page-title">
                <h1 class="page-title">{{__('main.Delivery')}}</h1>
                <div class="d-flex gap-2 align-items-center">
                    <a href="{{route('home')}}">{{__('main.home')}}</a>
                    <p>     / {{__('main.Delivery')}}</p>
                </div>
            </div>
        </div>
        <div class="primary-color-border"></div>
    </div>



    <!-- Start Faq -->
    <div class="ak-height-70 ak-height-lg-80"></div>
    <div class="container">
        <h4 class="faq-images-title" data-aos="fade-left">{{__('main.deliverAcrossUzbekistan')}}</h4>
        <div class="faq-images">
            <div class="faq" data-aos="fade-up">
                <div class="ak-accordion">
                   @foreach($deliveries as $delivery)

                        <div class="ak-accordion-item" data-aos="fade-up">

                            <div class="ak-accordion-title @if($delivery->id==$deliveries[0]->id) active @endif ">
                                <h6>{{$delivery->{'title_'.$lang} }}</h6>
                            </div>
                            <div class="ak-accordion-tab">
                                {!! $delivery->{'description_'.$lang} !!}
                            </div>
                        </div>
                   @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- End Faq -->

    <!-- Start Cta -->
    <div class="ak-height-125 ak-height-lg-80"></div>
    <div class="container">
        <div class="cta" data-aos="fade-right">
            <span class="border-pr"></span>
            <span class="border-wh"></span>
            <div class="cta-info">
                <h3 class="cta-title" data-aos="fade-left" data-aos-delay="100">{{__('main.getInTouchWithExperts')}}</h2>
                <div class="images-info">
                    <div class="d-flex align-items-center gap-3">
                        <div class="heartbeat-icon">
                            <a href="tel:{{$contact->phone1}}">
                                <span class="ak-heartbeat-btn"><img src="/assets/img/phone.svg" alt="..."></span>
                            </a>
                        </div>
                        <h5>{{$contact->phone1}}</h5>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <div class="heartbeat-icon">
                            <a href="emailto:{{$contact->email1}}">
                                <span class="ak-heartbeat-btn"><img src="/assets/img/email.svg" alt="..."></span>
                            </a>
                        </div>
                        <h5> {{$contact->email1}}</h5>
                    </div>
                </div>
                <a href="{{route('contact', $lang)}}" class="cta-btn mt-3 common-btn btn px-4 py-2 h-1.5 fs-16px font-montserrat">
                    <img src="/assets/img/phone.svg" alt="...">
                    <span class="ms-2">{{__('main.contact')}}</span>
                </a>
            </div>
        </div>
    </div>
    <!-- End Cta -->
@endsection
