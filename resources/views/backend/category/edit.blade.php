@extends('layouts.dashboard')

@section('category.index')
    active
@endsection

@section('toolbar')
    @includeIf('parts.toolbar', [
        'links' => [
            'home' => 'home',
            'Category & Subcategory' => 'category.index',
        ],
    ])
@endsection

@section('content')
    <!--begin::Form-->
    <div class="form d-flex flex-column flex-lg-row">
        <!--begin::Aside column-->
        <div class="w-100 flex-lg-row-auto w-lg-600px mb-7 me-7 me-lg-10">
            <!--begin::Order details-->
            <div class="card card-flush py-4">
                <!--begin::Card header-->
                <div class="card-header">
                    <div class="card-title">
                        <h2>Subcategories</h2>
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <div class="d-flex flex-column gap-10">
                        <form action="{{ route('subcategory.store', $category->id) }}" method="POST">
                            @csrf
                            @session('s_success')
                                <div class="alert alert-success">
                                    {{ $value }}
                                </div>
                            @endsession
                            <div class="row">

                                <div class="col-8">
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="col-4">
                                    <button class="btn btn-info">Add Subcategory</button>
                                </div>
                            </div>
                        </form>
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table align-middle gs-0 gy-4">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="fw-bolder text-muted bg-light">
                                        <th class="ps-4 min-w-300px rounded-start">Subcategory Name</th>
                                        <th class="min-w-200px text-end rounded-end"></th>
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                    @forelse ($category->subcategory as $subcategory)
                                    <tr>
                                        <td>{{ $subcategory->name }}</td>
                                        <td>{{ $subcategory->created_at->diffForHumans() }}</td>
                                    </tr>
                                    @empty
                                    <tr class="text-center text-danger">
                                        <td colspan="50">No subcategory added yet!</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Table container-->
                    </div>
                </div>
                <!--end::Card header-->
            </div>
            <!--end::Order details-->
        </div>
        <!--end::Aside column-->
        <!--begin::Main column-->
        <div class="d-flex flex-column flex-lg-row-fluid gap-7 gap-lg-10">
            <!--begin::Order details-->
            <div class="card card-flush py-4">
                <!--begin::Card header-->
                <div class="card-header">
                    <div class="card-title">
                        <h2>Edit Category - {{ $category->name }}</h2>
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <form action="{{ route('category.update', $category->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <!--begin::Category-->
                        <div class="d-flex flex-column gap-5 gap-md-7">
                            <!--begin::Input group-->
                            <div class="d-flex flex-column flex-md-row gap-5">
                                <div class="fv-row flex-row-fluid">
                                    <!--begin::Label-->
                                    <label class="required form-label">Category Name</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input class="form-control @error('name') is-invalid @enderror" name="name"
                                        placeholder="Category Name" value="{{ $category->name }}" />
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <!--end::Input-->
                                </div>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="d-flex flex-column flex-md-row gap-5">
                                <div class="fv-row flex-row-fluid">
                                    <!--begin::Label-->
                                    <label class="form-label">Category Description</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <textarea class="form-control" name="description" rows="4">{{ $category->description }}</textarea>
                                    <!--end::Input-->
                                </div>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="d-flex flex-column flex-md-row gap-5">
                                <div class="fv-row flex-row-fluid">
                                    <!--begin::Label-->
                                    <label class="form-label">Category Slug (link)</label>
                                    <!--end::Label-->
                                    <a href="{{ route('s.category', $category->slug) }}" target="_blank">
                                        <span class="badge bg-secondary text-dark">{{ route('s.category', $category->slug) }}</span>
                                    </a>
                                </div>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="d-flex flex-column flex-md-row gap-5">
                                <div class="fv-row flex-row-fluid">
                                    <button class="btn btn-info">Edit Category</button>
                                </div>
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Category-->
                    </form>
                </div>
                <!--end::Card body-->
            </div>
        </div>
        <!--end::Main column-->
    </div>
    <!--end::Form-->
@endsection
