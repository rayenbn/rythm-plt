<?php

Route::redirect('/', '/login');

Route::group(['namespace' => 'Frontend\Auth'], function () {
    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login_page');
    Route::post('login', 'LoginController@login')->name('login');
    Route::post('logout', 'LoginController@logout')->name('logout');
});

Route::group([
            'namespace'  => 'Frontend',
            'middleware' => ['auth:client']
        ], function () {

    Route::get('/', 'HomeController@index')->name('dashboard');

    Route::get('/scholarships/{scholarship}-{slug}', 'ScholarshipController@show');
    Route::resource('scholarships', 'ScholarshipController');

    Route::get('/universities/{university}-{slug}', 'UniversitiesController@show');
    Route::resource('universities', 'UniversitiesController');

    // Route::get('startup/{slug_name}', 'StartupsController@show')->name('startup-profile');
    Route::post('startup/search', 'StartupsController@search')->name('startup.search');
    Route::resource('startup', 'StartupsController');
    Route::post('startup/profile/create', 'StartupsController@createStartup')->name('startup.fastcreate');
    Route::put('startup/{id}/cover-image/save', 'StartupsController@UploadCoverImage')->name('startup-profile.cover-image.edit');
    Route::put('startup/{id}/profile-image/save', 'StartupsController@UploadProfileImage')->name('startup-profile.profile-image.edit');

    Route::get('/{id}', 'ClientController@show')->name('user-profile');
    Route::put('profile/{client}/personal-info/update', 'ClientController@update')->name('user-profile.edit');
    Route::put('profile/cover-image/save', 'ClientController@UploadCoverImage')->name('user-profile.cover-image.edit');
    Route::put('profile/profile-image/save', 'ClientController@UploadProfileImage')->name('user-profile.profile-image.edit');
    
});