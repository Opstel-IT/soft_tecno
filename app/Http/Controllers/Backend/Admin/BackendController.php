<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;
use App\Models\{ContentWithImage,ContentWithVideo,ContentWithIcon,client,Team,Services,Category,Product,Blog,SiteSetting,Seo};
use App\Http\Controllers\Controller;
use File;
use Auth;
use Intervention\Image\ImageManagerStatic as Image;

class BackendController extends Controller
{

    public function home2()
    {
        $cw_img = ContentWithImage::where('page', 'home')->get();
        $cw_video = ContentWithVideo::where('page', 'home')->get();
        $cw_icon = ContentWithIcon::where('page', 'home')->get();
        $seo = Seo::where('page', 'home')->get();

        return view('backend.admin.home.home2',compact('cw_img','cw_video','cw_icon','seo'));
    }

    // Home Page
    public function home()
    {
        $cw_img = ContentWithImage::where('page', 'home')->get();
        $cw_icon = ContentWithIcon::where('page', 'home')->get();
        $client = Client::where('page', 'home')->get();
        $seo = Seo::where('page', 'home')->get();

        return view('backend.admin.home.home',compact('cw_img','cw_icon','seo','client'));
    }

    // About Page
    public function about()
    {
        $cw_img = ContentWithImage::where('page', 'about')->get();
        $team = Team::get();
        $seo = Seo::where('page', 'about')->get();

        return view('backend.admin.about.about',compact('cw_img','team','seo'));
    }

    // Service Page
    public function service()
    {
        $cw_img = ContentWithImage::where('page', 'service')->get();
        $cw_icon = ContentWithIcon::where('page', 'service')->get();
        $service = Services::get();

        $category = Category::where('page', 'service')->get();
        $client = Client::whereIN('page', $category->pluck('id')->toArray())->get();
        $seo = Seo::where('page', 'service')->get();

        return view('backend.admin.service.service',compact('cw_img','cw_icon','service','client','category','seo'));
    }

    // Service Single Page
    public function serviceDetails($id)
    {
        $serviceDetails = Services::find($id);
        $cw_img = ContentWithImage::where('page', $serviceDetails->id)->get();
        $cw_icon = ContentWithIcon::where('page', $serviceDetails->id)->get();

        return view('backend.admin.service.service_details',compact('cw_img','cw_icon','serviceDetails'));
    }

    // Product Page
    public function product()
    {
        $cw_img = ContentWithImage::where('page', 'product')->get();
        $cw_icon = ContentWithIcon::where('page', 'product')->get();
        $product = Product::get();
        $seo = Seo::where('page', 'product')->get();

        return view('backend.admin.product.product',compact('cw_img','cw_icon','product','seo'));
    }

    // Product Single Page
    public function productDetails($id)
    {
        $productDetails = Product::find($id);
        $cw_img = ContentWithImage::where('page', $productDetails->id)->get();
        $cw_icon = ContentWithIcon::where('page', $productDetails->id)->get();

        return view('backend.admin.product.product_details',compact('cw_img','cw_icon','productDetails'));
    }

    // Blog Page
    public function blog()
    {
        $cw_img = ContentWithImage::where('page', 'blog')->get();
        $cw_icon = ContentWithIcon::where('page', 'blog')->get();
        $category = Category::where('page', 'blog')->get();
        $blog = Blog::get();
        $seo = Seo::where('page', 'blog')->get();

        return view('backend.admin.blog.blog',compact('cw_img','cw_icon','blog','category','seo'));
    }

    // FAQ Page
    public function faq()
    {
        $cw_img = ContentWithImage::where('page', 'faq')->get();
        $cw_icon = ContentWithIcon::where('page', 'faq')->get();

        $seo = Seo::where('page', 'faq')->get();

        return view('backend.admin.faq.faq',compact('cw_img','cw_icon','seo'));
    }

    // Create Project Page
    public function project()
    {
        $cw_img = ContentWithImage::where('page', 'project')->get();
        $cw_icon = ContentWithIcon::where('page', 'project')->get();

        $seo = Seo::where('page', 'project')->get();

        return view('backend.admin.service.project',compact('cw_img','cw_icon','seo'));
    }

    // Setting Page
    public function setting()
    {
        $cw_img = ContentWithImage::where('page', 'setting')->get();
        $siteSetting = SiteSetting::get();
        $seo = Seo::where('page', 'setting')->get();

        return view('backend.admin.setting.setting',compact('cw_img','siteSetting','seo'));
    }

    ////////////////////cw_image/////////////////

