@extends('frontend.layouts.app')
@section('front-content')
    {{-- hero section Start --}}
    @foreach ($cw_img->where('sec', 'service_sec_1') as $postData)
        <main class="hero-section" style="background-image: url({!! asset('assets/img/uploaded/img/' . $postData->img ?? '') !!}) !important;">
            <div class="container h-100">
                <div class="hero-content align-items-center h-100">
                    <div class="max-width">
                        <h2 class="hero-title">{!! $postData->title !!}</h2>
                        <p class="hero-p">{!! $postData->des !!}</p>
                        <div class="d_flex pt-20">
                            <a href="{!! $postData->button_link !!}" class="btn btn-lg btn_yellow">{!! $postData->button_name !!}</a>
                            <a href="{!! route('Contact.Us') !!}" class="btn btn-lg btn_main">Contact us </a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    @endforeach

    {{-- Services section Start --}}
    <section class="services_services">
        <div class="container">
            @foreach ($cw_iconHome->where('sec', 'home_sec_2_title') as $postData)
                <div class="section-header">
                    <h2>{!! $postData->title !!}</h2>
                    <p class="">{!! $postData->des !!}</p>
                </div>
            @endforeach
            <div class="home-service-box-3">
                @forelse ($service as $postData)
                    <a href="single services.html">
                        <div class="home-service-card">
                            <div class="home-service-card-header">
                                <div class="home-service-card-icon service-color-3">
                                    <i class="{!! $postData->icon !!}"></i>
                                </div>
                                <h3>{!! $postData->title !!}</h3>
                            </div>
                            <p></p>
                            <p>{!! Str::limit($postData->des ?? 'N/A', 200, '...') !!}</p>
                            <div class="home-service-card-footer">
                                <h4>{{ $postData->service }}</h4>
                                <span>Learn More <i class="fa-solid fa-chevron-right"></i></span>
                            </div>
                        </div>
                    </a>
                @empty
                    <p class="text-center">Data Not Found.</p>
                @endforelse
            </div>
        </div>

    </section>


    {{-- About section Start --}}
    @foreach ($cw_img->where('sec', 'service_sec_3') as $postData)
        <div class="home-about">
            <div class="container">
                <div class="home-about-content home_about_content_revers">

                    <div class="home-about-right">
                        <h2>{!! $postData->title !!}</h2>
                        <p style="text-align: justify; ">{!! $postData->des !!}</p>
                        <a class="basic-btn" href="{!! $postData->button_link !!}">{!! $postData->button_name !!}</a>
                    </div>
                    <div class="home-about-left">
                        <img class="img1" src="{!! asset('assets/img/uploaded/img/' . $postData->img ?? '') !!}" alt="{!! $postData->alt_img !!}">
                    </div>

                </div>
            </div>
        </div>
    @endforeach


    <!-- ========================
              GALLERY SECTION START
              ======================== -->
    <section class="filter_section" id="projects">
        <div class="container">
            <div class="section-header">
                @foreach ($cw_icon->where('sec', 'service_sec_4_title') as $postData)
                    <div class="section-header ">
                        <h2>{!! $postData->title !!}</h2>
                        <p class="">{!! $postData->des !!}</p>
                    </div>
                @endforeach
            </div>
            <!-- top filter tab  -->
            <div class="filter_top filter_btn_slider" id="myContant">


                @foreach ($category as $postData)
                    <div>
                        <button class="btn {{ $loop->iteration == 1 ? 'action12' : '' }}" id="tabs{!! $postData->id !!}"
                            onclick="filterSelection('tabs{!! $postData->id !!}')">{!! $postData->title !!}</button>
                    </div>
                @endforeach

            </div>
            <!-- filter_item  -->

            <div class="wrap">
                <div class="">
                    <div class=" gallery ">

                        @foreach ($client as $postData)
                            <div href="#" class="gallery_img tabs{!! $postData->page !!}" data-bs-toggle="modal"
                                data-bs-target="#tabss{!! $postData->page !!}">
                                <img data-target="tabss{!! $postData->page !!}" data-bs-toggle="modal" src="{!! asset('assets/img/uploaded/img/' . $postData->img ?? '') !!}"
                                    alt="">
                                <div class="overly_color">
                                    <a>Click Demo</a>
                                </div>
                            </div>
                            {{-- Modal  --}}

                            <div class="modal fade" id="tabss{!! $postData->page !!}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content services_modal">
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-bs-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <div class="modal-body">
                                            <img src="{!! asset('assets/img/uploaded/img/' . $postData->img ?? '') !!}" alt="">
                                            {{-- <a class="go_to_web" target="_blank">
                                                <span href="">This website is currently not live</span>
                                            </a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- ========================
              SERVICES SECTION END
              ======================== -->

    {{-- client Review slider section start --}}
    <section class="client_review">
        <div class="container">
            <div class="section-header pt-20">
                @foreach ($cw_iconHome->where('sec', 'home_sec_9_title') as $postData)
                    <div class="section-header ">
                        <h2>{!! $postData->title !!}</h2>
                        <p class="">{!! $postData->des !!}</p>
                    </div>
                @endforeach
            </div>
            <div class="Review_slider">
                @foreach ($cw_iconHome->where('sec', 'home_sec_9_content') as $postData)
                    <div class="box-slide">
                        <div class="home-review-box">
                            <div class="review-star">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <p>{!! $postData->des !!}</p>
                            <div class="review-user">
                                <div class="review-user-img">
                                    <img src="{!! asset('assets/img/uploaded/img/' . $postData->icon ?? '') !!}" alt="img">
                                </div>
                                <div class="review-user-text">
                                    <h4>{!! $postData->title !!}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
