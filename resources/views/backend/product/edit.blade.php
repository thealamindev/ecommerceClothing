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
            <!--begin::Order details-->
            <div class="card card-flush py-4">
                <!--begin::Card header-->
                <div class="card-header">
                    <div class="card-title">
                        <h2>
                            Edit Product - {{ $product->name }}
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
                        <form action="{{ route('product.update', $product->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Product Name</span>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Enter Product Name" name="name" value="{{ $product->name }}">
                                        <span class="badge badge-secondary mt-3">
                                            Slug:
                                            <a target="_blank"
                                                href="{{ route('product.details', $product->slug) }}">{{ route('product.details', $product->slug) }}
                                            </a>
                                        </span>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Category Name</span>
                                        </label>
                                        <!--end::Label-->
                                        <select class="form-select @error('category_id') is-invalid @enderror"
                                            name="category_id">
                                            <option value="">-Select Category-</option>
                                            @foreach ($categories as $category)
                                                <option {{ $product->category_id == $category->id ? 'selected' : '' }}
                                                    value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span>Subcategory Name</span>
                                        </label>
                                        <!--end::Label-->
                                        <select class="form-select" name="subcategory_id">
                                            <option value="">-Select Subcategory-</option>
                                            <option value="">asdasd</option>
                                            <option value="">gorge</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            Collection
                                        </label>
                                        <!--end::Label-->
                                        <select class="form-select" name="collection_id">
                                            <option value="">-Select Collection-</option>
                                            @foreach ($collections as $collection)
                                                <option {{ $product->collection_id == $collection->id ? 'selected' : '' }}
                                                    value="{{ $collection->id }}">{{ $collection->top_title }}
                                                    ({{ $collection->lower_title }} {{ $collection->strong_title }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            Status
                                        </label>
                                        <select class="form-select" name="status">
                                            <option value="">-Select Status-</option>
                                            <option {{ $product->status == 'new' ? 'selected' : '' }} value="new">New
                                            </option>
                                            <option {{ $product->status == 'hot' ? 'selected' : '' }} value="hot">Hot
                                            </option>
                                            <option {{ $product->status == 'sale' ? 'selected' : '' }} value="sale">Sale
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Stock Keeping Unit (SKU)</span>
                                        </label>
                                        <!--end::Label-->
                                        <input class="form-control @error('sku') is-invalid @enderror" type="text"
                                            name="sku" value="{{ $product->sku }}">
                                        @error('sku')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Short Description</span>
                                        </label>
                                        <!--end::Label-->
                                        <textarea class="form-control @error('short_description') is-invalid @enderror" name="short_description" rows="3">{{ $product->short_description }}</textarea>
                                        @error('short_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Long Description</span>
                                        </label>
                                        <!--end::Label-->
                                        <textarea id="long_description_editor" class="form-control @error('long_description') is-invalid @enderror"
                                            name="long_description">{{ $product->long_description }}</textarea>
                                        @error('long_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Tags</span>
                                        </label>
                                        <!--end::Label-->
                                        <select class="form-control @error('tags') is-invalid @enderror" id="tags_dropdown"
                                            multiple="multiple" name="tags[]">
                                            @foreach ($tags as $tag)
                                                <option
                                                    {{ $product->product_tag->contains('tag_id', $tag->id) ? 'selected' : '' }}
                                                    value={{ $tag->id }}>{{ $tag->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('tags')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <div class="col-12">
                                    <div class="card border">
                                        <div class="card-body">
                                            <h4 class="card-title text-center mb-7">
                                                <i class="far fa-images"></i>
                                                Image Section
                                            </h4>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                                                        <img src="{{ $product->primary_image }}"
                                                            class="img-fluid rounded-top" alt="primary image not found" />
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                            <span class="required">Primary Image</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <input type="file"
                                                            class="form-control @error('primary_image') is-invalid @enderror"
                                                            name="primary_image">
                                                        @error('primary_image')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                                                        <img src="{{ $product->secondary_image }}"
                                                            class="img-fluid rounded-top"
                                                            alt="secondary image not found" />
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                            Secondary Image
                                                        </label>
                                                        <!--end::Label-->
                                                        <input type="file"
                                                            class="form-control @error('secondary_image') is-invalid @enderror"
                                                            name="secondary_image">
                                                        @error('secondary_image')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-secondary">Edit Product</button>
                        </form>
                    </div>
                </div>
                <!--end::Card header-->
            </div>
            <!--end::Order details-->
        </div>
        <!--end::Aside column-->
    </div>
    <!--end::Form-->
@endsection

@section('footer_scripts')
    <script>
        $(document).ready(function() {
            $('#tags_dropdown').select2({
                tags: true
            });
            tinymce.init({
                selector: "#long_description_editor",
                menubar: false,
                toolbar: [
                    "styleselect fontselect fontsizeselect",
                    "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist | outdent indent | blockquote subscript superscript | advlist | autolink | print preview"
                ],
                plugins: "advlist autolink link image lists charmap print preview code"
            });
        });
    </script>
@endsection
