@extends('layout.main')
@section('title', $metaTitle ?? 'Products')
@section('description', $metaDescription ?? 'Mahsulotlar')
@section('content')

    @php
        $lang=app()->getLocale();
    @endphp
    <div class="ak-height-50 ak-height-lg-40"></div>
    <div class="container">
        <div class="common-page-title">
            <h1 class="page-title">{{__('main.Products')}}</h1>
            <div class="d-flex gap-2 align-items-center">
                <a href="{{route('home')}}">{{__('main.home')}}</a>
                <p> / {{__('main.Products')}}</p>
            </div>
        </div>
        <div class="primary-color-border mb-5"></div>
    </div>


    <div class="container">
        <div class="row g-5">

            <div class="col-lg-4">
                <div class="card bg-dark ">
                    @php
                        $filteredCategories = $categories->filter(function ($category) {
                            return is_null($category->parent_id) && $category->children->isEmpty();
                        });
                    @endphp
                    <div class="card-header" id="headingCategories">
                        <h5 class="mb-0">
                            <button class="btn btn-link text-decoration-none category__menu__button ak-white-color" data-bs-toggle="collapse" data-bs-target="#collapseCategories"
                                    aria-expanded="true" aria-controls="collapseCategories">
                                {{__('main.Category')}}
                            </button>
                        </h5>
                    </div>

                    <div id="collapseCategories" class="collapse" aria-labelledby="headingCategories"
                         data-bs-parent="#accordion">
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach($filteredCategories as $category)
                                    <li class="list-group-item bg-dark">
                                        <a class="ak-white-color" href="{{route('category', [$lang, $category->{'slug_'.$lang}])}}">{{ $category->{'name_'.$lang} }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card bg-dark">
                    @php
                        $filterCategories = $categories->filter(function ($category) {
                            return is_null($category->parent_id) && $category->children->isNotEmpty();
                        });
                    @endphp

                    <div class="card-header" id="headingParentCategories">
                        <h5 class="mb-0">
                            @foreach($filterCategories as $category)
                                <div>
                                    <a class="btn btn-link text-decoration-none category__menu__button ak-white-color" href="#collapseCategory{{ $category->id }}"
                                       data-bs-toggle="collapse" aria-expanded="false"
                                       aria-controls="collapseCategory{{ $category->id }}">
                                        {{ $category->{'name_'.$lang} }}
                                    </a>
                                </div>

                                <div id="collapseCategory{{ $category->id }}" class="collapse">
                                    <ul class="list-group">
                                        @foreach($category->children as $child)
                                            <li class="list-group-item bg-dark">
                                                <a class="ak-white-color" href="{{route('category', [$lang, $child->{'slug_'.$lang}])}}">{{ $child->{'name_'.$lang} }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                        </h5>
                    </div>
                </div>
                <div class="card bg-dark">

                    <div class="card-header" id="headingTechnical">
                        <h5 class="mb-0">
                            <button class="btn btn-link text-decoration-none category__menu__button ak-white-color" data-bs-toggle="collapse" data-bs-target="#collapseTechnical"
                                    aria-expanded="true" aria-controls="collapseTechnical">
                                {{__('main.Technological')}}
                            </button>
                        </h5>
                    </div>

                    <div id="collapseTechnical" class="collapse" aria-labelledby="headingTechnical"
                         data-bs-parent="#accordion">
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach($technicals as $technical)
                                    <li class="list-group-item bg-dark">
                                        <a class="ak-white-color text-2xl" href="{{ route('category', [$lang, $technical->{'slug_'.$lang}]) }}">{{ $technical->{'name_'.$lang} }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

            <!-- O'ng tomonda mahsulotlar qismi -->
            <div class="col-lg-8">
                <div class="row row-cols-1 row-cols-md-3 row-cols-lg-3 g-4">
                    @foreach($products as $product)
                        <div class="col">
                            <div class="blog-card" data-aos="fade-up">
                                <a href="{{route('product', [$lang, $product->{'slug_'.$lang} ])}}">
                                    <div class="blog-header-info text-center">
                                        @if ($product->getFirstMedia('product-images'))
                                            <img src="{{ $product->getFirstMedia('product-images')->getUrl() }}"
                                                 alt="Banner Image" class="ak-hero-bg ak-bg object-cover"
                                                 style="width: 200px; height: 200px; object-fit: cover;">
                                        @else
                                            <p>Rasm mavjud emas.</p>
                                        @endif
                                    </div>
                                </a>
                                <div class="blog-body-info ps-1">
                                    <p class="blog-text">{{ $product->brand->{'name_'.$lang} }}</p>
                                    <div class="d-flex align-items-center">
{{--                                        <h6 class="me-2">{{ rtrim(rtrim(number_format($product->price, 2), '0'), '.') }} </h6>--}}
                                        <p class="mb-0">{{__('main.Sum')}}</p>
                                    </div>
                                    <a href="{{route('product', [$lang, $product->{'slug_'.$lang} ])}}"
                                       class="blog-title">{{ $product->{'name_'.$lang} }}</a>
                                </div>
                                <div class="blog-footer-info ps-0 text-center">
                                    <a href="{{route('product', [$lang, $product->{'slug_'.$lang} ])}}"
                                       class="btn btn-outline-danger full-width-btn">{{__('main.Buy')}}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="ak-height-100 ak-height-lg-60"></div>
        <div id="pagination-container" class="pagination-style light-theme">
            @if ($products->onFirstPage())
                <span class="current prev">«</span>
            @else
                <a href="{{ $products->previousPageUrl() }}" class="page-link prev">«</a>
            @endif

            @php
                $totalPages = $products->lastPage();
                $currentPage = $products->currentPage();
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
                    <a href="{{ $products->url($i) }}" class="page-link">{{ $i }}</a>
                @endif
            @endfor

            @if ($products->hasMorePages())
                <a href="{{ $products->nextPageUrl() }}" class="page-link next">»</a>
            @else
                <span class="current next">»</span>
            @endif
        </div>


    </div>

@endsection
