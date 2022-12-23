@php

$activeRoute = Illuminate\Support\Facades\Route::current()->getName();
$footer = \App\Models\Footer::query()->find(1);

@endphp
<header>
    <div id="sticky-header" class="menu__area transparent-header">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="mobile__nav__toggler"><i class="fas fa-bars"></i></div>
                    <div class="menu__wrap">
                        <nav class="menu__nav">
                            <div class="navbar__wrap main__menu d-none d-xl-flex">
                                <ul class="navigation">
                                    <li class="{{ ($activeRoute ==  'welcome.page') ? 'active' : ''  }}">
                                        <a href="{{ route('welcome.page') }}">Home</a></li>
                                    <li class="{{ ($activeRoute ==  'home.about') ? 'active' : ''  }}">
                                        <a href="{{ route('home.about') }}">About</a></li>
                                    <li>
                                        <a href="services-details.html">Services</a></li>
                                    <li class="menu-item-has-children {{ ($activeRoute ==  'home.portfolio') ? 'active' : ''  }}">
                                        <a href="{{ route('home.portfolio') }}">Portfolios</a></li>
                                    <li class="menu-item-has-children {{ ($activeRoute ==  'home.blog') ? 'active' : ''  }}">
                                        <a href="{{ route('home.blog') }}">Blog</a>
                                    </li>
                                    <li class="{{ ($activeRoute ==  'contact.me') ? 'active' : ''  }}">
                                        <a href="{{ route('contact.me') }}">Contact me</a></li>
                                </ul>
                            </div>
                            <div class="header__btn d-none d-md-block">
                                <a href="{{ route('contact.me') }}" class="btn">Contact me</a>
                            </div>
                        </nav>
                    </div>
                    <!-- Mobile Menu  -->
                    <div class="mobile__menu">
                        <nav class="menu__box">
                            <div class="close__btn"><i class="fal fa-times"></i></div>
                            <div class="nav-logo">
                                <a href="index.html" class="logo__black"><img src="{{ asset('frontend/assets/img/logo/logo_black.png') }}" alt=""></a>
                                <a href="index.html" class="logo__white"><img src="{{ asset('frontend/assets/img/logo/logo_white.png') }}" alt=""></a>
                            </div>
                            <div class="menu__outer">
                                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                            </div>
                            <div class="social-links">
                                <ul class="clearfix">
                                    <li>
                                        <a href="{{ $footer->facebook }}">
                                            <span class="fab fa-facebook-square"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ $footer->linkedin }}">
                                            <span class="fab fa-linkedin-in"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ $footer->gitlab }}">
                                            <span class="fab fa-gitlab"></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="menu__backdrop"></div>
                    <!-- End Mobile Menu -->
                </div>
            </div>
        </div>
    </div>
</header>
