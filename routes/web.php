<?php

Route::get('/', 'InvoiceController@index')->name('home');

/*
|--------------------------------------------------------------------------
| Invoices
|--------------------------------------------------------------------------
*/
Route::get('/invoices', 'InvoiceController@index')->name('invoices.index');
Route::post('/invoices', 'InvoiceController@store')->name('invoices.store');
Route::get('/invoices/{invoice}/remove', 'InvoiceController@destroy')->name('invoices.destroy');
Route::get('/invoices/{invoice}', 'InvoiceController@show')->name('invoices.show');
Route::get('/invoices/{invoice}/pdf', 'InvoiceController@showPDF')->name('invoices.show_pdf');


/*
|--------------------------------------------------------------------------
| Invoice Items
|--------------------------------------------------------------------------
*/
Route::post('/invoices/{invoice}/items', 'InvoiceItemController@store')->name('invoices.items.store');
Route::get('/invoices/items/{invoiceItem}/remove', 'InvoiceItemController@destroy')->name('invoices.items.destroy');
Route::get('/invoices/items/{invoiceItem}/increase', 'InvoiceItemController@increase')->name('invoices.items.increase');
Route::get('/invoices/items/{invoiceItem}/decrease', 'InvoiceItemController@decrease')->name('invoices.items.decrease');


/*
|--------------------------------------------------------------------------
| User
|--------------------------------------------------------------------------
*/
Route::get('/profile', 'UserController@edit')->name('users.profile');
Route::post('/profile', 'UserController@update')->name('users.update_profile');


/*
|--------------------------------------------------------------------------
| Clients
|--------------------------------------------------------------------------
*/
Route::get('/clients', 'ClientController@index')->name('clients.index');
Route::post('/clients', 'ClientController@store')->name('clients.store');
Route::get('/clients/{id}/remove', 'ClientController@destroy')->name('clients.destroy');

/*
|--------------------------------------------------------------------------
| Sign In & Sign Up
|--------------------------------------------------------------------------
*/
Route::get('/auth/sign-in', 'SignInController@show')->name('sign_in.show');
Route::post('/auth/sign-in', 'SignInController@submit')->name('sign_in.submit');
Route::get('/auth/sign-out', 'SignInController@signOut')->name('sign_out');
Route::get('/auth/sign-up', 'SignUpController@show')->name('sign_up.show');
Route::post('/auth/sign-up', 'SignUpController@submit')->name('sign_up.submit');