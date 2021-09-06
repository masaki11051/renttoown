<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\R2O_Controller;

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
    return view('toppage');
});
//top page ///////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/application_management_menu', 'App\Http\Controllers\R2O_Controller@application_management_menu');
Route::get('/search_and_edit_page_menu', 'App\Http\Controllers\R2O_Controller@search_and_edit_page_menu');
Route::get('/repayment_management_menu', 'App\Http\Controllers\R2O_Controller@repayment_management_menu');
Route::get('/test_calculation', 'App\Http\Controllers\R2O_Controller@test_calculation');
//register customer info //////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/input_customer_info', 'App\Http\Controllers\R2O_Controller@input_customer_info');
Route::post('/register_customer_info', 'App\Http\Controllers\R2O_Controller@register_customer_info');
Route::get('/select_scan_copies', 'App\Http\Controllers\R2O_Controller@select_scan_copies');
Route::post('/upload_scan_copies', 'App\Http\Controllers\R2O_Controller@upload_scan_copies');
//register application info//////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/customer_search_for_application', 'App\Http\Controllers\R2O_Controller@customer_search_for_application');
Route::post('/input_application_info', 'App\Http\Controllers\R2O_Controller@input_application_info');
Route::post('/register_application_info', 'App\Http\Controllers\R2O_Controller@register_application_info');
//register repayment info//////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/customer_search_for_repayment', 'App\Http\Controllers\R2O_Controller@customer_search_for_repayment');
Route::post('/basic_customer_info_for_repayment', 'App\Http\Controllers\R2O_Controller@basic_customer_info_for_repayment');
Route::post('/detail_customer_info_for_repayment', 'App\Http\Controllers\R2O_Controller@detail_customer_info_for_repayment');
Route::post('/register_repayment_info', 'App\Http\Controllers\R2O_Controller@register_repayment_info');
//register supplemental docs//////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/customer_search_for_supplementalDocs', 'App\Http\Controllers\R2O_Controller@customer_search_for_supplementalDocs');
Route::post('/select_supplementalDocs', 'App\Http\Controllers\R2O_Controller@select_supplementalDocs');
Route::post('/upload_supplementalDocs', 'App\Http\Controllers\R2O_Controller@upload_supplementalDocs');
//returned motorcycle/////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/customer_search_for_returned_motorcycle', 'App\Http\Controllers\R2O_Controller@customer_search_for_returned_motorcycle');
Route::post('/select_info_for_returned_motorcycle', 'App\Http\Controllers\R2O_Controller@select_info_for_returned_motorcycle');
Route::post('/update_info_for_returned_motorcycle', 'App\Http\Controllers\R2O_Controller@update_info_for_returned_motorcycle');
//register motorcycle/////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/add_motorcycle', 'App\Http\Controllers\R2O_Controller@add_motorcycle');
Route::post('/register_motorcycle', 'App\Http\Controllers\R2O_Controller@register_motorcycle');
//register plan/////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/add_plan', 'App\Http\Controllers\R2O_Controller@add_plan');
Route::post('/register_plan', 'App\Http\Controllers\R2O_Controller@register_plan');
//register company/////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/add_company', 'App\Http\Controllers\R2O_Controller@add_company');
Route::post('/register_company', 'App\Http\Controllers\R2O_Controller@register_company');
//register location/////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/add_location', 'App\Http\Controllers\R2O_Controller@add_location');
Route::post('/register_location', 'App\Http\Controllers\R2O_Controller@register_location');


//search application/////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/application_search', 'App\Http\Controllers\R2O_Controller@application_search');
Route::post('/basic_application_info', 'App\Http\Controllers\R2O_Controller@basic_application_info');
Route::post('/detail_application_info', 'App\Http\Controllers\R2O_Controller@detail_application_info');
Route::post('/choose_files', 'App\Http\Controllers\R2O_Controller@choose_files');
Route::post('/delete_files', 'App\Http\Controllers\R2O_Controller@delete_files');
Route::post('/edit_company', 'App\Http\Controllers\R2O_Controller@edit_company');
Route::post('/update_company', 'App\Http\Controllers\R2O_Controller@update_company');
Route::post('/edit_application', 'App\Http\Controllers\R2O_Controller@edit_application');
Route::post('/update_application', 'App\Http\Controllers\R2O_Controller@update_application');
Route::post('/restore_selected_motorcycle', 'App\Http\Controllers\R2O_Controller@restore_selected_motorcycle');
Route::post('/update_location_for_selected_motorcycle', 'App\Http\Controllers\R2O_Controller@update_location_for_selected_motorcycle');
Route::post('/edit_motorcycle', 'App\Http\Controllers\R2O_Controller@edit_motorcycle');
Route::post('/update_motorcycle', 'App\Http\Controllers\R2O_Controller@update_motorcycle');
Route::post('/edit_plan', 'App\Http\Controllers\R2O_Controller@edit_plan');
Route::post('/update_plan', 'App\Http\Controllers\R2O_Controller@update_plan');
Route::post('/repayments_info_of_application', 'App\Http\Controllers\R2O_Controller@repayments_info_of_application');
//search all customers//////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/all_customers_info', 'App\Http\Controllers\R2O_Controller@all_customers_info');
Route::post('/edit_customer_info', 'App\Http\Controllers\R2O_Controller@edit_customer_info');
Route::post('/update_customer_info', 'App\Http\Controllers\R2O_Controller@update_customer_info');
//search all motorcycles//////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/all_motorcycles_info', 'App\Http\Controllers\R2O_Controller@all_motorcycles_info');
Route::post('/edit_motorcycle_info', 'App\Http\Controllers\R2O_Controller@edit_motorcycle_info');
Route::post('/update_motorcycle_info', 'App\Http\Controllers\R2O_Controller@update_motorcycle_info');
//search all plans//////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/all_plans_info', 'App\Http\Controllers\R2O_Controller@all_plans_info');
Route::post('/edit_plan_info', 'App\Http\Controllers\R2O_Controller@edit_plan_info');
Route::post('/update_plan_info', 'App\Http\Controllers\R2O_Controller@update_plan_info');
//search all companies//////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/all_companies_info', 'App\Http\Controllers\R2O_Controller@all_companies_info');
Route::post('/edit_company_info', 'App\Http\Controllers\R2O_Controller@edit_company_info');
Route::post('/update_company_info', 'App\Http\Controllers\R2O_Controller@update_company_info');
//search all repayments//////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/all_repayments_info', 'App\Http\Controllers\R2O_Controller@all_repayments_info');



//repayment_management_menu/////////////////////////////////////////////////////////////////////////////////////////////////
//select repayments info/////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/select_repayments_info', 'App\Http\Controllers\R2O_Controller@select_repayments_info');
Route::post('/update_repayment_info_for_delay', 'App\Http\Controllers\R2O_Controller@update_repayment_info_for_delay');
Route::post('/update_repayment_info_for_paid', 'App\Http\Controllers\R2O_Controller@update_repayment_info_for_paid');
//search_repayments_info/////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/search_repayments_info', 'App\Http\Controllers\R2O_Controller@search_repayments_info');
Route::post('/edit_repayment_info', 'App\Http\Controllers\R2O_Controller@edit_repayment_info');
Route::post('/update_repayment_info', 'App\Http\Controllers\R2O_Controller@update_repayment_info');
