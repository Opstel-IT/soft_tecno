<?php

namespace App\Http\Controllers\Frontend;

use App\Models\{ContentWithImage,ContentWithVideo,ContentWithIcon,client,Team,Services,Category,Product,Blog,SiteSetting,Seo};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){

        $cw_img = ContentWithImage::where('page', 'home')->where('status', '0')->get();
        $cw_icon = ContentWithIcon::where('page', 'home')->where('status', '0')->get();
        $client = Client::where('page', 'home')->where('status', '0')->get();
        $service = Services::where('status', '0')->get();
        $product = Product::where('status', '0')->get();
        $team = Team::where('status', '0')->where('position', '1')->orderBy('id', 'ASC')->take('4')->get();
        $seo = Seo::where('page', 'home')->get();

        return view('frontend.home.home',compact('cw_img','cw_icon','seo','client','service','product','team'));
    }

    // About Us
    public function about()
    {
        $cw_img = ContentWithImage::where('page', 'about')->where('status', '0')->get();
        $cw_icon = ContentWithIcon::where('page', 'home')->where('status', '0')->get();
        $team = Team::where('position', '0')->orderBy('id', 'ASC')->where('status', '0')->get();
        $seo = Seo::where('page', 'about')->get();

        return view('frontend.about.about',compact('cw_img','team','seo','cw_icon'));
    }

    // Service Page
    public function service()
    {
        $cw_img = ContentWithImage::where('page', 'service')->where('status', '0')->get();
        $cw_icon = ContentWithIcon::where('page', 'service')->where('status', '0')->get();
        $cw_iconHome = ContentWithIcon::where('page', 'home')->where('status', '0')->get();
        $service = Services::where('status', '0')->get();

        $category = Category::where('page', 'service')->where('status', '0')->get();
        $client = Client::whereIN('page', $category->pluck('id')->toArray())->where('status', '0')->get();
        $seo = Seo::where('page', 'service')->get();

        return view('frontend.service.service',compact('cw_img','cw_icon','cw_iconHome','service','client','category','seo'));
    }
    // Contact Us
    public function ContactUs(){

        $seo = Seo::where('page', 'home')->get();

        return view('frontend.home.home',compact('seo'));
    }
}
