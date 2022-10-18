<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin\v1', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Team
    Route::resource('team', 'TeamController');

    // Branch
    Route::resource('branch', 'BranchController');

    //application
    Route::get('application', 'ApplicationController@index')->name('application.index');
    Route::post('change-application-status/{application_id}', 'ApplicationController@changeApplicationStatus')->name('change.application.status');
    Route::get('application/create/{applicationCode}/{formSlug}', 'ApplicationController@create')->name('application.create');
    Route::post('application/store', 'ApplicationController@applicationStore')->name('application.store');
    Route::get('application/edit/{applicationCode}/{formSlug}', 'ApplicationController@applicationEdit')->name('application.edit');
    Route::post('application/update/{applicationCode}/{formSlug}', 'ApplicationController@applicationPDUpdate')->name('application.update');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
