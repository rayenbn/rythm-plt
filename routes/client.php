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

    Route::get('startup/{slug_name}', 'StartupsController@show')->name('startup-profile');
    Route::resource('startup', 'StartupsController');
    Route::post('startup/profile/create', 'StartupsController@createStartup')->name('startup.fastcreate');
    
    Route::get('/{id}', 'ClientController@show')->name('user-profile');

});