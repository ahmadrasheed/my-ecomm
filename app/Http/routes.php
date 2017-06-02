<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
    'uses' => 'ProductController@getIndex',
    'as' => 'product.index'
]);




// just for test         ajax               -----------------

Route::get('/test', [
    'uses' => 'AjaxController@getIndex',
    'as' => 'GetAjax'
]);
Route::post('/test', [
    'uses' => 'AjaxController@postIndex',
    'as' => 'GetAjax'
]);



// run by ajax after getting geolocation of visitor and run recommedation and send result to index
Route::post('/create', [
    'uses' => 'AjaxController@create',
    'as' => 'createAjax'
]);
  //for test only
// Route::get('/get', [
//     'uses' => 'AjaxController@create',
//     'as' => 'createAjax'
// ]);



// this is your GET AJAX route
Route::get('/ajax', function () {
	// pass back some data
	$data   = array('value' => 'some data');
	// return a JSON response
	return  Response::json($data);
});
// this is your POST AJAX route
Route::post('/ajax/post', function () {
	// pass back some data, along with the original data, just to prove it was received
	$data   = array('value' => 'some data', 'input' => Request::input());
	// return a JSON response
	return  Response::json($data);
});











//----------------------------------



Route::get('/product-details/{id}', [
    'uses' => 'ProductController@getDetails',
    'as' => 'product.details'
]);

Route::get('/add-to-cart/{id}', [
    'uses' => 'ProductController@getAddToCart',
    'as' => 'product.addToCart'
]);

Route::get('/reduce/{id}', [
    'uses' => 'ProductController@getReduceByOne',
    'as' => 'product.reduceByOne'
]);

Route::get('/remove/{id}', [
    'uses' => 'ProductController@getRemoveItem',
    'as' => 'product.remove'
]);

Route::get('/shopping-cart', [
    'uses' => 'ProductController@getCart',
    'as' => 'product.shoppingCart'
]);

Route::get('/checkout', [
    'uses' => 'ProductController@getCheckout',
    'as' => 'checkout',
    'middleware' => 'auth'
]);

Route::post('/checkout', [
    'uses' => 'ProductController@postCheckout',
    'as' => 'checkout',
    'middleware' => 'auth'
]);

Route::group(['prefix' => 'user'], function () {
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/signup', [
            'uses' => 'UserController@getSignup',
            'as' => 'user.signup'
        ]);

        Route::post('/signup', [
            'uses' => 'UserController@postSignup',
            'as' => 'user.signup'
        ]);

        Route::get('/signin', [
            'uses' => 'UserController@getSignin',
            'as' => 'user.signin'
        ]);

        Route::post('/signin', [
            'uses' => 'UserController@postSignin',
            'as' => 'user.signin'
        ]);
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/profile', [
            'uses' => 'UserController@getProfile',
            'as' => 'user.profile'
        ]);

        Route::get('/logout', [
            'uses' => 'UserController@getLogout',
            'as' => 'user.logout'
        ]);
    });
});

/*==========For Admin  Category ============*/

Route::get('/categories',[
    'uses'=>'CategoriesController@getCategories',
    'as'=>'categories.index',
    'middleware' => 'auth'
    ]);

Route::post('/categories',[
    'uses'=>'CategoriesController@postDeleteOrUpdate',
    'as'=>'categories.updateOrdelete'

]);

Route::post('/categories/add',[
    'uses'=>'CategoriesController@postAdd',
    'as'=>'categories.add'
]);

/*
==========for Products  Admin only==================*/


Route::get('/products',[
    'uses'=>'ProductController@getProducts',
    'as'=>'admin.products.index',
    'middleware' => 'auth'
]);

Route::get('/category-products/{id}',[
    'uses'=>'ProductController@getProductsByCategory',
    'as'=>'admin.products.display.by.category',
    'middleware' => 'auth'
]);


Route::post('/products',[
    'uses'=>'ProductController@postDeleteOrUpdate',
    'as'=>'products.updateOrdelete'

]);
// ==Adding new products ==
Route::get('/products/add',[
    'uses'=>'ProductController@getAdd',
    'as'=>'products.add'
]);

Route::post('/products/add',[
    'uses'=>'ProductController@postAdd',
    'as'=>'products.add'
]);
// ==End Adding new products ==
/*
===============Search===========*/

// this is not used i think
Route::post('/products-search',[
    'uses'=>'ProductController@postSearch',
    'as'=>'products.search'
]);

Route::get('/products-search',[
    'uses'=>'ProductController@getSearch',
    'as'=>'products.search'
]);

//searching in index
Route::get('/products-search_index',[
    'uses'=>'ProductController@getSearch_index',
    'as'=>'products.search_index'
]);


// ========================================doing data mining ======================

   Route::get('/apriori',[
    'uses'=>'DataMiningController@getApriori',
    'as'=>'Apriori'
]);

// ========================================= for Google Analytics ==================

Route::get('google-analytics-summary',array('as'=>'google-analytics-summary','uses'=>'HomeController@getAnalyticsSummary'));

//===============================================================================================




/*====================================== QR code ====================================================*/
//this page for generating QR image for each products in DB, and save them in a folder called qrcodes.
   Route::get('/qr',[
    'uses'=>'QrController@getIndex',
    'as'=>'QR'
]);

/*==QR code : to get details of products by Ajax==*/
Route::post('/getQR', [
    'uses' => 'AjaxController@postQR',
    'as' => 'getQR'
]);

/*===========================================End of QR=================================================*/
