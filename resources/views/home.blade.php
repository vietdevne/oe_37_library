@extends('layouts.app')
@section('title', trans('main.home'))
@section('content')

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="bd-placeholder-img" src="{{ asset('images/banner.jpg') }}" alt="">
            <div class="container">
                <div class="carousel-caption text-left">
                    <h1>@lang('main.welcome').</h1>
                    <p>@lang('main.quote_1')</p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img class="bd-placeholder-img" src="{{ asset('images/banner.jpg') }}" alt="">
            <div class="container">
                <div class="carousel-caption">
                    <h1>@lang('main.welcome').</h1>
                    <p>@lang('main.quote_2')</p>
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<div class="container">
    <h2 class="heading">@lang('main.latest_books')</h2>
    <div class="row">
        @foreach($lastest as $book)
            @include('subviews.book-item', $book)
        @endforeach
    </div>
    <hr class="featurette-divider">

    <h2 class="heading">@lang('main.favorite_books')</h2>
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <svg class="bd-placeholder-img" width="100%" height="250" xmlns="http://www.w3.org/2000/svg"
                            preserveAspectRatio="xMidYMid slice" focusable="false" role="img"
                            aria-label="Placeholder: Image">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6"
                                dy=".3em">Image</text>
                        </svg>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Book title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.</p>
                            <div class="card-text">
                                <div class="star-ratings d-inline-block">
                                    <div class="fill-ratings" style="width: 85%;">
                                        <span>★★★★★</span>
                                    </div>
                                    <div class="empty-ratings">
                                        <span>★★★★★</span>
                                    </div>
                                </div>
                                <small class="text-muted">(5)</small>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6 prod-price mb-2">
                                    100,000đ
                                </div>
                                <div class="col-md-6">
                                    <a href="#" class="btn btn-outline-dark"><i class="fa fa-eye" aria-hidden="true"></i> @lang('main.view_book')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <svg class="bd-placeholder-img" width="100%" height="250" xmlns="http://www.w3.org/2000/svg"
                            preserveAspectRatio="xMidYMid slice" focusable="false" role="img"
                            aria-label="Placeholder: Image">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6"
                                dy=".3em">Image</text>
                        </svg>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Book title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.</p>
                            <div class="card-text">
                                <div class="star-ratings d-inline-block">
                                    <div class="fill-ratings" style="width: 85%;">
                                        <span>★★★★★</span>
                                    </div>
                                    <div class="empty-ratings">
                                        <span>★★★★★</span>
                                    </div>
                                </div>
                                <small class="text-muted">(5)</small>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6 prod-price mb-2">
                                    100,000đ
                                </div>
                                <div class="col-md-6">
                                    <a href="#" class="btn btn-outline-dark"><i class="fa fa-eye" aria-hidden="true"></i> @lang('main.view_book')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <svg class="bd-placeholder-img" width="100%" height="250" xmlns="http://www.w3.org/2000/svg"
                            preserveAspectRatio="xMidYMid slice" focusable="false" role="img"
                            aria-label="Placeholder: Image">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6"
                                dy=".3em">Image</text>
                        </svg>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Book title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.</p>
                            <div class="card-text">
                                <div class="star-ratings d-inline-block">
                                    <div class="fill-ratings" style="width: 85%;">
                                        <span>★★★★★</span>
                                    </div>
                                    <div class="empty-ratings">
                                        <span>★★★★★</span>
                                    </div>
                                </div>
                                <small class="text-muted">(5)</small>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6 prod-price mb-2">
                                    100,000đ
                                </div>
                                <div class="col-md-6">
                                    <a href="#" class="btn btn-outline-dark"><i class="fa fa-eye" aria-hidden="true"></i> @lang('main.view_book')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <svg class="bd-placeholder-img" width="100%" height="250" xmlns="http://www.w3.org/2000/svg"
                            preserveAspectRatio="xMidYMid slice" focusable="false" role="img"
                            aria-label="Placeholder: Image">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6"
                                dy=".3em">Image</text>
                        </svg>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Book title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.</p>
                            <div class="card-text">
                                <div class="star-ratings d-inline-block">
                                    <div class="fill-ratings" style="width: 85%;">
                                        <span>★★★★★</span>
                                    </div>
                                    <div class="empty-ratings">
                                        <span>★★★★★</span>
                                    </div>
                                </div>
                                <small class="text-muted">(5)</small>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6 prod-price mb-2">
                                    100,000đ
                                </div>
                                <div class="col-md-6">
                                    <a href="#" class="btn btn-outline-dark"><i class="fa fa-eye" aria-hidden="true"></i> @lang('main.view_book')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr class="featurette-divider">
    <!-- Three columns of text below the carousel -->
    <h2 class="heading">@lang('main.random_publishers')</h2>
    <div class="row author">
        <div class="col-lg-4">
            <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg"
                preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777"
                    dy=".3em">140x140</text>
            </svg>
            <h2 class="mt-2"><a href="#">Name</a></h2>
            <p>Description</p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg"
                preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777"
                    dy=".3em">140x140</text>
            </svg>
            <h2 class="mt-2"><a>Name</a></h2>
            <p>Description</p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg"
                preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777"
                    dy=".3em">140x140</text>
            </svg>
            <h2 class="mt-2"><a>Name</a></h2>
            <p>Description</p>
        </div><!-- /.col-lg-4 -->
    </div>
    <hr class="featurette-divider">
</div>
@endsection
