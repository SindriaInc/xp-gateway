<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// Public Auth Routes
Route::group(['prefix' => 'auth'], function () {

    // Login
    Route::post('login', 'Api\AuthController@login')->name('api.auth.login');

    // Signup
    Route::post('signup', 'Api\AuthController@signup')->name('api.auth.signup');

    // Signup Activation
    Route::get('signup/activate/{token}', 'Api\AuthController@signupActivate')->name('api.auth.signup.activation');
});


// Auth API Routes
Route::group(['middleware' => 'keycloak', 'prefix' => 'auth'], function () {

    // Logout
    Route::get('logout', 'Api\AuthController@logout')->name('api.auth.logout');

    // Logged User
    Route::get('user', 'Api\AuthController@user')->name('api.auth.user');
});


// Auth Users API
Route::group(['middleware' => 'keycloak', 'prefix' => 'users'], function () {

    // Get all users
    Route::get('/', 'Api\UsersController@index')->name('api.users');

    // Get a user by username
    Route::post('/show', 'Api\UsersController@showUserByUsername')->name('api.users.showUserByUsername');

    // Get a user by id
    Route::get('/show/{id}', 'Api\UsersController@showUserById')->name('api.users.showUserById');

    // Search users
    Route::post('/search', 'Api\UsersController@search')->name('api.users.search');

    // Store a user
    Route::post('/store', 'Api\UsersController@store')->name('api.users.store');

    // Edit a user
    Route::put('/edit', 'Api\UsersController@edit')->name('api.users.edit');

    // Delete a user
    Route::delete('/delete', 'Api\UsersController@delete')->name('api.users.delete');
});


// Auth Policies API
Route::group(['middleware' => 'keycloak', 'prefix' => 'policies'], function () {

    // Get all policies
    Route::get('/', 'Api\PoliciesController@index')->name('api.policies');

    // Get a policy
    Route::get('/show/{id}', 'Api\PoliciesController@show')->name('api.policies.show');

    // Search policy
    Route::post('/search', 'Api\PoliciesController@search')->name('api.policies.search');

    // Store a policy
    Route::post('/store', 'Api\PoliciesController@store')->name('api.policies.store');

    // Edit a policy
    Route::post('/edit', 'Api\PoliciesController@edit')->name('api.policies.edit');

    // Delete a policy
    Route::delete('/delete/{id}', 'Api\PoliciesController@delete')->name('api.policies.delete');

    // Show policies attached to user
    Route::get('/show/user/{id}', 'Api\PoliciesController@showUserPolicies')->name('api.policies.showUserPolicies');

    // Show users attached to policy
    Route::get('/show/users/{id}', 'Api\PoliciesController@showPolicyUsers')->name('api.policies.showPolicyUsers');

    // Attach a policy
    Route::post('/attach', 'Api\PoliciesController@attach')->name('api.policies.attach');

    // Detach a policy
    Route::post('/detach', 'Api\PoliciesController@detach')->name('api.policies.detach');
});


// Micro-services routes

// API V1 Routes
Route::group(['prefix' => '/v1'], function () {

    // Public API Routes
    Route::group(['prefix' => ''], function () {

//        // Tournaments API
//        Route::group(['prefix' => '/tournaments'], function () {
//            Route::get('/subscriber', 'Api\ProxyController@handle')->name('api.v1.tournaments.subscriber');
//            Route::post('/subscriber', 'Api\ProxyController@handle')->name('api.v1.tournaments.subscriber.store');
//        });

    });

    // Auth API Routes
    Route::group(['prefix' => ''], function () {

//        // Tournaments API
//        Route::group(['prefix' => '/tournaments'], function () {
//
//            // Tournaments API
//            Route::group(['prefix' => '/'], function () {
//                Route::get('/', 'Api\ProxyController@handle')->name('api.v1.tournaments');
//                Route::get('/add', 'Api\ProxyController@handle')->name('api.v1.tournaments.add');
//                Route::post('/store', 'Api\ProxyController@handle')->name('api.v1.tournaments.store');
//                Route::get('/show/{id}', 'Api\ProxyController@handle')->name('api.v1.tournaments.show');
//                Route::post('/edit/{id}', 'Api\ProxyController@handle')->name('api.v1.tournaments.edit');
//                Route::get('/export', 'Api\ProxyController@handle')->name('api.v1.tournaments.export');
//		        Route::post('/delete/{id}', 'Api\ProxyController@handle')->name('api.v1.tournaments.delete');
//		        Route::post('/archive/{id}', 'Api\ProxyController@handle')->name('api.v1.tournaments.archive');
//            });
//
//            // Subscribers API
//            Route::group(['prefix' => '/subscribers'], function () {
//                Route::get('/', 'Api\ProxyController@handle')->name('api.v1.tournaments.subscribers');
//                Route::get('/add', 'Api\ProxyController@handle')->name('api.v1.tournaments.subscribers.add');
//                Route::post('/store', 'Api\ProxyController@handle')->name('api.v1.tournaments.subscribers.store');
//                Route::get('/show/{id}', 'Api\ProxyController@handle')->name('api.v1.tournaments.subscribers.show');
//                Route::post('/edit/{id}', 'Api\ProxyController@handle')->name('api.v1.tournaments.subscribers.edit');
//                Route::get('/mail', 'Api\ProxyController@handle')->name('api.v1.tournaments.subscribers.mail');
//                Route::get('/export', 'Api\ProxyController@handle')->name('api.v1.tournaments.subscribers.export');
//                Route::get('/purge', 'Api\ProxyController@handle')->name('api.v1.tournaments.subscribers.purge');
//                Route::post('/delete/{id}', 'Api\ProxyController@handle')->name('api.v1.tournaments.subscribers.delete');
//            });
//        });



        Route::group(['prefix' => '/policies'], function () {
            // Get all policies
            Route::get('/', 'Api\ProxyController@handle')->name('api.policies');

            // Get a policy
            Route::get('/show/{id}', 'Api\ProxyController@handle')->name('api.policies.show');

            // Search policy
            Route::post('/search', 'Api\ProxyController@handle')->name('api.policies.search');

            // Store a policy
            Route::post('/', 'Api\ProxyController@handle')->name('api.policies.store');

            // Edit a policy
            Route::post('/edit', 'Api\ProxyController@handle')->name('api.policies.edit');

            // Delete a policy
            Route::delete('/delete/{id}', 'Api\ProxyController@handle')->name('api.policies.delete');

            // Show policies attached to user
            Route::get('/show/user/{id}', 'Api\ProxyController@handle')->name('api.policies.showUserPolicies');

            // Show users attached to policy
            Route::get('/show/users/{id}', 'Api\ProxyController@handle')->name('api.policies.showPolicyUsers');

            // Attach a policy
            Route::post('/attach', 'Api\ProxyController@handle')->name('api.policies.attach');

            // Detach a policy
            Route::post('/detach', 'Api\ProxyController@handle')->name('api.policies.detach');
        });

        // Settings API
        Route::group(['prefix' => '/settings'], function () {
            Route::get('/', 'Api\ProxyController@handle')->name('api.v1.settings');
            Route::post('/', 'Api\ProxyController@handle')->name('api.v1.settings.edit');
        });


    });

});