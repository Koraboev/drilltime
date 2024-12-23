@extends('layout.main')
@section('title', $metaTitle ?? 'Product')
@section('description', $metaDescription ?? 'Mahsulot')
@section('content')

    @php
        $lang=app()->getLocale();
    @endphp

    <style>
        table {
            width: 100% !important;
            border-collapse: collapse;
            overflow-x: auto !important;
            max-width: 100% !important;
            box-sizing: border-box;
        }

        th, td {
            padding: 8px;
            white-space: nowrap;
            color: #fff; /* Matn rangi oq */
            background-color: #333; /* Hujayra fon rangi */
            box-sizing: border-box;
        }

        .single-block {
            color: #fff;
            overflow: hidden; /* Matnni ko'rsatishda gorizontal skrollni bloklash */
        }

    </style>


    <div class="ak-height-50 ak-height-lg-40"></div>
    <div class="container">
        <div class="d-md-flex justify-content-between align-items-center">
            <div class="common-page-title">
                <h1 class="page-title">{{$product->{'name_'.$lang} }}</h1>
                <div class="d-flex gap-2 align-items-center">
                    <a href="{{route('home')}}">{{__('main.home')}}</a>
                    <p> / {{$product->{'name_'.$lang} }}</p>
                </div>
            </div>
        </div>
        <div class="primary-color-border"></div>
    </div>
    <!-- End common page title  -->




    <!-- Start Item Details -->
    <section class="item-details section mt-3 ">
        <div class="container">
            <div class="top-area">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-images">
                            <main id="gallery">
                                <div class="main-img">
                                    @if ($product->getFirstMedia('product-images'))
                                        <img id="main-image"
                                             src="{{ $product->getFirstMedia('product-images')->getUrl() }}"
                                             alt="Banner Image"
                                             class="ak-hero-bg ak-bg object-cover"
                                             style="width: 400px; height: auto; object-fit: cover;">
                                    @else
                                        <p>Rasm mavjud emas.</p>
                                    @endif
                                </div>
                                <div class="images mt-3 ">
                                    @foreach ($product->getMedia('product-images') as $media)
                                        <img src="{{ $media->getUrl() }}"
                                             class="thumbnail ak-hero-bg ak-bg object-cover    "
                                             style="width: 100px; height: auto; object-fit: cover; cursor: pointer;"
                                             alt="Product Image">
                                    @endforeach
                                </div>
                            </main>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-info">
{{--                            <h2 class="title">{{$product->{'name_'.$lang} }}</h2>--}}
                            <p class="category mt-2"><i class="lni lni-tag"></i> {{__('main.Brand')}}
                                : {{$product->brand->{'name_'.$lang} }}</p>
                            <h3 class="price mt-2">{{__('main.Sum')}}</h3>


                            <p class="mt-2 mb-5">{{__('main.order_call')}}
                                <br>
                                {{__('main.contact_soon')}}</p>
                            @if($contact->phone1)
                                <a href="tel:{{ $contact->phone1 }}">
                                    <div class="d-flex align-items-center gap-2">
                                        <svg width="52" height="52" viewBox="0 0 52 52" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <rect x="6" y="6" width="40" height="40" rx="20" fill="#FF3D24"/>
                                            <path
                                                d="M25.05 28.95L23.2 30.8C22.81 31.19 22.19 31.19 21.79 30.81C21.68 30.7 21.57 30.6 21.46 30.49C20.43 29.45 19.5 28.36 18.67 27.22C17.85 26.08 17.19 24.94 16.71 23.81C16.24 22.67 16 21.58 16 20.54C16 19.86 16.12 19.21 16.36 18.61C16.6 18 16.98 17.44 17.51 16.94C18.15 16.31 18.85 16 19.59 16C19.87 16 20.15 16.06 20.4 16.18C20.66 16.3 20.89 16.48 21.07 16.74L23.39 20.01C23.57 20.26 23.7 20.49 23.79 20.71C23.88 20.92 23.93 21.13 23.93 21.32C23.93 21.56 23.86 21.8 23.72 22.03C23.59 22.26 23.4 22.5 23.16 22.74L22.4 23.53C22.29 23.64 22.24 23.77 22.24 23.93C22.24 24.01 22.25 24.08 22.27 24.16C22.3 24.24 22.33 24.3 22.35 24.36C22.53 24.69 22.84 25.12 23.28 25.64C23.73 26.16 24.21 26.69 24.73 27.22C24.83 27.32 24.94 27.42 25.04 27.52C25.44 27.91 25.45 28.55 25.05 28.95Z"
                                                fill="white"/>
                                            <path
                                                d="M35.9696 32.33C35.9696 32.61 35.9196 32.9 35.8196 33.18C35.7896 33.26 35.7596 33.34 35.7196 33.42C35.5496 33.78 35.3296 34.12 35.0396 34.44C34.5496 34.98 34.0096 35.37 33.3996 35.62C33.3896 35.62 33.3796 35.63 33.3696 35.63C32.7796 35.87 32.1396 36 31.4496 36C30.4296 36 29.3396 35.76 28.1896 35.27C27.0396 34.78 25.8896 34.12 24.7496 33.29C24.3596 33 23.9696 32.71 23.5996 32.4L26.8696 29.13C27.1496 29.34 27.3996 29.5 27.6096 29.61C27.6596 29.63 27.7196 29.66 27.7896 29.69C27.8696 29.72 27.9496 29.73 28.0396 29.73C28.2096 29.73 28.3396 29.67 28.4496 29.56L29.2096 28.81C29.4596 28.56 29.6996 28.37 29.9296 28.25C30.1596 28.11 30.3896 28.04 30.6396 28.04C30.8296 28.04 31.0296 28.08 31.2496 28.17C31.4696 28.26 31.6996 28.39 31.9496 28.56L35.2596 30.91C35.5196 31.09 35.6996 31.3 35.8096 31.55C35.9096 31.8 35.9696 32.05 35.9696 32.33Z"
                                                fill="white"/>
                                        </svg>
                                        <p>{{ $contact->phone1 }}</p>
                                    </div>
                                </a>
                            @endif

                            <div class="mt-4">
                                <form action="{{route('form.submit', $lang)}}" method="POST">
                                    @csrf
                                    <label for="topic" class="form-label">{{__('main.phone')}}*</label>
                                    <input type="text" name="phone" class="form-control bg-dark mb-2" style="color: #fff" placeholder="{{__('main.phone')}}"
                                           aria-label="Raqam"/>
                                    <label for="msg" class="form-label">{{__('main.textarea')}}*</label>
                                    <textarea name="message" rows="5" class="form-control bg-dark" style="color: #fff"  ></textarea>
                                    <button type="submit" class="common-btn btn px-4 py-2 h-100 fs-16px font-montserrat mt-3">
                                        {{__('main.submit')}}
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="product-details-info mt-3">
                <div class="single-block table">
                    {!! $product->{'description_'.$lang} !!}
                </div>
            </div>
        </div>
    </section>
    <!-- End Item Details -->
    <div class="ak-height-50 ak-height-lg-50"></div>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center text-white mb-5">
            <h3 class="mb-0">{{ __('main.SimilarProducts') }}</h3>
        </div>

        <!-- Similar Products Section -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 row-cols-xl-5 row-cols-xxl-5 g-5 g-lg-4 pagination-wrapper">
            @foreach($products as $product)
                <div class="col">
                    <div class="blog-card" data-aos="fade-up">
                        <!-- Product Link -->
                        <a href="{{ route('product', [$lang, $product->{'slug_'.$lang} ]) }}">
                            <div class="blog-header-info text-center">
                                @if($product->getFirstMedia('product-images'))
                                    <img src="{{ $product->getFirstMedia('product-images')->getUrl() }}" alt="..."
                                         class="img-fluid" style="width: 200px; height: 200px; object-fit: cover;">
                                @endif
                            </div>
                        </a>

                        <!-- Product Body -->
                        <div class="blog-body-info ps-1">
                            <a href="{{ route('product', [$lang, $product->{'slug_'.$lang} ]) }}"
                               class="blog-title font-montserrat fw-light mb-2">
                                {{ $product->{'name_'.$lang} }}
                            </a>

                            <div class="d-flex align-items-center mb-1">
{{--                                <h6 class="me-2 font-montserrat fw-light">--}}
{{--                                    {{ rtrim(rtrim(number_format($product->price, 2), '0'), '.') }}--}}
{{--                                </h6>--}}
                                <p class="mb-0 font-montserrat">{{ __('main.Sum') }}</p>
                            </div>

                            <p class="blog-text font-montserrat">{{ $product->brand->{'name_'.$lang} }}</p>
                        </div>

                        <!-- Product Footer -->
                        <div class="blog-footer-info ps-0 text-center">
                            <a href="{{ route('product', [$lang, $product->{'slug_'.$lang} ]) }}"
                               class="btn btn-outline-danger full-width-btn font-montserrat">
                                {{ __('main.Buy') }}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="ak-height-100 ak-height-lg-60"></div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Barcha kichik rasmlarni olamiz
            const thumbnails = document.querySelectorAll('.thumbnail');
            const mainImage = document.getElementById('main-image');

            // Har bir kichik rasmga bosilganda asosiy rasmni yangilash uchun hodisa qo'shamiz
            thumbnails.forEach(thumbnail => {
                thumbnail.addEventListener('click', function () {
                    mainImage.src = this.src; // Kichik rasm manzilini asosiy rasmga yuklaydi
                });
            });
        });

    </script>
@endsection
