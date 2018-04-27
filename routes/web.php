<?php

Route::group(['middleware' => ['web']], function () {

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/services', 'ServicesController@index')->name('services');
Route::get('/about', 'AboutController@index')->name('about');
Route::get('/make/{id}', 'CategoryController@index')->name('showProductByCategory');
Route::get('/type/{id}', 'TypeController@index')->name('showProductByType');
Route::get('/product/{id}', 'ProductController@index')->name('productsDetail');
Route::get('types/get/{id}', 'ProductController@getCategories');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin',  'middleware' => ['auth']], function () {

    Route::get('/', 'AdminController@index')->name('admin');

    Route::get('/about/edit', 'AboutController@edit')->name('adminAboutEdit');
    Route::put('/about/edit', 'AboutController@update')->name('adminAboutUpdate');

    Route::get('service/edit', 'ServiceController@edit')->name('adminServicesEdit');
    Route::put('service/edit', 'ServiceController@update')->name('adminServicesUpdate');
    Route::get('service/{id}/delete', 'ServiceController@destroy')->name('adminServicesDelete');

    Route::get('/product', 'ProductController@index')->name('adminProducts');
    Route::get('/product/create', 'ProductController@create')->name('adminProductsCreate');
    Route::post('/product', 'ProductController@store')->name('adminProductsStore');
    Route::get('/product/{id}/edit', 'ProductController@edit')->name('adminProductsEdit');
    Route::put('/product/{id}', 'ProductController@update')->name('adminProductsUpdate');
    Route::get('/product/{id}/delete', 'ProductController@destroy')->name('adminProductsDelete');
    Route::get('/product/image/{id}/delete', 'ProductImageController@destroy')->name('adminProductsImageDelete');
    Route::get('/product/image/default', 'ProductImageController@setImageDefault')->name('adminImageDefault');

    Route::get('/make', 'CategoryController@index')->name('adminCategories');
    Route::get('/make/create', 'CategoryController@create')->name('adminCategoriesCreate');
    Route::post('/make', 'CategoryController@store')->name('adminCategoriesStore');
    Route::get('/make/{id}/edit', 'CategoryController@edit')->name('adminCategoriesEdit');
    Route::put('/make/{id}', 'CategoryController@update')->name('adminCategoriesUpdate');
    Route::get('/make/{id}/delete', 'CategoryController@destroy')->name('adminCategoriesDelete');

    Route::get('/type', 'TypeController@index')->name('adminTypes');
    Route::get('/type/create', 'TypeController@create')->name('adminTypesCreate');
    Route::post('/type', 'TypeController@store')->name('adminTypesStore');
    Route::get('/type/{id}/edit', 'TypeController@edit')->name('adminTypesEdit');
    Route::put('/type/{id}', 'TypeController@update')->name('adminTypesUpdate');
    Route::get('/type/{id}/delete', 'TypeController@destroy')->name('adminTypesDelete');

    Route::get('/user/{id}/edit', 'UserController@edit')->name('adminUsersEdit');
    Route::put('/user/{id}', 'UserController@update')->name('adminUserUpdate');
    Route::post('/user', 'UserController@store')->name('adminUserStore');
    Route::get('/user', 'UserController@index')->name('adminUsers');
    Route::get('/user/create', 'UserController@create')->name('adminUsersCreate');
    Route::get('/user/{id}/delete', 'UserController@destroy')->name('adminUsersDelete');
});
});


