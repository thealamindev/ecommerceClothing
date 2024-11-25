@extends('layouts.dashboard')

@section('name')
    Add New Product
@endsection

@section('product.index')
    active
@endsection

@section('toolbar')
    @includeIf('parts.toolbar', [
        'links' => [
            'home' => 'home',
            'Add New Product' => 'product.create',
        ],
        'right_btn' => ['All Products', 'product.index'],
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
                        <h2>Add New Product</h2>
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

                        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Product Name</span>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Product Name"
                                            name="name" value="{{ old('name') }}">
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
                                        <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" id="category_dropdown">
                                            <option value="">-Select Category-</option>
                                            @foreach ($categories as $category)
                                                <option {{ (old('category_id') == $category->id) ? 'selected':'' }} value="{{ $category->id }}">{{ $category->name }}</option>
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
                                        <select class="form-select" name="subcategory_id" id="subcategory_dropdown" disabled>
                                            <option value="">Select Category First</option>
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
                                                <option value="{{ $collection->id }}">{{ $collection->top_title }}
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
                                            <option value="new">New</option>
                                            <option value="hot">Hot</option>
                                            <option value="sale">Sale</option>
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
                                        <input class="form-control @error('sku') is-invalid @enderror" type="text" name="sku"
                                            value="{{ Str::upper(Str::random(6)) }}">
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
                                        <textarea class="form-control @error('short_description') is-invalid @enderror" name="short_description" rows="3">{{ old('short_description') }}</textarea>
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
                                        <textarea id="long_description_editor" class="form-control @error('long_description') is-invalid @enderror" name="long_description">{{ old('long_description') }}</textarea>
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
                                        <select class="form-control @error('tags') is-invalid @enderror" id="tags_dropdown" multiple="multiple" name="tags[]">
                                            @foreach ($tags as $tag)
                                                <option value={{ $tag->id }}>{{ $tag->name }}</option>
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
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                            <span class="required">Primary Image</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <input type="file" class="form-control @error('primary_image') is-invalid @enderror" name="primary_image">
                                                        @error('primary_image')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                            Secondary Image
                                                        </label>
                                                        <!--end::Label-->
                                                        <input type="file" class="form-control @error('secondary_image') is-invalid @enderror"
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
                            <div class="row mb-6">
                                <div class="col-12">
                                    <div class="card border">
                                        <div class="card-body">
                                            <h4 class="card-title text-center mb-7">
                                                <i class="fas fa-truck-loading"></i>
                                                Add Inventory Section
                                            </h4>
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
                                                                <option value="{{ $color->id }}">{{ $color->name }}</option>
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
                                                                <option value="{{ $size->id }}">{{ $size->name }}</option>
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
                            <button class="btn btn-info">Add New Product</button>
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

            $('#category_dropdown').change(function(){
                var selectedValue = $(this).val();
                $.ajax({
                    url: "{{ url('get/subcategory') }}/" + selectedValue,
                    type: 'GET',
                    success: function(response){
                        if (response.length == 0) {
                            var options = '<option value="">There is no subcategory under this category</option>';
                        } else {
                            var options = '<option value="">-Select Subcategory-</option>';
                        }
                        $.each(response, function(index, option){
                            options += '<option value="' + option.id + '">' + option.name + '</option>';
                        });
                        if (response.length == 0) {
                            $('#subcategory_dropdown').attr('disabled', true);
                        } else {
                            $('#subcategory_dropdown').attr('disabled', false);
                        }
                        $('#subcategory_dropdown').html(options);
                    }
                });
            });
        });
    </script>
@endsection
