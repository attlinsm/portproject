<section class="services">
    <div class="container">
        <div class="services__title__wrap">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-5 col-lg-6 col-md-8">
                    <div class="section__title">
                        <span class="sub-title">02 - my skills</span>
                        <h2 class="title">The knowledge that I have</h2>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 col-md-4">
                    <div class="services__arrow"></div>
                </div>
            </div>
        </div>
        <div class="row gx-0 services__active">
            @foreach(\App\Models\Skills::query()->latest()->get() as $item)
                <div class="col-xl-3">
                    <div class="bg-white">
                        <div class="services__thumb">
                            <a href="#"><img src="{{ asset('upload/skills_images/' . $item->image) }}" alt=""></a>
                        </div>
                        <div class="services__content" style="min-height: 584px">
                            <div class="services__icon">
                                <img class="light" src="{{ asset('upload/skills_images/icons/' . $item->icon) }}" alt="">
                            </div>
                            <h3 class="title"><a href="services-details.html">{{ $item->name }}</a></h3>
                            <p>{{ $item->short_description }}</p>
                            <ul class="services__list">
                                @foreach($item->pros_list as $pros)
                                    <li>{{ $pros }}</li>
                                @endforeach
                            </ul>
                            <a href="#" class="btn border-btn">Read more</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
