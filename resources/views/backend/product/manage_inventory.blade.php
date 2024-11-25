@extends('layouts.dashboard')

@section('product.index')
    active
@endsection

@section('toolbar')
    @includeIf('parts.toolbar', [
        'links' => [
            'home' => 'home',
            'Add Inventory' => '',
        ],
        'right_btn' => ['All Products', 'product.index'],
    ])
@endsection

@section('content')
    <!--begin::Form-->
    <div class="form d-flex flex-column flex-lg-row">
        <!--begin::Aside column-->
        <div class="w-100 flex-lg-row-auto mb-7 me-7 me-lg-10">
            <div class="card card-flush py-4">
                <!--begin::Card header-->
                <div class="card-header">
                    <div class="card-title">
                        <h2>
                            Add Inventory - {{ $product->name }}
                            <a href="{{ route('product.details', $product->slug) }}" target="_blank">
                                <i class="fas fa-external-link-square-alt"></i>
                            </a>
                        </h2>
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <div class="d-flex flex-column gap-10">
                        @session('success')
                            <div class="alert alert-success">
                                {{ $value }}
                            </div>
                        @endsession

                        <form action="{{ route('product.manage.inventory.post', $product->id) }}" method="POST">
                            @csrf
                            <div class="row mb-6">
                                <div class="col-12">
                                    <div class="card border">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-2">
                                                    <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                            <span>Color</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <select class="form-select" name="color_id">
                                                            <option value="">-Select One Color-</option>
                                                            @foreach ($colors as $color)
                                                                <option value="{{ $color->id }}">{{ $color->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                            <span>Size</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <select class="form-select" name="size_id">
                                                            <option value="">-Select One Size-</option>
                                                            @foreach ($sizes as $size)
                                                                <option value="{{ $size->id }}">{{ $size->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                            <span>Purchase Price</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <input class="form-control" type="number" name="purchase_price">
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                            <span>Selling Price</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <input class="form-control" type="number" name="selling_price">
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                            <span>Offer Price</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <input class="form-control" type="number" name="offer_price">
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                            <span>Quantity</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <input class="form-control" type="number" name="quantity">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-info">Add Inventory</button>
                        </form>
                    </div>
                </div>
                <!--end::Card header-->
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
                                        <th>Sold Quantity</th>
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
                                            <td class="ps-4">
                                                @if ($inventory->quantity == $inventory->sold_quantity)
                                                    <i class="fa fa-exclamation-circle text-danger" title="Stock Out"></i>
                                                @else
                                                    <i>&nbsp;&nbsp;&nbsp;&nbsp;</i>
                                                @endif
                                                <span title="id#{{ $inventory->id }}">
                                                    {{ $inventory->lot_no }}
                                                </span>
                                            </td>
                                            <td>{{ $inventory->color->name }}</td>
                                            <td>{{ $inventory->size->name }}</td>
                                            <td>{{ $inventory->purchase_price }}</td>
                                            <td>{{ $inventory->selling_price }}</td>
                                            <td>{{ $inventory->offer_price }}</td>
                                            <td>{{ $inventory->quantity }}</td>
                                            <td>{{ $inventory->sold_quantity }}</td>
                                            <td>{{ $inventory->quantity * $inventory->selling_price }}</td>
                                        </tr>
                                        @php
                                            $total_market_value += $inventory->quantity * $inventory->selling_price;
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
                                            <th>{{ $product->inventory->sum('sold_quantity') }}</th>
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
        <!--end::Aside column-->
    </div>
    <!--end::Form-->
@endsection
