@extends('layout.main')
@section('title', $metaTitle ?? 'Home')
@section('description', $metaDescription ?? 'Asosiy')
@section('content')
    @php
 $lang=app()->getLocale();
$text1 = \App\Models\Text::find(1);
$text2 = \App\Models\Text::find(2);
$text3 = \App\Models\Text::find(3);
    @endphp

    <!-- Social Hero -->
    <div class="social-hero gap-0 social__hero_v"><!-- Progress... Loading... -->
        <a href="https://www.facebook.com/{{ $contact->facebook }}" target="_blank">
            <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M25.8614 36V25.0533H29.5343L30.0853 20.7859H25.8614V18.0618C25.8614 16.8266 26.2029 15.9849 27.9761 15.9849L30.234 15.984V12.1671C29.8435 12.1163 28.5032 12 26.9432 12C23.6857 12 21.4555 13.9884 21.4555 17.6391V20.7859H17.7715V25.0533H21.4555V36H25.8614Z"
                    fill="white" />
            </svg>
        </a>
        <a href="https://www.linkedin.com/{{ $contact->linkedin }}" target="_blank">
            <svg width="48" height="49" viewBox="0 0 48 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M18.1875 32.5974H13.8281V18.5818H18.1875V32.5974ZM15.9844 16.7068C14.625 16.7068 13.5 15.5349 13.5 14.1287C13.5 12.7693 14.625 11.6443 15.9844 11.6443C17.3906 11.6443 18.5156 12.7693 18.5156 14.1287C18.5156 15.5349 17.3906 16.7068 15.9844 16.7068ZM34.4531 32.5974H30.1406V25.8005C30.1406 24.1599 30.0938 22.0974 27.8438 22.0974C25.5938 22.0974 25.2656 23.8318 25.2656 25.6599V32.5974H20.9062V18.5818H25.0781V20.5037H25.125C25.7344 19.4255 27.1406 18.2537 29.25 18.2537C33.6562 18.2537 34.5 21.1599 34.5 24.9099V32.5974H34.4531Z"
                    fill="white" />
            </svg>
        </a>
        <a href="https://www.youtube.com/{{ $contact->youtube }}" target="_blank">

            <svg width="49" height="43" viewBox="0 0 49 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_167_6148)">
                    <path
                        d="M35.7602 16.9076C35.7602 16.9076 35.5254 15.2531 34.8039 14.5264C33.8897 13.5701 32.8682 13.5656 32.3994 13.5094C29.0432 13.2656 24.0039 13.2656 24.0039 13.2656H23.9949C23.9949 13.2656 18.9557 13.2656 15.5994 13.5094C15.1307 13.5656 14.1092 13.5701 13.1949 14.5264C12.4727 15.2531 12.2432 16.9076 12.2432 16.9076C12.2432 16.9076 12.0039 18.8486 12.0039 20.7934V22.6121C12.0039 24.5524 12.2432 26.4979 12.2432 26.4979C12.2432 26.4979 12.4779 28.1524 13.1949 28.8791C14.1092 29.8354 15.3092 29.8024 15.8432 29.9059C17.7654 30.0889 24.0039 30.1451 24.0039 30.1451C24.0039 30.1451 29.0477 30.1361 32.4039 29.8969C32.8727 29.8406 33.8949 29.8361 34.8084 28.8799C35.5299 28.1531 35.7647 26.4986 35.7647 26.4986C35.7647 26.4986 36.0039 24.5584 36.0039 22.6129V20.7941C35.9994 18.8531 35.7602 16.9084 35.7602 16.9084V16.9076ZM21.5199 24.8201V18.0746L28.0029 21.4594L21.5199 24.8201Z"
                        fill="white" />
                </g>
                <defs>
                    <clipPath id="clip0_167_6148">
                        <rect width="25" height="18" fill="white" transform="translate(12 12.5977)" />
                    </clipPath>
                </defs>
            </svg>
        </a>
        <a href="https://www.instagram.com/{{ $contact->instagram }}" target="_blank">
            <svg width="49" height="50" viewBox="0 0 49 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_167_6149)">
                    <path
                        d="M24.4297 15.6031C27.6337 15.6031 28.0129 15.6151 29.2789 15.6727C30.4489 15.7267 31.0837 15.9223 31.5073 16.0867C32.0293 16.2787 32.5009 16.5847 32.8885 16.9843C33.2869 17.3719 33.5941 17.8435 33.7861 18.3655C33.9505 18.7879 34.1461 19.4239 34.2001 20.5939C34.2565 21.8599 34.2697 22.2379 34.2697 25.4419C34.2697 28.6471 34.2577 29.0263 34.2001 30.2923C34.1461 31.4623 33.9505 32.0971 33.7861 32.5207C33.5864 33.038 33.2807 33.5079 32.8887 33.9001C32.4966 34.2923 32.0269 34.5983 31.5097 34.7983C31.0873 34.9627 30.4525 35.1583 29.2825 35.2111C28.0165 35.2687 27.6373 35.2807 24.4333 35.2807C21.2293 35.2807 20.8489 35.2687 19.5841 35.2111C18.4141 35.1571 17.7781 34.9627 17.3557 34.7983C16.8338 34.6058 16.3618 34.2987 15.9745 33.8995C15.5754 33.5125 15.2683 33.0409 15.0757 32.5195C14.9113 32.0959 14.7157 31.4599 14.6629 30.2899C14.6053 29.0251 14.5933 28.6459 14.5933 25.4419C14.5933 22.2367 14.6053 21.8575 14.6629 20.5915C14.7169 19.4215 14.9113 18.7867 15.0757 18.3631C15.2677 17.8423 15.5749 17.3695 15.9745 16.9831C16.3615 16.584 16.833 16.2768 17.3545 16.0843C17.7781 15.9199 18.4141 15.7243 19.5841 15.6715C20.8489 15.6139 21.2281 15.6007 24.4321 15.6007L24.4297 15.6031ZM24.4321 13.4395C21.1729 13.4395 20.7637 13.4527 19.4833 13.5115C18.2041 13.5703 17.3317 13.7755 16.5697 14.0707C15.7687 14.3723 15.0431 14.8449 14.4433 15.4555C13.8332 16.0554 13.361 16.781 13.0597 17.5819C12.7633 18.3439 12.5605 19.2175 12.5017 20.4943C12.4441 21.7711 12.4297 22.1815 12.4297 25.4407C12.4297 28.6999 12.4441 29.1091 12.5017 30.3883C12.5617 31.6687 12.7633 32.5387 13.0597 33.3007C13.3611 34.1011 13.8333 34.8263 14.4433 35.4259C15.0433 36.0379 15.7693 36.5095 16.5697 36.8107C17.3317 37.1071 18.2053 37.3099 19.4833 37.3687C20.7601 37.4263 21.1717 37.4407 24.4309 37.4407C27.6901 37.4407 28.0981 37.4275 29.3785 37.3687C30.6577 37.3099 31.5265 37.1071 32.2897 36.8107C33.0871 36.5025 33.8112 36.0311 34.4157 35.4266C35.0201 34.8222 35.4915 34.098 35.7997 33.3007C36.0961 32.5387 36.2989 31.6651 36.3577 30.3883C36.4153 29.1103 36.4297 28.6987 36.4297 25.4407C36.4297 22.1815 36.4153 21.7723 36.3577 20.4919C36.2977 19.2127 36.0961 18.3439 35.7997 17.5819C35.4986 16.7809 35.0264 16.0552 34.4161 15.4555C33.8163 14.8449 33.0907 14.3723 32.2897 14.0707C31.5277 13.7743 30.6541 13.5715 29.3761 13.5139C28.0993 13.4551 27.6889 13.4419 24.4297 13.4419L24.4321 13.4395Z"
                        fill="white" />
                    <path
                        d="M24.4315 19.2793C22.7973 19.2793 21.2299 19.9285 20.0743 21.0841C18.9187 22.2397 18.2695 23.807 18.2695 25.4413C18.2695 27.0756 18.9187 28.6429 20.0743 29.7985C21.2299 30.9541 22.7973 31.6033 24.4315 31.6033C26.0658 31.6033 27.6331 30.9541 28.7887 29.7985C29.9443 28.6429 30.5935 27.0756 30.5935 25.4413C30.5935 23.807 29.9443 22.2397 28.7887 21.0841C27.6331 19.9285 26.0658 19.2793 24.4315 19.2793ZM24.4315 29.4433C23.3701 29.4433 22.3522 29.0217 21.6017 28.2711C20.8512 27.5206 20.4295 26.5027 20.4295 25.4413C20.4295 24.3799 20.8512 23.362 21.6017 22.6115C22.3522 21.8609 23.3701 21.4393 24.4315 21.4393C25.4929 21.4393 26.5109 21.8609 27.2614 22.6115C28.0119 23.362 28.4335 24.3799 28.4335 25.4413C28.4335 26.5027 28.0119 27.5206 27.2614 28.2711C26.5109 29.0217 25.4929 29.4433 24.4315 29.4433ZM30.8371 20.4757C31.219 20.4757 31.5853 20.324 31.8554 20.0539C32.1254 19.7839 32.2771 19.4176 32.2771 19.0357C32.2771 18.6538 32.1254 18.2875 31.8554 18.0175C31.5853 17.7474 31.219 17.5957 30.8371 17.5957C30.4552 17.5957 30.089 17.7474 29.8189 18.0175C29.5488 18.2875 29.3971 18.6538 29.3971 19.0357C29.3971 19.4176 29.5488 19.7839 29.8189 20.0539C30.089 20.324 30.4552 20.4757 30.8371 20.4757Z"
                        fill="white" />
                </g>
                <defs>
                    <clipPath id="clip0_167_6149">
                        <rect width="25" height="25" fill="white" transform="translate(12 12.5977)" />
                    </clipPath>
                </defs>
            </svg>
        </a>
        <a href="https://t.me/{{ $contact->telegram }}" target="_blank">
            <svg width="24" viewBox="0 0 24 24" fill="#fff" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M23.1117 4.49449C23.4296 2.94472 21.9074 1.65683 20.4317 2.227L2.3425 9.21601C0.694517 9.85273 0.621087 12.1572 2.22518 12.8975L6.1645 14.7157L8.03849 21.2746C8.13583 21.6153 8.40618 21.8791 8.74917 21.968C9.09216 22.0568 9.45658 21.9576 9.70712 21.707L12.5938 18.8203L16.6375 21.8531C17.8113 22.7334 19.5019 22.0922 19.7967 20.6549L23.1117 4.49449ZM3.0633 11.0816L21.1525 4.0926L17.8375 20.2531L13.1 16.6999C12.7019 16.4013 12.1448 16.4409 11.7929 16.7928L10.5565 18.0292L10.928 15.9861L18.2071 8.70703C18.5614 8.35278 18.5988 7.79106 18.2947 7.39293C17.9906 6.99479 17.4389 6.88312 17.0039 7.13168L6.95124 12.876L3.0633 11.0816ZM8.17695 14.4791L8.78333 16.6015L9.01614 15.321C9.05253 15.1209 9.14908 14.9366 9.29291 14.7928L11.5128 12.573L8.17695 14.4791Z"
                    fill="#fff" />
            </svg>
        </a>
    </div>
    <!-- End Social -->
    <!-- Start Hero -->
    <section class="container mt-4">
        <div class="row h-auto">
            <div class="col px-0 px-lg-3 home__slider_h">
                <div class="bg-brand-2 rounded-4 ps-4 h-100 d-flex flex-column justify-content-evenly">
                    <h5 class="pt-3 font-p">{{ __('main.Category') }}</h5>
                    @foreach ($categories->whereNull('parent_id') as $category)
                        <p class="pb-2 pt-3 font-p d-flex align-items-center">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="12" fill="#B9B9B9" />
                            </svg>
                            <a class="ps-2 font-mulish" href="{{ route('category', [$lang, $category->{'slug_'.$lang}]) }}">{{ $category->{'name_' . app()->getLocale()} }}</a>
                        </p>
                    @endforeach
                    <span class="mb-1"></span>
                </div>
            </div>
            <section class="ak-slider ak-slider-hero-1 p-0 rounded-4 w-lg-75 mt-3 mt-lg-0">
                <div class="swiper-wrapper">
                    @foreach ($banners as $banner)
                        <div class="swiper-slide">
                            <div class="ak-hero ak-style1 slide-inner home__slider_h h-100">
                                @if ($banner->getFirstMedia('banner-image'))
                                    <img src="{{ $banner->getFirstMedia('banner-image')->getUrl() }}" alt="Banner Image"
                                        class="ak-hero-bg ak-bg object-cover">
                                @else
                                    <p>Rasm mavjud emas.</p>
                                @endif
                                <div class="hero-slider-info align-items-start  d-flex align-items-center mt-md-5 pt-sm-5 max-w-none w-100 w-md-75" >
                                    <div class="slider-info pt-4 ps-4">
                                        <div class="hero-title font-montserrat p-2"  style="background-color: rgba(255, 255, 255, 0.07); border-radius: 10px" >
                                            <h1 class="hero-main-title fs-5 fs-md-3 ak-line-height-2" data-swiper-parallax="300" >
                                                {{ $banner->{'title_' . $lang} }}
                                            </h1>
                                            <p class="mini-title mt-3 text-alfa" data-swiper-parallax="400" >
                                                {!! $banner->{'description_' . $lang} !!}
                                            </p>
                                        </div>
                                        <div class="pt-4" data-swiper-parallax="300">
                                            <a href="{{ route('about', $lang) }}"
                                                class="common-btn btn px-4 py-2 font-monospace fw-lighter fs-16px">
                                                {{ __('main.About') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="container d-none d-md-block">
                    <div class="hero-contact-info top-0 pt-0 pt-md-4 w-100 gap-2 px-4 justify-content-around">
                        <a href="mailto:{{ $contact->email1 }}">
                            <div class="d-flex align-items-center gap-2">
                                <svg width="48" height="48" viewBox="0 0 48 48" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect x="6" y="6" width="36" height="36" rx="18" fill="#FF3D24" />
                                    <path
                                        d="M28.166 16.9167H19.8327C17.3327 16.9167 15.666 18.1667 15.666 21.0834V26.9167C15.666 29.8334 17.3327 31.0834 19.8327 31.0834H28.166C30.666 31.0834 32.3327 29.8334 32.3327 26.9167V21.0834C32.3327 18.1667 30.666 16.9167 28.166 16.9167ZM28.5577 21.9917L25.9493 24.0751C25.3993 24.5167 24.6993 24.7334 23.9993 24.7334C23.2993 24.7334 22.591 24.5167 22.0493 24.0751L19.441 21.9917C19.1743 21.7751 19.1327 21.3751 19.341 21.1084C19.5577 20.8417 19.9493 20.7917 20.216 21.0084L22.8243 23.0917C23.4577 23.6001 24.5327 23.6001 25.166 23.0917L27.7743 21.0084C28.041 20.7917 28.441 20.8334 28.6493 21.1084C28.866 21.3751 28.8243 21.7751 28.5577 21.9917Z"
                                        fill="white" />
                                </svg>
                                <p class="ak-font-14 ak-white-color font-p">
                                    {{ $contact->email1 }}
                                </p>
                            </div>
                        </a>
                        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($contact->address) }}">
                            <div class="d-flex align-items-center gap-2">
                                <svg width="48" height="48" viewBox="0 0 48 48" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect x="6" y="6" width="36" height="36" rx="18" fill="#FF3D24" />
                                    <path
                                        d="M31.1829 21.0416C30.3079 17.1916 26.9496 15.4583 23.9996 15.4583C23.9996 15.4583 23.9996 15.4583 23.9913 15.4583C21.0496 15.4583 17.6829 17.1833 16.8079 21.0333C15.8329 25.3333 18.4663 28.9749 20.8496 31.2666C21.7329 32.1166 22.8663 32.5416 23.9996 32.5416C25.1329 32.5416 26.2663 32.1166 27.1413 31.2666C29.5246 28.9749 32.1579 25.3416 31.1829 21.0416ZM23.9996 25.2166C22.5496 25.2166 21.3746 24.0416 21.3746 22.5916C21.3746 21.1416 22.5496 19.9666 23.9996 19.9666C25.4496 19.9666 26.6246 21.1416 26.6246 22.5916C26.6246 24.0416 25.4496 25.2166 23.9996 25.2166Z"
                                        fill="white" />
                                </svg>
                                <p class="ak-font-14 ak-white-color font-p">{{ $contact->address }}
                                </p>
                            </div>
                        </a>
                        <div class="d-flex align-items-center gap-2">
                            <svg width="48" height="48" viewBox="0 0 48 48" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="6" y="6" width="36" height="36" rx="18" fill="#FF3D24" />
                                <path
                                    d="M23.9993 15.6667C19.4077 15.6667 15.666 19.4084 15.666 24.0001C15.666 28.5917 19.4077 32.3334 23.9993 32.3334C28.591 32.3334 32.3327 28.5917 32.3327 24.0001C32.3327 19.4084 28.591 15.6667 23.9993 15.6667ZM27.6243 26.9751C27.5077 27.1751 27.2993 27.2834 27.0827 27.2834C26.9743 27.2834 26.866 27.2584 26.766 27.1917L24.1827 25.6501C23.541 25.2667 23.066 24.4251 23.066 23.6834V20.2667C23.066 19.9251 23.3493 19.6417 23.691 19.6417C24.0327 19.6417 24.316 19.9251 24.316 20.2667V23.6834C24.316 23.9834 24.566 24.4251 24.8243 24.5751L27.4077 26.1167C27.7077 26.2917 27.8077 26.6751 27.6243 26.9751Z"
                                    fill="white" />
                            </svg>
                            <p class="ak-font-14 ak-white-color font-p">{{ $contact->work_time }}</p>
                        </div>
                    </div>
                </div>
                <div class="hero-pagination">
                    <div class="hero-swiper-pagination"></div>
                </div>
            </section>
        </div>
    </section>

    <!-- Start Service Progress -->
    <div class="ak-height-125 ak-height-lg-80"></div>
    <section class="container mb-5">
        <h3 class="mb-4 font-montserrat text-center text-sm-start">{{ __('main.why_choose_us') }}</h3>
        <div class="row row-cols-1 row-cols-xl-3 g-4">
            @foreach ($advantages as $advantage)
                <div class="service-progress-card style-three" data-aos="fade-up">
                    <div class="service-item d-flex d-sm-block align-items-center pe-0 pe-sm-5">
                        <div class="heartbeat-icon">
                            @if ($advantage->getFirstMedia('advantage-image'))
                                <span class="ak-heartbeat-btn"><img
                                        src="{{ $advantage->getFirstMedia('advantage-image')->getUrl() }}"
                                        alt="..." /></span>
                            @else
                                <span class="ak-heartbeat-btn"><img src="assets/img/speedome.svg"
                                        alt="..." /></span>
                            @endif

                        </div>
                        <div class="service-info text-center text-sm-start">
                            <h6 class="title position-relative font-montserrat vl">{{ $advantage->{'title_' . $lang} }}
                            </h6>
                            <p class="font-mulish text-alfa">
                                {!! $advantage->{'description_' . $lang} !!}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </section>

    {{--    start products pump --}}
    <div class="ak-height-50 ak-height-lg-50"></div>
    <div class="container">
        <div class="row justify-content-center justify-content-sm-between align-items-center text-white mb-5">
            <h3 class="w-auto mb-0 font-montserrat">{{ __('main.all_types_of_drilling_pumps') }}</h3>
            <a class="btn btn-outline-light font-mulish px-4 py-2 text-decoration-none"
               href="{{ route('products', $lang) }}"
               style="color: #cdcdcd; border-color: #cdcdcd; width: 200px; transition: all 0.3s ease;"
               onmouseover="this.style.color='#fff'; this.style.backgroundColor='#cdcdcd';"
               onmouseout="this.style.color='#cdcdcd'; this.style.backgroundColor='transparent';">
                {{ __('main.view_all') }}
            </a>

        </div>
        <div
            class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 g-5 g-lg-4 pagination-wrapper m-0 products-row">
            @php
                $parentCategories = $categories->whereNull('parent_id');
            @endphp

            @if ($parentCategories)
                @foreach ($parentCategories as $lastParentCategory)
                    @if ($lastParentCategory->children)
                        @foreach ($lastParentCategory->children->take(5) as $category)
                            <div class="col p-0">
                                <div class="blog-card align-items-center flex-column" data-aos="fade-up">
                                    <a href="{{ route('category', [$lang, $category->{'slug_' . $lang}]) }}">
                                        <div class="blog-header-info text-center">
                                            @if ($category->getFirstMedia('category-image'))
                                                <img src="{{ $category->getFirstMedia('category-image')->getUrl() }}"
                                                    alt="..."
                                                    style="width: 100%; height: 200px; object-fit: cover; ">
                                            @endif
                                        </div>
                                    </a>
                                    <div class="blog-body-info ps-1 text-center">
                                        {{--                                <p class="blog-text">{{ $category->name }}</p> --}}
                                        <a href="{{ route('category', [$lang, $category->{'slug_' . $lang}]) }}"
                                            class="blog-title font-montserrat fw-light">{{ $category->{'name_' . app()->getLocale()} }}</a>
                                    </div>
                                    <div class="blog-footer-info ps-0 text-center">
                                        <a href="{{ route('category', [$lang, $category->{'slug_' . $lang}]) }}"
                                            class="btn btn-outline-danger full-width-btn font-montserrat fs-16px btn-w">{{ __('main.more') }}</a>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                @endforeach
            @endif


        </div>
        <div class="ak-height-100 ak-height-lg-60"></div>
    </div>

    <div class="ak-height-50 ak-height-lg-50"></div>
    <div class="container">
        <div class="row justify-content-center justify-content-sm-between align-items-center text-white mb-5">
            <h3 class="w-auto mb-0 font-montserrat fw-bold">{{ __('main.recommendation') }}</h3>
            <a class="btn btn-outline-light font-mulish px-4 py-2 text-decoration-none"
               href="{{ route('products', $lang) }}"
               style="color: #cdcdcd; border-color: #cdcdcd; width: 200px; transition: all 0.3s ease;"
               onmouseover="this.style.color='#fff'; this.style.backgroundColor='#cdcdcd';"
               onmouseout="this.style.color='#cdcdcd'; this.style.backgroundColor='transparent';">
                {{ __('main.view_all') }}
            </a>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 row-cols-xxl-6 g-5 g-lg-4 m-0 products-row">
            @foreach ($products as $product)
                <div class="col p-0">
                    <div class="blog-card blog-card align-items-center flex-column" data-aos="fade-up">
                        <a href="{{ route('product', [$lang, $product->{'slug_' . $lang}]) }}">
                            <div class="blog-header-info text-center">
                                @if ($product->getFirstMedia('product-images'))
                                    <img src="{{ $product->getFirstMedia('product-images')->getUrl() }}"
                                        alt="Banner Image" class="ak-hero-bg ak-bg object-cover"
                                        style="width: 200px; height: 200px; object-fit: cover; ">
                                @else
                                    <p>Rasm mavjud emas.</p>
                                @endif

                            </div>
                        </a>
                        <div class="blog-body-info ps-1">
                            <p class="blog-text font-montserrat">{{ $product->brand->{'name_' . $lang} }}</p>
                            <div class="d-flex align-items-center">
{{--                                <h6 class="me-2 font-montserrat fw-light">--}}
{{--                                    {{ rtrim(rtrim(number_format($product->price, 2), '0'), '.') }}</h6>--}}
                                <p class="mb-0 font-montserrat">{{ __('main.Sum') }}</p>
                            </div>
                            <a href="{{ route('product', [$lang, $product->{'slug_' . $lang}]) }}"
                                class="blog-title font-montserrat fw-light">{{ $product->{'name_' . $lang} }}</a>
                        </div>
                        <div class="blog-footer-info ps-0 text-center ">
                            <a href="{{ route('product', [$lang, $product->{'slug_' . $lang}]) }}"
                                class=" btn  btn-outline-danger full-width-btn font-montserrat btn-w">{{ __('main.Buy') }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="ak-height-100 ak-height-lg-60"></div>
        <div class="pagination-style"></div>
    </div>

    <!-- Start Fun Fact Counter -->
    <hr>
    @if($text1)
        <div class="container">
            {!! $text1->{'text_'.$lang} !!}
        </div>
    @endif
    <div class="ak-height-60 ak-height-lg-80"></div>
    <div class="container auto-counter-section">
        <div class="row align-items-center gap-lg-0 gap-3" id="counter">
            @foreach ($experiences as $experience)
                <div class="col-sm col-lg-4">
                    <div class="ak-funfact ak-style1 d-flex d-md-block align-items-center" data-aos="fade-up">
                        <div class="ak-funfact-number d-flex d-md-block align-items-center">
                            <div><span class="font-montserrat fs-1 fw-semibold"
                                    style="color: var(--number-color)">{{ $experience->{'title_' . $lang} }}</span></div>
                        </div>
                        <div class="ak-funfact-text statistic_text text-center">
                            <p>{!! $experience->{'description_' . $lang} !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- End Fun Fact Counter -->

    <section class="ak-slider ak-slider-hero-2 swiper">
        <h3 class="container mt-10 font-montserrat">{{ __('main.Diller') }}</h3>
        <div class="swiper-wrapper">
            @foreach ($dillers as $diller)
                <div class="swiper-slide">
                    <div class="container card my-5 mb-3" style="max-width: 1113px; background-color: #1E1E1E">
                        <div class="row g-0 h-100" style="background-color: #1E1E1E">
                            <div class="col-md-4 ">
                                @if ($diller->getFirstMedia('diler-image'))
                                    <img src="{{ $diller->getFirstMedia('diler-image')->getUrl() }}" alt=""
                                        class="img-fluid rounded-start" >
                                @endif
                            </div>
                            <div class="col-md-8 d-flex align-items-center ">
                                <div class="card-body mx-5 px-md-4 font-montserrat trusted__client_content">
                                    <h5 class="card-title fw-500">{{ $diller->{'title_' . $lang} }}</h5>
                                    {!! $diller->{'description_' . $lang} !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="swiper-pagination mt-3 position-relative bottom-0"></div>
    </section>
    @if($text2)
        <div class="container">
            {!! $text2->{'text_'.$lang} !!}
        </div>
    @endif

    <div class="ak-height-125 ak-height-lg-80"></div>
    <div class="container">
        <div class="ak-slider ak-trusted-client-slider">
            <h3 class="text-left font-montserrat">{{ __('main.TrustedClient') }}</h3>
            <div class="swiper-wrapper m-5">
                @foreach ($partners as $partner)
                    <div class="swiper-slide">
                        <div class="trusted-client mx-1">
                            @if ($partner->getFirstMedia('partner-image'))
                                <img src="{{ $partner->getFirstMedia('partner-image')->getUrl() }}" alt=""
                                    style="width: 100% ; height: 100px; object-fit: contain; border-radius: 8px;">
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @if($text3)
        <div class="container">
            {!! $text3->{'text_'.$lang} !!}
        </div>
    @endif
@endsection
