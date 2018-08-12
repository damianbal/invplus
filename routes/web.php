<?php

Route::get('/', 'InvoiceController@index')->name('home');

/*
|--------------------------------------------------------------------------
| Invoices
|--------------------------------------------------------------------------
*/
Route::get('/invoices', 'InvoiceController@index')->name('invoices.index');
Route::post('/invoices', 'InvoiceController@store')->name('invoices.store');
Route::get('/invoices/{invoice}/pdf', 'InvoiceController@showPDF')->name('invoices.show_pdf');

/*
|--------------------------------------------------------------------------
| User
|--------------------------------------------------------------------------
*/

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