@extends('layouts.dashboard')

@section('product.index')
    active
@endsection

@section('toolbar')
    @includeIf('parts.toolbar', [
        'links' => [
            'home' => 'home',
            'Product' => 'product.index',
            $product->name => 'link',
        ],
    ])
@endsection

@section('content')
    <!--begin::Form-->
    <div class="form d-flex flex-column flex-lg-row">
        <!--begin::Aside column-->
        <div class="w-100 flex-lg-row-auto mb-7 me-7 me-lg-10">
            <div class="row mb-4">
                <div class="col-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h4 class="card-title">
                                {{ $product->name }}
                                <a href="{{ route('product.edit', $product->id) }}" target="_blank">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </h4>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <img class="card-img-top" src="{{ $product->primary_image }}" alt="not found" />
                        <div class="card-body">
                            <h4 class="card-title">Primary Image</h4>
                        </div>
                    </div>
                    @isset($product->secondary_image)
                        <div class="card mb-4">
                            <img class="card-img-top" src="{{ $product->secondary_image }}" alt="not found" />
                            <div class="card-body">
                                <h4 class="card-title">Secondary Image</h4>
                            </div>
                        </div>
                    @endisset
                </div>
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Short Description</h3>
                            <p class="card-text">
                                {!! $product->short_description !!}
                            </p>
                            <h3 class="card-title">Long Description</h3>
                            <p class="card-text">
                                {!! $product->long_description !!}
                            </p>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td>Added By</td>
                                            <td>{{ $product->user->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Category Name</td>
                                            <td>{{ $product->category->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Subcategory Name</td>
                                            <td>{{ $product->subcategory->name ?? "No Subcategory Selected" }}</td>
                                        </tr>
                                        <tr>
                                            <td>Collection Name</td>
                                            <td>
                                                {{ $product->collection->top_title }}
                                                {{ $product->collection->lower_title }}
                                                <b>{{ $product->collection->strong_title }}</b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>SKU Code</td>
                                            <td>{{ $product->sku }}</td>
                                        </tr>
                                        <tr>
                                            <td>Slug</td>
                                            <td>
                                                <a href="{{ route('product.details', $product->slug) }}"
                                                    target="_blank">{{ $product->slug }} <i
                                                        class="fas fa-external-link-square-alt"></i></a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Status</td>
                                            <td>{{ $product->status }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card card-flush my-4 py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Current Inventory of {{ $product->name }}</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <div class="d-flex flex-column gap-10">
                                <!--begin::Table container-->
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table class="table align-middle gs-0 gy-4">
                                        <!--begin::Table head-->
                                        <thead>
                                            <tr class="fw-bolder text-muted bg-light">
                                                <th class="ps-4 rounded-start">Lot No</th>
                                                <th>Color</th>
                                                <th>Size</th>
                                                <th>Purchase Price</th>
                                                <th>Selling Price</th>
                                                <th>Offer Price</th>
                                                <th>Quantity</th>
                                                <th>Market Value</th>
                                            </tr>
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody>
                                            @php
                                                $total_market_value = 0;
                                            @endphp
                                            @forelse ($product->inventory->sortByDesc('lot_no') as $inventory)
                                                <tr>
                                                    <td class="ps-4">{{ $inventory->lot_no }}</td>
                                                    <td>{{ $inventory->color->name }}</td>
                                                    <td>{{ $inventory->size->name }}</td>
                                                    <td>{{ $inventory->purchase_price }}</td>
                                                    <td>{{ $inventory->selling_price }}</td>
                                                    <td>{{ $inventory->offer_price }}</td>
                                                    <td>{{ $inventory->quantity }}</td>
                                                    <td>{{ $inventory->quantity * $inventory->selling_price }}</td>
                                                </tr>
                                                @php
                                                    $total_market_value +=
                                                        $inventory->quantity * $inventory->selling_price;
                                                @endphp
                                            @empty
                                                <tr class="text-danger text-center">
                                                    <td colspan="50">No Inventory Found</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                        <!--end::Table body-->
                                        @if ($product->inventory->count() != 0)
                                            <tfoot>
                                                <tr class="fw-bolder bg-light">
                                                    <th class="ps-4 rounded-start text-center" colspan="6">Total</th>
                                                    <th>{{ $product->inventory->sum('quantity') }}</th>
                                                    <th>{{ $total_market_value }}</th>
                                                </tr>
                                            </tfoot>
                                        @endif
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Table container-->
                            </div>
                        </div>
                        <!--end::Card header-->
                    </div>
                </div>
            </div>
        </div>
        <!--end::Aside column-->
    </div>
    <!--end::Form-->
@endsection
