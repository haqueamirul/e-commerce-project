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

//Frondend Route===================================================================

Route::get('/', 'HomeController@index');

//Show product by category
Route::get('/product_by_category/{cat_id}', 'HomeController@show_product_by_category');

//Show product by menufacture
Route::get('/product_by_menufacture/{menufacture_id}', 'HomeController@show_product_by_menufacture');
Route::get('/view_product/{product_id}', 'HomeController@productDetails');
Route::post('/add-to-cart', 'cartController@addTocart');
Route::get('/show-cart', 'cartController@showCart');



//Backend Route===================================================================

Route::get('/admin', 'AdminController@adminLogin');
Route::get('/dashboard', 'superAdminController@adminDashboard');
Route::post('/logindashboard', 'AdminController@adminDash');
Route::get('/logout', 'superAdminController@Logout');


//Category related Route===================================================================

Route::get('/add_catrgory', 'CategoryController@addCategory');
Route::get('/all_catrgory', 'CategoryController@allCategory');
Route::get('/editCat/{cat_id}', 'CategoryController@editCategory');
Route::get('/deleteCat/{cat_id}', 'CategoryController@deleteCategory');
Route::post('/updateCategory/{cat_id}', 'CategoryController@updateCategory');
Route::post('/save-category', 'CategoryController@saveCategory');
Route::get('/unactive_cat/{cat_id}', 'CategoryController@unactiveCategory');
Route::get('/active_cat/{cat_id}', 'CategoryController@activeCategory');



//Menufacture related Route===================================================================

Route::get('/add_menufacture', 'MenufactureController@AddMenufacture');
Route::post('/save-menufacture', 'MenufactureController@saveMenufacture');
Route::get('/all_menufacture', 'MenufactureController@allMenufacture');
Route::get('/unactive_brand/{menufacture_id}', 'MenufactureController@unactiveMenufacture');
Route::get('/active_brand/{menufacture_id}', 'MenufactureController@activeMenufacture');
Route::get('/editbrand/{menufacture_id}', 'MenufactureController@editMenufacture');
Route::post('/updatemenufacture/{menufacture_id}', 'MenufactureController@updateMenufacture');
Route::get('/deletebrand/{menufacture_id}', 'MenufactureController@deleteMenufacture');


//Product related Route===================================================================

Route::get('/addproduct', 'ProductController@addProduct');
Route::post('/save-product', 'ProductController@saveProduct');
Route::get('/allproduct', 'ProductController@allProduct');
Route::get('/unactive_product/{product_id}', 'ProductController@unactiveProduct');
Route::get('/active_product/{product_id}', 'ProductController@activeProduct');
Route::get('/editProduct/{product_id}', 'ProductController@EditProduct');
Route::post('/update-product/{product_id}', 'ProductController@updateProduct');
Route::get('/deleteProduct/{product_id}', 'ProductController@DeleteProduct');


//Slider related Route===================================================================

Route::get('/addslider', 'sliderController@addSlider');
Route::post('/save-slider', 'sliderController@saveSlider');
Route::get('/allslider', 'sliderController@allSlider');
Route::get('/unactive_slider/{slider_id}', 'sliderController@unactiveSlider');
Route::get('/active_slider/{slider_id}', 'sliderController@activeSlider');
Route::get('/deleteslider/{slider_id}', 'sliderController@deleteslider');
