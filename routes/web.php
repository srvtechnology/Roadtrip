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

Route::group(['middleware' => 'web'], function () {

    Route::get('/', ['as' => 'admin_login', 'uses' => 'loginController@landing']);

    Route::get('landing', 'loginController@landing');

    Route::post('/dologin', ['as' => 'do_login', 'uses' => 'loginController@dologin']);

    Route::any('/dashboard', array('as' => 'dashboard', 'uses' => 'DashboardController@index'));

    Route::get('/logout', array('as' => 'admin_logout', 'uses' => 'loginController@logout'));

    Route::get('/user_list', array('as' => 'user_list', 'uses' => 'userController@user_list'));

    Route::post('/change_status', array('as' => 'change_status', 'uses' => 'userController@change_status'));

    Route::get('/forgot_password/{serect_key}/{secutity_token}/{email}', array('as' => 'forgot_password_mail', 'uses' => 'userController@forgot_password_mail'));

    Route::post('/update_password', array('as' => 'update_password', 'uses' => 'userController@update_password'));

    Route::get('/terms_conditions', array('as' => 'terms_condition', 'uses' => 'userController@terms_condition'));

    Route::get('/privacy_policy', array('as' => 'privacy_policy', 'uses' => 'userController@privacy_policy'));
    Route::get('/about', array('as' => 'about', 'uses' => 'userController@about'));

//      Route::get('/daily_route_list', ['as' => 'daily_route_list',     'uses' => 'ShowController@daily_route_list']);

// Route::get('/add_daily_route', ['as' => 'add_daily_route',     'uses' => 'ShowController@add_daily_route']);
    // Route::get('/view_daily_route', ['as' => 'view_daily_route',     'uses' => 'ShowController@view_daily_route']);
    // Route::get('/details_pointofinterest', ['as' => 'details_pointofinterest', 'uses' => 'ShowController@details_pointofinterest']);
    // Route::get('/add_pointofinterest', ['as' => 'add_pointofinterest',     'uses' => 'ShowController@add_pointofinterest']);
    // Route::get('/view_podcast', ['as' => 'view_podcast',     'uses' => 'ShowController@view_podcast']);
    // Route::get('/list_podcast', ['as' => 'list_podcast',     'uses' => 'ShowController@list_podcast']);
    // Route::get('/add_podcast', ['as' => 'add_podcast',     'uses' => 'ShowController@add_podcast']);
    // Route::get('/add_dailyroute_tab', ['as' => 'add_dailyroute_tab',     'uses' => 'ShowController@add_dailyroute_tab']);

    Route::post('/add_image', array('as' => 'add_image', 'uses' => 'RouteController@add_image'));

    Route::any('/add_audio', array('as' => 'add_audio', 'uses' => 'RouteController@add_audio'));

    Route::any('/daily_route_list', array('as' => 'daily_route_list', 'uses' => 'RouteController@daily_route_list'));

    Route::any('/add_daily_route', array('as' => 'add_daily_route', 'uses' => 'RouteController@add_daily_route'));

    Route::post('/do_add_daily_route', array('as' => 'do_add_daily_route', 'uses' => 'RouteController@do_add_daily_route'));

    Route::any('/view_point_of_interest', array('as' => 'view_point_of_interest', 'uses' => 'RouteController@view_point_of_interest'));

    Route::any('/add_point_of_interest', array('as' => 'add_point_of_interest', 'uses' => 'RouteController@add_point_of_interest'));

    Route::post('/do_add_point_of_interest', array('as' => 'do_add_point_of_interest', 'uses' => 'RouteController@do_add_point_of_interest'));

    Route::any('/details_point_of_interest/{language}/{poi_id}', array('as' => 'details_point_of_interest', 'uses' => 'RouteController@details_point_of_interest'));

    Route::any('/podcast_list', array('as' => 'podcast_list', 'uses' => 'RouteController@podcast_list'));

    Route::any('/add_podcast', array('as' => 'add_podcast', 'uses' => 'RouteController@add_podcast'));

    Route::post('/do_add_podcast', array('as' => 'do_add_podcast', 'uses' => 'RouteController@do_add_podcast'));

    Route::any('/view_podcast/{pod_id}', array('as' => 'view_podcast', 'uses' => 'RouteController@view_podcast'));

    Route::any('/edit_daily_route/{route_id}', array('as' => 'edit_daily_route', 'uses' => 'RouteController@edit_daily_route'));

    Route::post('/do_edit_daily_route', array('as' => 'do_edit_daily_route', 'uses' => 'RouteController@do_edit_daily_route'));

    Route::any('/edit_point_of_interest/{poi_id}', array('as' => 'edit_point_of_interest', 'uses' => 'RouteController@edit_point_of_interest'));

    Route::post('/do_edit_point_of_interest', array('as' => 'do_edit_point_of_interest', 'uses' => 'RouteController@do_edit_point_of_interest'));

    Route::any('/edit_podcast/{pod_id}', array('as' => 'edit_podcast', 'uses' => 'RouteController@edit_podcast'));

    Route::post('/do_edit_podcast', array('as' => 'do_edit_podcast', 'uses' => 'RouteController@do_edit_podcast'));

    Route::post('/all_type_delete', array('as' => 'all_type_delete', 'uses' => 'RouteController@all_type_delete'));

    Route::any('/list_dailyroute_map', array('as' => 'list_dailyroute_map', 'uses' => 'MapController@index'));

    Route::any('/add_dailyroute_map', array('as' => 'add_dailyroute_map', 'uses' => 'MapController@addDailyRouteMap'));

    Route::any('/list_payment', array('as' => 'list_payment', 'uses' => 'PaymentController@index'));

//    Route::get('list_payment/{user_id}/delete', ['as' => 'list_payment.delete','uses' => 'PaymentController@destroy', ]);

    Route::any('/list_package', array('as' => 'list_package', 'uses' => 'PackageController@index'));

    Route::any('/list_package_edit/{id}', array('as' => 'list_package_edit', 'uses' => 'PackageController@list_package_edit'));

    Route::any('/package_add_', array('as' => 'do_list_package_add', 'uses' => 'PackageController@do_list_package_add'));

    Route::any('/package_add', array('as' => 'list_package_add', 'uses' => 'PackageController@list_package_add'));

    // Route::post('/all_type_delete', array('as' => 'all_type_delete', 'uses' => 'PaymentController@all_type_delete'));

    Route::post('/do_list_package_edit/{id}', array('as' => 'do_list_package_edit', 'uses' => 'PackageController@do_list_package_edit'));
    
    Route::get('/deletePackage/{id}', array('as' => 'deletePackage', 'uses' => 'PackageController@deletePackage'));

});
