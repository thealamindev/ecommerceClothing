<div class="col-xl-3 col-lg-4 col-sm-6 mb--40 mb-md--30">
    <div class="airi-product">
        <div class="product-inner">
            <figure class="product-image">
                <div class="product-image--holder">
                    <a href="{{ route('product.details', $product->slug) }}">
                        <img src="{{ $product->primary_image }}" alt="Product Image" class="primary-image">
                        @isset($product->secondary_image)
                            <img src="{{ $product->secondary_image }}" alt="Product Image" class="secondary-image">
                        @else
                            <img src="{{ $product->primary_image }}" alt="Product Image" class="secondary-image">
                        @endisset
                    </a>
                </div>
                <div class="airi-product-action">
                    <div class="product-action">
                        <a class="quickview-btn action-btn" data-bs-toggle="tooltip" data-bs-placement="left"
                            title="Quick Shop">
                            <span data-bs-toggle="modal" data-bs-target="#productModal">
                                <i class="dl-icon-view"></i>
                            </span>
                        </a>
                        <a class="add_to_cart_btn action-btn" href="cart.html" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="Add to Cart">
                            <i class="dl-icon-cart29"></i>
                        </a>
                        <a class="add_wishlist action-btn" href="wishlist.html" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="Add to Wishlist">
                            <i class="dl-icon-heart4"></i>
                        </a>
                        <a class="add_compare action-btn" href="compare.html" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="Add to Compare">
                            <i class="dl-icon-compare"></i>
                        </a>
                    </div>
                </div>
                @isset($product->status)
                    <span class="product-badge {{ $product->status }}">{{ $product->status }}</span>
                @endisset
            </figure>
            <div class="product-info text-center">
                <h3 class="product-title">
                    <a href="{{ route('product.details', $product->slug) }}">{{ $product->name }}</a>
                </h3>
                {{-- <div class="product-rating">
                    <span>
                        <i class="dl-icon-star rated"></i>
                        <i class="dl-icon-star rated"></i>
                        <i class="dl-icon-star rated"></i>
                        <i class="dl-icon-star"></i>
                        <i class="dl-icon-star"></i>
                    </span>
                </div> --}}
                <span class="product-price-wrapper">
                    @php
                        $price = $product->inventory->firstWhere(
                            'selling_price',
                            $product->inventory->min('selling_price'),
                        );
                    @endphp
                    @if ($price->offer_price)
                        <span class="money">
                            ৳{{ $price->offer_price }}
                        </span>
                        <s>৳{{ $price->selling_price }}</s>
                    @else
                        <span class="money">
                            ৳{{ $price->selling_price }}
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </div>
</div>
