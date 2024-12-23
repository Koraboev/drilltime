@extends('layout.main')
@section('title', $metaTitle ?? 'New')
@section('description', $metaDescription ?? 'Yangilik')
@section('content')

    @php
        $lang=app()->getLocale();
    @endphp
        <!-- Start common page title  -->
    <div class="ak-height-50 ak-height-lg-40"></div>
    <div class="container">
        <div class="d-md-flex justify-content-between align-items-center">
            <div class="common-page-title">
                <h1 class="page-title">{{$new->title }}</h1>
                <div class="d-flex gap-2 align-items-center">
                    <a href="{{route('home')}}">{{__('main.home')}}</a> /
                    <a href="{{route('news', app()->getLocale())}}">{{__('main.news')}}</a>
                    <p>     / {{$new->title }}</p>
                </div>
            </div>
        </div>
        <div class="primary-color-border"></div>
    </div>
    <!-- End common page title  -->


    <!--Start blog content -->
    <div class="ak-height-75 ak-height-lg-80"></div>
    <div class="container container-customize">
        <div>
            <div class="time-title" data-aos="fade-up" data-aos-delay="600">
                <p class="time">{{ \Carbon\Carbon::parse($new->created_at)->format('d.m.Y') }}</p>
                <h4 class="title">{{$new->title }}</h4>
                <div class="ak-height-50 ak-height-lg-30"></div>
            </div>
            <div data-aos="fade-up" data-aos-delay="700">
                @if ($new->getFirstMedia('post-image'))
                    <img src="{{ $new->getFirstMedia('post-image')->getUrl() }}" alt="Post Image">
                @else
                    <p>Rasm mavjud emas.</p>
                @endif
                <div class="ak-height-50 ak-height-lg-30"></div>
            </div>

            <div data-aos="fade-up">
             {!! $new->description !!}
                <div class="ak-height-50 ak-height-lg-30">

                </div>
            </div>
        </div>
    </div>
    <!--End blog content -->


    <!-- Start Blog -->
    <div class="ak-height-125 ak-height-lg-80"></div>
    <div class="container">
        <div class="center-section-heading" data-aos="fade-up">
            <div class="ak-section-heading ak-style-1 ak-type-1">
                <div class="background-text">{{__('main.similarblog')}}</div>
                <h2 class="ak-section-title">{{__('main.similarblog')}}</h2>
            </div>
        </div>
        <div class="ak-height-50 ak-height-lg-50"></div>
        <div class="blog">
            @foreach($news as $new)
                <div class="col">
                    <div class="blog-card" data-aos="fade-up">
                        <a href="blog-single.html">
                            <div class="blog-header-info">
                                @if ($new->getFirstMedia('post-image'))
                                    <img src="{{ $new->getFirstMedia('post-image')->getUrl() }}" alt="Post Image">
                                @else
                                    <p>Rasm mavjud emas.</p>
                                @endif
                            </div>
                        </a>
                        <div class="blog-body-info">
                            <p class="blog-text">{{ \Carbon\Carbon::parse($new->created_at)->format('d.m.Y') }}</p>
                            <a href="{{route('new.detail', [app()->getLocale(), $new->slug])}}" class="blog-title">{{$new->title }}</a>
                        </div>
                        <div class="blog-footer-info">
                            <a href="{{route('new.detail', [app()->getLocale(), $new->slug])}}" class="more-btn">{{__('main.more')}}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
