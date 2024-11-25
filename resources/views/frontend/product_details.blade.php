@extends('layouts.frontend')

@section('description')
    {{ $product->name }}
@endsection
@section('content')
    <!-- Breadcrumb area Start -->
    <div class="breadcrumb-area pt--70 pt-md--25">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li><a href="{{ route('shop') }}">Shop</a></li>
                        <li class="current"><span>{{ $product->name }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Breadcrumb area End -->

    <!-- Main Content Wrapper Start -->
    <div id="content" class="main-content-wrapper">
        <div class="page-content-inner enable-full-width">
            <div class="container-fluid">
                <div class="row pt--40">
                    <div class="col-md-6 product-main-image">
                        <div class="product-image">
                            <div class="product-gallery vertical-slide-nav">
                                <div class="product-gallery__thumb">
                                    <div class="product-gallery__thumb--image">
                                        <div class="airi-element-carousel nav-slider slick-vertical"
                                            data-slick-options='{
                                                "slidesToShow": 3,
                                                "slidesToScroll": 1,
                                                "vertical": true,
                                                "swipe": true,
                                                "verticalSwiping": true,
                                                "infinite": true,
                                                "focusOnSelect": true,
                                                "asNavFor": ".main-slider",
                                                "arrows": true,
                                                "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-up" },
                                                "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-down" }
                                            }'
                                            data-slick-responsive='[
                                                {
                                                    "breakpoint":992,
                                                    "settings": {
                                                        "slidesToShow": 4,
                                                        "vertical": false,
                                                        "verticalSwiping": false
                                                    }
                                                },
                                                {
                                                    "breakpoint":575,
                                                    "settings": {
                                                        "slidesToShow": 3,
                                                        "vertical": false,
                                                        "verticalSwiping": false
                                                    }
                                                },
                                                {
                                                    "breakpoint":480,
                                                    "settings": {
                                                        "slidesToShow": 2,
                                                        "vertical": false,
                                                        "verticalSwiping": false
                                                    }
                                                }
                                            ]'>
                                            <figure class="product-gallery__thumb--single">
                                                <img src="{{ $product->primary_image }}" alt="Products">
                                            </figure>
                                            <figure class="product-gallery__thumb--single">
                                                <img src="{{ $product->secondary_image }}" alt="Products">
                                            </figure>
                                            <figure class="product-gallery__thumb--single">
                                                <img src="{{ asset('frontend_assets') }}/img/products/prod-19-2-2.jpg"
                                                    alt="Products">
                                            </figure>
                                            <figure class="product-gallery__thumb--single">
                                                <img src="{{ asset('frontend_assets') }}/img/products/prod-19-3-2.jpg"
                                                    alt="Products">
                                            </figure>
                                            <figure class="product-gallery__thumb--single">
                                                <img src="{{ asset('frontend_assets') }}/img/products/prod-19-4-2.jpg"
                                                    alt="Products">
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-gallery__large-image">
                                    <div class="gallery-with-thumbs">
                                        <div class="product-gallery__wrapper">
                                            <div class="airi-element-carousel main-slider product-gallery__full-image image-popup"
                                                data-slick-options='{
                                                    "slidesToShow": 1,
                                                    "slidesToScroll": 1,
                                                    "infinite": true,
                                                    "arrows": false,
                                                    "asNavFor": ".nav-slider"
                                                }'>
                                                <figure class="product-gallery__image zoom">
                                                    <img src="{{ $product->primary_image }}" alt="Product">
                                                </figure>
                                                <figure class="product-gallery__image zoom">
                                                    <img src="{{ $product->secondary_image }}" alt="Product">
                                                </figure>
                                                <figure class="product-gallery__image zoom">
                                                    <img src="{{ asset('frontend_assets') }}/img/products/prod-19-2-big.jpg"
                                                        alt="Product">
                                                </figure>
                                                <figure class="product-gallery__image zoom">
                                                    <img src="{{ asset('frontend_assets') }}/img/products/prod-19-3-big.jpg"
                                                        alt="Product">
                                                </figure>
                                                <figure class="product-gallery__image zoom">
                                                    <img src="{{ asset('frontend_assets') }}/img/products/prod-19-4-big.jpg"
                                                        alt="Product">
                                                </figure>
                                            </div>
                                            <div class="product-gallery__actions">
                                                <button class="action-btn btn-zoom-popup"><i
                                                        class="dl-icon-zoom-in"></i></button>
                                                {{-- <a href="https://www.youtube.com/watch?v=Rp19QD2XIGM"
                                                    class="action-btn video-popup"><i class="dl-icon-format-video"></i></a> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @isset($product->status)
                                <span class="product-badge {{ $product->status }}">{{ $product->status }}</span>
                            @endisset
                        </div>
                    </div>
                    <div class="col-md-6 product-main-details mt--40 mt-md--10 mt-sm--30">
                        <div class="product-summary">
                            <div class="product-rating float-left">
                                <span>
                                    <i class="dl-icon-star rated"></i>
                                    <i class="dl-icon-star rated"></i>
                                    <i class="dl-icon-star rated"></i>
                                    <i class="dl-icon-star rated"></i>
                                    <i class="dl-icon-star rated"></i>
                                </span>
                                <a href="#" class="review-link">(100 customer
                                    review)</a>
                            </div>
                            <div class="product-navigation">
                                <a href="#" class="prev"><i class="dl-icon-left"></i></a>
                                <a href="#" class="next"><i class="dl-icon-right"></i></a>
                            </div>
                            <div class="clearfix"></div>
                            <h3 class="product-title">{{ $product->name }}</h3>
                            <span class="product-stock in-stock float-right">
                                <i class="dl-icon-check-circle1"></i>
                                in stock
                            </span>
                            <div class="product-price-wrapper mb--40 mb-md--10">
                                <span class="money">$49.00</span>
                                <span class="old-price">
                                    <span class="money">$60.00</span>
                                </span>
                            </div>
                            <div class="clearfix"></div>
                            <p class="product-short-description mb--45 mb-sm--20">{{ $product->short_description }}</p>
                            <form action="#" class="variation-form mb--35">
                                <input type="text" id="selected_color">
                                <input type="text" id="selected_size">
                                <div class="product-color-variations mb--20">
                                    <style>
                                        .custom-opacity {
                                            opacity: 0.3
                                        }
                                    </style>
                                    <p class="swatch-label">Color: <strong class="swatch-label"></strong></p>
                                    <div class="product-color-swatch variation-wrapper">
                                        @foreach ($product->inventory()->select('color_id')->groupBy('color_id')->whereColumn('quantity', '!=', 'sold_quantity')->get() as $inv)
                                            <div class="swatch-wrapper">
                                                <i id="check_mark_{{ $inv->color->id }}"
                                                    style="position: absolute; margin:13px"
                                                    class="fa fa-check text-dark d-none"></i>
                                                <div id="color_palette_{{ $inv->color->id }}" class="color_palette_div">
                                                    <a data-id="{{ $inv->color->id }}"
                                                        style="background-color: {{ $inv->color->code }}"
                                                        class="product-color-swatch-btn color_palette"
                                                        data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="{{ $inv->color->name }}">
                                                        <span
                                                            class="product-color-swatch-label">{{ $inv->color->name }}</span>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="product-size-variations">
                                    <p class="swatch-label">Size: <strong class="swatch-label"></strong></p>
                                    <div class="product-size-swatch variation-wrapper" id="size_variation">
                                        Choose color first
                                    </div>
                                </div>
                            </form>

                            <form action="#" class="form--action mb--30 mb-sm--20">
                                <div class="product-action flex-row align-items-center">
                                    <div class="quantity">
                                        <input type="number" class="quantity-input" name="qty" id="qty"
                                            value="1" min="1">
                                    </div>
                                    <button type="button" class="btn btn-style-1 btn-large add-to-cart">
                                        Add To Cart
                                    </button>
                                    <i class="fa fa-heart-o fa-2x"></i>
                                    <i class="fa fa-compare fa-2x"></i>
                                    <a href="compare.html"><i class="dl-icon-compare2"></i></a>
                                </div>
                            </form>
                            <div class="product-extra mb--40 mb-sm--20">
                                <a href="#" class="font-size-12"><i class="fa fa-map-marker"></i>Find store near
                                    you</a>
                                <a href="#" class="font-size-12"><i class="fa fa-exchange"></i>Delivery and
                                    return</a>
                            </div>
                            <div class="product-summary-footer d-flex justify-content-between flex-sm-row flex-column">
                                <div class="product-meta">
                                    <span class="sku_wrapper font-size-12">SKU: <span
                                            class="sku">{{ $product->sku }}</span></span>
                                    <span class="posted_in font-size-12">Category:
                                        <a href="{{ route('s.category', $product->category->slug) }}" target="_blank">
                                            {{ $product->category->name }}
                                        </a>
                                        @isset($product->subcategory)
                                            >
                                            <a href="{{ route('s.category', ['slug' => $product->category->slug, 'sub_slug' => $product->subcategory->slug]) }}"
                                                target="_blank">
                                                {{ $product->subcategory->name }}
                                            </a>
                                        @endisset

                                    </span>
                                    <div class="tagcloud">
                                        Tags:
                                        @foreach ($product->product_tag as $p_tag)
                                            <a href="shop-sidebar.html">{{ $p_tag->tag->name }}</a>
                                        @endforeach
                                    </div>
                                    {{-- <span class="posted_in font-size-12">Tags:
                                        @foreach ($product->product_tag as $p_tag)
                                            <a href="link_here">
                                                {{ $p_tag->tag->name }}@if (!$loop->last)
                                                    ,
                                                @endif
                                            </a>
                                        @endforeach
                                    </span> --}}
                                </div>
                                <div class="product-share-box">
                                    <span class="font-size-12">Share With</span>
                                    <!-- Social Icons Start Here -->
                                    <ul class="social social-small">
                                        <li class="social__item">
                                            <a href="https://facebook.com/" class="social__link">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="social__item">
                                            <a href="https://twitter.com/" class="social__link">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="social__item">
                                            <a href="https://plus.google.com/" class="social__link">
                                                <i class="fa fa-google-plus"></i>
                                            </a>
                                        </li>
                                        <li class="social__item">
                                            <a href="https://plus.google.com/" class="social__link">
                                                <i class="fa fa-pinterest-p"></i>
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- Social Icons End Here -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center pt--45 pt-lg--50 pt-md--55 pt-sm--35">
                    <div class="col-12">
                        <div class="product-data-tab tab-style-1">
                            <div class="nav nav-tabs product-data-tab__head mb--40 mb-md--30" id="product-tab"
                                role="tablist">
                                <button type="button" class="product-data-tab__link nav-link active"
                                    id="nav-description-tab" data-bs-toggle="tab" data-bs-target="#nav-description"
                                    role="tab" aria-selected="true">
                                    <span>Description</span>
                                </button>
                                <button type="button" class="product-data-tab__link nav-link" id="nav-reviews-tab"
                                    data-bs-toggle="tab" data-bs-target="#nav-reviews" role="tab"
                                    aria-selected="true">
                                    <span>Reviews(1)</span>
                                </button>
                            </div>
                            <div class="tab-content product-data-tab__content" id="product-tabContent">
                                <div class="tab-pane fade show active" id="nav-description" role="tabpanel"
                                    aria-labelledby="nav-description-tab">
                                    <div class="product-description">
                                        <p>
                                            {!! $product->long_description !!}
                                        </p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-reviews" role="tabpanel"
                                    aria-labelledby="nav-reviews-tab">
                                    <div class="product-reviews">
                                        <h3 class="review__title">1 review for Waxed-effect pleated skirt</h3>
                                        <ul class="review__list">
                                            <li class="review__item">
                                                <div class="review__container">
                                                    <img src="{{ asset('frontend_assets') }}/img/others/comment-icon-2.jpg"
                                                        alt="Review Avatar" class="review__avatar">
                                                    <div class="review__text">
                                                        <div class="product-rating float-right">
                                                            <span>
                                                                <i class="dl-icon-star rated"></i>
                                                                <i class="dl-icon-star rated"></i>
                                                                <i class="dl-icon-star rated"></i>
                                                                <i class="dl-icon-star rated"></i>
                                                                <i class="dl-icon-star rated"></i>
                                                            </span>
                                                        </div>
                                                        <div class="review__meta">
                                                            <strong class="review__author">John Snow </strong>
                                                            <span class="review__dash">-</span>
                                                            <span class="review__published-date">November 20, 2018</span>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <p class="review__description">Aliquam egestas libero ac turpis
                                                            pharetra, in vehicula lacus scelerisque. Vestibulum ut sem
                                                            laoreet, feugiat tellus at, hendrerit arcu.</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="review-form-wrapper">
                                            <span class="reply-title"><strong>Add a review</strong></span>
                                            <form action="#" class="form">
                                                <div class="form-notes mb--20">
                                                    <p>Your email address will not be published. Required fields are marked
                                                        <span class="required">*</span>
                                                    </p>
                                                </div>
                                                <div class="form__group mb--30 mb-sm--20">
                                                    <div class="revew__rating">
                                                        <p class="stars selected">
                                                            <a class="star-1 active" href="#">1</a>
                                                            <a class="star-2" href="#">2</a>
                                                            <a class="star-3" href="#">3</a>
                                                            <a class="star-4" href="#">4</a>
                                                            <a class="star-5" href="#">5</a>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="form__group mb--30 mb-sm--20">
                                                    <div class="row">
                                                        <div class="col-sm-6 mb-sm--20">
                                                            <label class="form__label" for="name">Name<span
                                                                    class="required">*</span></label>
                                                            <input type="text" name="name" id="name"
                                                                class="form__input">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label class="form__label" for="email">email<span
                                                                    class="required">*</span></label>
                                                            <input type="email" name="email" id="email"
                                                                class="form__input">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form__group mb--30 mb-sm--20">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label class="form__label" for="email">Your Review<span
                                                                    class="required">*</span></label>
                                                            <textarea name="review" id="review" class="form__input form__input--textarea"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form__group">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <input type="submit" value="Submit"
                                                                class="btn btn-style-1 btn-submit">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pt--35 pt-md--25 pt-sm--15 pb--75 pb-md--55 pb-sm--35">
                    <div class="col-12">
                        <div class="row mb--40 mb-md--30">
                            <div class="col-12 text-center">
                                <h2 class="heading-secondary">Related Products</h2>
                                <hr class="separator center mt--25 mt-md--15">
                            </div>
                        </div>
                        <div class="row">
                            @forelse ($related_products as $related_product)
                                @include('frontend.inc.single_product', ['product' => $related_product])
                            @empty
                                <div class="alert alert-warning">
                                    No related product to show
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content Wrapper Start -->
@endsection
@section('footer_scripts')
    <script>
        $(document).ready(function() {
            $('.color_palette').click(function() {
                var color_id = $(this).attr('data-id');
                var product_id = "{{ $product->id }}";
                $.ajax({
                    url: "{{ url('get/size') }}/" + product_id + "/" + color_id,
                    type: 'GET',
                    success: function(response) {
                        $('#size_variation').html(response);
                        // add d-none to all check
                        $('.fa-check').addClass('d-none');
                        // remove d-none from only clicked color palette
                        $('#check_mark_' + color_id).removeClass('d-none');
                        // remove all custom opacity class first
                        $('.color_palette_div').removeClass('custom-opacity');
                        // only add custom opacity class to the clicked color palette
                        $('#color_palette_' + color_id).addClass('custom-opacity');
                        $('#selected_color').val(color_id);
                        $('#selected_size').val("");
                        /*
                        Now it's time for working on size switcher
                        */
                        $('.product-size-swatch-btn').click(function() {
                            var size_id = $(this).attr('data-id');
                            $('#selected_size').val(size_id);
                            $('.fa-check-circle').addClass('d-none');
                            $('#size_swatch_check_'+size_id).removeClass('d-none');
                        });
                    }
                });
            });
        });
    </script>
@endsection
