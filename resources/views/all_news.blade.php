@extends('layouts.app')


@section('content')


<div style="display: none;" class="row" id="cat_english"></div>
<div style="display: none;" class="row" id="cat_bangla"></div>

<div style="display: none;" class="row" id="latest_english"></div>
<div style="display: none;" class="row" id="latest_bangla"></div>

<section class="technology-area mb-30">
    <div class="container-fluid" id="english" style="display: none;">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle mb-30 d-flex align-items-center justify-content-between">
                    <h2>{{ $category->cate_title_eng }}</h2>
                </div>
            </div>
        </div>
        <div class="row">
          @foreach ($news as $cat_news )

                      <div class="col-lg-3 col-md-6 col-sm-6">
                          <div class="technology-post mb-30">
                              <div class="technology-wrapper">
                                  <div class="properties-img">
                                      <a href="{{ route('post_details', $cat_news->slug ) }}"><img src="{{ asset('news_banners/'.$cat_news->banner) }}" alt></a>
                                  </div>
                                  <div class="properties-caption">
                                      <span>{{ $category->cate_title_eng }}</span>
                                      <h3><a href="{{ route('post_details', $cat_news->slug ) }}">{{$cat_news->title_eng}}</a></h3>
                                  </div>
                              </div>
                          </div>
                      </div>

          @endforeach
        </div>
    </div>


<!--===================================================== Bangla ==================================================-->
    <div class="container-fluid" id="bangla">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle mb-30 d-flex align-items-center justify-content-between">
                    <h2>{{ $category->cate_title_ban }}</h2>
                </div>
            </div>
        </div>
        <div class="row">
          @foreach ($news as $cat_news )

                      <div class="col-lg-3 col-md-6 col-sm-6">
                          <div class="technology-post mb-30">
                              <div class="technology-wrapper">
                                  <div class="properties-img">
                                      <a href="{{ route('post_details', $cat_news->slug ) }}"><img src="{{ asset('news_banners/'.$cat_news->banner) }}" alt></a>
                                  </div>
                                  <div class="properties-caption">
                                      <span>{{ $category->cate_title_ban }}</span>
                                      <h3><a href="{{ route('post_details', $cat_news->slug ) }}">{{$cat_news->title_ban}}</a></h3>
                                  </div>
                              </div>
                          </div>
                      </div>

          @endforeach
        </div>
    </div>

    <!--===================================================== Bangla ==================================================-->
</section>

@endsection
