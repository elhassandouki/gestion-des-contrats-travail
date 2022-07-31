<?php

use Carbon\Carbon;
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

//Route::get('Employee/{cin}','EmployeeController@get');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => '/app','middleware' => 'auth'],function(){
	Route::group(['prefix' => 'R','middleware' => 'role:R'],function(){
		
		//Employee
		Route::get('Employee','EmployeeController@index')->name('R-employee-index');
		Route::get('Employes','EmployeeController@get_data');
		Route::get('Employee/{cin}','EmployeeController@get');
		Route::post('Employee/store','EmployeeController@store')->name('R-Employee-store');
		
		//Contrat
		Route::get('Contrat','ContratsController@index')->name('R-contrat-index');;
		Route::get('Contrats','ContratsController@get_data');
		Route::post('Contrat/store','ContratsController@store')->name('R-Contrat-store');
		Route::post('Contrat/store2','ContratsController@update')->name('R-Contrat-store2');

		//Ferme
		Route::get('Ferme','FermeController@index')->name('R-Ferme-index');;
		Route::get('Fermes','FermeController@get_data');
		Route::post('Ferme/store','FermeController@store')->name('R-ferme-store');
		

		//Export Excel
		Route::get('Contrats/export/excel', 'ExportController@export_contrats')->name('R-export-Contrats');
		Route::get('Employees/export/excel', 'ExportController@export_employees')->name('R-export-Employees');


		//Etat
		Route::get('imprimer/contrat/{id}','ContratsController@imp_contart')->name('R-imp-contrat');
		Route::get('imprimer/employee/{id}','ContratsController@imp_contart')->name('R-imp-employee');

	Route::group(['namespace' => 'Modal'],function(){

			Route::get('automodel/{type}/{id}','AutoModalController@automodel');
			Route::post('autocomplete','AutoCompleteController@index');
		});

		
		

	});
});