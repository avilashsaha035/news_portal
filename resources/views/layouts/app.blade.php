<!doctype html>
<html class="no-js" lang="zxx">

<!-- Mirrored from preview.colorlib.com/theme/megasis/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 17 Aug 2023 13:22:58 GMT -->

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'BDN71') }}</title>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name="description" content>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.html">
    <link rel="shortcut icon" type="image/x-icon" href="/img/icon/favicon.png">

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/slicknav.css">
    <link rel="stylesheet" href="/css/animate.min.css">
    <link rel="stylesheet" href="/css/magnific-popup.css">
    <link rel="stylesheet" href="/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/css/themify-icons.css">
    <link rel="stylesheet" href="/css/slick.css">
    {{-- <link rel="stylesheet" href="/css/nice-select.css"> --}}
    <link rel="stylesheet" href="/css/style.css">
    {{-- <link rel="stylesheet" href="/css/calender.css"> --}}

    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet"> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">


 <style>
.preloader
{
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('/img/logo/loader.gif') 50% 50% no-repeat white;
    opacity: 1;
}

</style>
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->


    <!-- Scripts -->
    @viteReactRefresh
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])


    <script nonce="e0535283-92c1-49eb-a947-c18b27ec9680">
        (function(w, d) {
            ! function(j, k, l, m) {
                j[l] = j[l] || {};
                j[l].executed = [];
                j.zaraz = {
                    deferred: [],
                    listeners: []
                };
                j.zaraz.q = [];
                j.zaraz._f = function(n) {
                    return async function() {
                        var o = Array.prototype.slice.call(arguments);
                        j.zaraz.q.push({
                            m: n,
                            a: o
                        })
                    }
                };
                for (const p of ["track", "set", "debug"]) j.zaraz[p] = j.zaraz._f(p);
                j.zaraz.init = () => {
                    var q = k.getElementsByTagName(m)[0],
                        r = k.createElement(m),
                        s = k.getElementsByTagName("title")[0];
                    s && (j[l].t = k.getElementsByTagName("title")[0].text);
                    j[l].x = Math.random();
                    j[l].w = j.screen.width;
                    j[l].h = j.screen.height;
                    j[l].j = j.innerHeight;
                    j[l].e = j.innerWidth;
                    j[l].l = j.location.href;
                    j[l].r = k.referrer;
                    j[l].k = j.screen.colorDepth;
                    j[l].n = k.characterSet;
                    j[l].o = (new Date).getTimezoneOffset();
                    if (j.dataLayer)
                        for (const w of Object.entries(Object.entries(dataLayer).reduce(((x, y) => ({
                                ...x[1],
                                ...y[1]
                            })), {}))) zaraz.set(w[0], w[1], {
                            scope: "page"
                        });
                    j[l].q = [];
                    for (; j.zaraz.q.length;) {
                        const z = j.zaraz.q.shift();
                        j[l].q.push(z)
                    }
                    r.defer = !0;
                    for (const A of [localStorage, sessionStorage]) Object.keys(A || {}).filter((C => C.startsWith(
                        "_zaraz_"))).forEach((B => {
                        try {
                            j[l]["z_" + B.slice(7)] = JSON.parse(A.getItem(B))
                        } catch {
                            j[l]["z_" + B.slice(7)] = A.getItem(B)
                        }
                    }));
                    r.referrerPolicy = "origin";
                    r.src = "../../cdn-cgi/zaraz/sd0d9.js?z=" + btoa(encodeURIComponent(JSON.stringify(j[l])));
                    q.parentNode.insertBefore(r, q)
                };
                ["complete", "interactive"].includes(k.readyState) ? zaraz.init() : j.addEventListener(
                    "DOMContentLoaded", zaraz.init)
            }(w, d, "zarazData", "script");
        })(window, document);
    </script>

<script type="text/javascript">
   codeAddress();
</script>



<link rel="stylesheet" href="slider/fonts/icomoon/style.css">
<link rel="stylesheet" href="slider/css/owl.carousel.min.css">
<link rel="stylesheet" href="slider/css/style.css">

{{-- <link rel="stylesheet" href="slider_news/fonts/css/ionicons.min.css">
<link rel="stylesheet" href="slider_news/css/owl.carousel.min.css">
<link rel="stylesheet" href="slider_news/css/owl.theme.default.min.css">
<link rel="stylesheet" href="slider_news/css/style.css"> --}}



</head>

