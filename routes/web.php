<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Backend\Admin\BackendController;



// Front-end Route

Route::get('/', [FrontendController::class, 'index'])->name('Index'); // Index Page
Route::get('about/us', [FrontendController::class, 'about'])->name('About.Us'); // About Page
Route::get('service/us', [FrontendController::class, 'service'])->name('Service.Us'); // Service Page
Route::get('product/us', [FrontendController::class, 'product'])->name('Product.Us'); // Product Page
Route::get('faq/us', [FrontendController::class, 'faq'])->name('FAQ.Us'); // FAQ Page
Route::get('blog/us', [FrontendController::class, 'blog'])->name('BLOG.Us'); // BLOG Page
Route::get('contact/us', [FrontendController::class, 'ContactUs'])->name('Contact.Us'); // Contact Page


/*****************Admin Routes*********************/
Route::group(['middleware'=>'admin_guest'],function () {
    // Login Form
    Route::get('/login/admin', [AdminController::class, 'AdminLoginForm'])->name('Admin.LoginForm');
    Route::post('/login-admin', [AdminController::class, 'AdminLogin'])->name('Admin.Login');
});

// Page All Route
Route::prefix('/admin')->middleware(['admin'])->group(function () {

    Route::get('/logout/admin', [AdminController::class, 'AdminLogOut'])->name('Admin.LogOut'); // Logout
    Route::get('/dashboard', [AdminController::class, 'AdminDashboard'])->name('Admin.dashboard'); // Admin Dashboard

    // Admin Home Page
    Route::prefix('home')->name('Admin.')->group(function () {
        Route::get('/', [BackendController::class, 'home'])->name('home');
        Route::get('/2', [BackendController::class, 'home2'])->name('home2');
    });

    // Admin About Page
    Route::prefix('about')->name('Admin.')->group(function () {
        Route::get('/', [BackendController::class, 'about'])->name('about');
    });

    // Admin Service Page
    Route::prefix('service')->name('Admin.')->group(function () {
        Route::get('/', [BackendController::class, 'service'])->name('service');
        Route::get('/project', [BackendController::class, 'project'])->name('project');
    });

    // Admin Product Page
    Route::prefix('product')->name('Admin.')->group(function () {
        Route::get('/', [BackendController::class, 'product'])->name('product');
    });

    // Admin Blog Page
    Route::prefix('blog')->name('Admin.')->group(function () {
        Route::get('/', [BackendController::class, 'blog'])->name('blog');
    });

    // Admin FAQ Page
    Route::prefix('faq')->name('Admin.')->group(function () {
        Route::get('/', [BackendController::class, 'faq'])->name('faq');
    });

    // Admin Setting Page
    Route::prefix('setting')->name('Admin.')->group(function () {
        Route::get('/', [BackendController::class, 'setting'])->name('setting');
    });



    ///////////////////////////////// Unique CRUD Route //////////////////////////////////

    // Client
    Route::post('/client/create',[BackendController::class,'client_create'])->name('client.create');
    Route::post('/client/update/{id}',[BackendController::class,'client_update'])->name('client.update');
    Route::get('/client/delete/{id}',[BackendController::class,'client_delete'])->name('client.delete');

    // Team
    Route::post('/team/create',[BackendController::class,'team_create'])->name('team.create');
    Route::post('/team/update/{id}',[BackendController::class,'team_update'])->name('team.update');
    Route::get('/team/delete/{id}',[BackendController::class,'team_delete'])->name('team.delete');

    // Service
    Route::post('/service/create',[BackendController::class,'service_create'])->name('service.create');
    Route::post('/service/update/{id}',[BackendController::class,'service_update'])->name('service.update');
    Route::get('/service/delete/{id}',[BackendController::class,'service_delete'])->name('service.delete');

    Route::get('/service/details/{id}',[BackendController::class,'serviceDetails'])->name('service.details');

    // Product
    Route::post('/product/create',[BackendController::class,'product_create'])->name('product.create');
    Route::post('/product/update/{id}',[BackendController::class,'product_update'])->name('product.update');
    Route::get('/product/delete/{id}',[BackendController::class,'product_delete'])->name('product.delete');

    Route::get('/product/details/{id}',[BackendController::class,'productDetails'])->name('product.details');

    // Category
    Route::post('/category/create',[BackendController::class,'category_create'])->name('category.create');
    Route::post('/category/update/{id}',[BackendController::class,'category_update'])->name('category.update');
    Route::get('/category/delete/{id}',[BackendController::class,'category_delete'])->name('category.delete');

    // Blog
    Route::post('/blog/create',[BackendController::class,'blog_create'])->name('blog.create');
    Route::post('/blog/update/{id}',[BackendController::class,'blog_update'])->name('blog.update');
    Route::get('/blog/delete/{id}',[BackendController::class,'blog_delete'])->name('blog.delete');

    Route::get('/blog//cat/delete/{id}',[BackendController::class,'bl_category_destroy'])->name('blog_cat.delete');

    Route::get('/blog/details/{id}',[BackendController::class,'blogDetails'])->name('blog.details');

    // Blog
    Route::post('/siteSetting/create',[BackendController::class,'siteSetting_create'])->name('siteSetting.create');
    Route::post('/siteSetting/update/{id}',[BackendController::class,'siteSetting_update'])->name('siteSetting.update');
    Route::get('/siteSetting/delete/{id}',[BackendController::class,'siteSetting_delete'])->name('siteSetting.delete');

    ///////////////////////////////// All Common CRUD Route //////////////////////////////////

    // Content With Image
    Route::post('/cw/img/create',[BackendController::class,'cw_image_create'])->name('cw_image.create');
    Route::post('/cw/img/update/{id}',[BackendController::class,'cw_image_update'])->name('cw_image.update');
    Route::get('/cw/img/delete/{id}',[BackendController::class,'cw_image_delete'])->name('cw_image.delete');

    // Content With Video
    Route::post('/cw/video/create',[BackendController::class,'cw_video_create'])->name('cw_video.create');
    Route::post('/cw/video/update/{id}',[BackendController::class,'cw_video_update'])->name('cw_video.update');
    Route::get('/cw/video/delete/{id}',[BackendController::class,'cw_video_delete'])->name('cw_video.delete');

    // Content With Icon
    Route::post('/cw/icon/create',[BackendController::class,'cw_icon_create'])->name('cw_icon.create');
    Route::post('/cw/icon/update/{id}',[BackendController::class,'cw_icon_update'])->name('cw_icon.update');
    Route::get('/cw/icon/delete/{id}',[BackendController::class,'cw_icon_delete'])->name('cw_icon.delete');

    // Content With SEO
    Route::post('/seo/create',[BackendController::class,'seo_create'])->name('seo.create');
    Route::post('/seo/update/{id}',[BackendController::class,'seo_update'])->name('seo.update');
    Route::get('/seo/delete/{id}',[BackendController::class,'seo_delete'])->name('seo.delete');

});

/*****************User Logout*********************/


Auth::routes();


