@extends('layouts.app')

<!-- Bootstrap CSS -->
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
<!-- MDB -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet"/>


@section('content')


<div style="display: none;" class="row" id="cat_english"></div>
<div style="display: none;" class="row" id="cat_bangla"></div>

<div style="display: none;" class="row" id="latest_english"></div>
<div style="display: none;" class="row" id="latest_bangla"></div>

        <div class="page-notification">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <!-- <li class="breadcrumb-item"><a href="/">Home</a></li> -->
                                <!-- <li class="breadcrumb-item"><a href="#">Science</a></li>
                                <li class="breadcrumb-item"><a href="#">News Details</a></li>
                            </ol> -->
                        </nav>
                    </div>
                </div>
            </div>
        </div>


        <div class="psot-details pb-80 pt-40" style="width: 100%; margin: 0 auto;">
            <div class="container" id="english" style="display: none;">
                <div class="row">
                  <div class="col-lg-6">
                      <div class="single-slider">
                          <div class="trending-top mb-30">

                              <div class="trend-top-img">
                                  <img src="{{ asset('news_banners/' . $news->banner) }}" alt>
                                  <div class="video_icon video-icon"> <a  style="background: #fff0; color: #fff;" href="{{ $news->video_link }}" data-animation="bounceIn" data-delay=".4s"><i style="top: 15px;" class="fas fa-play"></i></a></div>
                              </div>

                          </div>
                      </div>
                  </div>

                    <div class="col-lg-6">
                        <div class="details-img mb-40">
                            <img class="img-fluid" src="{{ asset('news_banners/'.$news->banner) }}" alt="image">
                        </div>
                    </div>

                </div>


                <!-- ============================== Share Button Starts ======================================= -->
                <!-- AddToAny BEGIN -->
                <a class="a2a_dd" href="https://www.addtoany.com/share"><img src="/img/icon/share.png" width="40" height="40" border="0" alt="Share"></a>
                {{-- <a class="a2a_dd" href="https://www.addtoany.com/share"><i class="fa-regular fa-share-nodes fa-beat-fade"></i></a> --}}
                <script async src="https://static.addtoany.com/menu/page.js"></script>
                <!-- AddToAny END -->
                <!-- ============================== Share Button Starts ======================================= -->


                <div class="row">
                    <div class="col-lg-12">
                        <div class="about-details-cap">
                            <h2 class="text-justify">{{$news->title_eng}}</h2>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="about-details-cap">
                            <p class="mb-30 text-justify">{!! $news->description_eng !!}</p>
                        </div>
                    </div>
                    <!-- <div class="col-lg-10">
                        <div class="about-details-cap">
                            <h3>Moving on a Curve</h3>
                            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                                anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
                                veritatis et quasi architecto beatae vitae dicta sunt explicabo. </p>
                            <div class="details-img">
                                <img class="img-fluid mb-15" src="assets/img/gallery/post_details2.jpg" alt>
                                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                                    consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro
                                    quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,
                                    sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam
                                    quaerat voluptatem.</p>
                            </div>

                            <div class="social-iocn pt-20 pb-20">
                                <a href="#"><img class="mr-10 mb-10" src="assets/img/gallery/facebook.jpg" alt></a>
                                <a href="#"><img class="mr-10 mb-10" src="assets/img/gallery/twitter.jpg"
                                        alt="#"></a>
                                <a href="#"><img class="mr-10 mb-10" src="assets/img/gallery/pinterest.jpg"
                                        alt></a>
                                <a href="#"><img class="mb-10" src="assets/img/gallery/whatsapp.jpg" alt></a>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>


            <!--========================================================================= Bangla Starts ==========================================================-->
            <div class="container" id="bangla">
                <div class="row">


                    <div class="col-lg-6">
                        <div class="single-slider">
                            <div class="trending-top mb-30">

                                <div class="trend-top-img">
                                    <img src="{{ asset('news_banners/' . $news->banner) }}" alt>
                                    <div class="video_icon video-icon"> <a  style="background: #fff0; color: #fff;" href="{{ $news->video_link }}" data-animation="bounceIn" data-delay=".4s"><i style="top: 15px;" class="fas fa-play"></i></a></div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="details-img mb-40">
                            <img class="img-fluid" src="{{ asset('news_banners/'.$news->banner) }}" alt="image">
                        </div>
                    </div>


                    <!-- ============================== Share Button Starts ======================================= -->
                    <!-- AddToAny BEGIN -->
                    <a class="a2a_dd" href="https://www.addtoany.com/share"><img src="/img/icon/share.png" width="40" height="40" border="0" alt="Share"></a>
                    {{-- <a class="a2a_dd" href="https://www.addtoany.com/share"><i class="fa-regular fa-share-nodes fa-beat-fade"></i></a> --}}
                    <script async src="https://static.addtoany.com/menu/page.js"></script>
                    <!-- AddToAny END -->
                    <!-- ============================== Share Button Starts ======================================= -->

                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="about-details-cap">
                            <h2 class="text-justify">{{$news->title_ban}}</h2>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="about-details-cap">
                            <p class="mb-30 text-justify">{!! $news->description_ban !!}</p>
                        </div>
                    </div>
                    <!-- <div class="col-lg-10">
                        <div class="about-details-cap">
                            <h3>Moving on a Curve</h3>
                            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                                anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
                                veritatis et quasi architecto beatae vitae dicta sunt explicabo. </p>
                            <div class="details-img">
                                <img class="img-fluid mb-15" src="assets/img/gallery/post_details2.jpg" alt>
                                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                                    consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro
                                    quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,
                                    sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam
                                    quaerat voluptatem.</p>
                            </div>

                            <div class="social-iocn pt-20 pb-20">
                                <a href="#"><img class="mr-10 mb-10" src="assets/img/gallery/facebook.jpg" alt></a>
                                <a href="#"><img class="mr-10 mb-10" src="assets/img/gallery/twitter.jpg"
                                        alt="#"></a>
                                <a href="#"><img class="mr-10 mb-10" src="assets/img/gallery/pinterest.jpg"
                                        alt></a>
                                <a href="#"><img class="mb-10" src="assets/img/gallery/whatsapp.jpg" alt></a>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
            <!--========================================================================= Bangla Ends ==========================================================-->

        </div>


        <!-- <div class="coments-area pb-80">
            <div class="container">
                <div class="row ">
                    <div class="col-xl-12">
                        <div class="small-tittle mb-30">
                            <h2>Drop your message</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-11">
                        <div class="single-comments mb-40">
                            <div class="comments-items">
                                <div class="comments-img">
                                    <a href="#"><img src="assets/img/gallery/comment-img1.jpg" alt></a>
                                </div>
                                <div class="comments-tittle">
                                    <a href="#">
                                        <h4>Kristiana</h4>
                                    </a>
                                    <span>2 days ago</span>
                                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed
                                        quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-11">
                        <div class="single-comments mb-30 ml-80">
                            <div class="comments-items">
                                <div class="comments-img">
                                    <a href="#"><img src="assets/img/gallery/comment-img2.jpg" alt></a>
                                </div>
                                <div class="comments-tittle">
                                    <a href="#">
                                        <h4>Jonson Alex</h4> <span class="author">Author</span>
                                    </a>
                                    <span>2 days ago</span>
                                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed
                                        quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">

                        <div class="form-wrapper pt-80">
                            <div class="row ">
                                <div class="col-xl-12">
                                    <div class="small-tittle mb-30">
                                        <h2>Drop your message</h2>
                                    </div>
                                </div>
                            </div>
                            <form id="contact-form" action="#" method="POST">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-box user-icon mb-15">
                                            <input type="text" name="name" placeholder="Enter your name">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-box email-icon mb-15">
                                            <input type="text" name="email" placeholder="Enter your email">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-box email-icon mb-15">
                                            <input type="text" name="email" placeholder="Website">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-box message-icon mb-15">
                                            <textarea name="message" id="message" placeholder="Comment"></textarea>
                                        </div>
                                        <div class="submit-info">
                                            <button class="submit-btn2" type="submit">Leave Comment</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->


        <div class="instagram-area fix">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="instagram-active owl-carousel">
                            <div class="single-instagram">
                                <img src="assets/img/gallery/instra1.html" alt>
                                <a href="#"><i class="ti-instagram"></i></a>
                            </div>
                            <div class="single-instagram">
                                <img src="assets/img/gallery/instra2.html" alt>
                                <a href="#"><i class="ti-instagram"></i></a>
                            </div>
                            <div class="single-instagram">
                                <img src="assets/img/gallery/instra3.html" alt>
                                <a href="#"><i class="ti-instagram"></i></a>
                            </div>
                            <div class="single-instagram">
                                <img src="assets/img/gallery/instra4.html" alt>
                                <a href="#"><i class="ti-instagram"></i></a>
                            </div>
                            <div class="single-instagram">
                                <img src="assets/img/gallery/instra5.html" alt>
                                <a href="#"><i class="ti-instagram"></i></a>
                            </div>
                            <div class="single-instagram">
                                <img src="assets/img/gallery/instra6.html" alt>
                                <a href="#"><i class="ti-instagram"></i></a>
                            </div>
                            <div class="single-instagram">
                                <img src="assets/img/gallery/instra3.html" alt>
                                <a href="#"><i class="ti-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
