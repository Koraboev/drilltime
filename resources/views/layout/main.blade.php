@php
    $menus = \App\Models\Menu::all();
    $lang = app()->getLocale();
    $categories = \App\Models\ShopCategory::all();
    $language = \App\Models\Language::where('short_name', $lang)->first();
    if (!$language) {
        $language = \App\Models\Language::where('short_name', 'ru')->first();
    }
    $contact = \App\Models\Contact::where('language_id', $language->id)
        ->latest()
        ->first();
@endphp



<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="DrillTime" />
    <!-- Favicon Icon -->
    <link rel="icon" href="/assets/img/logo/logo-h.png">
    <title>@yield('title')</title>
    <meta name="google-site-verification" content="mLsmsTNUMyp30WRg71RZKGo6bWFSiznC3pQqBkecjRY" />
    <meta name="description" content="@yield('description')" />
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:url" content="{{ url()->current() }}">
    <link rel="stylesheet" href="/assets/css/plugins/lightgallery.min.css" />
    <link rel="stylesheet" href="/assets/css/plugins/swiper.min.css" />
    <link rel="stylesheet" href="/assets/css/plugins/aos.css" />
    <link rel="stylesheet" href="/assets/css/plugins/bootstrap.min.css" />
    <link rel="stylesheet" href="/assets/css/style.css?v=2" />
</head>

