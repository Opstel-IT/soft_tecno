@extends('frontend.layouts.app')
@section('front-content')
    {{-- hero section Start --}}
    @foreach ($cw_img->where('sec', 'product_sec_1') as $postData)
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

    {{-- Product section Start --}}
    <div class="our_product">
        <div class="container">
            @foreach ($cw_iconHome->where('sec', 'home_sec_4_title') as $postData)
                <div class="section-header ">
                    <h2>{!! $postData->title !!}</h2>
                    <p class="">{!! $postData->des !!}</p>
                </div>
            @endforeach
            <div class="product_grid">
                @foreach ($product as $postData)
                    <div class="product_box">
                        <img src="{!! asset('assets/img/uploaded/img/' . $postData->img ?? '') !!}" alt="{!! $postData->alt_img !!}">
                        <h3>{!! $postData->title !!}</h3>
                        <p>{!! Str::limit($postData->des ?? 'N/A', 200, '...') !!}</p>
                        <a href="" class="cart_icon">
                            <i class="fa-solid fa-cart-plus"></i>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- About Us  --}}
    @foreach ($cw_img->where('sec', 'product_sec_3') as $postData)
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
@endsection
