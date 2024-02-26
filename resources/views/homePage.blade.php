
<!-- //navigation -->

{{-- <!-- banner -->
<script src="https://cdn.jsdelivr.net/npm/qrcode-generator@1.4.4/qrcode.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/qrcode@1.4.4/build/qrcode.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/qrious@4.0.2/qrious.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/qrious@4.0.2/dist/qrious.min.js"></script> --}}
<style>
    .card {
        border: 1px solid #8f8585;
        border-radius: 10px;
        overflow: hidden;
    }

    .card-img-top {
        width: 100%;
        height: 200px; /* Set a fixed height for the image or video */
        object-fit: cover; /* Ensure the image or video fills the container */
    }

    .card-body {
        display: flex;
        flex-direction: column;
    }

    .card-text {
        flex-grow: 1; /* Allow the text to expand to fill remaining space */
    }
</style>

<div class="baneer-w3ls">
    <div class="row no-gutters">
        <div class="col-xl-5 col-lg-6">
            <div class="banner-left-w3">
                <div class="container">
                    <div class="banner-info_agile_w3ls">
                        <h5>Only Fresh Burgers</h5>
                        <h3 class="text-da mb-4">Flame <span>Grilled Burger</span> </h3>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                            laudantium</p>
                        <a href="about.html" class="button-w3ls active mt-5">Read More
                            <span class="fa fa-caret-right ml-1" aria-hidden="true"></span>
                        </a>
                        <a href="menu.html" class="button-w3ls mt-5 ml-2">Order Now
                            <span class="fa fa-caret-right ml-1" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-7 col-lg-6 callbacks_container">
            <!-- banner slider -->
            <div class="csslider infinity" id="slider1">
                <input type="radio" name="slides" checked="checked" id="slides_1" />
                <input type="radio" name="slides" id="slides_2" />
                <input type="radio" name="slides" id="slides_3" />
                <ul class="banner_slide_bg">
                    <li>
                        <div class="banner-top1"></div>
                    </li>
                    <li>
                        <div class="banner-top2"></div>
                    </li>
                    <li>
                        <div class="banner-top3"></div>
                    </li>
                </ul>
                <div class="arrows">
                    <label for="slides_1"></label>
                    <label for="slides_2"></label>
                    <label for="slides_3"></label>
                </div>
                <div class="navigation">
                    <div>
                        <label for="slides_1"></label>
                        <label for="slides_2"></label>
                        <label for="slides_3"></label>
                    </div>
                </div>
            </div>
            <!-- //banner slider -->
        </div>
    </div>
</div>
<!-- //banner -->
<div class="clearfix"></div>

<!-- about -->
<div class="about-bottom">
    <div class="row no-gutters">
        <div class="col-lg-5 col-md-6 about">

        </div>
        <div class="col-lg-7 col-md-6 about-right-w3 text-right py-md-5">
            <div class="right-space py-xl-5 py-lg-3">
                <div class="title-section mb-4">
                    <p class="w3ls-title-sub">About Us</p>
                    <h3 class="w3ls-title">Welcome to <span>Tasty Burger</span></h3>
                </div>
                <p class="about-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                    doloremque
                    laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                    architecto
                    beatae vitae dicta
                    sunt explicabo.Nemo enim ipsam voluptatem quia voluptas sit.</p>
                <a href="about.html" class="button-w3ls mt-5">Read More
                    <span class="fa fa-caret-right ml-1" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- //about -->

<!-- specials -->
<section class="blog_w3ls py-5">
    <div class="container pb-xl-5 pb-lg-3">
        <div class="title-section text-center mb-md-5 mb-4">
            <p class="w3ls-title-sub">Tasty</p>
            <h3 class="w3ls-title">Our <span>Menues</span></h3>
        </div>
        <div class="row">
            <!-- blog grid -->
<!-- blog grid -->
<div class="row">
    @foreach ($menus as $menu)
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-img-top">
                <a href="#">
                    @foreach ($menu->getMedia('images') as $image)
                        <img class="card-img-top" src="{{ $image->getUrl() }}" alt="{{ $menu->name }} Image">
                    @endforeach
                    @foreach ($menu->getMedia('videos') as $video)
                        <video class="card-img-top" controls>
                            <source src="{{ $video->getUrl() }}" type="{{ $video->mime_type }}">
                            Your browser does not support the video tag.
                        </video>
                    @endforeach
                </a>
            </div>
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{ $menu->name }}</h5>
                <p class="card-text flex-grow-1">{{ $menu->description }}</p>
                <div class="mt-auto text-center">
                    {{ QrCode::size(100)->SMS('http://localhost/allItems/' . $menu->id) }}
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>


