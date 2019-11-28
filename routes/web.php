<?php



Route::get('/','MainController@index')->name('homepage');
Route::get('/category','MainController@categoryPage')->name('category');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/category','CategoryController@index')->name('admin-category');
Route::post('/admin/category','CategoryController@categorySave')->name('category-save');
Route::get('/category/unpublished/{id}','CategoryController@unpublishedCategory')->name('unpub-category');
Route::get('/admin/category/published/{id}','CategoryController@publishedCategory')->name('pub-category');
Route::post('/admin/category/update','CategoryController@categoryUpdate')->name('update-category');
Route::get('/category/delete/{id}','CategoryController@deleteCategory')->name('delete-category');

//Brand
Route::resource('/brand','BrandController');
Route::put('brand/{id}', 'BrandController@update');
Route::get('/brand/unpublished/{id}','BrandController@UnpublishedBrand')->name('unpub-brand');
Route::get('/brand/published/{id}','BrandController@publishedBrand')->name('pub-brand');

//Product
Route::resource('/products','ProductController');






?>