<body><!-- overflow-x: hidden olib dandi -->
    <!-- Start Header -->
    <header class="container py-0 py-md-2  my-0 my-sm-2 px-3">
        <nav class="row align-items-center justify-content-between">
            <div class="col-12 col-sm-5 d-flex align-items-center justify-content-between">
                <a class="ak-site_branding fs-3 fw-bolder header__logo col-6 col-sm-12 col-md-8 col-lg-6"
                    href="{{ route('home', $lang) }}" style="font-family: sans-serif">
                    <img style="max-height: 100%!important;" src="{{ asset('assets/img/logo/logo1.png') }}"
                        alt="drilltime logo">
                </a>
                <div class="col col-sm-1 col-lg-3 d-flex align-items-center justify-content-end">
                    <div class="dropdown d-inline ms-3 ms-md-4 ms-lg-5 w-auto me-5 me-sm-0">
                        <button class="btn text-white dropdown-toggle border-0 p-0 ms-3" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ strtoupper(session('lang', 'ru')) }}
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('/ru') }}">Русский</a></li>
                            <li><a class="dropdown-item" href="{{ url('/uz') }}">O'zbekcha</a></li>
                            <li><a class="dropdown-item" href="{{ url('/en') }}">English</a></li>

                        </ul>
                    </div>
                    <div class="ak-nav ak-medium col-1 d-sm-none" style="z-index: 1">
                        <ul class="ak-nav_list">
                            @foreach ($menus as $menu)
                                <li class="menu-item-has-children">
                                    <a href="{{ route($menu->slug, app()->getLocale()) }}"
                                        class="text-hover-animation font-montserrat fw-normal">
                                        {!! $menu->{'name_' . $lang} !!}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="header__search col-8 col-sm-4">
                <div class="input-group">
                    <input type="text" id="search-input"
                        class="form-control bg-brand-2 border-brand-color text-white" placeholder="Search..."
                        aria-label="Search..." aria-describedby="button-addon2">
                    <button
                        class="btn btn-outline-secondary border-brand-color bg-brand-2 d-flex align-items-center py-2"
                        type="button" id="button-addon2">
                        <svg class="address__svg" width="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_167_6100)">
                                <path
                                    d="M13.9395 1.93115C8.98074 1.93115 4.94141 5.97047 4.94141 10.9292C4.94141 15.8879 8.98074 19.9351 13.9395 19.9351C16.0575 19.9351 18.0054 19.1929 19.5449 17.9605L23.293 21.7065C23.4821 21.8879 23.7347 21.9879 23.9967 21.9852C24.2587 21.9825 24.5093 21.8774 24.6947 21.6922C24.8801 21.5071 24.9856 21.2568 24.9886 20.9948C24.9917 20.7328 24.892 20.48 24.7109 20.2906L20.9629 16.5426C22.1963 15.0007 22.9395 13.0497 22.9395 10.9292C22.9395 5.97047 18.8982 1.93115 13.9395 1.93115ZM13.9395 3.93118C17.8173 3.93118 20.9375 7.05138 20.9375 10.9292C20.9375 14.807 17.8173 17.9351 13.9395 17.9351C10.0616 17.9351 6.94141 14.807 6.94141 10.9292C6.94141 7.05138 10.0616 3.93118 13.9395 3.93118Z"
                                    fill="#A6A6A6" />
                            </g>
                            <defs>
                                <clipPath id="clip0_167_6100">
                                    <rect width="24" height="24" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                    </button>
                </div>
                <div id="search-results" class="dropdown-menu" style="display: none;"></div>
            </div>
            <div class="col col-sm-3 col-md-2 h-100 ms-0 ms-lg-1 ms-xl-2 ms-xxl-5 ps-0 ps-lg-2">
                <a href="{{ route('contact', $lang) }}"
                    class="common-btn btn px-4 py-2 h-100 fs-16px font-montserrat w-100 w-sm-auto header__contact__btn">{{ __('main.contact') }}</a>
            </div>
        </nav>
    </header>
    <hr>
    <!-- End Header -->
    <!-- Start Header Section -->
    <header class="ak-site_header ak-style1 ak-sticky_header position-sticky top-0 d-none d-sm-block"
        style="background: none;">
        <!-- css da 2279-qatorda important olib tashlandi -->
        <div class="ak-main_header">
            <div class="container">
                <div class="ak-main_header_in">
                    <div class="ak-main-header-center">
                        <div class="ak-nav ak-medium">
                            <ul class="ak-nav_list">
                                @foreach ($menus as $menu)
                                    <li class="menu-item-has-children">
                                        <a href="{{ route($menu->slug, app()->getLocale()) }}"
                                            class="text-hover-animation font-montserrat fw-normal">
                                            {!! $menu->{'name_' . $lang} !!}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="ak-main-header-right">
                        @if ($contact->phone1)
                            <a href="tel:{{ $contact->phone1 }}">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="heartbeat-icon">
                                        <span class="ak-heartbeat-btn"><img src="/assets/img/phone.svg"
                                                alt="..."></span>
                                    </div>
                                    <h6 class="font-montserrat fw-normal">{{ $contact->phone1 }}</h6>
                                </div>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- End Header Section -->
    @yield('content')

    <!-- Start Footer -->
    <div class="ak-height-125 ak-height-lg-80"></div>
    <!-- Start Footer -->
    <footer class="footer style-1 footer-bg">
        <div class="container pt-2">
            <div class="footer-content mb-5">
                <div class="footer-info col-12 col-md-5 col-lg-3 text" data-aos="fade-up">
                    <a class="ak-site_branding ms-3 fs-3 fw-bolder header__logo" href="{{ route('home', $lang) }}"
                        style="font-family: sans-serif">
                        <img class="w-100 h-100 object-cover"
                            style="max-height: 100%!important; transform: scale(1.7);"
                            src="{{ asset('assets/img/logo/logo1.png') }}" alt="drilltime logo">
                    </a>
                    {!! $contact->text !!}
                    <div class="social-icons col-3 d-flex gap-2 mt-3">
                        <a href="{{ $contact->facebook }}">
                            <svg width="48" height="48" viewBox="0 0 48 48" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M25.8614 36V25.0533H29.5343L30.0853 20.7859H25.8614V18.0618C25.8614 16.8266 26.2029 15.9849 27.9761 15.9849L30.234 15.984V12.1671C29.8435 12.1163 28.5032 12 26.9432 12C23.6857 12 21.4555 13.9884 21.4555 17.6391V20.7859H17.7715V25.0533H21.4555V36H25.8614Z"
                                    fill="white" />
                            </svg>
                        </a>
                        <a href="{{ $contact->telegram }}" class="d-flex align-content-center">
                            <svg width="24" viewBox="0 0 24 24" fill="#fff"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M23.1117 4.49449C23.4296 2.94472 21.9074 1.65683 20.4317 2.227L2.3425 9.21601C0.694517 9.85273 0.621087 12.1572 2.22518 12.8975L6.1645 14.7157L8.03849 21.2746C8.13583 21.6153 8.40618 21.8791 8.74917 21.968C9.09216 22.0568 9.45658 21.9576 9.70712 21.707L12.5938 18.8203L16.6375 21.8531C17.8113 22.7334 19.5019 22.0922 19.7967 20.6549L23.1117 4.49449ZM3.0633 11.0816L21.1525 4.0926L17.8375 20.2531L13.1 16.6999C12.7019 16.4013 12.1448 16.4409 11.7929 16.7928L10.5565 18.0292L10.928 15.9861L18.2071 8.70703C18.5614 8.35278 18.5988 7.79106 18.2947 7.39293C17.9906 6.99479 17.4389 6.88312 17.0039 7.13168L6.95124 12.876L3.0633 11.0816ZM8.17695 14.4791L8.78333 16.6015L9.01614 15.321C9.05253 15.1209 9.14908 14.9366 9.29291 14.7928L11.5128 12.573L8.17695 14.4791Z"
                                    fill="#fff" />
                            </svg>
                        </a>
                        <a href="{{ $contact->linkedin }}">
                            <svg width="48" height="48" viewBox="0 0 48 48" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M18.1875 31.9998H13.8281V17.9841H18.1875V31.9998ZM15.9844 16.1091C14.625 16.1091 13.5 14.9373 13.5 13.531C13.5 12.1716 14.625 11.0466 15.9844 11.0466C17.3906 11.0466 18.5156 12.1716 18.5156 13.531C18.5156 14.9373 17.3906 16.1091 15.9844 16.1091ZM34.4531 31.9998H30.1406V25.2029C30.1406 23.5623 30.0938 21.4998 27.8438 21.4998C25.5938 21.4998 25.2656 23.2341 25.2656 25.0623V31.9998H20.9062V17.9841H25.0781V19.906H25.125C25.7344 18.8279 27.1406 17.656 29.25 17.656C33.6562 17.656 34.5 20.5623 34.5 24.3123V31.9998H34.4531Z"
                                    fill="white" />
                            </svg>
                        </a>
                        <a href="{{ $contact->youtube }}">
                            <svg width="49" height="42" viewBox="0 0 49 42" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_178_7331)">
                                    <path
                                        d="M35.7602 16.31C35.7602 16.31 35.5254 14.6555 34.8039 13.9287C33.8897 12.9725 32.8682 12.968 32.3994 12.9117C29.0432 12.668 24.0039 12.668 24.0039 12.668H23.9949C23.9949 12.668 18.9557 12.668 15.5994 12.9117C15.1307 12.968 14.1092 12.9725 13.1949 13.9287C12.4727 14.6555 12.2432 16.31 12.2432 16.31C12.2432 16.31 12.0039 18.251 12.0039 20.1957V22.0145C12.0039 23.9547 12.2432 25.9002 12.2432 25.9002C12.2432 25.9002 12.4779 27.5547 13.1949 28.2815C14.1092 29.2377 15.3092 29.2047 15.8432 29.3082C17.7654 29.4912 24.0039 29.5475 24.0039 29.5475C24.0039 29.5475 29.0477 29.5385 32.4039 29.2992C32.8727 29.243 33.8949 29.2385 34.8084 28.2822C35.5299 27.5555 35.7647 25.901 35.7647 25.901C35.7647 25.901 36.0039 23.9607 36.0039 22.0152V20.1965C35.9994 18.2555 35.7602 16.3107 35.7602 16.3107V16.31ZM21.5199 24.2225V17.477L28.0029 20.8617L21.5199 24.2225Z"
                                        fill="white" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_178_7331">
                                        <rect width="25" height="18" fill="white"
                                            transform="translate(12 12)" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                        <a href="{{ $contact->instagram }}">
                            <svg width="49" height="49" viewBox="0 0 49 49" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_178_7332)">
                                    <path
                                        d="M24.4297 15.0054C27.6337 15.0054 28.0129 15.0174 29.2789 15.075C30.4489 15.129 31.0837 15.3246 31.5073 15.489C32.0293 15.681 32.5009 15.987 32.8885 16.3866C33.2869 16.7742 33.5941 17.2458 33.7861 17.7678C33.9505 18.1902 34.1461 18.8262 34.2001 19.9962C34.2565 21.2622 34.2697 21.6402 34.2697 24.8442C34.2697 28.0494 34.2577 28.4286 34.2001 29.6946C34.1461 30.8646 33.9505 31.4994 33.7861 31.923C33.5864 32.4403 33.2807 32.9102 32.8887 33.3024C32.4966 33.6947 32.0269 34.0006 31.5097 34.2006C31.0873 34.365 30.4525 34.5606 29.2825 34.6134C28.0165 34.671 27.6373 34.683 24.4333 34.683C21.2293 34.683 20.8489 34.671 19.5841 34.6134C18.4141 34.5594 17.7781 34.365 17.3557 34.2006C16.8338 34.0082 16.3618 33.701 15.9745 33.3018C15.5754 32.9148 15.2683 32.4432 15.0757 31.9218C14.9113 31.4982 14.7157 30.8622 14.6629 29.6922C14.6053 28.4274 14.5933 28.0482 14.5933 24.8442C14.5933 21.639 14.6053 21.2598 14.6629 19.9938C14.7169 18.8238 14.9113 18.189 15.0757 17.7654C15.2677 17.2446 15.5749 16.7718 15.9745 16.3854C16.3615 15.9863 16.833 15.6792 17.3545 15.4866C17.7781 15.3222 18.4141 15.1266 19.5841 15.0738C20.8489 15.0162 21.2281 15.003 24.4321 15.003L24.4297 15.0054ZM24.4321 12.8418C21.1729 12.8418 20.7637 12.855 19.4833 12.9138C18.2041 12.9726 17.3317 13.1778 16.5697 13.473C15.7687 13.7747 15.0431 14.2472 14.4433 14.8578C13.8332 15.4577 13.361 16.1833 13.0597 16.9842C12.7633 17.7462 12.5605 18.6198 12.5017 19.8966C12.4441 21.1734 12.4297 21.5838 12.4297 24.843C12.4297 28.1022 12.4441 28.5114 12.5017 29.7906C12.5617 31.071 12.7633 31.941 13.0597 32.703C13.3611 33.5034 13.8333 34.2286 14.4433 34.8282C15.0433 35.4402 15.7693 35.9118 16.5697 36.213C17.3317 36.5094 18.2053 36.7122 19.4833 36.771C20.7601 36.8286 21.1717 36.843 24.4309 36.843C27.6901 36.843 28.0981 36.8298 29.3785 36.771C30.6577 36.7122 31.5265 36.5094 32.2897 36.213C33.0871 35.9049 33.8112 35.4334 34.4157 34.829C35.0201 34.2245 35.4915 33.5004 35.7997 32.703C36.0961 31.941 36.2989 31.0674 36.3577 29.7906C36.4153 28.5126 36.4297 28.101 36.4297 24.843C36.4297 21.5838 36.4153 21.1746 36.3577 19.8942C36.2977 18.615 36.0961 17.7462 35.7997 16.9842C35.4986 16.1832 35.0264 15.4575 34.4161 14.8578C33.8163 14.2472 33.0907 13.7747 32.2897 13.473C31.5277 13.1766 30.6541 12.9738 29.3761 12.9162C28.0993 12.8574 27.6889 12.8442 24.4297 12.8442L24.4321 12.8418Z"
                                        fill="white" />
                                    <path
                                        d="M24.4315 18.6816C22.7973 18.6816 21.2299 19.3309 20.0743 20.4865C18.9187 21.6421 18.2695 23.2094 18.2695 24.8436C18.2695 26.4779 18.9187 28.0452 20.0743 29.2008C21.2299 30.3564 22.7973 31.0056 24.4315 31.0056C26.0658 31.0056 27.6331 30.3564 28.7887 29.2008C29.9443 28.0452 30.5935 26.4779 30.5935 24.8436C30.5935 23.2094 29.9443 21.6421 28.7887 20.4865C27.6331 19.3309 26.0658 18.6816 24.4315 18.6816ZM24.4315 28.8456C23.3701 28.8456 22.3522 28.424 21.6017 27.6735C20.8512 26.923 20.4295 25.905 20.4295 24.8436C20.4295 23.7823 20.8512 22.7643 21.6017 22.0138C22.3522 21.2633 23.3701 20.8416 24.4315 20.8416C25.4929 20.8416 26.5109 21.2633 27.2614 22.0138C28.0119 22.7643 28.4335 23.7823 28.4335 24.8436C28.4335 25.905 28.0119 26.923 27.2614 27.6735C26.5109 28.424 25.4929 28.8456 24.4315 28.8456ZM30.8371 19.878C31.219 19.878 31.5853 19.7263 31.8554 19.4563C32.1254 19.1862 32.2771 18.82 32.2771 18.438C32.2771 18.0561 32.1254 17.6899 31.8554 17.4198C31.5853 17.1498 31.219 16.998 30.8371 16.998C30.4552 16.998 30.089 17.1498 29.8189 17.4198C29.5488 17.6899 29.3971 18.0561 29.3971 18.438C29.3971 18.82 29.5488 19.1862 29.8189 19.4563C30.089 19.7263 30.4552 19.878 30.8371 19.878Z"
                                        fill="white" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_178_7332">
                                        <rect width="25" height="25" fill="white"
                                            transform="translate(12 12)" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="footer-menu-one col px-2 d-flex justify-content-md-center mt-4" data-aos="fade-up"
                    data-aos-delay="50" data-aos-duration="500">
                    <div class="footer-menu">
                        <p class="text-white fs-5 font-p">{{ __('main.Menu') }}</p>
                        @foreach ($menus as $menu)
                            <a href="{{ route($menu->slug, app()->getLocale()) }}"
                                class="menu-item text-hover-animaiton white">
                                {!! $menu->{'name_' . $lang} !!}</a>
                        @endforeach
                    </div>
                </div>
                <div class="footer-menu-two col-12 col-md-4 col-lg-3 px-2 mt-4" data-aos="fade-up"
                    data-aos-delay="100" data-aos-duration="500">
                    <div class="footer-menu">
                        <p class="text-white fs-5 font-p">{{ __('main.Category') }}</p>
                        @foreach ($categories->whereNull('parent_id') as $category)
                            <a href="{{ route('category', [$lang, $category->{'slug_' . $lang}]) }}"
                                class="menu-item text-hover-animaiton white">{{ $category->{'name_' . app()->getLocale()} }}</a>
                        @endforeach

                    </div>
                </div>
                <div class="footer-address col-12 col-lg-4 max-w-none mt-4 ps-lg-4" data-aos="fade-up"
                    data-aos-delay="150" data-aos-duration="500">
                    <p class="text-white fs-5 font-p">{{ __('main.contactInformation') }}</p>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-1 row-cols-xxl-2">
                        <div>
                            <p class="font-p pb-2 footer__contact__title">{{ __('main.Phone') }}:</p>
                            <div class="d-flex align-items-center">
                                <svg class="address__svg" width="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M17.45 22.75C16.32 22.75 15.13 22.48 13.9 21.96C12.7 21.45 11.49 20.75 10.31 19.9C9.14 19.04 8.01 18.08 6.94 17.03C5.88 15.96 4.92 14.83 4.07 13.67C3.21 12.47 2.52 11.27 2.03 10.11C1.51 8.87004 1.25 7.67004 1.25 6.54004C1.25 5.76004 1.39 5.02004 1.66 4.33004C1.94 3.62004 2.39 2.96004 3 2.39004C3.77 1.63004 4.65 1.25004 5.59 1.25004C5.98 1.25004 6.38 1.34004 6.72 1.50004C7.11 1.68004 7.44 1.95004 7.68 2.31004L10 5.58004C10.21 5.87004 10.37 6.15004 10.48 6.43004C10.61 6.73004 10.68 7.03004 10.68 7.32004C10.68 7.70004 10.57 8.07004 10.36 8.42004C10.21 8.69004 9.98 8.98004 9.69 9.27004L9.01 9.98004C9.02 10.01 9.03 10.03 9.04 10.05C9.16 10.26 9.4 10.62 9.86 11.16C10.35 11.72 10.81 12.23 11.27 12.7C11.86 13.28 12.35 13.74 12.81 14.12C13.38 14.6 13.75 14.84 13.97 14.95L13.95 15L14.68 14.28C14.99 13.97 15.29 13.74 15.58 13.59C16.13 13.25 16.83 13.19 17.53 13.48C17.79 13.59 18.07 13.74 18.37 13.95L21.69 16.31C22.06 16.56 22.33 16.88 22.49 17.26C22.64 17.64 22.71 17.99 22.71 18.34C22.71 18.82 22.6 19.3 22.39 19.75C22.18 20.2 21.92 20.59 21.59 20.95C21.02 21.58 20.4 22.03 19.68 22.32C18.99 22.6 18.24 22.75 17.45 22.75ZM5.59 2.75004C5.04 2.75004 4.53 2.99004 4.04 3.47004C3.58 3.90004 3.26 4.37004 3.06 4.88004C2.85 5.40004 2.75 5.95004 2.75 6.54004C2.75 7.47004 2.97 8.48004 3.41 9.52004C3.86 10.58 4.49 11.68 5.29 12.78C6.09 13.88 7 14.95 8 15.96C9 16.95 10.08 17.87 11.19 18.68C12.27 19.47 13.38 20.11 14.48 20.57C16.19 21.3 17.79 21.47 19.11 20.92C19.62 20.71 20.07 20.39 20.48 19.93C20.71 19.68 20.89 19.41 21.04 19.09C21.16 18.84 21.22 18.58 21.22 18.32C21.22 18.16 21.19 18 21.11 17.82C21.08 17.76 21.02 17.65 20.83 17.52L17.51 15.16C17.31 15.02 17.13 14.92 16.96 14.85C16.74 14.76 16.65 14.67 16.31 14.88C16.11 14.98 15.93 15.13 15.73 15.33L14.97 16.08C14.58 16.46 13.98 16.55 13.52 16.38L13.25 16.26C12.84 16.04 12.36 15.7 11.83 15.25C11.35 14.84 10.83 14.36 10.2 13.74C9.71 13.24 9.22 12.71 8.71 12.12C8.24 11.57 7.9 11.1 7.69 10.71L7.57 10.41C7.51 10.18 7.49 10.05 7.49 9.91004C7.49 9.55004 7.62 9.23004 7.87 8.98004L8.62 8.20004C8.82 8.00004 8.97 7.81004 9.07 7.64004C9.15 7.51004 9.18 7.40004 9.18 7.30004C9.18 7.22004 9.15 7.10004 9.1 6.98004C9.03 6.82004 8.92 6.64004 8.78 6.45004L6.46 3.17004C6.36 3.03004 6.24 2.93004 6.09 2.86004C5.93 2.79004 5.76 2.75004 5.59 2.75004ZM13.95 15.01L13.79 15.69L14.06 14.99C14.01 14.98 13.97 14.99 13.95 15.01Z"
                                        fill="#FF3D24" />
                                </svg>
                                <a class="fs-14px ps-2 font-p"
                                    href="tel:{{ $contact->phone1 }}">{{ $contact->phone1 }}</a>
                            </div>
                            <p class="font-p pb-xxl-2 footer__contact__title mt-4">{{ __('main.Email') }}:</p>
                            <div class="d-flex align-items-center pt-xxl-2 mt-1 pb-4 pb-xxl-0">
                                <svg class="address__svg" width="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M17 21.25H7C3.35 21.25 1.25 19.15 1.25 15.5V8.50005C1.25 4.85005 3.35 2.75005 7 2.75005H17C20.65 2.75005 22.75 4.85005 22.75 8.50005V15.5C22.75 19.15 20.65 21.25 17 21.25ZM7 4.25005C4.14 4.25005 2.75 5.64005 2.75 8.50005V15.5C2.75 18.36 4.14 19.75 7 19.75H17C19.86 19.75 21.25 18.36 21.25 15.5V8.50005C21.25 5.64005 19.86 4.25005 17 4.25005H7Z"
                                        fill="#FF3D24" />
                                    <path
                                        d="M12.0008 12.87C11.1608 12.87 10.3108 12.61 9.66076 12.08L6.53075 9.57997C6.21075 9.31997 6.15076 8.84997 6.41076 8.52997C6.67076 8.20997 7.14076 8.14997 7.46076 8.40997L10.5908 10.91C11.3508 11.52 12.6407 11.52 13.4007 10.91L16.5308 8.40997C16.8508 8.14997 17.3308 8.19997 17.5808 8.52997C17.8408 8.84997 17.7908 9.32997 17.4608 9.57997L14.3308 12.08C13.6908 12.61 12.8408 12.87 12.0008 12.87Z"
                                        fill="#FF3D24" />
                                </svg>
                                <a class="fs-14px ps-2 font-p"
                                    href="mailto:{{ $contact->email1 }}">{{ $contact->email1 }}</a>
                            </div>
                        </div>
                        <div>
                            <p class="font-p pb-2 footer__contact__title">{{ __('main.WorkTime') }}:</p>
                            <div class="d-flex align-items-center">
                                <svg class="address__svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12 22.75C6.07 22.75 1.25 17.93 1.25 12C1.25 6.07 6.07 1.25 12 1.25C17.93 1.25 22.75 6.07 22.75 12C22.75 17.93 17.93 22.75 12 22.75ZM12 2.75C6.9 2.75 2.75 6.9 2.75 12C2.75 17.1 6.9 21.25 12 21.25C17.1 21.25 21.25 17.1 21.25 12C21.25 6.9 17.1 2.75 12 2.75Z"
                                        fill="#FF3D24" />
                                    <path
                                        d="M15.7106 15.93C15.5806 15.93 15.4506 15.9 15.3306 15.82L12.2306 13.97C11.4606 13.51 10.8906 12.5 10.8906 11.61V7.51C10.8906 7.1 11.2306 6.76 11.6406 6.76C12.0506 6.76 12.3906 7.1 12.3906 7.51V11.61C12.3906 11.97 12.6906 12.5 13.0006 12.68L16.1006 14.53C16.4606 14.74 16.5706 15.2 16.3606 15.56C16.2106 15.8 15.9606 15.93 15.7106 15.93Z"
                                        fill="#FF3D24" />
                                </svg>
                                <span class="fs-14px ps-2 font-p">{{ $contact->work_time }}</span>
                            </div>
                            <p class="font-p pb-2 footer__contact__title mt-4">{{ __('main.Address') }}:</p>
                            <div class="d-flex align-items-center">
                                <svg class="address__svg" width="30" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.9989 14.1698C9.86891 14.1698 8.12891 12.4398 8.12891 10.2998C8.12891 8.15985 9.86891 6.43985 11.9989 6.43985C14.1289 6.43985 15.8689 8.16985 15.8689 10.3098C15.8689 12.4499 14.1289 14.1698 11.9989 14.1698ZM11.9989 7.93985C10.6989 7.93985 9.62891 8.99985 9.62891 10.3098C9.62891 11.6198 10.6889 12.6798 11.9989 12.6798C13.3089 12.6798 14.3689 11.6198 14.3689 10.3098C14.3689 8.99985 13.2989 7.93985 11.9989 7.93985Z"
                                        fill="#FF3D24" />
                                    <path
                                        d="M11.9997 22.7599C10.5197 22.7599 9.02969 22.1999 7.86969 21.0899C4.91969 18.2499 1.65969 13.7199 2.88969 8.32991C3.99969 3.43991 8.26969 1.24991 11.9997 1.24991C11.9997 1.24991 11.9997 1.24991 12.0097 1.24991C15.7397 1.24991 20.0097 3.43991 21.1197 8.33991C22.3397 13.7299 19.0797 18.2499 16.1297 21.0899C14.9697 22.1999 13.4797 22.7599 11.9997 22.7599ZM11.9997 2.74991C9.08969 2.74991 5.34969 4.29991 4.35969 8.65991C3.27969 13.3699 6.23969 17.4299 8.91969 19.9999C10.6497 21.6699 13.3597 21.6699 15.0897 19.9999C17.7597 17.4299 20.7197 13.3699 19.6597 8.65991C18.6597 4.29991 14.9097 2.74991 11.9997 2.74991Z"
                                        fill="#FF3D24" />
                                </svg>
                                <a class="fs-14px ps-2 font-p"
                                    href="https://www.google.com/maps/search/?api=1&query={{ urlencode($contact->address) }}">{{ $contact->address }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="m-0">
        <div class="pt-3 pb-3">
            <div class="container pb-1">
                <div class="row align-items-center justify-content-between">
                    <p class="w-auto text-white font-p">Copyright© 2020 Drill Time MChJ | {{ __('main.copyright') }}
                    </p>
                    <div class="w-auto d-flex align-items-center">
                        <ul class="footer-menu wow fadeInRight font-p mb-0 fs-14px" data-wow-delay=".4s"
                            style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInRight; color: #57667B;">
                            {{ __('main.sozdat') }}- <a href="https://oqila.uz"><img loading="lazy"
                                    src="/assets/img/logo/footer-logo.png" width="66" alt="oqila.uz"></a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->
    <script>
        document.getElementById('search-input').addEventListener('input', function() {
            let query = this.value;
            if (query.length > 2) {
                fetch(`/search/${query}`)
                    .then(response => response.json())
                    .then(data => {
                        let dropdown = document.getElementById('search-results');
                        dropdown.innerHTML = '';

                        data.results.forEach(result => {
                            let item = document.createElement('a');
                            item.classList.add('dropdown-item');
                            item.href = result.url;
                            item.textContent = result.name;
                            dropdown.appendChild(item);
                        });

                        dropdown.style.display = data.results.length ? 'block' :
                            'none'; // Natijalarni ko'rsatish
                    });
            } else document.getElementById('search-results').style.display = 'none'; // Natijalarni yashirish
        });
    </script>

    <script src="/assets/js/plugins/jquery-3.7.1.min.js"></script>
    <script src="/assets/js/plugins/lightgallery.min.js"></script>
    <script src="/assets/js/plugins/simplePagination.min.js"></script>
    <script src="/assets/js/plugins/aos.js"></script>
    <script src="/assets/js/plugins/swiper.min.js"></script>
    <script src="/assets/js/plugins/SplitText.min.js"></script>
    <script src="/assets/js/main.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
