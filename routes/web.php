<?php

// Route::redirect('/', '/login');
// Route::redirect('/dashboard', '/admin/dashboard');


Route::group(['prefix'=> 'admin'], function () {
    // Authentication Routes...
    Auth::routes(['register' => false]);
});
Route::group([
    'prefix'     => 'admin',
    'as'         => 'admin.',
    'namespace'  => 'Admin',
    'middleware' => ['auth'],
], function () {
    Route::view('/{any?}', 'layouts.admin.app')->name('dashboard')->where('any', '.*');
});
