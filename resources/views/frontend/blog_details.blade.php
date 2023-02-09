@extends('frontend.main_master')

@section('title', 'Blog details | t.me/attl77')
@section('main')
<!-- breadcrumb-area -->
<section class="breadcrumb__wrap">
    <div class="container custom-container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-10">
                <div class="breadcrumb__wrap__content">
                    <h2 class="title">{{ $blog->title }}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('welcome.page') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Details</li>
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


<!-- blog-details-area -->
<section class="standard__blog blog__details">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="standard__blog__post">
                    <div class="standard__blog__thumb">
                        <img src="{{ asset('storage/upload/blog_images/blog_details/' . $blog->image_details) }}" alt="">
                    </div>
                    <div class="blog__details__content services__details__content">
                        <ul class="blog__post__meta">
                            <li><i class="fal fa-calendar-alt"></i>{{ \Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</li>
                            <li><i class="fal fa-comments-alt"></i> <a href="#">Comment (08)</a></li>
                            <li class="post-share"><a href="#"><i class="fal fa-share-all"></i> (18)</a></li>
                        </ul>
                        <h2 class="title">{{ $blog->title }}</h2>
                        {!! $blog->description !!}
                    </div>
                    <div class="blog__details__bottom">
                        <ul class="blog__details__tag">
                            <li class="title">Tags:</li>
                            <li class="tags-list">
                                <a href="#">{{ $blog->tags }}</a>
                            </li>
                        </ul>
                    </div>
                    {{-- Next or prev post --}}
                    <div class="blog__next__prev">
                        <div class="row justify-content-between">
                            <div class="col-xl-5 col-md-6">
                                <div class="blog__next__prev__item">
                                    <h4 class="title">Previous Post</h4>
                                    <div class="blog__next__prev__post">
                                        <div class="blog__next__prev__thumb">
                                            <a href="blog-details.html"><img src="{{ asset('frontend/assets/img/blog/blog_prev.jpg') }}" alt=""></a>
                                        </div>
                                        <div class="blog__next__prev__content">
                                            <h5 class="title"><a href="blog-details.html">Digital Marketing Agency Pricing Guide.</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-5 col-md-6">
                                <div class="blog__next__prev__item next_post text-end">
                                    <h4 class="title">Next Post</h4>
                                    <div class="blog__next__prev__post">
                                        <div class="blog__next__prev__thumb">
                                            <a href="blog-details.html"><img src="{{ asset('frontend/assets/img/blog/blog_next.jpg') }}" alt=""></a>
                                        </div>
                                        <div class="blog__next__prev__content">
                                            <h5 class="title"><a href="blog-details.html">App Prototyping
                                                    Types, Example & Usages.</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Comments --}}
                    <div class="comment comment__wrap">
                        <div class="comment__title">
                            <h4 class="title">(04) Comment</h4>
                        </div>
                        <ul class="comment__list">
                            <li class="comment__item">
                                <div class="comment__thumb">
                                    <img src="{{ asset('frontend/assets/img/blog/comment_thumb01.png') }}" alt="">
                                </div>
                                <div class="comment__content">
                                    <div class="comment__avatar__info">
                                        <div class="info">
                                            <h4 class="title">Rohan De Spond</h4>
                                            <span class="date">25 january 2021</span>
                                        </div>
                                        <a href="#" class="reply"><i class="far fa-reply-all"></i></a>
                                    </div>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have. There are many variations of passages of Lorem Ipsum available, but the majority have</p>
                                </div>
                            </li>
                            <li class="comment__item children">
                                <div class="comment__thumb">
                                    <img src="{{ asset('frontend/assets/img/blog/comment_thumb02.png') }}" alt="">
                                </div>
                                <div class="comment__content">
                                    <div class="comment__avatar__info">
                                        <div class="info">
                                            <h4 class="title">Johan Ritaxon</h4>
                                            <span class="date">25 january 2021</span>
                                        </div>
                                        <a href="#" class="reply"><i class="far fa-reply-all"></i></a>
                                    </div>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have. There are many variations of passages</p>
                                </div>
                            </li>
                            <li class="comment__item">
                                <div class="comment__thumb">
                                    <img src="{{ asset('frontend/assets/img/blog/comment_thumb03.png') }}" alt="">
                                </div>
                                <div class="comment__content">
                                    <div class="comment__avatar__info">
                                        <div class="info">
                                            <h4 class="title">Alexardy Ditartina</h4>
                                            <span class="date">25 january 2021</span>
                                        </div>
                                        <a href="#" class="reply"><i class="far fa-reply-all"></i></a>
                                    </div>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have. There are many variations of passages of Lorem Ipsum available, but the majority have</p>
                                </div>
                            </li>
                            <li class="comment__item children">
                                <div class="comment__thumb">
                                    <img src="{{ asset('frontend/assets/img/blog/comment_thumb04.png') }}" alt="">
                                </div>
                                <div class="comment__content">
                                    <div class="comment__avatar__info">
                                        <div class="info">
                                            <h4 class="title">Rashedul islam Kabir</h4>
                                            <span class="date">25 january 2021</span>
                                        </div>
                                        <a href="#" class="reply"><i class="far fa-reply-all"></i></a>
                                    </div>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have. There are many variations of passages</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    {{-- Comment form --}}
                    <div class="comment__form">
                        <div class="comment__title">
                            <h4 class="title">Write your comment</h4>
                        </div>
                        <form action="#">
                            <textarea name="message" id="message" placeholder="Enter your Massage*"></textarea>
                            <button type="submit" class="btn">post a comment</button>
                        </form>
                    </div>

                </div>
            </div>
            <div class="col-lg-4">
                <aside class="blog__sidebar">
                    <div class="widget">
                        <form action="#" class="search-form">
                            <input type="text" placeholder="Search">
                            <button type="submit"><i class="fal fa-search"></i></button>
                        </form>
                    </div>
                    <div class="widget">
                        <h4 class="widget-title">Recent posts</h4>
                        <ul class="rc__post">
                            @foreach($all_blogs as $item)
                            <li class="rc__post__item">
                                <div class="rc__post__thumb">
                                    <a href="{{ route('blog.details', $item->id) }}"><img src="{{ asset('storage/upload/blog_images/' . $item->image) }}" alt=""></a>
                                </div>
                                <div class="rc__post__content">
                                    <h5 class="title"><a href="{{ route('blog.details', $item->id) }}">{{ $item->title }}</a></h5>
                                    <span class="post-date"><i class="fal fa-calendar-alt"></i>{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="widget">
                        <h4 class="widget-title">Categories</h4>
                        <ul class="sidebar__cat">
                            @foreach($categories as $item)
                            <li class="sidebar__cat__item"><a href="{{ route('blog.category', $item->id) }}">{{ $item->blog_category }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>
<!-- blog-details-area-end -->

@endsection
