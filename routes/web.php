<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/clients','ClientController@index');
Route::post('/clients','ClientController@store');
Route::get('/clients/{client}/edit','ClientController@edit');
Route::put('/clients/{client}','ClientController@update');


Route::get('/vehicules','VehiculeController@list');
Route::get('/payes','ClientController@listOfPayes');

Route::post('/api/clients','ClientController@RestStore');
Route::put('/api/clients/{client}','ClientController@RestUpdate');
Route::get('/api/clients','ClientController@RestIndex');
Route::get('/api/clients/{client}','ClientController@editRest');
Route::get('/api/clients/find/{keyword}','ClientController@RestGetOne');
Route::get('/api/payes','ClientController@listOfPayes');

Route::view('/test','test');




//-------------------vehicules Routes---------------
Route::get('/vehicules', 'VehiculeController@index');
Route::get('/vehicules/create', 'VehiculeController@create');
Route::post('/vehicules', 'VehiculeController@store');
Route::get('/vehicules/{vehicule}', 'VehiculeController@show');
Route::get('/vehicules/{vehicule}/edit', 'VehiculeController@edit');
Route::put('/vehicules/{vehicule}', 'VehiculeController@update');
Route::delete('/vehicules/{vehicule}', 'VehiculeController@destroy');
	//----------------Rest for vehicules Table-----------------------
Route::get('/api/vehicules/limit/{limit?}', 'VehiculeController@restIndex');
Route::get('/api/vehicules/{vehicule}', 'VehiculeController@restShow');
Route::post('/api/vehicules', 'VehiculeController@restStore');
Route::put('/api/vehicules/{vehicule}', 'VehiculeController@restUpdate');
Route::delete('/api/vehicules/{vehicule}', 'VehiculeController@restDestroy');

Route::get('/api/vehicules/marque/marques','VehiculeController@restGetAllMarque');
Route::get('/api/vehicules/marque/modeles/{marque}','VehiculeController@restGetModelesByMarque');
//-------------------End vehicules Routes------------


//-------------------reservations Routes---------------
Route::get('/reservations', 'ReservationController@index');
Route::get('/reservations/create', 'ReservationController@create');
Route::post('/reservations', 'ReservationController@store');
Route::get('/reservations/{reservation}', 'ReservationController@show');
Route::get('/reservations/{reservation}/edit', 'ReservationController@edit');
Route::put('/reservations/{reservation}', 'ReservationController@update');
Route::delete('/reservations/{reservation}', 'ReservationController@destroy');
	//----------------Rest for reservations Table-----------------------
Route::get('/api/reservations/limit/{limit?}', 'ReservationController@restIndex');
Route::get('/api/reservations/{reservation}', 'ReservationController@restShow');
Route::post('/api/reservations', 'ReservationController@restStore');
Route::put('/api/reservations/{reservation}', 'ReservationController@restUpdate');
Route::delete('/api/reservations/{reservation}', 'ReservationController@restDestroy');
//-------------------End reservations Routes------------


//-------------------reservations Routes---------------
Route::get('/reservations', 'ReservationController@index');
Route::get('/reservations/create', 'ReservationController@create');
Route::post('/reservations', 'ReservationController@store');
Route::get('/reservations/{reservation}', 'ReservationController@show');
Route::get('/reservations/{reservation}/edit', 'ReservationController@edit');
Route::patch('/reservations/{reservation}', 'ReservationController@update');
Route::delete('/reservations/{reservation}', 'ReservationController@destroy');
	//----------------Rest for reservations Table-----------------------
Route::get('/api/reservations/limit/{limit?}', 'ReservationController@restIndex');
Route::get('/api/reservations/{reservation}', 'ReservationController@restShow');
Route::post('/api/reservations', 'ReservationController@restStore');
Route::patch('/api/reservations/{reservation}', 'ReservationController@restUpdate');
Route::delete('/api/reservations/{reservation}', 'ReservationController@restDestroy');
//-------------------End reservations Routes------------


//-------------------typevehicules Routes---------------
Route::get('/typevehicules', 'TypevehiculeController@index');
Route::get('/typevehicules/create', 'TypevehiculeController@create');
Route::post('/typevehicules', 'TypevehiculeController@store');
Route::get('/typevehicules/{typevehicule}', 'TypevehiculeController@show');
Route::get('/typevehicules/{typevehicule}/edit', 'TypevehiculeController@edit');
Route::patch('/typevehicules/{typevehicule}', 'TypevehiculeController@update');
Route::delete('/typevehicules/{typevehicule}', 'TypevehiculeController@destroy');
	//----------------Rest for typevehicules Table-----------------------
Route::get('/api/typevehicules/limit/{limit?}', 'TypevehiculeController@restIndex');
Route::get('/api/typevehicules/{typevehicule}', 'TypevehiculeController@restShow');
Route::post('/api/typevehicules', 'TypevehiculeController@restStore');
Route::patch('/api/typevehicules/{typevehicule}', 'TypevehiculeController@restUpdate');
Route::delete('/api/typevehicules/{typevehicule}', 'TypevehiculeController@restDestroy');


//-------------------End typevehicules Routes------------