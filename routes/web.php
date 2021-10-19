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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('companies', 'CompanyController@index');
Route::get('newcompany', 'CompanyController@newcompanyview');
Route::post('addcompany', 'CompanyController@newComapany');
Route::get('editcompany/{id}', 'CompanyController@editcompany');
Route::post('update_comapany', 'CompanyController@upCompany');
Route::get('delete_company/{id}', 'CompanyController@delete_company');
Route::get('company_details', 'CompanyController@company_details')->name('company_details');

//employee
 Route::get('employee', 'EmployeeController@index');
 Route::get('newemployee', 'EmployeeController@newemployeeview');
 Route::get('editemployee/{id}', 'EmployeeController@editemployee');
 Route::post('addemployee', 'EmployeeController@addemployee');
 Route::post('update_employee', 'EmployeeController@update_employee');
 Route::get('delete_employee/{id}', 'EmployeeController@delete_employee');


