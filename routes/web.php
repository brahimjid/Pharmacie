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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/hmd', function () {
    return view('hmd');
});
// printing facture when created
Route::get('/invoices/print', function () {
    return view('Facture.print');
});
//print facture sortir when created
Route::get('/invoices/sortir', 'StocksController@indexSortir')->name('indexSortir');
//print Commande when created
Route::get('/commandes/print', 'commandesController@PrintStockSortir')->name('PrintCommande');
//print facture sortir
Route::get('/invoices/sortir/{id}', 'InvoicesController@showSortir')->name('show_sortir');

Route::get('/recu/print', function () {
    return view('Recu.print');
});
Route::get('/recu/annuler/{id}', 'RecuController@annuler')->name('annuler');
// COMMANDE TO STOCK ENTREE
Route::get('/commandes/transfer/{id}', 'commandesController@toEntree')->name('toEntree');
Route::get('/recu/close', 'SessionsController@closeSession')->name('close-session');

//cree stock sortir
Route::get('/stock/sortir', 'StocksController@StockSortir')->name('sortir');
Auth::routes(['register' => false]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('medicaments','MedicamentsController');
Route::resource('familles','FamillesController');
Route::resource('stocks','StocksController');
Route::resource('invoices','InvoicesController');
Route::resource('recu','RecuController');
Route::resource('session','SessionsController');
Route::resource('users','UsersController');
Route::resource('commandes','CommandesController');


