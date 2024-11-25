@extends('layouts.dashboard')

@section('collection.index')
    active
@endsection

@section('toolbar')
    @includeIf('parts.toolbar', [
        'links' => [
            'home' => 'home',
            'Collection' => 'collection.index',
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
                        <h2>Collections</h2>
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
                                        <th class="ps-4 min-w-300px rounded-start">Collection Name</th>
                                        <th class="min-w-200px text-end rounded-end"></th>
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                    @forelse ($collections as $collection)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="d-flex justify-content-start flex-column">
                                                        <a class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{ $collection->top_title }}</a>
                                                        <span class="text-muted fw-bold text-muted d-block fs-7">{{ $collection->lower_title }}</span>
                                                        <strong>{{ $collection->strong_title }}</strong>
                                                        <img src="{{ $collection->thumbnail }}" alt="not found" width="100">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-end">
                                                {{-- <a href="#"
                                                    class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4 me-2">View</a> --}}
                                                <a href="{{ route('collection.edit', $collection->id) }}"
                                                    class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4">Edit</a>
                                                <form action="{{ route('collection.destroy', $collection->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                    <tr><td colspan="2" class="text-center text-danger">No collection to show</td></tr>
                                    @endforelse
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Table container-->
                    </div>
                    {{ $collections->links() }}
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
                        <h2>Add Collection</h2>
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <form action="{{ route('collection.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!--begin::Collection-->
                        <div class="d-flex flex-column gap-5 gap-md-7">
                            <!--begin::Input group-->
                            <div class="d-flex flex-column flex-md-row gap-5">
                                <div class="fv-row flex-row-fluid">
                                    <!--begin::Label-->
                                    <label class="form-label">Top Title</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input class="form-control" name="top_title" placeholder="Top Title" value="{{ old('top_title') }}"/>
                                    <!--end::Input-->
                                </div>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="d-flex flex-column flex-md-row gap-5">
                                <div class="fv-row flex-row-fluid">
                                    <!--begin::Label-->
                                    <label class="form-label">Lower Title</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input class="form-control" name="lower_title" placeholder="Lower Title" value="{{ old('lower_title') }}"/>
                                    <!--end::Input-->
                                </div>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="d-flex flex-column flex-md-row gap-5">
                                <div class="fv-row flex-row-fluid">
                                    <!--begin::Label-->
                                    <label class="form-label">Strong Title</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input class="form-control" name="strong_title" placeholder="Strong Title" value="{{ old('strong_title') }}"/>
                                    <!--end::Input-->
                                </div>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="d-flex flex-column flex-md-row gap-5">
                                <div class="fv-row flex-row-fluid">
                                    <!--begin::Label-->
                                    <label class="required form-label">Thumbnail</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" name="thumbnail"/>
                                    @error('thumbnail')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <!--end::Input-->
                                </div>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="d-flex flex-column flex-md-row gap-5">
                                <div class="fv-row flex-row-fluid">
                                    <button class="btn btn-info">Add Collection</button>
                                </div>
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Collection-->
                    </form>
                </div>
                <!--end::Card body-->
            </div>
        </div>
        <!--end::Main column-->
    </div>
    <!--end::Form-->
@endsection