<!-- //blog grid -->

            <!-- //blog grid -->
            <!-- blog grid -->

            <!-- //blog grid -->
            <!-- blog grid -->

            <!-- //blog grid -->
        </div>
    </div>
</section>
<!-- //specials -->

<!-- two grids -->

<!-- //two grids -->

<!-- services -->
<section class="middle py-5" id="services">
    <div class="container py-xl-5 py-lg-3">
        <div class="title-section text-center mb-md-5 mb-4">
            <p class="w3ls-title-sub">Our Work</p>
            <h3 class="w3ls-title mb-3">Excellent <span>Services</span></h3>
        </div>
        <div class="row grids-w3 py-xl-5 py-lg-4 pt-lg-0 pt-4">
            <div class="col-lg-5 w3pvt-lauits_banner_bottom_left">
                <div class="row">
                    <div class="col-8 wthree_banner_bottom_grid_right text-right">
                        <h4 class="mb-3"><a href="login.html">Free Shipping</a></h4>
                        <p>Morbi viverra lacus commodo felis semper lectus feugiat.</p>
                    </div>
                    <div class="col-4 wthree_banner_bottom_grid_left text-lg-right text-center">
                        <img src="{{ asset('helps/images/s1.png') }}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="col-lg-2 w3pvt-lauits_banner_bottom_left">

            </div>
            <div class="col-lg-5 w3pvt-lauits_banner_bottom_left mt-lg-0 mt-4">
                <div class="row">
                    <div class="col-4 wthree_banner_bottom_grid_left text-lg-right text-center">
                        <img src="{{ asset('helps/images/s2.png') }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-8 wthree_banner_bottom_grid_right">
                        <h4 class="mb-3"><a href="login.html">Free & Easy Returns</a></h4>
                        <p>Morbi viverra lacus commodo felis semper lectus feugiat.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row grids-w3 py-xl-5 py-lg-4 mt-lg-0 mt-4">
            <div class="col-lg-4 w3pvt-lauits_banner_bottom_left">
                <div class="row">
                    <div class="col-8 wthree_banner_bottom_grid_right text-right pl-lg-0">
                        <h4 class="mb-3"><a href="login.html">Online Order</a></h4>
                        <p>Morbi viverra lacus commodo felis semper lectus feugiat.</p>
                    </div>
                    <div class="col-4 wthree_banner_bottom_grid_left text-lg-right text-center pr-lg-0">
                        <img src="{{ asset('helps/images/s3.png') }}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="col-lg-4 w3pvt-lauits_banner_bottom_left pr-0">

            </div>
            <div class="col-lg-4 w3pvt-lauits_banner_bottom_left mt-lg-0 mt-4">
                <div class="row">
                    <div class="col-4 wthree_banner_bottom_grid_left text-lg-right text-center pl-lg-0">
                        <img src="{{ asset('helps/images/s4.png') }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-8 wthree_banner_bottom_grid_right pr-lg-0">
                        <h4 class="mb-3"><a href="login.html">24/7 Support</a></h4>
                        <p>Morbi viverra lacus commodo felis semper lectus feugiat.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="img-blog-2">
        <img src="{{ asset('helps/images/img.png') }}" alt="" class="img-fluid">
    </div>
</section>
<!-- //services -->

