<?php

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('auth.register');
$this->post('register', 'Auth\RegisterController@register')->name('auth.register');
// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::get('/404', 'HomeController@err404');
Route::get('/405', 'HomeController@err405');
Route::post('/check_visitor', 'HomeController@check_visitor');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::post('permissions_mass_destroy', ['uses' => 'Admin\PermissionsController@massDestroy', 'as' => 'permissions.mass_destroy']);
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
});

Route::get('/', 'HomeController@index');
Route::post('changelocale', ['as' => 'changelocale', 'uses' => 'TranslationController@changeLocale']);
Route::get('/contact_us', 'HomeController@contact_us');
Route::post('/contact_us/contact_form', 'HomeController@contact_form');
Route::get('/tomorrowland', 'HomeController@tomorrowland');
Route::get('/tomorrowland/package/{id}', 'HomeController@display_package');
Route::post('/tomorrowland/order', 'Main\DashboardController@order');
Route::post('/tomorrowland/payment', 'Main\DashboardController@payment');
Route::get('/tomorrowland/payment', 'Main\DashboardController@paymentPage');
//Route::post('/tomorrowland/payment_success', 'Main\DashboardController@payment_success');
Route::get('/tomorrowland/payment_success', 'Main\DashboardController@payment_success');
Route::get('/tomorrowland/order/{id}', 'Main\DashboardController@successOrder');

Route::group(['prefix'=>'account', 'as'=>'account.'], function (){
    Route::get('/', 'Main\DashboardController@index');
    Route::get('/profile', 'Main\DashboardController@profile');
    Route::post('/profile', 'Main\DashboardController@profile');
    Route::post('/reset_pwd', 'Main\DashboardController@reset_pwd');

    Route::get('/packages', 'Main\PackageController@index');
    Route::get('/packages/add', 'Main\PackageController@add');
    Route::post('/packages/add', 'Main\PackageController@add');
    Route::post('/packages/edit', 'Main\PackageController@edit');
    Route::post('/packages/delete', 'Main\PackageController@delete');
    Route::post('/packages/upload_images', ['uses' => 'Main\PackageController@upload_images', 'as' => 'packages.upload_images']);
    Route::post('/packages/delete_images', 'Main\PackageController@delete_images');
});
