@extends('frontend.main_master')

@section('title', 'About | t.me/attl77')
@section('main')

@php
    $aboutPage = \App\Models\About::query()->find(1);
@endphp
<!-- main-area -->
<main>
    <!-- breadcrumb-area -->
    <section class="breadcrumb__wrap">
        <div class="container custom-container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="breadcrumb__wrap__content">
                        <h2 class="title">About me</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">About Me</li>
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

    <!-- about-area -->
    <section class="about about__style__two">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about__image">
                        <img src="{{ asset('upload/about_image/' . $aboutPage->about_image) }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about__content">
                        <div class="section__title">
                            <span class="sub-title">01 - About me</span>
                            <h2 class="title">{{ $aboutPage->title }}</h2>
                        </div>
                        <div class="about__exp">
                            <div class="about__exp__content">
                                <p>{{ $aboutPage->short_title }}</p>
                            </div>
                        </div>
                        <p class="desc">{{ $aboutPage->short_description }}</p>
                        <a href="https://hh.ru/" class="btn">Check my resume</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="about__info__wrap">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="about-tab" data-bs-toggle="tab" data-bs-target="#about" type="button"
                                        role="tab" aria-controls="about" aria-selected="true">About</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="skills-tab" data-bs-toggle="tab" data-bs-target="#skills" type="button"
                                        role="tab" aria-controls="skills" aria-selected="false">Soft skills</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="education-tab" data-bs-toggle="tab" data-bs-target="#education" type="button"
                                        role="tab" aria-controls="education" aria-selected="false">education</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
                                {!! $aboutPage->long_description !!}
                            </div>
                            <div class="tab-pane fade" id="skills" role="tabpanel" aria-labelledby="skills-tab">
                                <div class="about__skill__wrap">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="about__skill__item">
                                                <h5 class="title">Communication</h5>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"><span class="percentage">70%</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="education-tab">
                                <div class="about__education__wrap">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="about__education__item">
                                                <h3 class="title">DPR Engineering Dhaka University</h3>
                                                <span class="date">2004 – 2016</span>
                                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour,There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                                                    alteration in some form, by injected humour.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-area-end -->

    <!-- services-area -->
    <section class="services__style__two">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="section__title text-center">
                        <span class="sub-title">02 - my knowledge</span>
                        <h2 class="title">Already acquired skills</h2>
                    </div>
                </div>
            </div>
            <div class="services__style__two__wrap">
                <div class="row gx-0">
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="services__style__two__item">
                            <div class="services__style__two__icon">
                                <img src="{{ asset('frontend/assets/img/icons/services_light_icon01.png') }}" alt="">
                            </div>
                            <div class="services__style__two__content">
                                <h3 class="title"><a href="services-details.html">Business Strategy</a></h3>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority.</p>
                                <a href="services-details.html" class="services__btn"><i class="far fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- services-area-end -->

    @php
        $blogs = App\Models\Blog::query()->latest()->limit(3)->get();
    @endphp
    <section class="blog">
        <div class="container">
            <div class="row gx-0 justify-content-center">
                @foreach($blogs as $item)
                    <div class="col-lg-4 col-md-6 col-sm-9">
                        <div class="blog__post__item">
                            <div class="blog__post__thumb">
                                <a href="{{ route('blog.details', $item->id) }}"><img src="{{ asset('upload/blog_images/' . $item->image) }}" alt=""></a>
                                <div class="blog__post__tags">
                                    <a href="{{ route('blog.category', $item->category_id) }}">{{ $item['Category']['blog_category'] }}</a>
                                </div>
                            </div>
                            <div class="blog__post__content">
                                <span class="date">{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
                                <h3 class="title"><a href="{{ route('blog.details', $item->id) }}">{{ $item->title }}</a></h3>
                                <a href="{{ route('blog.details', $item->id) }}" class="read__more">Read more</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="blog__button text-center">
                <a href="{{ route('home.blog') }}" class="btn">all publications</a>
            </div>
        </div>
    </section>

</main>
<!-- main-area-end -->
@endsection
