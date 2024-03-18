@extends('frontend.layouts.app')
@section('front-content')

    {{-- hero section Start --}}
    @foreach ($cw_img->where('sec', 'home_sec_1') as $postData)
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
            @foreach ($cw_icon->where('sec', 'home_sec_2_title') as $postData)
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
    @foreach ($cw_img->where('sec', 'home_sec_3') as $postData)
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

    {{-- Product section Start --}}
    <div class="our_product">
        <div class="container">
            @foreach ($cw_icon->where('sec', 'home_sec_4_title') as $postData)
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
            <a href="{!! route('Product.Us') !!}" class="order">Order Now Our Product</a>
        </div>
    </div>

    {{-- Together SECTION Start --}}
    @foreach ($cw_img->where('sec', 'home_sec_5') as $postData)
        <div class="together_section">
            <div class="container">
                <div class="together_flex">
                    <div class="img">
                        <img src="{!! asset('assets/img/uploaded/img/' . $postData->img ?? '') !!}" alt="{!! $postData->alt_img !!}">
                    </div>
                    <div class="img_shave">
                        <img src="{{ asset('assets/front/img/Together_shave.png') }}" alt="">
                    </div>
                    <div class="text_aria">
                        <h2>{!! $postData->title !!}</h2>
                        <a href="{!! $postData->button_link !!}">{!! $postData->button_name !!}</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

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

    {{-- GALLERY SECTION START --}}
    <section class="filter_section" id="projects">
        <div class="container">
            <div class="section-header">
                <h2>Our All Portfolio</h2>
            </div>
            <!-- top filter tab  -->
            <div class="filter_top filter_btn_slider" id="myContant">

                <div class="button">
                    <button class="btn action12" id="figma_to_html" onclick="filterSelection('figma_to_html')"> UI/UX
                        Design
                    </button>
                </div>

                <div>
                    <button class="btn" id="Personal" onclick="filterSelection('Personal')">Apps Development</button>
                </div>

                <div>
                    <button class="btn " id="education" onclick="filterSelection('education')">Graphic Design</button>
                </div>

                <div>
                    <button class="btn" id="digital_agency" onclick="filterSelection('digital_agency')"> digital
                        Digital marketing
                    </button>
                </div>

            </div>
            <!-- filter_item  -->

            <div class="wrap">
                <div class="">
                    <div class=" gallery ">

                        <!-- EDUCATION STUDY CANADA   -->
                        <div href="#" class="gallery_img education figma_to_html" data-bs-toggle="modal"
                            data-bs-target="#education_1">
                            <img data-target="imgModal" data-toggle="modal" src="img/projects/study_canada_2.jpeg"
                                alt="">
                            <div class="overly_color">
                                <a>Click Demo</a>
                            </div>
                        </div>
                        <!-- EDUCATION Edu lave   -->
                        <div href="#" class="gallery_img education figma_to_html" data-bs-toggle="modal"
                            data-bs-target="#education_2">
                            <img data-target="imgModal" data-toggle="modal" src="img/projects/edulave_2.jpeg"
                                alt="">
                            <div class="overly_color">
                                <a>Click Demo</a>
                            </div>
                        </div>
                        <!-- EDUCATION CAN_SEL   -->
                        <div href="#" class="gallery_img education figma_to_html" data-bs-toggle="modal"
                            data-bs-target="#education_3">
                            <img data-target="imgModal" data-toggle="modal" src="img/projects/cansel-2.jpeg"
                                alt="">
                            <div class="overly_color">
                                <a>Click Demo</a>
                            </div>
                        </div>

                        <!-- DIGITAL AGENCY OPSTEL IT   -->
                        <div href="#" class="gallery_img figma_to_html digital_agency" data-bs-toggle="modal"
                            data-bs-target="#digital_agency_1">
                            <img data-target="imgModal" data-toggle="modal" src="img/projects/opstelit_2.jpeg"
                                alt="">
                            <div class="overly_color">
                                <a>Click Demo</a>
                            </div>
                        </div>
                        <!-- DIGITAL AGENCY OPSTEL IT   -->
                        <div href="#" class="gallery_img figma_to_html digital_agency" data-bs-toggle="modal"
                            data-bs-target="#digital_agency_1">
                            <img data-target="imgModal" data-toggle="modal" src="img/projects/kloudaid_2.jpeg"
                                alt="">
                            <div class="overly_color">
                                <a>Click Demo</a>
                            </div>
                        </div>
                        <!-- Personal 1 -->
                        <div href="#" class="gallery_img Personal" data-bs-toggle="modal"
                            data-bs-target="#Personal_1">
                            <img data-target="imgModal" data-toggle="modal" src="img/projects/portfolio websiteA-2.jpeg"
                                alt="">
                            <div class="overly_color">
                                <a data-target="imgModal" data-toggle="modal">Click Demo</a>
                            </div>
                        </div>
                        <!-- Personal 2 -->
                        <div href="#" class="gallery_img Personal" data-bs-toggle="modal"
                            data-bs-target="#Personal_2">
                            <img data-target="imgModal" data-toggle="modal" src="img/projects/portfolio websiteB-2.jpeg"
                                alt="">
                            <div class="overly_color">
                                <a data-target="imgModal" data-toggle="modal">Click Demo</a>
                            </div>
                        </div>
                        <!-- Personal 3 -->
                        <div href="#" class="gallery_img Personal" data-bs-toggle="modal"
                            data-bs-target="#Personal_3">
                            <img data-target="imgModal" data-toggle="modal" src="img/projects/portfolio websiteC-2.jpeg"
                                alt="">
                            <div class="overly_color">
                                <a data-target="imgModal" data-toggle="modal">Click Demo</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    {{-- contact_section Start --}}
    <div class="contact_section">
        <div class="container">
            <div class="section-header">
                <h2> Contact us </h2>
            </div>
            <div class="from">
                <form action="">
                    <div class="from_grid">
                        <div class="contact-form-input">
                            <input type="text" name="name" id="name" placeholder="Fast Name">
                        </div>
                        <div class="contact-form-input">
                            <input type="text" name="name" id="name" placeholder="Salt Name">
                        </div>
                        <div class="contact-form-input">
                            <input type="email" name="email" id="email" placeholder="Enter Your Email">
                        </div>
                        <div class="contact-form-input">
                            <input type="number" name="Phone" id="Phone" placeholder="Enter You Phone">
                        </div>
                    </div>
                    <div class="contact-form-input-textarea">
                        <textarea name="message" id="message" placeholder="Wright Your Message"></textarea>
                    </div>
                    <input class="send_message" type="submit" value="Send Massage">
                </form>
            </div>
        </div>
    </div>

    {{-- home-partner Section Start --}}
    <div class="home-partner">
        <div class="container">
            <div class="section-header">
                @foreach ($cw_icon->where('sec', 'home_sec_8_title') as $postData)
                    <div class="section-header ">
                        <h2>{!! $postData->title !!}</h2>
                        <p class="">{!! $postData->des !!}</p>
                    </div>
                @endforeach
            </div>

            <div class="home-partner-content">

                @forelse ($client as $postData)
                    <div class="home-partner-box">
                        <div class="home-partner-card">
                            <img src="{!! asset('assets/img/uploaded/img/' . $postData->img ?? '') !!}" alt="img" />
                        </div>
                    </div>
                @empty
                    <p class="text-center">Data Not Found.</p>
                @endforelse

            </div>
        </div>
    </div>

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

@endsection
