@extends('frontend.layouts.app')
@section('front-content')
    {{-- hero section Start --}}
    @foreach ($cw_img->where('sec', 'faq_sec_1') as $postData)
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

    {{-- FAQ  --}}
    <div class="faq_section">
        <div class="container">
            @foreach ($cw_icon->where('sec', 'faq_sec_2_title') as $postData)
                <div class="section-header ">
                    <h2>{!! $postData->title !!}</h2>
                    <p class="">{!! $postData->des !!}</p>
                </div>
            @endforeach
            <div class="faq_item pt-20">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    @foreach ($cw_icon->where('sec', 'faq_sec_2_content') as $postData)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne{!! $postData->id !!}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne{!! $postData->id !!}" aria-expanded="false"
                                    aria-controls="flush-collapseOne{!! $postData->id !!}">
                                    {!! $postData->title !!}
                                </button>
                            </h2>
                            <div id="flush-collapseOne{!! $postData->id !!}" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingOne{!! $postData->id !!}"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">{!! $postData->des !!}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
