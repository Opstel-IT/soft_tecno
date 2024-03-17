@extends('frontend.layouts.app')
@section('front-content')
    {{-- hero section Start --}}
    @foreach ($cw_img->where('sec', 'about_sec_1') as $postData)
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

    {{-- About section Start --}}
    @foreach ($cw_img->where('sec', 'about_sec_2') as $postData)
        <div class="home-about">
            <div class="container">
                <div class="home-about-content">
                    <div class="home-about-left">
                        <img class="img1" src="{!! asset('assets/img/uploaded/img/' . $postData->img ?? '') !!}" alt="{!! $postData->alt_img !!}">
                    </div>
                    <div class="home-about-right">
                        <h2>{!! $postData->title !!}</h2>
                        <p style="text-align: justify; ">{!! $postData->des !!}</p>
                        <a class="basic-btn" href="{!! $postData->button_link !!}">{!! $postData->button_name !!}</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    {{-- Partners section Start --}}
    <div class="Partners_section">
        <div class="container">
            <div class="section-header pt-20">
                @foreach ($cw_icon->where('sec', 'home_sec_10_title') as $postData)
                    <div class="section-header ">
                        <h2>{!! $postData->title !!}</h2>
                        <p class="">{!! $postData->des !!}</p>
                    </div>
                @endforeach
            </div>
            <div class="counter pt-30">
                <div class="container">
                    <div class="row">

                        @foreach ($cw_icon->where('sec', 'home_sec_10_content') as $postData)
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="count-up count_center">
                                    <div class="scroll_icon">
                                        <i class="{!! $postData->icon !!}"></i>
                                    </div>
                                    <p class="counter-count">{!! $postData->title !!}</p>
                                    <h3>{!! $postData->des !!}</h3>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Team section start --}}
    <section class="team">
        <div class="container">
            <div class="section-header">
                @foreach ($cw_icon->where('sec', 'home_sec_6_title') as $postData)
                    <div class="section-header ">
                        <h2>{!! $postData->title !!}</h2>
                        <p class="">{!! $postData->des !!}</p>
                    </div>
                @endforeach
            </div>
            <!-- team items -->
            <div class="team_gride team_gride_slider">
                @forelse ($team as $postData)
                    <div class="time_body">
                        <div class="team_item">
                            <img src="{!! asset('assets/img/uploaded/img/' . $postData->img ?? '') !!}" alt="">
                            <h3>{!! $postData->name !!}</h3>
                            <span class="position">{!! $postData->rank !!}</span>
                            <div class="leadership_social">
                                <a class="{!! $postData->social1 != '' ? '' : 'd-none' !!}" href="{!! $postData->social_link1 !!}">
                                    <i class="{!! $postData->social1 !!}"></i>
                                </a>
                                <a class="{!! $postData->social2 != '' ? '' : 'd-none' !!}" href="{!! $postData->social_link2 !!}">
                                    <i class="{!! $postData->social2 !!}"></i>
                                </a>
                                <a class="{!! $postData->social3 != '' ? '' : 'd-none' !!}" href="{!! $postData->social_link3 !!}">
                                    <i class="{!! $postData->social3 !!}"></i>
                                </a>
                                <a class="{!! $postData->social4 != '' ? '' : 'd-none' !!}" href="{!! $postData->social_link4 !!}">
                                    <i class="{!! $postData->social4 !!}"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center">Data Not Found.</p>
                @endforelse

            </div>
        </div>
    </section>

    {{-- About Us  --}}
    @foreach ($cw_img->where('sec', 'about_sec_5') as $postData)
        <div class="home-about">
            <div class="container">
                <div class="home-about-content">
                    <div class="goal_img">
                        <img class="img1" src="{!! asset('assets/img/uploaded/img/' . $postData->img ?? '') !!}" alt="{!! $postData->alt_img !!}">
                      </div>
                    <div class="home-about-right">
                        <h2>{!! $postData->title !!}</h2>
                        <p style="text-align: justify; ">{!! $postData->des !!}</p>
                        <a class="basic-btn" href="{!! $postData->button_link !!}">{!! $postData->button_name !!}</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- client Review slider section start --}}
    <section class="client_review">
        <div class="container">

            <div class="section-header pt-20">
                @foreach ($cw_icon->where('sec', 'home_sec_9_title') as $postData)
                    <div class="section-header ">
                        <h2>{!! $postData->title !!}</h2>
                        <p class="">{!! $postData->des !!}</p>
                    </div>
                @endforeach
            </div>

            <div class="Review_slider">

                @foreach ($cw_icon->where('sec', 'home_sec_9_content') as $postData)
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
