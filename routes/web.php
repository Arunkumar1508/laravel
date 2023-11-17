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

Route::get('/', function () {
    return view('new');
});
Route::get('/tweety', function () {
    return view('welcome');
});


// Route::get('/amazon', function () {
//     return view('amazon.welcomeproduct');
// })->name('amazon');




Route::middleware('auth')->prefix('/tweety')->group(function(){

    Route::get('/tweets','TweetsController@index')->name('tweety_home');

    //userlogout
    Route::get('/userloggedout','RequestController@userloggedout')->name('userloggedout');


    Route::post('/tweets','TweetsController@store')->name('publish');

    Route::post('/tweets/{tweet}/like','TweetLikesController@store');
    Route::delete('/tweets/{tweet}/like','TweetLikesController@destroy');


    Route::post('/profiles/{user}/follow','FollowsController@store')->name('follow');


    //approval
    Route::get('/profiles/request/accept','RequestController@view')->name('request');

    Route::get('/profiles/request/{request}/accept','RequestController@update')->name('accept');

    Route::get('/profiles/request{request}/reject','RequestController@delete')->name('reject');

    //message
    Route::get('/profiles/request/message','MessageController@view')->name('message');

    Route::get('/profiles/request/sending/{user}','MessageController@sending')->name('sending');

    Route::post('/profiles/request/sendDB{id}','MessageController@save')->name('sendDB');



    Route::get('/profiles/{user}/edit','ProfilesContoller@edit')->middleware('can:edit,user');

    Route::patch('/profiles/{user}','ProfilesContoller@update');

    Route::get('/explore','ExploreController@index')->name('explore');
    Route::get('/profiles/{user}','ProfilesContoller@show')->name('profile');
});



// amazon

Route::get('/amazon', function () {
    return view('welcome');
});


// User
Route::get('/amazon','ProductController@show')->name('amazon');
Route::get('/amazon/listproduct','ProductController@productshow')->name('show');
Route::get('/amazon/search','ProductController@search')->name('search');

Route::get('/amazon/search/move/{id}','ProductController@move')->name('move');



Route::post('/amazon/addtocart/id={id}/userid={userid}/count={count}','AddtocartController@addtocart')->name('addtocart');

Route::get('/amazon/addtocart/view','AddtocartController@addtocart_view')->name('addtocart_view');

Route::get('/amazon/addtocart/buy/{catid}','AddtocartController@buy')->name('buy');

// quantity increase
// Route::post('/amazon/add','AddtocartController@add')->name('add');

Route::post('/amazon/remove','AddtocartController@remove')->name('remove');

Route::get('/amazon/success/','AddtocartController@success')->name('success');

Route::post('/amazon/finalupdated/{id}','AddtocartController@finalupdated')->name('finalupdated');



// admin

Route::middleware(['admin'])->prefix('/')->group(function(){



Route::get('/amazon/admin','AdminController@update');

Route::get('/amazon/admin/home','ProductController@add')->name('add');

Route::post('amazon/admin/store','AdminController@store')->name('store');


Route::get('/amazon/admin/adminlist','AdminController@adminlist')->name('adminlist');

Route::get('/amazon/admin/categories_list','AdminController@categories_list')->name('categories_list');

Route::get('/amazon/admin/categories_view','AdminController@categories_view')->name('categories_view');

Route::get('/amazon/admim/edit/{id}','AdminController@edit')->name('adminlist_edit');

Route::delete('/amazon/admim/delete/{id}','AdminController@delete')->name('adminlist_delete');


Route::post('/amazon/admim/approve/{id}','AdminController@approve')->name('adminlist_approve');

Route::post('/amazon/admim/disapprove/{id}','AdminController@disapprove')->name('adminlist_disapprove');

Route::put('/amazon/admim/update/{id}','ProductController@update')->name('update');

Route::post('/amazon/admim/updated','ProductController@updated')->name('updated');





Route::get('/amazon/adminsearch','AdminController@adminsearch')->name('adminsearch');






});
// Route::get('/amazon/alldata','AddtocartController@datas');

Auth::routes();


