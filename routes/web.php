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
    return view('welcome');
});
//Authentication
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Routes Of Menus
Route::get('/Menus', 'MenusController@index')->name('Menus.index');
Route::get('Menus/{show}','MenusController@show' )->name('Menus.show');
Route::get('createM','MenusController@create' )->name('Menus.create');
Route::post('storeMenu','MenusController@store' )->name('Menus.store');
Route::get('menu/{menu}/edit','MenusController@edit')->name('Menus.edit');
Route::post('menu/{menu}/update','MenusController@update')->name('Menus.update');
Route::get('menu/{menu}/delete','MenusController@delete' )->name('Menus.delete');
Route::post('menu/search','MenusController@search' )->name('Menus.search');


// Routes Of Item
Route::get('/Items', 'ItemsController@index')->name('Items.index');
Route::get('Items/{show}','ItemsController@show' )->name('Items.show');
Route::get('createI','ItemsController@create' )->name('Items.create');
Route::post('storeI','ItemsController@store' )->name('Items.store');
Route::get('item/{item}/edit','ItemsController@edit')->name('Items.edit');
Route::post('item/{item}/update','ItemsController@update')->name('Items.update');
Route::get('item/{item}/delete','ItemsController@delete' )->name('Items.delete');
Route::post('item/search','ItemsController@search' )->name('Items.search');


// Routes Of Meal
Route::get('/Meals', 'MealsController@index')->name('Meals.index');
Route::get('Meals/{show}','MealsController@show' )->name('Meals.show');
Route::get('createMeal','MealsController@create' )->name('Meals.create');
Route::post('storeMeal','MealsController@store' )->name('Meals.store');
Route::get('meal/{meal}/edit','MealsController@edit')->name('Meals.edit');
Route::post('meal/{meal}/update','MealsController@update')->name('Meals.update');
Route::get('meal/{meal}/delete','MealsController@delete' )->name('Meals.delete');
Route::post('meal/search','MealsController@search' )->name('Meals.search');

// Routes Of Customers
Route::get('/Customers', 'CustomersController@index')->name('Customers.index');
Route::get('Customers/{show}','CustomersController@show' )->name('Customers.show');
Route::get('createCust','CustomersController@create' )->name('Customers.create');
Route::post('storeCust','CustomersController@store' )->name('Customers.store');
Route::get('customer/{customer}/edit','CustomersController@edit')->name('Customers.edit');
Route::post('customer/{customer}/update','CustomersController@update')->name('Customers.update');
Route::get('customer/{customer}/delete','CustomersController@delete' )->name('Customers.delete');
Route::post('customer/search','CustomersController@search' )->name('Customers.search');


// Routes Of Orders
Route::get('/Orders', 'OrdersController@index')->name('Orders.index');
Route::get('Orders/{show}','OrdersController@show' )->name('Orders.show');
Route::get('createOrder','OrdersController@create' )->name('Orders.create');
Route::post('storeOrder','OrdersController@store' )->name('Orders.store');
Route::get('order/{order}/edit','OrdersController@edit')->name('Orders.edit');
Route::post('order/{order}/update','OrdersController@update')->name('Orders.update');
Route::get('order/{order}/delete','OrdersController@delete' )->name('Orders.delete');
Route::post('order/search','OrdersController@search' )->name('Orders.search');


//factory(App\User::class,5)->create();