<!-- blog -->
<section class="blog_w3ls py-5" id="blog">
    <div class="container py-xl-5 py-lg-3">
        <div class="title-section text-center mb-md-5 mb-4">
            <p class="w3ls-title-sub">Posts</p>
            <h3 class="w3ls-title mb-3">Our Latest <span>Blog</span></h3>
            <p class="titile-para-text mx-auto">Inventore veritatis et quasi architecto beatae vitae dicta sunt
                explicabo.Nemo
                enim totam rem aperiam.</p>
        </div>
        <div class="row">
            <!-- blog grid -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0">
                    <div class="card-header p-0">
                        <a href="single.html">
                            <img src="{{ asset('helps/images/blog1.png') }}" class="card-img-bottom img-fluid" alt="image">
                        </a>
                        <img src="{{ asset('helps/images/te1.jpg') }}" alt="" class="img-blog rounded-circle img-fluid">
                    </div>
                    <div class="card-body text-center pt-5 mt-2">
                        <h5 class="blog-title card-title mb-2"><a href="single.html">Sed ut Riciatis</a></h5>
                        <div class="blog_w3icon border-top border-bottom py-1 mb-3">
                            <span>
                                Magna Kictum - Nov 12</span>
                        </div>
                        <p>Cras ultricies ligula sed magna dictum porta auris blandita.</p>
                        <a href="single.html" class="button-w3ls mt-4">Read More
                            <span class="fa fa-caret-right ml-1" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- //blog grid -->
            <!-- blog grid -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0">
                    <div class="card-header p-0">
                        <a href="single.html">
                            <img src="{{ asset('helps/images/blog2.png') }}" class="card-img-bottom img-fluid" alt="image">
                        </a>
                        <img src="{{ asset('helps/images/te2.jpg') }}" alt="" class="img-blog rounded-circle img-fluid">
                    </div>
                    <div class="card-body text-center pt-5 mt-2">
                        <h5 class="blog-title card-title mb-2"><a href="single.html">Unde omnis iste</a></h5>
                        <div class="blog_w3icon border-top border-bottom py-1 mb-3">
                            <span>
                                Auris Jlan - Nov 15</span>
                        </div>
                        <p>Cras ultricies ligula sed magna dictum porta auris blandita.</p>
                        <a href="single.html" class="button-w3ls active mt-4">Read More
                            <span class="fa fa-caret-right ml-1" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- //blog grid -->
            <!-- blog grid -->
            <div class="col-lg-4 col-md-6 mt-lg-0 mt-4">
                <div class="card border-0">
                    <div class="card-header p-0">
                        <a href="single.html">
                            <img src="{{ asset('helps/images/blog3.png') }}" class="card-img-bottom img-fluid" alt="image">
                        </a>
                        <img src="{{ asset('helps/images/te3.jpg') }}" alt="" class="img-blog rounded-circle img-fluid">
                    </div>
                    <div class="card-body text-center pt-5 mt-2">
                        <h5 class="blog-title card-title mb-2"><a href="single.html">Natus error sit</a></h5>
                        <div class="blog_w3icon border-top border-bottom py-1 mb-3">
                            <span>
                                Dictum Orta - Nov 20</span>
                        </div>
                        <p>Cras ultricies ligula sed magna dictum porta auris blandita.</p>
                        <a href="single.html" class="button-w3ls mt-4">Read More
                            <span class="fa fa-caret-right ml-1" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- //blog grid -->
        </div>
    </div>
</section>
<!-- //blog -->

<!-- footer -->
<div class="footer-bot">
    <div class="row p-sm-3">
        <div class="col-md-6 footer-grids">
            <h3 class="text-white font-weight-bold mb-3">About Us</h3>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam
                rem
                aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                explicabo.Nemo enim ipsam voluptatem quia voluptas sit.</p>
        </div>
        <div class="col-md-3 footer-grids mt-md-0 mt-4">
            <h3 class="text-white font-weight-bold mb-3">Get in Touch</h3>
            <ul>
                <li><span class="fa fa-map-marker"></span> 123 Sebastian, NYC, USA.</li>
                <li class="my-2"><span class="fa fa-phone"></span> +12 534894364</li>
                <li><span class="fa fa-envelope-open"></span>
                    <a href="mailto:info@example.com">info@example.com</a>
                </li>
            </ul>
        </div>
        <div class="col-md-3 footer-grids mt-md-0 mt-4">
            <h3 class="text-white font-weight-bold mb-3">Opening Hours</h3>
            <ul>
                <li>Monday - Friday : 10AM - 6PM</li>
                <li class="my-2">Saturday : 10AM - 6PM</li>
                <li>Sunday : Closed</li>
            </ul>
        </div>
    </div>
</div>
{{-- 
<script src="https://cdn.jsdelivr.net/npm/qrcode-generator@1.4.4/qrcode.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/qrcode@1.4.4/build/qrcode.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/qrious@4.0.2/qrious.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/qrious@4.0.2/dist/qrious.min.js"></script> --}}