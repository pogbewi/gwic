<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*
|--------------------------------------------------------------------------
| FrontEnd Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['throttle'])->group( function () {
    Route::get('/', '\App\Http\Controllers\HomeController@index')->name('home');
    Route::get('/about', '\App\Http\Controllers\HomeController@about')->name('about');
    Route::get('/faq', '\App\Http\Controllers\HomeController@faq')->name('faq');
    Route::get('/construction', '\App\Http\Controllers\HomeController@construction')->name('construction');
    Route::get('/terms-and-condition', '\App\Http\Controllers\HomeController@terms')->name('terms');
    Route::get('/privacy-policy', '\App\Http\Controllers\HomeController@policy')->name('policy');

    Route::get('/testimonial', '\App\Http\Controllers\TestimonyController@index')->name('testimonial');
    Route::get('/testimonial/{id}', '\App\Http\Controllers\TestimonyController@show')->name('testimonial.show');

    Route::get('/post', '\App\Http\Controllers\PostController@index')->name('post');
    Route::get('/post/{id}', '\App\Http\Controllers\PostController@show')->name('post.show');

    Route::get('/enlist', '\App\Http\Controllers\BusinessInvestmentController@create')->name('enlist.create');
    Route::post('/enlist/validate', '\App\Http\Controllers\BusinessInvestmentController@validateInvestmentForm')->name('enlist.validate');
    Route::post('/enlist/store', '\App\Http\Controllers\BusinessInvestmentController@store')->name('enlist.store');

    Route::get('/investor', '\App\Http\Controllers\InvestorController@create')->name('investor.create');
    Route::post('/investor/store', '\App\Http\Controllers\InvestorController@store')->name('investor.store');

    Route::get('/contact', '\App\Http\Controllers\ContactController@index')->name('contact');
    Route::post('/contact/store', '\App\Http\Controllers\ContactController@store')->name('contact.store');

    Route::post('/subscribe/store', '\App\Http\Controllers\SubscriberController@store')->name('subscriber.store');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['throttle'])->group( function () {
    Route::get('admin/login', '\App\Http\Controllers\Admin\Auth\LoginController@index')->name('admin.login');
    Route::post('/admin/login', '\App\Http\Controllers\Admin\Auth\LoginController@login')->name('admin.postLogin');
    Route::get('/admin/logout', '\App\Http\Controllers\Admin\Auth\LoginController@logout')->name('admin.logout');
    /*        Route::get('/Admin/password/reset', '\App\Http\Controllers\Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('Admin.password.forgotform');
        Route::post('/Admin/password/email', '\App\Http\Controllers\Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('Admin.password.forgot');
        Route::get('/Admin/password/reset/{token}', '\App\Http\Controllers\Admin\Auth\ResetPasswordController@showResetForm')->name('Admin.password.restform');
        Route::post('/Admin/password/reset', '\App\Http\Controllers\Admin\Auth\ResetPasswordController@reset')->name('Admin.password.reset');*/
});

Route::middleware(['admin-auth'])->group(function () {
    Route::get('/admin', '\App\Http\Controllers\Admin\DashboardController@index')->name('admin.index');

    Route::post('/admin/requests/excel/export', '\App\Http\Controllers\Admin\AdminBusinessInvestmentController@toExcel')->name('requests.excel');
    Route::resource('/admin/requests', '\App\Http\Controllers\Admin\AdminBusinessInvestmentController');
    Route::post('/admin/contact/data', '\App\Http\Controllers\Admin\AdminContactController@getContacts')->name('contact.data');
    Route::resource('/admin/contact', '\App\Http\Controllers\Admin\AdminContactController');

    Route::post('/admin/investors/excel/export', '\App\Http\Controllers\Admin\AdminInvestorsController@toExcel')->name('investors.excel');
    Route::resource('/admin/investors', '\App\Http\Controllers\Admin\AdminInvestorsController');

    Route::post('/admin/testimonials/upload', '\App\Http\Controllers\Admin\AdminTestimonialsController@upload')->name('admin.testimonials.upload');
    Route::resource('/admin/testimonials', '\App\Http\Controllers\Admin\AdminTestimonialsController');

    Route::post('/admin/posts/upload', '\App\Http\Controllers\Admin\AdminPostsController@upload')->name('admin.posts.upload');
    Route::get('/admin/post-comments', '\App\Http\Controllers\Admin\PostController@comment')->name('admin.posts.comments');
    Route::put('/admin/post-comments-toggle', '\App\Http\Controllers\Admin\PostController@toggleComment')->name('admin.post.comments.toggle');
    Route::resource('/admin/posts', '\App\Http\Controllers\Admin\AdminPostsController');
    Route::resource('/admin/category', '\App\Http\Controllers\Admin\AdminCategoryController');

    Route::get('/admin/logs', '\App\Http\Controllers\Admin\AdminLogActivityController@index')->name('admin.logs.index');
    Route::delete('/admin/logs/{id}', '\App\Http\Controllers\Admin\AdminLogActivityController@destroy')->name('admin.logs.delete');

    Route::get('/admin/settings', '\App\Http\Controllers\Admin\SettingsController@index')->name('admin.settings.index');
    Route::put('/admin/settings', '\App\Http\Controllers\Admin\SettingsController@update')->name('admin.settings.update');
    Route::post('/admin/settings/upload', '\App\Http\Controllers\Admin\SettingsController@upload')->name('admin.settings.upload');
});
