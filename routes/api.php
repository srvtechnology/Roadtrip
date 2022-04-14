<?php

//Route::post('/login', "api\userController@login");

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
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
return $request->user();
});
 */

Route::middleware('api')->namespace('api')->group(function () {

    Route::post('/login', "userController@login");
    Route::post('/isUserExistByEmail', "userController@isUserExistByEmail");
    Route::post('/signUp', "userController@signUp");
    Route::post('/forgotPassword', "userController@forgotPassword");
    Route::post('/updateProfilePicByUserId', "userController@updateProfilePicByUserId");
    Route::post('/uploadPic', "userController@uploadPic");
    Route::post('/updateNameAndPassword', "userController@updateNameAndPassword");

    Route::post('/getAllActiveRoutesAndPoi', "routeController@getAllActiveRoutesAndPoi");

    Route::post('/podcastList', "PodcastController@podcastList");
    Route::any('/guest_podcastList', "PodcastController@guest_podcastList");
    Route::post('/addPayment', "PaymentController@addPayment");
    Route::post('/getAllPackages', "PaymentController@getAllPackages");
    Route::post('/getCurrentPackage', "PaymentController@getCurrentPackage");
    Route::post('/getMyOrders', "PaymentController@getMyOrders");


    Route::post('/user-road-trip-insert', "PaymentController@insert_data_to_user_road_trip");


});
