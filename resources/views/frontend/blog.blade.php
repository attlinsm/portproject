@extends('frontend.main_master')

@section('title', 'Blogs | t.me/attl77')
@section('main')
    <!-- breadcrumb-area -->
    <section class="breadcrumb__wrap">
        <div class="container custom-container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="breadcrumb__wrap__content">
                        <h2 class="title">Posts</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Blog</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb__wrap__icon">
            <ul>
                <li><img src="{{asset('frontend/assets/img/icons/breadcrumb_icon01.png')}}" alt=""></li>
                <li><img src="{{asset('frontend/assets/img/icons/breadcrumb_icon02.png')}}" alt=""></li>
                <li><img src="{{asset('frontend/assets/img/icons/breadcrumb_icon03.png')}}" alt=""></li>
                <li><img src="{{asset('frontend/assets/img/icons/breadcrumb_icon04.png')}}" alt=""></li>
                <li><img src="{{asset('frontend/assets/img/icons/breadcrumb_icon05.png')}}" alt=""></li>
                <li><img src="{{asset('frontend/assets/img/icons/breadcrumb_icon06.png')}}" alt=""></li>
            </ul>
        </div>
    </section>
    <!-- breadcrumb-area-end -->


    <!-- blog-area -->
    <section class="standard__blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @foreach($all_blogs as $item)
                        <div class="standard__blog__post">
                            <div class="standard__blog__thumb">
                                <a href="{{ route('blog.details', $item->id) }}"><img src="{{ asset('upload/blog_images/blog_details/' . $item->image_details) }}" alt=""></a>
                                <a href="{{ route('blog.details', $item->id) }}" class="blog__link"><i class="far fa-long-arrow-right"></i></a>
                            </div>
                            <div class="standard__blog__content">
                                <div class="blog__post__avatar">
                                    <div class="thumb"><img src="{{ asset('upload/blog_images/' . $item->image) }}" alt=""></div>
                                    <span class="post__by">By : <a href="#">Halina Spond</a></span>
                                </div>
                                <h2 class="title"><a href="{{ route('blog.details', $item->id) }}">{{ $item->title }}</a></h2>
                                <p>{{ $item->short_description }}</p>
                                <ul class="blog__post__meta">
                                    <li><i class="fal fa-calendar-alt"></i>{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</li>
                                    <li><i class="fal fa-comments-alt"></i> <a href="#">Comment (08)</a></li>
                                    <li class="post-share"><a href="#"><i class="fal fa-share-all"></i> (18)</a></li>
                                </ul>
                            </div>
                        </div>
                    @endforeach

                    <div class="pagination-wrap">
                        {{ $all_blogs->links('vendor.pagination.custom') }}
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
                                            <a href="{{ route('blog.details', $item->id) }}"><img src="{{ asset('upload/blog_images/' . $item->image) }}" alt=""></a>
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
    <!-- blog-area-end -->
@endsection
