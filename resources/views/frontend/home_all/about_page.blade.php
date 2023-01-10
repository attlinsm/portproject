@php
    $aboutPage = \App\Models\About::query()->find(1);
    $all_multi_image = \App\Models\MultiImage::all();
@endphp
<section id="aboutSection" class="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <ul class="about__icons__wrap">
                    @foreach($all_multi_image as $item)
                        <li>
                            <img class="light" src="{{ asset('upload/multi_images/' . $item->multi_image) }}" alt="">
                            <img class="dark" src="{{ asset('upload/multi_images/' . $item->multi_image) }}" alt="">
                        </li>
                    @endforeach
                </ul>
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
                    <a href="{{ route('home.about') }}" class="btn banner__btn wow fadeInUp" data-wow-delay=".6s">more about me</a>
                </div>
            </div>
        </div>
    </div>
</section>
