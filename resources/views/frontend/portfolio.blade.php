@extends('frontend.main_master')

@section('title', 'Portfolios | t.me/attl77')
@section('main')
<!-- breadcrumb-area -->
<section class="breadcrumb__wrap">
    <div class="container custom-container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-10">
                <div class="breadcrumb__wrap__content">
                    <h2 class="title">My work</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('welcome.page') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Portfolios</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="breadcrumb__wrap__icon">
        <ul>
            <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon01.png') }}" alt=""></li>
            <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon02.png') }}" alt=""></li>
            <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon03.png') }}" alt=""></li>
            <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon04.png') }}" alt=""></li>
            <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon05.png') }}" alt=""></li>
            <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon06.png') }}" alt=""></li>
        </ul>
    </div>
</section>
<!-- breadcrumb-area-end -->

<!-- portfolio-area -->
<section class="portfolio__inner">
    <div class="container">
        @foreach($portfolio as $item)
        <div class="portfolio__inner__item grid-item cat-two cat-three">
            <div class="row gx-0 align-items-center">
                <div class="col-lg-6 col-md-10">
                    <div class="portfolio__inner__thumb">
                        <a href="{{ route('portfolio.details', $item->id) }}">
                            <img src="{{ asset('upload/portfolio_images/' . $item->portfolio_image) }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-10">
                    <div class="portfolio__inner__content">
                        <h2 class="title"><a href="{{ route('portfolio.details', $item->id) }}">{{ $item->portfolio_name }}</a></h2>
                        {!!  \Illuminate\Support\Str::words($item->portfolio_description, 23, '...') !!}
                        <br>
                        <a href="{{ route('portfolio.details', $item->id) }}" class="link">more details</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
<!-- portfolio-area-end -->
@endsection
