@include('base')
<header id="home">
    <!-- top-bar -->
    <div class="top-bar py-2 border-bottom">
        <div class="container">
            <div class="row middle-flex">
                <div class="col-xl-7 col-md-5 top-social-agile mb-md-0 mb-1 text-lg-left text-center">
                    <div class="row">
                        <div class="col-xl-3 col-6 header-top_w3layouts">
                            <p class="text-da">
                                <!-- <span class="fa fa-map-marker mr-2"></span>Parma Via, Italy -->
                            </p>
                        </div>
                        <div class="col-xl-3 col-6 header-top_w3layouts">
                            <p class="text-da">
                                <!-- <span class="fa fa-phone mr-2"></span>+1 000263676 -->
                            </p>
                        </div>
                        <div class="col-xl-6"></div>
                    </div>
                </div>
                <div class="col-xl-5 col-md-7 top-social-agile text-md-right text-center pr-sm-0 mt-md-0 mt-2">
                    <div class="row middle-flex">
                        <div class="col-lg-5 col-4 top-w3layouts p-md-0 text-right">
                            <!-- login -->
                            {{-- <a href="login.html" class="btn login-button-2 text-uppercase text-wh">
                                <span class="fa fa-sign-in mr-2"></span>Login</a> --}}
                            <!-- //login -->
                            @if (Route::has('login'))
                            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="btn login-button-2 text-uppercase text-wh">Dashboard</a>
                                @else
                                    <a href="{{ route('login') }}" class="btn login-button-2 text-uppercase text-wh">Log in</a>
            
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="btn login-button-2 text-uppercase text-wh">Register</a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                        </div>
                        <div class="col-lg-7 col-8 social-grid-w3">
                            <!-- social icons -->
                            <ul class="top-right-info">
                                <li>
                                    <p>Follow Us:</p>
                                </li>
                                <li class="facebook-w3">
                                    <a href="#facebook">
                                        <span class="fa fa-facebook-f"></span>
                                    </a>
                                </li>
                                <li class="twitter-w3">
                                    <a href="#twitter">
                                        <span class="fa fa-twitter"></span>
                                    </a>
                                </li>
                                <li class="google-w3">
                                    <a href="#google">
                                        <span class="fa fa-google-plus"></span>
                                    </a>
                                </li>
                                <li class="dribble-w3">
                                    <a href="#dribble">
                                        <span class="fa fa-dribbble"></span>
                                    </a>
                                </li>
                            </ul>
                            <!-- //social icons -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="main-top py-1">
    <div class="container">
        <div class="nav-content">
            <!-- logo -->
            <h1>
                <a id="logo" class="logo" href="index.html">
                    <img src="{{ asset('helps/images/logo.png') }}" alt="" class="img-fluid"><span>Tasty</span> Burger
                </a>
            </h1>
            <!-- //logo -->
            <!-- nav -->
            <div class="nav_web-dealingsls">
                <nav>
                    <label for="drop" class="toggle">Menu</label>
                    <input type="checkbox" id="drop" />
                    <ul class="menu">
                        <li><x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link></li>
                        <li><a href="about.html">About Us</a></li>
                        <li>
                            <!-- First Tier Drop Down -->
                            <label for="drop-3" class="toggle toogle-2">Pages <span class="fa fa-angle-down"
                                    aria-hidden="true"></span>
                            </label>
                            <a href="#pages">Pages <span class="fa fa-angle-down" aria-hidden="true"></span></a>
                            <input type="checkbox" id="drop-3" />
                            <ul>
                                <li><a class="drop-text" href="#services">Services</a></li>
                                <li><a class="drop-text" href="about.html">Our Chefs</a></li>
                                <li><a class="drop-text" href="#blog">Blog</a></li>
                                <li><a class="drop-text" href="single.html">Single Page</a></li>
                                <li><a class="drop-text" href="login.html">Login</a></li>
                                <li><a class="drop-text" href="register.html">Register</a></li>
                            </ul>
                        </li>
                        <li><a href="menu.html">Menu</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                        <li>
                            <!-- login -->
                            {{-- <a href="https://w3layouts.com/" target="_blank" class="dwn-button ml-lg-5">
                                <span class="fa fa-cloud-download mt-lg-0 mt-4" aria-hidden="true"></span>
                            </a> --}}
                            <!-- //login -->
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- //nav -->
        </div>
    </div>
</div>