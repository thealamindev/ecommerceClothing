@extends('layouts.frontend')

@section('collections')
    active
@endsection

@section('content')
    <!-- Breadcrumb area Start -->
    <div class="breadcrumb-area bg--white-6 pt--60 pb--70 pt-lg--40 pb-lg--50 pt-md--30 pb-md--40">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="page-title">Collections ({{ $collections->count() }})</h1>
                    <ul class="breadcrumb justify-content-center">
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li class="current"><span>Collections</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb area End -->

    <!-- Main Content Wrapper Start -->
    <div id="content" class="main-content-wrapper">
        <div class="shop-page-wrapper">
            <div class="container-fluid p-0">
                <div class="row g-0">
                    @forelse ($collections as $collection)
                        <div class="col-md-4">
                            <div class="banner-box banner-type-3 banner-type-3-1 banner-hover-1">
                                <div class="banner-inner">
                                    <div class="banner-image">
                                        <img src="{{ $collection->thumbnail }}" alt="not found">
                                    </div>
                                    <div class="banner-info">
                                        <p class="banner-title-1 lts-13 lts-lg-4 text-uppercase">
                                            {{ $collection->top_title }}</p>
                                        <h2 class="banner-title-2">{{ $collection->lower_title }}
                                            <strong>{{ $collection->strong_title }}</strong>
                                        </h2>
                                    </div>
                                    <a class="banner-link banner-overlay"
                                        href="{{ route('s.collections', $collection->slug) }}">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-md-8 m-auto">
                            <div class="alert alert-danger mt-3">
                                No collection is available now
                            </div>
                        </div>
                    @endforelse

                    {{-- <div class="col-md-4">
                        <div class="banner-box banner-type-3 banner-type-3-1 banner-hover-1">
                            <div class="banner-inner">
                                <div class="banner-image">
                                    <img src="{{ asset('frontend_assets') }}/img/banner/m07-banner2.jpg" alt="Banner">
                                </div>
                                <div class="banner-info">
                                    <p class="banner-title-1 lts-13 lts-lg-4 text-uppercase">New Men</p>
                                    <h2 class="banner-title-2">Autumn <strong>Winter</strong></h2>
                                </div>
                                <a class="banner-link banner-overlay" href="shop-sidebar.html">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="banner-box banner-type-3 banner-type-3-1 banner-hover-1">
                            <div class="banner-inner">
                                <div class="banner-image">
                                    <img src="{{ asset('frontend_assets') }}/img/banner/m07-banner3.jpg" alt="Banner">
                                </div>
                                <div class="banner-info">
                                    <p class="banner-title-1 lts-13 lts-lg-4 text-uppercase">Hello</p>
                                    <h2 class="banner-title-2">Woman <strong>2019</strong></h2>
                                </div>
                                <a class="banner-link banner-overlay" href="shop-sidebar.html">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="banner-box banner-type-3 banner-type-3-1 banner-hover-1">
                            <div class="banner-inner">
                                <div class="banner-image">
                                    <img src="{{ asset('frontend_assets') }}/img/banner/m07-banner4.jpg" alt="Banner">
                                </div>
                                <div class="banner-info">
                                    <p class="banner-title-1 lts-13 lts-lg-4 text-uppercase">New Season</p>
                                    <h2 class="banner-title-2">Man <strong>T-Shirt</strong></h2>
                                </div>
                                <a class="banner-link banner-overlay" href="shop-sidebar.html">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="banner-box banner-type-3 banner-type-3-1 banner-hover-1">
                            <div class="banner-inner">
                                <div class="banner-image">
                                    <img src="{{ asset('frontend_assets') }}/img/banner/m07-banner5.jpg" alt="Banner">
                                </div>
                                <div class="banner-info">
                                    <p class="banner-title-1 lts-13 lts-lg-4 text-uppercase">Woman 2019</p>
                                    <h2 class="banner-title-2">Floral <strong>Dress</strong></h2>
                                </div>
                                <a class="banner-link banner-overlay" href="shop-sidebar.html">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="banner-box banner-type-3 banner-type-3-1 banner-hover-1">
                            <div class="banner-inner">
                                <div class="banner-image">
                                    <img src="{{ asset('frontend_assets') }}/img/banner/m07-banner6.jpg" alt="Banner">
                                </div>
                                <div class="banner-info">
                                    <p class="banner-title-1 lts-13 lts-lg-4 text-uppercase">Jacket</p>
                                    <h2 class="banner-title-2">Man <strong>2019</strong></h2>
                                </div>
                                <a class="banner-link banner-overlay" href="shop-sidebar.html">Shop Now</a>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content Wrapper Start -->
@endsection