    // Create
    public function cw_image_create(Request $request) {
        $request->validate([
            'page' => 'required|max:250',
            'sec' => 'required|max:250',
            'title' => 'nullable|max:250',
            'button_name' => 'nullable|max:250',
            'button_link' => 'nullable|max:250',
            'des' => 'nullable|max:30000',
            'img' => 'mimes:jpg,png,jpeg|max:5120', // 5 MB
            'alt_img' => 'nullable|max:200',
            'status' => 'nullable|max:200',

        ]);

        $data = new ContentWithImage;
        $data->page = $request->page;
        $data->sec = $request->sec;
        $data->title = $request->title;
        $data->button_name = $request->button_name;
        $data->button_link = $request->button_link;
        $data->des = $request->des;
        $data->alt_img = $request->alt_img;
        $data->status = $request->status;

        if ($request->banner == 'banner') {
            if($request->file('img')){
                $file= $request->file('img');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $filesize=Image::make($file->getRealPath());
                $filesize->resize(function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $filesize->save(('assets/img/uploaded/img/'.$filename));
                $data['img']= $filename;
            }
        } elseif($request->banner == 'get') {
            if($request->file('img')){
                $file= $request->file('img');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $filesize=Image::make($file->getRealPath());
                $filesize->resize(700, 512, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $filesize->save(('assets/img/uploaded/img/'.$filename));
                $data['img']= $filename;
            }

        } else {
            if($request->file('img')){
                $file= $request->file('img');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $filesize=Image::make($file->getRealPath());
                $filesize->resize(700, 512, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $filesize->save(('assets/img/uploaded/img/'.$filename));
                $data['img']= $filename;
            }
        }

        $data->save();

        $success = [
            'message' => 'Data Added Successfully',
            'alert-type' => 'success',
        ];

        $fail = [
            'message' => 'Something Wrong',
            'alert-type' => 'error',
        ];

        if($request){
            return back()->with($success);
           }else{
            return back()->with($fail);
        }
    }

    // Update
    public function cw_image_update(Request $request, $id){
        $request->validate([
            'page' => 'required|max:250',
            'sec' => 'required|max:250',
            'title' => 'nullable|max:250',
            'button_name' => 'nullable|max:250',
            'button_link' => 'nullable|max:250',
            'des' => 'nullable|max:30000',
            'img' => 'mimes:jpg,png,jpeg|max:5120', // 5 MB
            'alt_img' => 'nullable|max:200',
            'status' => 'nullable|max:200',
        ]);

        $data = ContentWithImage::find($id);
        $data->page = $request->page;
        $data->sec = $request->sec;
        $data->title = $request->title;
        $data->button_name = $request->button_name;
        $data->button_link = $request->button_link;
        $data->des = $request->des;
        $data->alt_img = $request->alt_img;
        $data->status = $request->status;

        if ($request->banner == 'banner') {
            if($request->file('img')){
                if (File::exists('assets/img/uploaded/img/'.$data->img)) {
                    File::delete('assets/img/uploaded/img/'.$data->img);
                }

                $file= $request->file('img');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $filesize=Image::make($file->getRealPath());
                $filesize->resize(function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $filesize->save(('assets/img/uploaded/img/'.$filename));
                $data['img']= $filename;
            }
        } elseif($request->banner == 'get') {
            if($request->file('img')){
                if (File::exists('assets/img/uploaded/img/'.$data->img)) {
                    File::delete('assets/img/uploaded/img/'.$data->img);
                }

                $file= $request->file('img');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $filesize=Image::make($file->getRealPath());
                $filesize->resize(500, 712, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $filesize->save(('assets/img/uploaded/img/'.$filename));
                $data['img']= $filename;
            }
        } else {
            if($request->file('img')){
                if (File::exists('assets/img/uploaded/img/'.$data->img)) {
                    File::delete('assets/img/uploaded/img/'.$data->img);
                }

                $file= $request->file('img');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $filesize=Image::make($file->getRealPath());
                $filesize->resize(700, 512, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $filesize->save(('assets/img/uploaded/img/'.$filename));
                $data['img']= $filename;
            }
        }

        $data->save();

        $success = [
            'message' => 'Data Edited Successfully',
            'alert-type' => 'success',
        ];

        $fail = [
            'message' => 'Something Wrong',
            'alert-type' => 'error',
        ];

        if($request){
            return back()->with($success);
           }else{
            return back()->with($fail);
        }
    }

    // Delete
    public function cw_image_delete(Request $request, $id){
        $data= ContentWithImage::find($id);

        if (File::exists('assets/img/uploaded/img/'.$data->img)) {
            File::delete('assets/img/uploaded/img/'.$data->img);
        }

        $data->delete();

        $success = [
            'message' => 'Data Deleted Successfully',
            'alert-type' => 'success',
        ];

        $fail = [
            'message' => 'Something Wrong',
            'alert-type' => 'error',
        ];

        if($request){
            return back()->with($success);
           }else{
            return back()->with($fail);
        }
    }


   ////////////////////cw_icon/////////////////

    // Create
    public function cw_icon_create(Request $request){
        $request->validate([
            'page' => 'required|max:250',
            'sec' => 'required|max:250',
            'title' => 'nullable|max:250',
            'img' => 'nullable|mimes:jpg,png,jpeg|max:5120',
            'icon' => 'nullable|max:250',
            'des' => 'nullable|max:30000',
            'status' => 'nullable|max:200',
        ]);
        $data = new ContentWithIcon;
        $data->page = $request->page;
        $data->sec = $request->sec;
        $data->title = $request->title;
        $data->des = $request->des;
        $data->status = $request->status;

        if ($request->icon) {
            $data->icon = $request->icon;

        } elseif($request->img) {
            if ($request->size == 'profile') {
                if($request->file('img')){
                    $file= $request->file('img');
                    $filename= date('YmdHi').$file->getClientOriginalName();
                    $filesize=Image::make($file->getRealPath());
                    $filesize->resize(70, 70, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                    $filesize->save(('assets/img/uploaded/img/'.$filename));
                    $data['icon']= $filename;
                }
            } else {
                if($request->file('img')){
                    $file= $request->file('img');
                    $filename= date('YmdHi').$file->getClientOriginalName();
                    $filesize=Image::make($file->getRealPath());
                    $filesize->resize(700, 512, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                    $filesize->save(('assets/img/uploaded/img/'.$filename));
                    $data['icon']= $filename;
                }
            }
        }else{
            $data->icon = '';
        }
        $data->save();

        $success = [
            'message' => 'Data Added Successfully',
            'alert-type' => 'success',
        ];

        $fail = [
            'message' => 'Something Wrong',
            'alert-type' => 'error',
        ];

        if($request){
            return back()->with($success);
           }else{
            return back()->with($fail);
        }
    }

    // Update
    public function cw_icon_update(Request $request, $id) {
        $request->validate([
            'page' => 'required|max:250',
            'sec' => 'required|max:250',
            'title' => 'nullable|max:250',
            'icon' => 'nullable|max:250',
            'des' => 'nullable|max:30000',
            'status' => 'nullable|max:200',
        ]);

        $data = ContentWithIcon::find($id);
        $data->page = $request->page;
        $data->sec = $request->sec;
        $data->title = $request->title;
        $data->des = $request->des;
        $data->status = $request->status;

        if ($request->icon) {
            $data->icon = $request->icon;

        } elseif($request->img) {

            if($request->file('img')){
                if (File::exists('assets/img/uploaded/img/'.$data->icon)) {
                    File::delete('assets/img/uploaded/img/'.$data->icon);
                }
                $file= $request->file('img');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $filesize=Image::make($file->getRealPath());
                $filesize->resize(700, 512, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $filesize->save(('assets/img/uploaded/img/'.$filename));
                $data['icon']= $filename;
            }
        }else{
            $data->icon = '';
        }
        $data->save();

        $success = [
            'message' => 'Data Edited Successfully',
            'alert-type' => 'success',
        ];

        $fail = [
            'message' => 'Something Wrong',
            'alert-type' => 'error',
        ];

        if($request){
            return back()->with($success);
           }else{
            return back()->with($fail);
        }
    }

    // Delete
    public function cw_icon_delete(Request $request, $id){
        $data= ContentWithIcon::find($id);

        if (File::exists('assets/img/uploaded/img/'.$data->icon)) {
            File::delete('assets/img/uploaded/img/'.$data->icon);
        }

        $data->delete();

        $success = [
            'message' => 'Data Deleted Successfully',
            'alert-type' => 'success',
        ];

        $fail = [
            'message' => 'Something Wrong',
            'alert-type' => 'error',
        ];

        if($request){
            return back()->with($success);
           }else{
            return back()->with($fail);
        }
    }


    ////////////////////SEO/////////////////

    // Create
    public function seo_create(Request $request){
        $request->validate([
            'page'=>'required',
            'meta_title'=>'nullable|max:250',
            'meta_description'=>'nullable|max:30000',
            'meta_keyword'=>'nullable||max:30000',
        ]);

        $data = new Seo;
        $data->page=$request->page;
        $data->meta_title=$request->meta_title;
        $data->meta_description=$request->meta_description;
        $data->meta_keyword=$request->meta_keyword;

        $data->save();

        $success = [
            'message' => 'Data Added Successfully',
            'alert-type' => 'success',
        ];

        $fail = [
            'message' => 'Something Wrong',
            'alert-type' => 'error',
        ];

        if($request){
            return back()->with($success);
        }else{
            return back()->with($fail);
        }
    }

    // update
    public function seo_update(Request $request, $id){

        $request->validate([
            'page'=>'required',
            'meta_title'=>'nullable|max:250',
            'meta_description'=>'nullable|max:30000',
            'meta_keyword'=>'nullable||max:30000',
        ]);

        $data = Seo::find($id);
        $data->page=$request->page;
        $data->meta_title=$request->meta_title;
        $data->meta_description=$request->meta_description;
        $data->meta_keyword=$request->meta_keyword;

        $data->save();

        $success = [
            'message' => 'Data Updated Successfully',
            'alert-type' => 'success',
        ];

        $fail = [
            'message' => 'Something Wrong',
            'alert-type' => 'error',
        ];

        if($request){
            return back()->with($success);
        }else{
            return back()->with($fail);
        }
    }

    // Delete
    public function seo_delete(Request $request, $id) {
        $data= Seo::find($id);

        $data->delete();

        $success = [
            'message' => 'Data Deleted Successfully',
            'alert-type' => 'success',
        ];

        $fail = [
            'message' => 'Something Wrong',
            'alert-type' => 'error',
        ];

        if($request){
            return back()->with($success);
        }else{
            return back()->with($fail);
        }
    }


   ////////////////////Unique/////////////////

   ////////////////////Client/////////////////
    // Create
    public function client_create(Request $request){

        $request->validate([
            'page' => 'nullable|max:200',
            'img' => 'nullable|mimes:jpg,png,jpeg|max:5120',
            'status' => 'nullable|max:200',
        ]);
        $data = new Client;
        $data->page = $request->page;
        $data->status = $request->status;

        if($request->file('img')){
            $file= $request->file('img');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $filesize=Image::make($file->getRealPath());
            $filesize->resize(700, 512, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $filesize->save(('assets/img/uploaded/img/'.$filename));
            $data['img']= $filename;
        }

        $data->save();

        $success = [
            'message' => 'Data Added Successfully',
            'alert-type' => 'success',
        ];

        $fail = [
            'message' => 'Something Wrong',
            'alert-type' => 'error',
        ];

        if($request){
            return back()->with($success);
           }else{
            return back()->with($fail);
        }
    }
    // Update
    public function client_update(Request $request, $id) {
        $request->validate([
            'page' => 'nullable|max:200',
            'img' => 'nullable|mimes:jpg,png,jpeg|max:5120',
            'status' => 'nullable|max:200',
        ]);

        $data = Client::find($id);
        $data->page = $request->page;
        $data->status = $request->status;

        if($request->file('img')){
            if (File::exists('assets/img/uploaded/img/'.$data->img)) {
                File::delete('assets/img/uploaded/img/'.$data->img);
            }
            $file= $request->file('img');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $filesize=Image::make($file->getRealPath());
            $filesize->resize(700, 512, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $filesize->save(('assets/img/uploaded/img/'.$filename));
            $data['img']= $filename;
        }

        $data->save();

        $success = [
            'message' => 'Data Edited Successfully',
            'alert-type' => 'success',
        ];

        $fail = [
            'message' => 'Something Wrong',
            'alert-type' => 'error',
        ];

        if($request){
            return back()->with($success);
           }else{
            return back()->with($fail);
        }
    }
    // Delete
    public function client_delete(Request $request, $id){

        $data= Client::find($id);

        if (File::exists('assets/img/uploaded/img/'.$data->img)) {
            File::delete('assets/img/uploaded/img/'.$data->img);
        }

        $data->delete();

        $success = [
            'message' => 'Data Deleted Successfully',
            'alert-type' => 'success',
        ];

        $fail = [
            'message' => 'Something Wrong',
            'alert-type' => 'error',
        ];

        if($request){
            return back()->with($success);
           }else{
            return back()->with($fail);
        }
    }
    ////////////////////Team/////////////////
    // Create
    public function team_create(Request $request)
    {
        $request->validate([
            'img' => 'nullable|mimes:jpg,png,jpeg|max:5120',
            'name' => 'required|max:1500',
            'rank' => 'nullable|max:250',
            'position' => 'required|max:250',
            'social1' => 'nullable|max:250',
            'social2' => 'nullable|max:250',
            'social3' => 'nullable|max:250',
            'social4' => 'nullable|max:250',
            'social_link1' => 'nullable|max:250',
            'social_link2' => 'nullable|max:250',
            'social_link3' => 'nullable|max:250',
            'social_link4' => 'nullable|max:250',
            'status' => 'nullable|max:200',
        ]);
        $data = new Team;
        $data->name = $request->name;
        $data->rank = $request->rank;
        $data->position = $request->position;
        $data->social1 = $request->social1;
        $data->social2 = $request->social2;
        $data->social3 = $request->social3;
        $data->social4 = $request->social4;
        $data->social_link1 = $request->social_link1;
        $data->social_link2 = $request->social_link2;
        $data->social_link3 = $request->social_link3;
        $data->social_link4 = $request->social_link4;
        $data->status = $request->status;

        if($request->file('img')){
            $file= $request->file('img');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $filesize=Image::make($file->getRealPath());
            $filesize->resize(70, 70, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $filesize->save(('assets/img/uploaded/img/'.$filename));
            $data['img']= $filename;
        }
        $data->save();

        $success = [
            'message' => 'Data Added Successfully',
            'alert-type' => 'success',
        ];

        $fail = [
            'message' => 'Something  Wrong',
            'alert-type' => 'error',
        ];

        if ($request) {

            return back()->with($success);
        } else {
            return back()->with($fail);
        }

    }
    public function team_update(Request $request, $id)
    {
        $request->validate([
            'img' => 'nullable|mimes:jpg,png,jpeg|max:5120',
            'name' => 'required|max:1500',
            'rank' => 'nullable|max:250',
            'position' => 'required|max:250',
            'social1' => 'nullable|max:250',
            'social2' => 'nullable|max:250',
            'social3' => 'nullable|max:250',
            'social4' => 'nullable|max:250',
            'social_link1' => 'nullable|max:250',
            'social_link2' => 'nullable|max:250',
            'social_link3' => 'nullable|max:250',
            'social_link4' => 'nullable|max:250',
            'status' => 'nullable|max:200',
        ]);

        $data = Team::find($id);
        $data->name = $request->name;
        $data->rank = $request->rank;
        $data->position = $request->position;
        $data->social1 = $request->social1;
        $data->social2 = $request->social2;
        $data->social3 = $request->social3;
        $data->social4 = $request->social4;
        $data->social_link1 = $request->social_link1;
        $data->social_link2 = $request->social_link2;
        $data->social_link3 = $request->social_link3;
        $data->social_link4 = $request->social_link4;
        $data->status = $request->status;

        if($request->file('img')){
            if (File::exists('assets/img/uploaded/img/'.$data->img)) {
                File::delete('assets/img/uploaded/img/'.$data->img);
            }
            $file= $request->file('img');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $filesize=Image::make($file->getRealPath());
            $filesize->resize(700, 512, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $filesize->save(('assets/img/uploaded/img/'.$filename));
            $data['img']= $filename;
        }

        $data->save();

        $success = [
            'message' => 'Data Updated Successfully',
            'alert-type' => 'success',
        ];

        $fail = [
            'message' => 'Something  Wrong',
            'alert-type' => 'error',
        ];

        if ($request) {
            return back()->with($success);
        } else {
            return back()->with($fail);
        }

    }
    public function team_delete(Request $request, $id)
    {
        $data = Team::find($id);

        if (File::exists('assets/img/uploaded/img/'.$data->img)) {
            File::delete('assets/img/uploaded/img/'.$data->img);
        }

        $data->delete();

        $success = [
            'message' => 'Deleted Successfully',
            'alert-type' => 'success',
        ];

        $fail = [
            'message' => 'Something  Wrong',
            'alert-type' => 'error',
        ];

        if ($request) {
            return back()->with($success);
        } else {
            return back()->with($fail);
        }

    }
    ////////////////////Service/////////////////
    // Create
    public function service_create(Request $request){

        $request->validate([
            'title' => 'nullable|max:250',
            'icon' => 'nullable|max:250',
            'service' => 'nullable|max:250',
            'min_amount' => 'nullable|max:250',
            'max_amount' => 'nullable|max:250',
            'des' => 'nullable|max:30000',
            'status' => 'nullable|max:200',
        ]);

        $data = new Services;
        $data->icon = $request->icon;
        $data->title = $request->title;
        $data->service = $request->service;
        $data->min_amount = $request->min_amount;
        $data->max_amount = $request->max_amount;
        $data->des = $request->des;
        $data->status = $request->status;

        $data->save();

        $success = [
            'message' => 'Data Added Successfully',
            'alert-type' => 'success',
        ];

        $fail = [
            'message' => 'Something Wrong',
            'alert-type' => 'error',
        ];

        if($request){
            return back()->with($success);
           }else{
            return back()->with($fail);
        }
    }
    // Update
    public function service_update(Request $request, $id) {

        $request->validate([
            'title' => 'nullable|max:250',
            'icon' => 'nullable|max:250',
            'service' => 'nullable|max:250',
            'min_amount' => 'nullable|max:250',
            'max_amount' => 'nullable|max:250',
            'des' => 'nullable|max:30000',
            'status' => 'nullable|max:200',
        ]);

        $data = Services::find($id);
        $data->icon = $request->icon;
        $data->title = $request->title;
        $data->service = $request->service;
        $data->min_amount = $request->min_amount;
        $data->max_amount = $request->max_amount;
        $data->des = $request->des;
        $data->status = $request->status;

        $data->save();

        $success = [
            'message' => 'Data Edited Successfully',
            'alert-type' => 'success',
        ];

        $fail = [
            'message' => 'Something Wrong',
            'alert-type' => 'error',
        ];

        if($request){
            return back()->with($success);
           }else{
            return back()->with($fail);
        }
    }
    // Delete
    public function service_delete(Request $request, $id){

        $cw_img = ContentWithImage::where('page', $id)->count();
        $cw_icon = ContentWithIcon::where('page', $id)->count();

        $cData = $cw_img + $cw_icon;
        dd($cData);

        $data= Services::find($id);

        $data->delete();

        $success = [
            'message' => 'Data Deleted Successfully',
            'alert-type' => 'success',
        ];

        $fail = [
            'message' => 'Something Wrong',
            'alert-type' => 'error',
        ];

        if($request){
            return back()->with($success);
           }else{
            return back()->with($fail);
        }
    }
    ////////////////////Category/////////////////
    // Create
    public function category_create(Request $request){

        $request->validate([
            'page' => 'required|max:250',
            'title' => 'nullable|max:250',
            'status' => 'nullable|max:200',
        ]);

        $data = new Category;
        $data->page = $request->page;
        $data->title = $request->title;
        $data->status = $request->status;

        $data->save();

        $success = [
            'message' => 'Data Added Successfully',
            'alert-type' => 'success',
        ];

        $fail = [
            'message' => 'Something Wrong',
            'alert-type' => 'error',
        ];

        if($request){
            return back()->with($success);
           }else{
            return back()->with($fail);
        }
    }
    // Update
    public function category_update(Request $request, $id) {

        $request->validate([
            'page' => 'required|max:250',
            'title' => 'nullable|max:250',
            'status' => 'nullable|max:200',
        ]);

        $data = Category::find($id);
        $data->page = $request->page;
        $data->title = $request->title;
        $data->status = $request->status;

        $data->save();

        $success = [
            'message' => 'Data Edited Successfully',
            'alert-type' => 'success',
        ];

        $fail = [
            'message' => 'Something Wrong',
            'alert-type' => 'error',
        ];

        if($request){
            return back()->with($success);
           }else{
            return back()->with($fail);
        }
    }
    // Delete
    public function category_delete(Request $request, $id){

        $data= Category::find($id);

        $data->delete();

        $success = [
            'message' => 'Data Deleted Successfully',
            'alert-type' => 'success',
        ];

        $fail = [
            'message' => 'Something Wrong',
            'alert-type' => 'error',
        ];

        if($request){
            return back()->with($success);
           }else{
            return back()->with($fail);
        }
    }
    ////////////////////Product/////////////////
    // Create
    public function product_create(Request $request) {

        $request->validate([
            'title' => 'nullable|max:250',
            'des' => 'nullable|max:30000',
            'img' => 'mimes:jpg,png,jpeg|max:5120', // 5 MB
            'alt_img' => 'nullable|max:200',
            'status' => 'nullable|max:200',

        ]);

        $data = new Product;

        $data->title = $request->title;
        $data->des = $request->des;
        $data->alt_img = $request->alt_img;
        $data->status = $request->status;

        if($request->file('img')){
            $file= $request->file('img');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $filesize=Image::make($file->getRealPath());
            $filesize->resize(700, 512, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $filesize->save(('assets/img/uploaded/img/'.$filename));
            $data['img']= $filename;
        }

        $data->save();

        $success = [
            'message' => 'Data Added Successfully',
            'alert-type' => 'success',
        ];

        $fail = [
            'message' => 'Something Wrong',
            'alert-type' => 'error',
        ];

        if($request){
            return back()->with($success);
           }else{
            return back()->with($fail);
        }
    }

    // Update
    public function product_update(Request $request, $id){

        $request->validate([
            'title' => 'nullable|max:250',
            'des' => 'nullable|max:30000',
            'img' => 'mimes:jpg,png,jpeg|max:5120', // 5 MB
            'alt_img' => 'nullable|max:200',
            'status' => 'nullable|max:200',
        ]);

        $data = Product::find($id);

        $data->title = $request->title;
        $data->des = $request->des;
        $data->alt_img = $request->alt_img;
        $data->status = $request->status;

        if($request->file('img')){
            if (File::exists('assets/img/uploaded/img/'.$data->img)) {
                File::delete('assets/img/uploaded/img/'.$data->img);
            }

            $file= $request->file('img');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $filesize=Image::make($file->getRealPath());
            $filesize->resize(500, 712, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $filesize->save(('assets/img/uploaded/img/'.$filename));
            $data['img']= $filename;
        }

        $data->save();

        $success = [
            'message' => 'Data Edited Successfully',
            'alert-type' => 'success',
        ];

        $fail = [
            'message' => 'Something Wrong',
            'alert-type' => 'error',
        ];

        if($request){
            return back()->with($success);
           }else{
            return back()->with($fail);
        }
    }

    // Delete
    public function product_delete(Request $request, $id){

        $data= Product::find($id);

        if (File::exists('assets/img/uploaded/img/'.$data->img)) {
            File::delete('assets/img/uploaded/img/'.$data->img);
        }

        $data->delete();

        $success = [
            'message' => 'Data Deleted Successfully',
            'alert-type' => 'success',
        ];

        $fail = [
            'message' => 'Something Wrong',
            'alert-type' => 'error',
        ];

        if($request){
            return back()->with($success);
           }else{
            return back()->with($fail);
        }
    }
    ////////////////////Blog/////////////////
    // Create
    public function blog_create(Request $request)
    {
        $request->validate([
            'category_id'=>'required',
            'title'=>'required|max:250',
            'alt_img'=>'required|max:250',
            'des'=>'required|max:30000',
            'meta_title'=>'nullable|max:250',
            'meta_description'=>'nullable|max:30000',
            'meta_keyword'=>'nullable||max:30000',
            'img'=>'required|max:5124|mimes:jpg,png,jpeg',
        ]);

        $data = new Blog;
        $data->category_id=$request->category_id;
        $data->created_by = Auth::guard('admin')->user()->id;
        $data->title=$request->title;
        $data->alt_img=$request->alt_img;
        $data->des=$request->des;
        $data->status=$request->status;

        $data->meta_title=$request->meta_title;
        $data->meta_description=$request->meta_description;
        $data->meta_keyword=$request->meta_keyword;

        if($request->file('img')){
            $file= $request->file('img');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $filesize=Image::make($file->getRealPath());
            $filesize->resize(600, 465, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $filesize->save(('assets/img/uploaded/img/'.$filename));
            $data['img']= $filename;
        }

        $data->save();

        $success = [
            'message' => 'Data Added Successfully',
            'alert-type' => 'success',
        ];

        $fail = [
            'message' => 'Something Wrong',
            'alert-type' => 'error',
        ];

        if($request){
            return back()->with($success);
        }else{
            return back()->with($fail);
        }
    }
    // update
    public function blog_update(Request $request, $id)
    {

        $request->validate([
            'category_id'=>'required',
            'title'=>'required|max:250',
            'alt_img'=>'required|max:250',
            'des'=>'required|max:30000',
            'meta_title'=>'nullable|max:250',
            'meta_description'=>'nullable|max:30000',
            'meta_keyword'=>'nullable||max:30000',
            'img'=>'max:5124|mimes:jpg,png,jpeg',
        ]);

        $data = Blog::find($id);

        $data->created_by = Auth::guard('admin')->user()->id;
        $data->category_id=$request->category_id;
        $data->title=$request->title;
        $data->alt_img=$request->alt_img;
        $data->des=$request->des;
        $data->status=$request->status;

        $data->meta_title=$request->meta_title;
        $data->meta_description=$request->meta_description;
        $data->meta_keyword=$request->meta_keyword;

        if($request->file('img')){
             if (File::exists('assets/img/uploaded/img/'.$data->img)) {
                    File::delete('assets/img/uploaded/img/'.$data->img);
                }
            $file= $request->file('img');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $filesize=Image::make($file->getRealPath());
            $filesize->resize(600, 465, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $filesize->save(('assets/img/uploaded/img/'.$filename));
            $data['img']= $filename;
        }

        $data->save();

        $success = [
            'message' => 'Data Updated Successfully',
            'alert-type' => 'success',
        ];

        $fail = [
            'message' => 'Something Wrong',
            'alert-type' => 'error',
        ];

        if($request){
            return back()->with($success);
        }else{
            return back()->with($fail);
        }
    }
    // Delete
    public function  blog_delete(Request $request, $id)
    {
        $data= Blog::find($id);
        if (File::exists('assets/img/uploaded/img/'.$data->img)) {
            File::delete('assets/img/uploaded/img/'.$data->img);
        }
        $data->delete();

        $success = [
            'message' => 'Data Deleted Successfully',
            'alert-type' => 'success',
        ];

        $fail = [
            'message' => 'Something Wrong',
            'alert-type' => 'error',
        ];

        if($request){
            return back()->with($success);
        }else{
            return back()->with($fail);
        }
    }

    public function bl_category_destroy(Request $request, $id)
    {

        $category= Category::where('page', 'blog')->find($id);

        if(!is_null($category)) {

            $blog = Blog::where('category_id', $category->id )->get();

            foreach($blog as $img)
            {
                    $blog =Blog::where('id',$img->id)->first();

                    if (File::exists('assets/img/uploaded/img/'.$blog->img)) {
                        File::delete('assets/img/uploaded/img/'.$blog->img);
                }
                    $blog->delete();

            }
            $category->delete();

            $success = [
                'message' => 'Data Deleted Successfully',
                'alert-type' => 'success',
            ];

            return back()->with($success);
        }

        else
        {
            $fail = [
                'message' => 'Something Wrong',
                'alert-type' => 'error',
            ];

            return back()->with($fail);
        }
    }

    ////////////////////Setting/////////////////
    // Create
    public function siteSetting_create(Request $request)
    {
        $request->validate([
            'logo' => 'nullable|mimes:jpg,png,jpeg|max:5120',
            'address' => 'nullable|max:1500',
            'phone' => 'nullable|max:250',
            'time' => 'nullable|max:250',
            'email' => 'nullable|max:250',
            'social1' => 'nullable|max:250',
            'social2' => 'nullable|max:250',
            'social3' => 'nullable|max:250',
            'social4' => 'nullable|max:250',
            'social5' => 'nullable|max:250',
            'social_link1' => 'nullable|max:250',
            'social_link2' => 'nullable|max:250',
            'social_link3' => 'nullable|max:250',
            'social_link4' => 'nullable|max:250',
            'social_link5' => 'nullable|max:250',
            'description' => 'nullable|max:1500',
            'map' => 'nullable|max:1500',
            'footer' => 'nullable|max:259',
            'status' => 'nullable|max:200',
        ]);
        $data = new SiteSetting;
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->time = $request->time;
        $data->email = $request->email;
        $data->social1 = $request->social1;
        $data->social2 = $request->social2;
        $data->social3 = $request->social3;
        $data->social4 = $request->social4;
        $data->social5 = $request->social5;
        $data->social_link1 = $request->social_link1;
        $data->social_link2 = $request->social_link2;
        $data->social_link3 = $request->social_link3;
        $data->social_link4 = $request->social_link4;
        $data->social_link5 = $request->social_link5;
        $data->description = $request->description;
        $data->map = $request->map;
        $data->footer = $request->footer;
        $data->status = $request->status;

        if($request->file('logo')){
            $file= $request->file('logo');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $filesize=Image::make($file->getRealPath());
            $filesize->resize(600, 465, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $filesize->save(('assets/img/uploaded/img/'.$filename));
            $data['logo']= $filename;
        }
        $data->save();

        $success = [
            'message' => 'Data Added Successfully',
            'alert-type' => 'success',
        ];

        $fail = [
            'message' => 'Something  Wrong',
            'alert-type' => 'error',
        ];

        if ($request) {

            return back()->with($success);
        } else {
            return back()->with($fail);
        }

    }
    // Update
    public function siteSetting_update(Request $request, $id)
    {
        $request->validate([
            'logo' => 'nullable|mimes:jpg,png,jpeg|max:5120',
            'address' => 'nullable|max:1500',
            'phone' => 'nullable|max:250',
            'time' => 'nullable|max:250',
            'email' => 'nullable|max:250',
            'social1' => 'nullable|max:250',
            'social2' => 'nullable|max:250',
            'social3' => 'nullable|max:250',
            'social4' => 'nullable|max:250',
            'social5' => 'nullable|max:250',
            'social_link1' => 'nullable|max:250',
            'social_link2' => 'nullable|max:250',
            'social_link3' => 'nullable|max:250',
            'social_link4' => 'nullable|max:250',
            'social_link5' => 'nullable|max:250',
            'description' => 'nullable|max:1500',
            'map' => 'nullable|max:1500',
            'footer' => 'nullable|max:259',
            'status' => 'nullable|max:200',
        ]);

        $data = SiteSetting::find($id);
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->time = $request->time;
        $data->email = $request->email;
        $data->social1 = $request->social1;
        $data->social2 = $request->social2;
        $data->social3 = $request->social3;
        $data->social4 = $request->social4;
        $data->social5 = $request->social5;
        $data->social_link1 = $request->social_link1;
        $data->social_link2 = $request->social_link2;
        $data->social_link3 = $request->social_link3;
        $data->social_link4 = $request->social_link4;
        $data->social_link5 = $request->social_link5;
        $data->description = $request->description;
        $data->map = $request->map;
        $data->footer = $request->footer;
        $data->status = $request->status;

        if($request->file('logo')){
            if (File::exists('assets/img/uploaded/img/'.$data->logo)) {
                   File::delete('assets/img/uploaded/img/'.$data->logo);
               }
           $file= $request->file('logo');
           $filename= date('YmdHi').$file->getClientOriginalName();
           $filesize=Image::make($file->getRealPath());
           $filesize->resize(600, 465, function ($constraint) {
               $constraint->aspectRatio();
               $constraint->upsize();
           });
           $filesize->save(('assets/img/uploaded/img/'.$filename));
           $data['logo']= $filename;
       }
        $data->save();

        $success = [
            'message' => 'Data Updated Successfully',
            'alert-type' => 'success',
        ];

        $fail = [
            'message' => 'Something  Wrong',
            'alert-type' => 'error',
        ];

        if ($request) {
            return back()->with($success);
        } else {
            return back()->with($fail);
        }

    }
    // Delete
    public function siteSetting_delete(Request $request, $id)
    {
        $data = SiteSetting::find($id);
        if (File::exists('assets/img/uploaded/img/'.$data->logo)) {
            File::delete('assets/img/uploaded/img/'.$data->logo);
        }
        $data->delete();

        $success = [
            'message' => 'Deleted Successfully',
            'alert-type' => 'success',
        ];

        $fail = [
            'message' => 'Something  Wrong',
            'alert-type' => 'error',
        ];

        if ($request) {
            return back()->with($success);
        } else {
            return back()->with($fail);
        }

    }
}
