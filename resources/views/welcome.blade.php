@extends('layouts.app')

<!-- Bootstrap CSS -->
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
<!-- Font Awesome -->
{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/> --}}



@section('content')
    <section class="whats-news-area mt-20 pb-30">
        <div class="container-fluid">
            <div class="row">

                <div class="col-xxl-7 col-xl-6 col-lg-6">

                    <div class="single-slider">
                        <div class="trending-top mb-30">

                            <!-- <a href="#"> <img src="/img/gallery/whats_news_details1.jpg" alt></a> -->
                            <!------------------------------------- Carousel wrapper ---------------------------------------->
                            @php
                                $news = App\Models\News::all()->take(5);
                            @endphp
                            <div id="carouselBasicExample" class="carousel slide" data-mdb-ride="carousel">

                                <div class="content" style="padding: 0rem 0;">

                                    <div class="container">
                                        {{-- <h2 class="my-5 text-center">Carousel #1</h2> --}}
                                        <div class="owl-carousel owl-1">
                                            @foreach ($news as $key => $item)
                                                <div><img src="{{ asset('news_banners/' . $item->banner) }}" alt="Image" class="img-fluid"></div>
                                                <!-- <div><img src="images/hero_2.jpg" alt="Image" class="img-fluid"></div>
                                                <div><img src="images/hero_3.jpg" alt="Image" class="img-fluid"></div> -->
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <!-- Indicators -->
                                {{-- <div class="carousel-indicators">
                                    @foreach ($newshhh as $key => $item)
                                        @if ($key == 0)
                                            <button type="button" data-mdb-target="#carouselBasicExample"
                                                data-mdb-slide-to="{{ $key }}" class="active" aria-current="true"
                                                aria-label="Slide 1"></button>
                                        @else
                                            <button type="button" data-mdb-target="#carouselBasicExample"
                                                data-mdb-slide-to="{{ $key++ }}" aria-label="Slide 2"></button>
                                        @endif
                                    @endforeach
                                </div>


                                @php
                                    $news = App\Models\News::all();
                                @endphp
                                <!-- Inner -->
                                <div class="carousel-inner">
                                    @foreach ($news as $key => $item)
                                        <div class="carousel-item active">
                                            <img src="{{ asset('news_banners/' . $item->banner) }}" class="d-block w-100"
                                                alt="Sunset Over the City" />
                                            <div class="carousel-caption d-none d-md-block">
                                                <!-- <h5>First slide label</h5>
                                                            <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p> -->
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <!-- Inner -->

                                <!-- Controls -->
                                <button class="carousel-control-prev" type="button" data-mdb-target="#carouselBasicExample"
                                    data-mdb-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-mdb-target="#carouselBasicExample"
                                    data-mdb-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button> --}}
                            </div>
                            <!------------------------------------------ Carousel wrapper --------------------------------------------------->








                            <!-- <div class="trend-top-cap">
                                            <span>Technology</span>
                                            <h2><a href="post_details.html">The world’s first fitness influencer was a Victorian
                                                    strongman</a></h2>
                                            <p>by <a href="#">Pete Sariya</a></p>
                                        </div> -->
                        </div>
                    </div>
                </div>


                {{-- --------------------------------------------------------Latest_News Section Start-------------------------------------------------- --}}
                <div class="col-xxl-5 col-xl-6 col-lg-6">

                    <div style="display: none;" class="row" id="english">
                        @foreach ($news as $key => $item)
                            @if ($item->latest_news == 'yes')
                                <div class="col-xl-12 col-lg-12 col-md-11">
                                    <div class="whats-right-single mb-20">
                                        <div class="whats-right-img">
                                            <a href="{{ route('post_details', $item->slug) }}"><img src="{{ asset('news_banners/' . $item->banner) }}" alt="image here" width="250px" height="150px"></a>
                                        </div>

                                        <div class="whats-right-cap">
                                            @php
                                                $news = DB::table('news_categories')
                                                    ->where('id', '=', $item->news_categories)
                                                    ->first();
                                            @endphp
                                            <span>{{ $news->cate_title_eng }}</span>
                                            <h4><a class="" href="{{ route('post_details', $item->slug) }}">{{ $item->title_eng }}</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <div class="row" id="bangla">
                        @foreach ($newsbn as $itembn)
                            @if ($itembn->latest_news == 'yes')
                                <div class="col-xl-12 col-lg-12 col-md-11">
                                    <div class="whats-right-single mb-20">
                                        <div class="whats-right-img">
                                            <a href="{{ route('post_details', $itembn->slug) }}"><img src="{{ asset('news_banners/' . $itembn->banner) }}" alt="image here" width="250px" height="150px"></a>
                                        </div>

                                        <div class="whats-right-cap">

                                            @php
                                                $newsbn_cat = DB::table('news_categories')
                                                    ->where('id', '=', $itembn->news_categories)
                                                    ->first();
                                            @endphp

                                            <span>{{ $newsbn_cat->cate_title_ban }}</span>
                                            <h4><a class="" href="{{ route('post_details', $itembn->slug) }}">{{ $itembn->title_ban }}</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    {{-- ---------------------------------------------------Latest_News Section End--------------------------------------------------------- --}}

                </div>
            </div>
    </section>

    <!-- ============================================================== Categorywise News Starts ============================================ -->
    <section class="technology-area">
        <div class="container-fluid">


            <div class="row" id="cat_english" style="display: none;">
                @php
                    $categoryen = App\Models\News_category::all(['cate_title_eng', 'id']);
                @endphp
                @foreach ($categoryen as $itemen)
                    <div class="col-xl-10">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-tittle mb-30 d-flex align-items-center justify-content-between">
                                    <h2>{{ $itemen->cate_title_eng }}</h2>
                                    <a href="{{ route('all_news', $itemen->id) }}">See All</a>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            @php
                                $cat_newsen = App\Models\News::all(['id', 'banner', 'title_eng', 'news_categories', 'slug']);
                            @endphp

                            @foreach ($cat_newsen as $itemn)
                                @if ($itemen->id == $itemn->news_categories)
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="technology-post mb-30">
                                            <div class="technology-wrapper">
                                                <div class="properties-img">
                                                    <a href="{{ route('post_details', $itemn->slug) }}"><img src="{{ asset('news_banners/' . $itemn->banner) }}" alt></a>
                                                </div>
                                                <div class="properties-caption">

                                                    <span>{{ $itemen->cate_title_eng }}</span>
                                                    <h3><a class="col-8 text-truncate"
                                                            href="{{ route('post_details', $itemn->slug) }}">{{ $itemn->title_eng }}</a>
                                                    </h3>
                                                    <!-- <p>by <a href="#">Pete Sariya</a></p> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <!-- <div id="ad_en" class="col-xl-2" style="display: none;">
                                    <div class="google-add f-right d-none d-xl-block">
                                        <a href="#"><img src="/img/gallery/Ad.jpg" alt></a>
                                    </div>
                                </div> -->
                @endforeach

            </div>



            <div class="row" id="cat_bangla">
                @php
                    $categorybn = App\Models\News_category::all(['cate_title_ban', 'id']);
                @endphp
                @foreach ($categorybn as $citembn)
                    <div class="col-xl-10">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-tittle mb-30 d-flex align-items-center justify-content-between">
                                    <h2>{{ $citembn->cate_title_ban }}</h2>
                                    <a href="{{ route('all_news', $citembn->id) }}">See All</a>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            @php
                                $cats_newsbn = App\Models\News::all(['id', 'banner', 'title_ban', 'news_categories', 'slug']);
                            @endphp

                            @foreach ($cats_newsbn as $itemn_bns)
                                @if ($citembn->id == $itemn_bns->news_categories)
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="technology-post mb-30">
                                            <div class="technology-wrapper">
                                                <div class="properties-img">
                                                    <a href="{{ route('post_details', $itemn_bns->slug) }}"><img src="{{ asset('news_banners/' . $itemn_bns->banner) }}" alt></a>
                                                </div>
                                                <div class="properties-caption">

                                                    <span>{{ $citembn->cate_title_ban }}</span>
                                                    <h3><a class="col-8 text-truncate"
                                                            href="{{ route('post_details', $itemn_bns->slug) }}">{{ $itemn_bns->title_ban }}</a>
                                                    </h3>
                                                    <!-- <p>by <a href="#">Pete Sariya</a></p> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <!-- <div id="ad_bn" class="col-xl-2">
                                    <div class="google-add f-right d-none d-xl-block">
                                        <a href="#"><img src="/img/gallery/Ad.jpg" alt></a>
                                    </div>
                                </div> -->
                @endforeach

            </div>




        </div>
    </section>
    <!-- ============================================================== Categorywise News Ends ============================================ -->



    <section class="whats-news-area whats-news-area2 pt-20 pb-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle section-tittle2 mb-30 d-flex align-items-center justify-content-between">
                        <h2>Video Gallery</h2>
                        {{-- <a href="#">See All</a> --}}
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-xxl-6 col-xl-6 col-lg-6">

                    <div class="single-slider">
                        <div class="trending-top mb-30">

                            <div class="trend-top-img">
                                <img src="{{ asset('news_banners/' . $news_gall->banner) }}" alt>
                                <div class="video-icon"> <a class="popup-video btn-icon"
                                        href="{{ $news_gall->video_link }}" data-animation="bounceIn"
                                        data-delay=".4s"><i class="fas fa-play"></i></a></div>
                            </div>

                            <!-- <div class="trend-top-cap trend-top-cap2">
                                        <h2><a href="post_details.html">{{ $news_gall->title_ban }}</a></h2>
                                        <p>by <a href="#">Pete Sariya</a></p>
                                     </div>  -->
                        </div>
                    </div>
                </div>

                <div class="col-xxl-6 col-xl-6 col-lg-6">

                    <div class="single-slider">
                        <div class="trending-top mb-30">

                            <div class="trend-top-img">
                                <img src="{{ asset('news_banners/' . $news_gall2->banner) }}" alt>
                                <div class="video-icon"> <a class="popup-video btn-icon"
                                        href="{{ $news_gall2->video_link }}" data-animation="bounceIn"
                                        data-delay=".4s"><i class="fas fa-play"></i></a></div>
                            </div>

                            <!-- <div class="trend-top-cap trend-top-cap2">
                                        <h2><a href="post_details.html">{{ $news_gall->title_ban }}</a></h2>
                                        <p>by <a href="#">Pete Sariya</a></p>
                                     </div>  -->
                        </div>
                    </div>
                </div>










                <!-- <div class="col-xxl-5 col-xl-6 col-lg-6">
                            <div class="row">

                                <div class="col-xl-12 col-lg-12 col-md-10">
                                    <div class="whats-right-single mb-20">
                                        <div class="whats-right-img">
                                            <a href="post_details.html"><img src="/img/gallery/video-gallery2.jpg" alt></a>
                                        </div>
                                        <div class="whats-right-cap whats-right-cap2">
                                            <span><i class="far fa-clock"></i>5.56</span>
                                            <h4><a href="post_details.html">Needs to Rename the James Webb Space Telescope</a></h4>
                                            <p>by<a href="#">Pete Sariya</a></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-10">
                                    <div class="whats-right-single mb-20">
                                        <div class="whats-right-img">
                                            <a href="post_details.html"><img src="/img/gallery/video-gallery3.jpg" alt></a>
                                        </div>
                                        <div class="whats-right-cap whats-right-cap2">
                                            <span><i class="far fa-clock"></i>5.56</span>
                                            <h4><a href="post_details.html">These striking photos capture the future of human
                                                    flight</a></h4>
                                            <p>by<a href="#">Pete Sariya</a></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-10">
                                    <div class="whats-right-single mb-20">
                                        <div class="whats-right-img">
                                            <a href="post_details.html"><img src="/img/gallery/video-gallery4.jpg" alt></a>
                                        </div>
                                        <div class="whats-right-cap whats-right-cap2">
                                            <span><i class="far fa-clock"></i>5.56</span>
                                            <h4><a href="post_details.html">Exploring the origins of punk across America with Kid
                                                    Karate</a></h4>
                                            <p>by<a href="#">Pete Sariya</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
            </div>
        </div>
    </section>



<!-- ===================================================== Latest Slider Starts ======================================================-->

    <section class="technology-area mt-60 mb-60">
        <div class="container-fluid">

            <!-- <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle mb-30 d-flex align-items-center justify-content-between">
                        <h2>Science Update</h2>
                    </div>
                </div>
            </div> -->

            <section class="ftco-section" id="latest_english" style="display: none;">
                <div class="">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="featured-carousel owl-carousel">
                                @foreach($news_slider_eng as $itemns_en )
                                <div class="item">
                                    <div class="blog-entry">
                                        <div class="text p-2">
                                            <a href="{{ route('post_details', $itemns_en->slug) }}"><img src="{{ asset('news_banners/' . $itemns_en->banner) }}" alt="image here" class="rounded mx-auto d-block"></a>
                                            <h3 style="font-size: calc(0.5825rem + .39vw);" class="heading text-truncate col-8 p-1"><a class="" href="{{ route('post_details', $itemns_en->slug) }}">{{ $itemns_en->title_eng }}</a></h3>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="ftco-section" id="latest_bangla">
                <div class="">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="featured-carousel owl-carousel">
                                @foreach($news_slider_ban as $itemns_bn )
                                <div class="item">
                                    <div class="blog-entry">
                                        <div class="text  p-2">
                                            <a href="{{ route('post_details', $itemns_bn->slug) }}"><img src="{{ asset('news_banners/' . $itemns_bn->banner) }}" alt="image here" class="rounded mx-auto d-block"></a>
                                            <h3 style="font-size: calc(0.5825rem + .39vw);" class="heading text-truncate col-8 p-1"><a class="" href="{{ route('post_details', $itemns_bn->slug) }}">{{ $itemns_bn->title_ban }}</a></h3>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </section>












            {{-- <span class="technology-active" id="latest_english">


                @foreach ($news_latest_eng as $l_item)
                    @if ($l_item->latest_news == 'yes')
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="technology-post technology-post2">
                                <div class="technology-wrapper">
                                    <div class="properties-img">
                                        <a href="post_details.html"><img
                                                src="{{ asset('news_banners/' . $l_item->banner) }}" alt></a>
                                    </div>
                                    <div class="properties-caption">
                                        <span>Health</span>
                                        <!-- <h3><a href="post_details.html">{{ $l_item->title_eng }}</a></h3> -->
                                        <h3><a href="post_details.html">{{ $l_item->title_eng }}</a></h3>
                                        <p>by <a href="#">Pete Sariya</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach


            </span> --}}

            {{-- <span class="technology-active" id="latest_bangla">

                @foreach ($news_latest_ban as $l_item_bn)
                    @if ($l_item_bn->latest_news == 'yes')
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="technology-post technology-post2">
                                <div class="technology-wrapper">
                                    <div class="properties-img">
                                        <a href="post_details.html"><img
                                                src="{{ asset('news_banners/' . $l_item_bn->banner) }}" alt></a>
                                    </div>
                                    <div class="properties-caption">
                                        <span>Culture</span>
                                        <!-- <h3><a href="post_details.html">{{ $l_item_bn->title_ban }}</a></h3> -->
                                        <h3><a href="post_details.html">{{ $l_item_bn->title_ban }}</a></h3>
                                        <p>by <a href="#">Pete Sariya</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

            </span> --}}
            <!-- <div class="row mt-40 justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-9 col-sm-11 ">
                <div class="googl-add2 text-center">
                <a href="#"><img src="assets/img/gallery/Ad2.jpg" alt></a>
                </div>
                </div>
                </div> -->
        </div>
    </section>


    <!-- ===================================================== Latest Slider Ends ======================================================-->

    <!-- <section class="technology-area mt-60 mb-60" id="latest_bangla">
                <div class="container-fluid">

                      <div class="row">
                      <div class="col-lg-12">
                      <div class="section-tittle mb-30 d-flex align-items-center justify-content-between">
                      <h2>Science Update</h2>
                      </div>
                      </div>
                      </div>

                <div class="technology-active">

                    @foreach ($news_latest_ban as $l_item_bn)
                    @if ($l_item_bn->latest_news == 'yes')
                    <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="technology-post technology-post2">
                    <div class="technology-wrapper">
                    <div class="properties-img">
                    <a href="post_details.html"><img src="{{ asset('news_banners/' . $l_item_bn->banner) }}" alt></a>
                    </div>
                    <div class="properties-caption">
                    <span>Culture</span>
                  <h3><a href="post_details.html">{{ $l_item_bn->title_ban }}</a></h3>
                      <h3><a href="post_details.html">শেখ হাসিনার নেতৃত্বের ভূয়সী প্রশংসা করলেন কানাডা সিনেটের মানবাধিকার কমিটির প্রধান</a></h3>
                    <p>by <a href="#">Pete Sariya</a></p>
                    </div>
                    </div>
                    </div>
                    </div>
                    @endif
                    @endforeach

                </div>
              <div class="row mt-40 justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-9 col-sm-11 ">
                <div class="googl-add2 text-center">
                <a href="#"><img src="assets/img/gallery/Ad2.jpg" alt></a>
                </div>
                </div>
                </div>
                </div>
                </section> -->





    {{-- <div class="subscribe-area section-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-7 col-xl-8 col-lg-9">

                    <div class="subcrition-tittle text-center mb-40">
                        <h2>Subscribe to the newsletter</h2>
                        <p>Get a weekly digest of our most important stories direct to your inbox.</p>
                    </div>

                    <form action="#" class="search-box">
                        <div class="input-form">
                            <input type="text" placeholder="Enter your mail">
                        </div>
                        <div class="search-form">
                            <a href="#">Send Now</a>
                        </div>
                    </form>
                    <div class="pera text-center pt-10">
                        <p>Place some disclaimer text here about how subscriber’s email, Privacy Policy and all that.</p>
                        <!-- <button onclick="changeLanguage()">Hide</buton> -->
                    </div>
                </div>
            </div>
        </div>
    </div> --}}




    <!-- Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
                    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
                </script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
                    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
                </script> -->



    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"></script>

    <script>
        const swiper = new Swiper(".swiper-slider", {
            // Optional parameters
            centeredSlides: true,
            slidesPerView: 1,
            grabCursor: true,
            freeMode: false,
            loop: true,
            mousewheel: false,
            keyboard: {
                enabled: true
            },

            // Enabled autoplay mode
            autoplay: {
                delay: 3000,
                disableOnInteraction: false
            },

            // If we need pagination
            pagination: {
                el: ".swiper-pagination",
                dynamicBullets: false,
                clickable: true
            },

            // If we need navigation
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            },

            // Responsive breakpoints
            breakpoints: {
                640: {
                    slidesPerView: 1.25,
                    spaceBetween: 20
                },
                1024: {
                    slidesPerView: 2,
                    spaceBetween: 20
                }
            }
        });
    </script>
@endsection
