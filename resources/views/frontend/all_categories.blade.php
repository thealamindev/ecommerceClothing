@extends('layouts.frontend')

@section('category')
    active
@endsection

@section('content')
<!-- Breadcrumb area Start -->
<div class="breadcrumb-area bg--white-6 ptb--70 ptb-lg--40">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="page-title">All Categories</h1>
                <ul class="breadcrumb justify-content-center">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li class="current"><span>All Categories</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb area End -->
<!-- Main Content Wrapper Start -->
<div id="content" class="main-content-wrapper">
    <div class="page-content-inner">
        <div class="container">
            <div class="row pt--80 pb--40">
                @forelse ($categories as $category)
                <div class="col-lg-4 col-sm-6 mb--40 mb-md--30">
                    <div class="airi-team">
                        <div class="team-member">
                            <div class="team-member__info">
                                <h2 class="team-member__name"><a href="{{ route('s.category', $category->slug) }}">{{ $category->name }}</a></h2>
                                <div class="tagcloud">
                                    @foreach ($category->subcategory as $subcategory)
                                        <a href="{{ route('s.category', ['slug' => $category->slug, 'sub_slug' => $subcategory->slug]) }}">{{ $subcategory->name }}</a>
                                    @endforeach
                                </div>
                                <p class="team-member__desc">{{ $category->description ?? "No description to show" }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="alert alert-danger">No category to show</div>
                @endforelse

            </div>
        </div>
    </div>
</div>
<!-- Main Content Wrapper Start -->
@endsection
