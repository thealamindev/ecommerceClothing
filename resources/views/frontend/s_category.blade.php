@extends('layouts.frontend')

@section('content')
    <!-- Breadcrumb area Start -->
    <div class="breadcrumb-area bg--white-6 pt--60 pb--70 pt-lg--40 pb-lg--50 pt-md--30 pb-md--40">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="page-title">{{ $category->name }}</h1>
                    <ul class="breadcrumb justify-content-center">
                        <li><a href="index.html">Home</a></li>
                        <li class="current"><span>{{ $category->name }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb area End -->
    <!-- Main Content Wrapper Start -->
    <div id="content" class="main-content-wrapper {{ ($products->count()) != 0 ? 'd-none':'' }}">
        <div class="page-content-inner">
            <div class="container">
                <div class="row justify-content-center ptb--100">
                    <div class="col-lg-8 text-center">
                        <div class="error-text">
                            <img width="300" src="https://cdni.iconscout.com/illustration/premium/thumb/empty-search-4320171-3598806.png" alt="nothing to show">
                            <h2 class="error-heading mt--20">No item cannot be found!</h2>
                            <p class="mb--40">It looks like nothing was found at this locations.</p>
                            <a href="{{ route('index') }}" class="btn btn-color-gray btn-medium btn-bordered btn-style-1">Back to home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content Wrapper Start -->

    <!-- Main Content Wrapper Start -->
    <div id="content" class="main-content-wrapper {{ ($products->count()) == 0 ? 'd-none':'' }}">
        <div class="shop-page-wrapper">
            <div class="container-fluid">
                <div class="row shop-fullwidth pt--45 pt-md--35 pt-sm--20 pb--60 pb-md--50 pb-sm--40">
                    <div class="col-12">
                        <div class="shop-toolbar">
                            <div class="shop-toolbar__inner">
                                <div class="row align-items-center">
                                    <div class="col-md-6 text-md-start text-center mb-sm--20">
                                        <div class="shop-toolbar__left">
                                            <p class="product-pages">Showing 1–20 of {{ $products->count() }} results</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="shop-toolbar__right">
                                            <a href="#" class="product-filter-btn shop-toolbar__btn">
                                                <span>Filters</span>
                                                <i></i>
                                            </a>
                                            <div class="product-ordering">
                                                <a href="" class="product-ordering__btn shop-toolbar__btn">
                                                    <span>Short By</span>
                                                    <i></i>
                                                </a>
                                                <ul class="product-ordering__list">
                                                    <li class="active"><a href="#">Sort by popularity</a></li>
                                                    <li><a href="#">Sort by average rating</a></li>
                                                    <li><a href="#">Sort by newness</a></li>
                                                    <li><a href="#">Sort by price: low to high</a></li>
                                                    <li><a href="#">Sort by price: high to low</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="advanced-product-filters">
                                <div class="product-filter">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="product-widget product-widget--price">
                                                <h3 class="widget-title">Price</h3>
                                                <ul class="product-widget__list">
                                                    <li>
                                                        <a href="shop-sidebar.html">
                                                            <span class="ammount">$20.00</span>
                                                            <span> - </span>
                                                            <span class="ammount">$40.00</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-sidebar.html">
                                                            <span class="ammount">$40.00</span>
                                                            <span> - </span>
                                                            <span class="ammount">$50.00</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-sidebar.html">
                                                            <span class="ammount">$50.00</span>
                                                            <span> - </span>
                                                            <span class="ammount">$60.00</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-sidebar.html">
                                                            <span class="ammount">$60.00</span>
                                                            <span> - </span>
                                                            <span class="ammount">$80.00</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-sidebar.html">
                                                            <span class="ammount">$80.00</span>
                                                            <span> - </span>
                                                            <span class="ammount">$100.00</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-sidebar.html">
                                                            <span class="ammount">$100.00</span>
                                                            <span> + </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="product-widget product-widget--brand">
                                                <h3 class="widget-title">Brands</h3>
                                                <ul class="product-widget__list">
                                                    <li>
                                                        <a href="shop-sidebar.html">
                                                            <span>Airi</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-sidebar.html">
                                                            <span>Mango</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-sidebar.html">
                                                            <span>Valention</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-sidebar.html">
                                                            <span>Zara</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="product-widget product-widget--color">
                                                <h3 class="widget-title">Color</h3>
                                                <ul class="product-widget__list product-color-swatch">
                                                    <li>
                                                        <a href="shop-sidebar.html" class="product-color-swatch-btn blue">
                                                            <span class="product-color-swatch-label">Blue</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-sidebar.html" class="product-color-swatch-btn green">
                                                            <span class="product-color-swatch-label">Green</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-sidebar.html" class="product-color-swatch-btn pink">
                                                            <span class="product-color-swatch-label">Pink</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-sidebar.html" class="product-color-swatch-btn red">
                                                            <span class="product-color-swatch-label">Red</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-sidebar.html" class="product-color-swatch-btn grey">
                                                            <span class="product-color-swatch-label">Grey</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="product-widget product-widget--size">
                                                <h3 class="widget-title">Size</h3>
                                                <ul class="product-widget__list">
                                                    <li>
                                                        <a href="shop-sidebar.html">
                                                            <span>L</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-sidebar.html">
                                                            <span>M</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-sidebar.html">
                                                            <span>S</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-sidebar.html">
                                                            <span>XL</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-sidebar.html">
                                                            <span>XXL</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#" class="btn-close"><i class="dl-icon-close"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="shop-products">
                            <div class="row grid-space-20 xxl-block-grid-5">
                                @foreach ($products as $product)
                                    @include('frontend.inc.single_product')
                                @endforeach
                            </div>
                        </div>
                        <nav class="pagination-wrap">
                            <ul class="pagination">
                                <li><a href="#" class="prev page-number"><i
                                            class="fa fa-angle-double-left"></i></a>
                                </li>
                                <li><span class="current page-number">1</span></li>
                                <li><a href="#" class="page-number">2</a></li>
                                <li><a href="#" class="page-number">3</a></li>
                                <li><a href="#" class="next page-number"><i
                                            class="fa fa-angle-double-right"></i></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content Wrapper Start -->
@endsection
