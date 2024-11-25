@extends('layouts.frontend')

@section('name')
    Shop
@endsection

@section('shop')
    active
@endsection

@section('content')
    <!-- Breadcrumb area Start -->
    <div class="breadcrumb-area bg--white-6 pt--60 pb--70 pt-lg--40 pb-lg--50 pt-md--30 pb-md--40">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="page-title">Shop</h1>
                    <ul class="breadcrumb justify-content-center">
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li class="current"><span>Shop</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb area End -->

    <!-- Main Content Wrapper Start -->
    <div id="content" class="main-content-wrapper">
        <div class="page-content-inner enable-page-sidebar">
            <div class="container-fluid">
                <div class="row shop-sidebar pt--45 pt-md--35 pt-sm--20 pb--60 pb-md--50 pb-sm--40">
                    <div class="col-lg-9 order-lg-2" id="main-content">
                        <div class="shop-toolbar">
                            <div class="shop-toolbar__inner">
                                <div class="row align-items-center">
                                    <div class="col-md-6 text-md-start text-center mb-sm--20">
                                        <div class="shop-toolbar__left">
                                            <p class="product-pages">Showing
                                                {{ $products->firstItem() }}–{{ $products->lastItem() }} of
                                                {{ $products->total() }} results</p>
                                            <div class="product-view-count">
                                                <p>Show</p>
                                                <ul>
                                                    <li class="@if ($per_page == 10) active @endif"><a
                                                            href="{{ route('shop') }}?per_page=10">10</a></li>
                                                    <li class="@if ($per_page == 20) active @endif"><a
                                                            href="{{ route('shop') }}?per_page=20">20</a></li>
                                                    <li class="@if ($per_page == 50) active @endif"><a
                                                            href="{{ route('shop') }}?per_page=50">50</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="shop-toolbar__right">
                                            <div class="product-ordering">
                                                <span href="" class="product-ordering__btn shop-toolbar__btn">
                                                    <span>Short By</span>
                                                    <i></i>
                                                </span>
                                                <ul class="product-ordering__list">
                                                    <li class="active"><a href="#">Sort by newness</a></li>
                                                    <li><a href="{{ route('shop') }}?sort=asc">Sort by name: A-Z</a></li>
                                                    <li><a href="{{ route('shop') }}?sort=desc">Sort by name: Z-A</a></li>
                                                    <li><a href="{{ route('shop') }}?price=asc">Sort by price: Low to High</a></li>
                                                    <li><a href="{{ route('shop') }}?price=asc">Sort by price: High to Low</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="shop-products">
                            <div class="row grid-space-20 xxl-block-grid-4">
                                @forelse ($products as $product)
                                    @include('frontend.inc.single_product')
                                @empty
                                <div class="alert alert-warning">
                                    No product to show
                                </div>
                                @endforelse
                            </div>
                        </div>
                        {{ $products->links('frontend.inc.pagination') }}
                    </div>
                    <div class="col-lg-3 order-lg-1 mt--30 mt-md--40" id="primary-sidebar">
                        <div class="sidebar-widget">
                            <!-- Category Widget Start -->
                            <div class="product-widget categroy-widget mb--35 mb-md--30">
                                <h3 class="widget-title">Categories</h3>
                                <ul class="prouduct-categories product-widget__list">
                                    @foreach (categories() as $category)
                                        <li>
                                            <a href="{{ route('s.category', $category->slug) }}">{{ $category->name }}</a>
                                            <span class="count">({{ $category->product_count($category->id) }})</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- Category Widget Start -->

                            <!-- Price Filter Widget Start -->
                            <div class="product-widget product-price-widget mb--40 mb-md--35">
                                <h3 class="widget-title">Price</h3>
                                <div class="widget_content">
                                    <form action="#" method="post">
                                        <div id="slider-range"
                                            class="price-slider ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                            <div class="ui-slider-range ui-widget-header ui-corner-all"
                                                style="left: 16.6667%; width: 79.1667%;">

                                            </div>
                                            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"
                                                style="left: 16.6667%;">

                                            </span>
                                            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"
                                                style="left: 95.8333%;">

                                            </span>
                                        </div>
                                        <div class="filter-price">
                                            <div class="filter-price__count">
                                                <div class="filter-price__input-group mb--20">
                                                    <span>Price: </span>
                                                    <input type="text" id="amount" class="amount-range"
                                                        readonly="">
                                                </div>
                                                <button type="submit" class="btn btn-style-1 sidebar-btn">
                                                    filter
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Price Filter Widget End -->

                            <!-- Product Size Widget Start -->
                            <div class="product-widget product-widget--size mb--25 mb-md--20">
                                <h3 class="widget-title">Size</h3>
                                <ul class="product-widget__list two-column-list">
                                    <li><a href="shop-sidebar.html">L</a><span class="count">(2)</span></li>
                                    <li><a href="shop-sidebar.html">S</a><span class="count">(2)</span></li>
                                    <li><a href="shop-sidebar.html">XXl</a><span class="count">(2)</span></li>
                                    <li><a href="shop-sidebar.html">M</a><span class="count">(2)</span></li>
                                    <li><a href="shop-sidebar.html">XL</a><span class="count">(2)</span></li>
                                    <li><a href="shop-sidebar.html">L</a><span class="count">(2)</span></li>
                                </ul>
                            </div>
                            <!-- Product Size Widget End -->

                            <!-- Product Color Widget Start -->
                            <div class="product-widget product-widget--Color mb--25 mb-md--20">
                                <h3 class="widget-title">Color</h3>
                                <ul class="product-widget__list two-column-list">
                                    <li><a href="shop-sidebar.html">Blue</a><span class="count">(2)</span></li>
                                    <li><a href="shop-sidebar.html">Pink</a><span class="count">(2)</span></li>
                                    <li><a href="shop-sidebar.html">White</a><span class="count">(2)</span></li>
                                    <li><a href="shop-sidebar.html">Green</a><span class="count">(2)</span></li>
                                    <li><a href="shop-sidebar.html">Red</a><span class="count">(2)</span></li>
                                    <li><a href="shop-sidebar.html">Black</a><span class="count">(2)</span></li>
                                </ul>
                            </div>
                            <!-- Product Color Widget End -->

                            <!-- Product Brand Widget Start -->
                            <div class="product-widget product-widget--brand mb--40 mb-md--30">
                                <h3 class="widget-title">Brands</h3>
                                <ul class="product-widget__list">
                                    <li><a href="shop-sidebar.html">Airi</a><span class="count">(2)</span></li>
                                    <li><a href="shop-sidebar.html">Mango</a><span class="count">(2)</span></li>
                                    <li><a href="shop-sidebar.html">Valention</a><span class="count">(2)</span></li>
                                    <li><a href="shop-sidebar.html">Zara</a><span class="count">(2)</span></li>
                                </ul>
                            </div>
                            <!-- Product Brand Widget End -->

                            <!-- Category Widget Start -->
                            <div class="product-widget tag-widget mb--35 mb-md--30">
                                <h3 class="widget-title">Tags</h3>
                                <div class="tagcloud">
                                    @foreach ($tags as $tag)
                                        <a href="shop-sidebar.html">{{ $tag->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                            <!-- Category Widget Start -->

                            <!-- Promo Widget Start -->
                            <div class="product-widget promo-widget">
                                <div class="banner-box banner-type-3 banner-type-3-2 banner-hover-1">
                                    <div class="banner-inner">
                                        <div class="banner-image">
                                            <img src="{{ asset('frontend_assets') }}/img/banner/ad-banner.jpg"
                                                alt="Banner">
                                        </div>
                                        <div class="banner-info">
                                            <h2 class="banner-title-11">New <br> <strong>Season</strong></h2>
                                        </div>
                                        <a class="banner-link banner-overlay" href="shop-sidebar.html">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Promo Widget End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content Wrapper Start -->
@endsection
