<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Abilities
    Route::apiResource('abilities', 'AbilitiesController', ['only' => ['index']]);

    // Permissions
    Route::resource('permissions', 'PermissionsApiController');

    // Roles
    Route::resource('roles', 'RolesApiController');

    // Users
    Route::resource('users', 'UsersApiController');

    // Universities
    Route::post('universities/media', 'UniversitiesApiController@storeMedia')->name('universities.storeMedia');
    Route::resource('universities', 'UniversitiesApiController');

    // Education Levels
    Route::resource('levels', 'LevelsApiController');

    // Companies
    // Route::post('companies/media', 'CompaniesApiController@storeMedia')->name('companies.storeMedia');
    Route::resource('scholarships', 'ScholarshipsApiController');
});
