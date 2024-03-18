@extends('frontend.layouts.app')
@section('front-content')
    {{-- hero section Start --}}
    @foreach ($cw_img->where('sec', 'blog_sec_1') as $postData)
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

    {{-- Blog Section  --}}
    <section class="main_blog_section">
        <div class="container">
            @foreach ($cw_icon->where('sec', 'blog_sec_2_title') as $postData)
                <div class="section-header ">
                    <h2>{!! $postData->title !!}</h2>
                    <p class="">{!! $postData->des !!}</p>
                </div>
            @endforeach
            <div class="blog_grid">
                @foreach ($blog as $postData)
                    <a class="blog_post" href="">
                        <img src="{!! asset('assets/img/uploaded/img/' . $postData->img ?? '') !!}" alt="{!! $postData->alt_img !!}">
                        <div class="text_body">
                            <h4>{!! Str::limit(strip_tags($postData->title), 40, '...') !!}</h4>
                            <span class="catagory">{!! $postData->CategoryName->title ?? '' !!}</span>
                            <div class="admin_flex">
                                <p>By : {!! $postData->CreatedName->name ?? '' !!}</p>
                                <p>Comment : 13</p>
                            </div>
                        </div>
                        <div class="date">
                            <strong>{{ $postData->created_at->format('d')}}</strong>
                            <span>{{ $postData->created_at->format('M')}}</span>
                        </div>
                    </a>
                @endforeach

            </div>
        </div>
    </section>
@endsection
