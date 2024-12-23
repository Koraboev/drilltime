@extends('layout.main')
@section('title', $metaTitle ?? 'News')
@section('description', $metaDescription ?? 'Yangiliklar')
@section('content')

    @php
$lang=app()->getLocale();
 @endphp
    <div class="ak-height-50 ak-height-lg-40"></div>
    <div class="container">
        <div class="common-page-title">
            <h1 class="page-title">{{__('main.news')}}</h1>
            <div class="d-flex gap-2 align-items-center">
                <a href="{{route('home')}}">{{__('main.home')}}</a>
                <p> / {{__('main.news')}}</p>
            </div>
        </div>
        <div class="primary-color-border"></div>
    </div>
    <!-- End common page title  -->

    <!-- Start Blog -->
    <div class="ak-height-50 ak-height-lg-50"></div>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-1 row-cols-lg-3 g-5 g-lg-4 pagination-wrapper">
           @foreach($news as $new)
                <div class="col">
                    <div class="blog-card" data-aos="fade-up">
                        <a href="{{route('new.detail', [app()->getLocale(), $new->slug])}}">
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
        <div class="ak-height-100 ak-height-lg-60"></div>
        <div id="pagination-container" class="pagination-style light-theme">
            @if ($news->onFirstPage())
                <span class="current prev">«</span>
            @else
                <a href="{{ $news->previousPageUrl() }}" class="page-link prev">«</a>
            @endif

            @php
                $totalPages = $news->lastPage();
                $currentPage = $news->currentPage();
                $start = max(1, $currentPage - 2); // Boshlanish sahifasi
                $end = min($totalPages, $start + 4); // Tugash sahifasi
                if ($end - $start < 4) {
                    $start = max(1, $end - 4); // Tugatish sahifasidan 4 sahifani ko'rsatish
                }
            @endphp

            @for ($i = $start; $i <= $end; $i++)
                @if ($i == $currentPage)
                    <span class="current">{{ $i }}</span>
                @else
                    <a href="{{ $news->url($i) }}" class="page-link">{{ $i }}</a>
                @endif
            @endfor

            @if ($news->hasMorePages())
                <a href="{{ $news->nextPageUrl() }}" class="page-link next">»</a>
            @else
                <span class="current next">»</span>
            @endif
        </div>


    </div>


@endsection