<body onload="changeLanguage()">
    <script>

        window.onload = function(){
            $("#preloaders").fadeOut(1000);
            //alert("njjk");
        }


    </script>

    <header>
        <div class="header-area">
            <div class="main-header">
                <div class="header-top">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-12">
                                <div
                                    class="d-flex justify-content-lg-between align-items-center justify-content-sm-end">
                                    <div class="header-info-mid">

                                        <div class="logo">
                                            <a href="/"><img src="/img/logo/logo_navbar.png" style="max-height: 90px;" alt></a>
                                        </div>
                                    </div>
                                    <div class="header-info-right d-flex align-items-center">
                                        <ul>
                                            <li>
                            <!-- ========================================language Starts ================================================== -->
                                                @php
                                                    $language = App\Models\Language::all();
                                                @endphp
                                               <select id="lang" onchange="changeLanguage()">
                                                 @foreach($language->reverse() as $key=>$item)
                                                    <option value="{{$item->lang_name_eng}}">{{$item->lang_name_eng}}</option>
                                                 @endforeach
                                              </select>
                            <!-- ========================================language Ends ================================================== -->


                                                <!-- Authentication Links -->
                                                @guest
                                                    @if (Route::has('login'))
                                                        <a class="header-btn" href="{{ route('login') }}">Sign in</a>
                                                    @endif
                                                @else
                                                    <a id="navbarDropdown" class="header-btn" href="#" role="button"
                                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                        v-pre> &nbsp;<i style="color: #000; padding-right: 0px;" class="fa fa-user" aria-hidden="true"></i>
                                                        {{ Auth::user()->name }}
                                                    </a>



                                                        <a class="header-btn" href="{{ route('logout') }}"
                                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                            {{ __('Logout') }}
                                                        </a>

                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                            class="d-none">
                                                            @csrf
                                                        </form>


                                                @endguest
                                            </li>





                                        </ul>

                                        <!-- <div class="header-social">
                                            <a href="https://www.fb.com/sai4ull"><i class="fab fa-facebook"></i></a>
                                            <a href="#"><i class="fab fa-instagram"></i></a>
                                            <a href="#"><i class="fab fa-twitter"></i></a>


                                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-12">
                    <div class="mobile_menu d-block d-lg-none mb-3"></div>
                </div>

                <div class="header-bottom  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-xl-12">
                                <div class="bottom-wrap d-flex justify-content-between align-items-center">

                                    <div class="logo2">
                                        <a href="/"><img src="/img/logo/logo_navbar.png" style="max-height: 65px;" alt></a>
                                    </div>



                                    {{-- Navbar --}}



                                    <div class="main-menu d-none d-lg-block">

                                        <nav>
                                            <ul id="navigation">
                                                <li><a href="/">Home</a></li>
                                                @php
                                                    $category = App\Models\News_category::all();
                                                @endphp

                                                 <!-- <li><a href="#">Page</a>
                                                    <ul class="submenu">
                                                      <div class="class_bn">
                                                        @foreach ($category as $key=>$item )
                                                        <li><a href="{{ route('all_news', $item->id) }}"> {{ $item->cate_title_ban }}</a></li>
                                                        @endforeach
                                                      </div>
                                                      <div class="class_en">
                                                        @foreach ($category as $key=>$item )
                                                        <li><a href="{{ route('all_news', $item->id) }}"> {{ $item->cate_title_eng }}</a></li>
                                                        @endforeach
                                                      </div>
                                                    </ul>
                                                </li> -->

                                                <span id="id_en_default" class="class_en_default" style="display: none;">
                                                  @foreach ($category as $key=>$items )
                                                  <li><a href="{{ route('all_news', $items->id) }}">{{ $items->cate_title_eng }}</a></li>
                                                  @endforeach
                                                </span>

                                                <span id="id_bn_default" class="class_bn_default">
                                                  @foreach ($category as $key=>$itemss )
                                                  <li><a href="{{ route('all_news', $itemss->id) }}">{{ $itemss->cate_title_ban }}</a></li>
                                                  @endforeach
                                                </span>

                                                <!-- <li><a href="category.html">Technology</a></li>
                                                <li><a href="category.html">Beauty</a></li>
                                                <li><a href="category.html">Health</a></li>
                                                <li><a href="category.html">Arts & Culture</a></li>
                                                <li><a href="category.html">Opinion</a></li>
                                                <li><a href="category.html">Videos</a></li>
                                                <li><a href="category.html">Gallery</a></li> -->
                                            </ul>
                                        </nav>



                                    </div>

                                     <!-- ================= Navbar =========== -->


                                    {{-- <form class="search-form d-none d-sm-block" action="#">
                                        <i class="ti-search"></i>
                                        <input type="search" class="form-control" placeholder="Search Here"
                                            title="Search here">
                                    </form> --}}



                                </div>
                            </div>

                            <!-- <div class="col-md-4">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>




    <main>
        @yield('content')
    </main>
    <div id="preloaders" class="preloader"></div>



    <footer id="footer_eng" style="display: none;">
      <!-- <div id="map">
          <button onclick="showMap(25.594095,85.137566)">Show Map</button>
      </div> -->
        <div class="footer-wrapper">
            <div class="footer-area footer-padding">
                <div class="container">
                    <div class="row d-flex justify-content-between">
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>About</h4>
                                    <ul>
                                        <li><a href="#">Our Story</a></li>
                                        <li><a href="#">Mission</a></li>
                                        <li><a href="{{ route('aboutUs') }}">About Us</a></li>
                                        <li><a href="{{ route('contactUs') }}">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Categories</h4>
                                    <ul>
                                        <li><a href="#">Work</a></li>
                                        <li><a href="#">Services</a></li>
                                        <li><a href="#">Products</a></li>
                                        <li><a href="#">Tips & Tricks</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    @php
                                        $category = App\Models\News_category::all()->take(4);
                                    @endphp
                                    <h4>Categories</h4>
                                    <ul>
                                        @foreach ($category as $fitems_en )
                                        <li><a href="{{ route('all_news', $fitems_en->id) }}">{{ $fitems_en->cate_title_eng }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Quick Links </h4>
                                    <ul>
                                        <li><a href="{{ route('terms') }}">Terms & Condition</a></li>
                                        <li><a href="#">Privacy Statement</a></li>
                                        <li><a href="#">Use of cookies</a></li>
                                        <li><a href="#">International Editions</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                  <h4>Location</h4>
                                  <div class="containers">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14609.247876509886!2d90.39944836338171!3d23.73625210150804!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8f4f90dac9d%3A0x2c6003e88413b93d!2sKakrail%2C%20Dhaka%201205!5e0!3m2!1sen!2sbd!4v1695469430246!5m2!1sen!2sbd" class="responsive-iframe"></iframe>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom-area">
                <div class="container">
                    <div class="footer-border">
                        <div class="row d-flex align-items-center">
                            <div class="col-xl-12 ">
                                <div class="footer-copy-right text-center">

                                    <div class="flA-8">
                                        <!-- <div class="_37nmw">স্বত্ব © ২০২৩ প্রথম আলো</div> -->
                                        <div class="print-default-editor AQWAe">
                                            <span class="text-light"><strong>Editor:&nbsp;</strong> Imran Khan Nahid &nbsp;|</span>
                                            <span class="text-light" style="margin-left: 5px;"><strong>Publisher:&nbsp;</strong> Ershadur Rahman Refat</span>
                                        </div>
                                        {{-- <div class="print-default-editor AQWAe">
                                            <span class="text-light"><strong>Editor:&nbsp;</strong> Imran Khan Nahid </span>
                                        </div> --}}

                                        <div class="print-default-editor AQWAe mt-2 mb-2">
                                            <span class="text-light">A Concern of Supreme Media Corporation</span>
                                        </div>
                                    </div>

                                    <p>Copyright &copy;
                                        <script>
                                            document.write(new Date().getFullYear());
                                        </script> All rights reserved | Powered by <a href="https://webcodecare.com/" target="_blank" rel="nofollow noopener">Supreme WebCodeCare</a>
                                    </p>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>




    <footer id="footer_ban">
        <!-- <div id="map">
            <button onclick="showMap(25.594095,85.137566)">Show Map</button>
        </div> -->

          <div class="footer-wrapper">
              <div class="footer-area footer-padding">
                  <div class="container">
                      <div class="row d-flex justify-content-between">
                          <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                              <div class="single-footer-caption mb-50">
                                  <div class="footer-tittle">
                                      <h4>About</h4>
                                      <ul>
                                          <li><a href="{{ route('aboutUs') }}">About Us</a></li>
                                          <li><a href="{{ route('contactUs') }}">Contact Us</a></li>
                                          <li><a href="#">Our Story</a></li>
                                          <li><a href="#">Mission</a></li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                          <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                              <div class="single-footer-caption mb-50">
                                  <div class="footer-tittle">
                                    @php
                                        $category = App\Models\News_category::all()->take(4);
                                    @endphp
                                      <h4>Categories</h4>
                                      <ul>
                                        @foreach ($category as $fitems_bn )
                                        <li><a href="{{ route('all_news', $fitems_bn->id) }}">{{ $fitems_bn->cate_title_ban }}</a></li>
                                        @endforeach
                                      </ul>
                                  </div>
                              </div>
                          </div>

                          <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                              <div class="single-footer-caption mb-50">
                                  <div class="footer-tittle">
                                      <h4>Quick Links </h4>
                                      <ul>
                                          <li><a href="{{ route('terms') }}">Terms & Condition</a></li>
                                          <li><a href="#">Privacy Statement</a></li>
                                          <li><a href="#">Use of cookies</a></li>
                                          <li><a href="#">International Editions</a></li>
                                      </ul>
                                  </div>
                              </div>
                          </div>

                          <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                              <div class="single-footer-caption mb-50">
                                  <div class="footer-tittle">
                                    <h4>Location</h4>
                                    <div class="containers">
                                      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14609.247876509886!2d90.39944836338171!3d23.73625210150804!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8f4f90dac9d%3A0x2c6003e88413b93d!2sKakrail%2C%20Dhaka%201205!5e0!3m2!1sen!2sbd!4v1695469430246!5m2!1sen!2sbd" class="responsive-iframe"></iframe>
                                    </div>
                                  </div>
                              </div>
                          </div>

                      </div>
                  </div>
              </div>

              <div class="footer-bottom-area">
                  <div class="container">
                      <div class="footer-border">
                          <div class="row d-flex align-items-center">
                              <div class="col-xl-12 ">
                                  <div class="footer-copy-right text-center">

                                      <div class="flA-8">
                                          <!-- <div class="_37nmw">স্বত্ব © ২০২৩ প্রথম আলো</div> -->
                                          <div class="print-default-editor AQWAe">
                                              <span class="text-light"><strong>সম্পাদক:&nbsp;</strong> ইমরান খান নাহিদ &nbsp;|</span>
                                              <span class="text-light" style="margin-left: 5px;"><strong>প্রকাশক:&nbsp;</strong> এরশাদুর রহমান রিফাত </span>
                                          </div>


                                          <div class="print-default-editor AQWAe mt-2 mb-2">
                                              <span class="text-light">সুপ্রিম মিডিয়া কর্পোরেশনের একটি অঙ্গ-প্রতিষ্ঠান</span>
                                          </div>
                                      </div>

                                      <p>&copy;
                                          <script>
                                            //   document.write(new Date().getFullYear());
                                          </script> সর্বস্বত্ব সংরক্ষিত ২০২৩ | প্রযুক্তিগত সহযোগিতায়: <a href="https://webcodecare.com/" target="_blank" rel="nofollow noopener">Supreme WebCodeCare</a>
                                      </p>


                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </footer>




    <div id="back-top" class>
        <a title="Go to Top" href="#" class="text-light"> <i class="ti-rocket scroll-animate"></i></a>
        <!-- <a title="Go to Top" href="#" class> <i class="fa-solid fa-shuttle-space fa-rotate-270"></i></a> -->
        <!-- <a title="Go to Top" href="#" class> <img src="/img/icon/thedigitalmoney-rocket.gif"> </a> -->
    </div>



    <script src="/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/slick.min.js"></script>
    <script src="/js/owl.carousel.min.js"></script>
    {{-- <script src="/js/calender.js"></script> --}}

    <script src="slider/js/jquery-3.3.1.min.js"></script>
    <script src="slider/js/popper.min.js"></script>
    <script src="slider/js/bootstrap.min.js"></script>
    <script src="slider/js/owl.carousel.min.js"></script>
    <script src="slider/js/main.js"></script>


    {{-- <script src="slider_news/js/jquery.min.js"></script> --}}
    <script src="slider_news/js/popper.js"></script>
    <script src="slider_news/js/bootstrap.min.js"></script>
    <script src="slider_news/js/owl.carousel.min.js"></script>
    <script src="slider_news/js/main.js"></script>
    {{-- <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v8b253dfea2ab4077af8c6f58422dfbfd1689876627854" integrity="sha512-bjgnUKX4azu3dLTVtie9u6TKqgx29RBwfj3QXYt5EKfWM/9hPSAI/4qcV5NACjwAo8UtTeWefx6Zq5PHcMm7Tg==" data-cf-beacon='{"rayId":"80d2c16d6bbf4822","version":"2023.8.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}' crossorigin="anonymous"></script> --}}

    <script src="/js/jquery.slicknav.min.js"></script>

    <script src="/js/wow.min.js"></script>
    <script src="/js/jquery.magnific-popup.js"></script>
    {{-- <script src="/js/jquery.nice-select.min.js"></script> --}}

    <script src="/js/contact.js"></script>
    <script src="/js/jquery.form.js"></script>
    <script src="/js/jquery.validate.min.js"></script>
    <script src="/js/mail-script.js"></script>
    <script src="/js/jquery.ajaxchimp.min.js"></script>

    <script src="/js/plugins.js"></script>
    <script src="/js/main.js"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v8b253dfea2ab4077af8c6f58422dfbfd1689876627854"
        integrity="sha512-bjgnUKX4azu3dLTVtie9u6TKqgx29RBwfj3QXYt5EKfWM/9hPSAI/4qcV5NACjwAo8UtTeWefx6Zq5PHcMm7Tg=="
        data-cf-beacon='{"rayId":"7f823a957c90bc22","version":"2023.8.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}'
        crossorigin="anonymous"></script>


    <!-- Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->





</body>

<script type="text/javascript">
function codeAddress() {

      var lang = document.getElementById('lang').value;

        if(lang=="English")
        {
          //alert("en");
            // $(".nav_bangla").style.visibility = "none";

            // document.getElementsByClassName('class_bn')[0].style.display = 'none';
            // document.getElementsByClassName('class_en')[0].style.display = 'block';
            document.getElementsByClassName('class_bn_default')[0].style.display = 'none';
            document.getElementsByClassName('class_en_default')[0].style.display = 'block';
            // div_nav_ban.style.display = 'none';


        }
        if(lang=="Bengali")
        {
          //alert("bn");
          // document.getElementsByClassName('class_en')[0].style.display = 'none';
          // document.getElementsByClassName('class_bn')[0].style.display = 'block';
          document.getElementsByClassName('class_en_default')[0].style.display = 'none';
          document.getElementsByClassName('class_bn_default')[0].style.display = 'block';
          // document.getElementById("nav_bangla").display = 'block';
          // document.getElementById("nav_english").innerHTML = "";
        }

}
codeAddress();
</script>

<script>


  // document.getElementById("latest_english").hidden = true;
// $('#latest_english').hidden();

// $('#latest_english').show();
// alert('hi');
  function changeLanguage() {

    //alert("sdasd");

    var div_nav_eng = document.getElementById('id_en_default');
    var div_nav_ban = document.getElementById('id_bn_default');
    var lang = document.getElementById('lang').value;

    if(lang=="English")
    {
      div_nav_eng.style.display = '';
      div_nav_ban.style.display = 'none';
    }
    if(lang=="Bengali")
    {
      div_nav_ban.style.display = '';
      div_nav_eng.style.display = 'none';
    }

    var div_eng = document.getElementById('english');
    var div_ban = document.getElementById('bangla');

    if(lang=="English")
    {
      div_eng.style.display = 'block';
      div_ban.style.display = 'none';
    }
    if(lang=="Bengali")
    {
      div_ban.style.display = 'block';
      div_eng.style.display = 'none';
    }



    var div_cat_eng = document.getElementById('cat_english');
    var div_cat_ban = document.getElementById('cat_bangla');

    if(lang=="English")
    {
      div_cat_eng.style.display = 'block';
      div_cat_ban.style.display = 'none';
    }
    if(lang=="Bengali")
    {
      div_cat_ban.style.display = 'block';
      div_cat_eng.style.display = 'none';
    }


    var div_latest_eng = document.getElementById('latest_english');
    var div_latest_ban = document.getElementById('latest_bangla');

    if(lang=="English")
    {
      div_latest_eng.style.display = '';
      div_latest_ban.style.display = 'none';
    }
    if(lang=="Bengali")
    {
      div_latest_ban.style.display = '';
      div_latest_eng.style.display = 'none';
    }



    var footer_eng = document.getElementById('footer_eng');
    var footer_ban = document.getElementById('footer_ban');

    if(lang=="English")
    {
        footer_eng.style.display = 'block';
        footer_ban.style.display = 'none';
    }
    if(lang=="Bengali")
    {
        footer_ban.style.display = '';
        footer_eng.style.display = 'none';
    }

    codeAddress();

  }
</script>
</html>
