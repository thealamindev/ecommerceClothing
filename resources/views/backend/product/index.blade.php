@extends('layouts.dashboard')

@section('product.index')
    active
@endsection

@section('toolbar')
    @includeIf('parts.toolbar', [
        'links' => [
            'home' => 'home',
            'Product' => 'product.index',
        ],
        'right_btn' => ['Add New Product', 'product.create'],
    ])
@endsection

@section('content')
    <!--begin::Form-->
    <div class="form d-flex flex-column flex-lg-row">
        <!--begin::Aside column-->
        <div class="w-100 flex-lg-row-auto mb-7 me-7 me-lg-10">
            <!--begin::Order details-->
            <div class="card card-flush py-4">
                <!--begin::Card header-->
                <div class="card-header">
                    <div class="card-title">
                        <h2>Products</h2>
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <div class="d-flex flex-column gap-10">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            @session('success')
                            <div class="alert alert-info">
                                {{ $value }}
                            </div>
                            @endsession
                            <!--begin::Table-->
                            <table class="table align-middle gs-0 gy-4">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="fw-bolder text-muted bg-light">
                                        <th class="ps-4 min-w-300px rounded-start">Product Name</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th class="pe-4 min-w-200px text-end rounded-end">Action</th>
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                    @forelse ($products as $product)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="d-flex justify-content-start flex-column">
                                                        <a href="{{ route('product.details', $product->slug) }}" target="_blank"
                                                            class="text-dark fw-bolder text-hover-primary mb-1 fs-6">
                                                            {{ $product->name }} <i class="fas fa-link"></i>
                                                        </a>
                                                        <span
                                                            class="text-muted fw-bold text-muted d-block fs-7">{{ $product->description }}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $product->created_at->diffForHumans() }}</td>
                                            <td>{{ $product->updated_at->diffForHumans() }}</td>
                                            <td class="text-end">
                                                <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                                    <a href="{{ route('product.manage.inventory', $product->id) }}"
                                                        class="btn btn-bg-success btn-color-white btn-active-color-secondary btn-sm px-4 me-2">Manage Inventory</a>
                                                    <a href="{{ route('product.show', $product->id) }}"
                                                        class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4 me-2">View</a>
                                                    <a href="{{ route('product.edit', $product->id) }}"
                                                        class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4 me-2">Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        class="btn btn-bg-danger btn-color-white btn-active-color-primary btn-sm px-4 me-2">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="50">
                                                <div class="alert alert-danger">No product to show</div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Table container-->
                    </div>
                    {{-- {{ $products->links() }} --}}
                </div>
                <!--end::Card header-->
            </div>
            <!--end::Order details-->
        </div>
        <!--end::Aside column-->
    </div>
    <!--end::Form-->
@endsection
