@extends('frontend.layouts.app')
@section('front-content')
    {{-- hero section Start --}}
    @foreach ($cw_img->where('sec', 'project_sec_1') as $postData)
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
    
    {{-- Type Project section Start --}}
    <div class="type-project">
        <div class="container">
            <h2>Type of Project</h2>
            <div class="type-project-btn-box">
                <div href="#" class="form-group">
                    <input type="radio" id="" name="select1" value="HTML">
                    <label for="html">UI/UX Design</label><br>
                </div>
                <div class="form-group">
                    <input type="radio" id="" name="select1" value="HTML">
                    <label for="html">Ecommerce Web Design</label>
                </div>
                <div class="form-group">
                    <input type="radio" id="" name="select1" value="HTML">
                    <label for="css">WordPress Development</label>
                </div>
                <div class="form-group">
                    <input type="radio" id="" name="select1" value="HTML">
                    <label for="javascript">Content Writing</label>
                </div>
                <div href="#" class="form-group">
                    <input type="radio" id="" name="select1" value="HTML">
                    <label for="html">Digital Marketing</label><br>
                </div>
                <div class="form-group">
                    <input type="radio" id="" name="select1" value="HTML">
                    <label for="html">Graphic design</label>
                </div>
                <div class="form-group">
                    <input type="radio" id="" name="select1" value="HTML">
                    <label for="css">SEO</label>
                </div>
                <div class="form-group">
                    <input type="radio" id="" name="select1" value="HTML">
                    <label for="javascript">Software Development</label>
                </div>
            </div>

            <div class="type-project-budget">
                <h3>Budget</h3>
                <p>
                    A transparent budget will help us ensure expectations are met.
                    Ballparks are fine.
                </p>

                <div class="budget-range">
                    <div class="budget-range-box">
                        <input type="range" name="range" id="range" min="20000" max="50000" value="20000"
                            step="1" />
                    </div>
                    <div class="budget-range-minmax">
                        <h5>BDT 20000</h5>
                        <h5>BDT 50000</h5>
                    </div>

                    <div class="total-budget">
                        <h4>Your Budget :</h4>
                        <div class="total-budget-input">
                            <input type="text" name="budget" id="budget" disabled value="20000" />
                            <h6>BDT:</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Dis Project section start --}}
    <div class="describe_project">
        <div class="container">
            <div class="section-header">
                <h2>Describe Project </h2>
            </div>
            <div class="from">
                <form action="">
                    <div class="from_grid">
                        <div class="contact-form-input">
                            <input type="text" name="name" id="name" placeholder="Fast Name">
                        </div>
                        <div class="contact-form-input">
                            <input type="text" name="name" id="name" placeholder="Lalt Name">
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

@endsection
