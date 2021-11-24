<?php

Route::get('/', function () {
    return view('frontend.index');
});
Route::get('/logout','HomeController@index');
//Slider
Route::get('/add_slider','SliderController@add_slider');
Route::post('/add_slider','SliderController@save_slider');
Route::get('/all_slider','SliderController@all_slider');
Route::get('/unactive_slider/{slider_id}','SliderController@unactive_slider');
Route::get('/active_slider/{slider_id}','SliderController@active_slider');
Route::get('/delete_slider/{slider_id}','SliderController@deleteslider');

//Unit
Route::get('/add_unit','UnitController@add_unit');
Route::post('/add_unit','UnitController@save_unit');
Route::get('/all_unit','UnitController@all_unit');
Route::get('/edit_unit/{id}','UnitController@edit_unit');
Route::post('/edit_unit/{id}','UnitController@update_unit');
Route::get('/delete_unit/{id}','UnitController@delete_unit');

//Service
Route::get('/add_service','ServiceController@add_service');
Route::post('/add_service','ServiceController@save_service');
Route::get('/all_service','ServiceController@all_service');
Route::get('/unactive_service/{service_id}','ServiceController@unactive_service');
Route::get('/active_service/{service_id}','ServiceController@active_service');
Route::get('/unlimit_service/{service_id}','ServiceController@unlimit_service');
Route::get('/limit_service/{service_id}','ServiceController@limit_service');
Route::get('/edit_service/{id}','ServiceController@edit_service');
Route::post('/edit_service/{id}','ServiceController@update_service');
Route::get('/delete_service/{id}','ServiceController@delete_service');

//Package
Route::get('/add_package','PackageController@add_package');
Route::post('/add_package','PackageController@save_package');
Route::get('/all_package','PackageController@all_package');
Route::get('/unactive_package/{package_id}','PackageController@unactive_package');
Route::get('/active_package/{package_id}','PackageController@active_package');
Route::get('/edit_package/{id}','PackageController@edit_package');
Route::post('/edit_package/{id}','PackageController@update_package');
Route::get('/delete_package/{id}','PackageController@delete_package');

//UserBooking
Route::post('/save_booking','BookingController@save_booking');


//AdminBooking
Route::get('/booking_list','BookingController@booking_list');
Route::get('/unactive_booking/{booking_id}','BookingController@unactive_booking');
Route::get('/active_booking/{booking_id}','BookingController@active_booking');
Route::get('/delete_booking/{booking_id}','BookingController@delete_booking');
//More than one booking delete
Route::post('/all_booking_delete','BookingController@all_booking_delete');
Route::get('/booking_list_record','BookingController@booking_list_record');


//Pet Owner Pet_Species
Route::get('/add_pet_species','OwnerAndPetController@add_pet_species');
Route::post('/add_pet_species','OwnerAndPetController@save_pet_species');
Route::get('/all_pet_species','OwnerAndPetController@all_pet_species');
Route::get('/delete_species/{id}','OwnerAndPetController@delete_species');
Route::get('/add_owner_and_pet','OwnerAndPetController@add_owner_and_pet');
Route::post('/add_owner_and_pet','OwnerAndPetController@save_owner_and_pet');
Route::get('/all_owner_and_pet','OwnerAndPetController@all_owner_and_pet');

//Facity
Route::get('/add_facility','FacilityController@add_facility');
Route::post('/add_facility','FacilityController@save_facility');
Route::get('/all_facility','FacilityController@all_facility');
Route::get('/delete_facility','FacilityController@delete_facility');

//Available
Route::get('/add_available','AvailableController@add_available');
Route::post('/add_available','AvailableController@save_available');
Route::get('/all_available','AvailableController@all_available');
Route::get('/edit_available/{id}','AvailableController@edit_available');
Route::post('/edit_available/{id}','AvailableController@update_available');
Route::get('/delete_available/{id}','AvailableController@delete_available');

//provides
Route::get('/add_provides','ProvideController@add_provides');
Route::post('/add_provides','ProvideController@save_provides');
Route::get('/all_provides','ProvideController@all_provides');
Route::post('/update_limit/{id}','ProvideController@update_limit');
Route::post('/update_currently_use/{id}','ProvideController@update_currently_use');
Route::get('/delete_provide/{id}','ProvideController@delete_provide');

//Cases
Route::get('/add_case','CaseController@add_case');
Route::post('/add_case','CaseController@save_case');
Route::get('/all_case','CaseController@all_case');
Route::post('/update_start_time/{id}','CaseController@update_start_time');
Route::post('/update_end_time/{id}','CaseController@update_end_time');
Route::get('/unclose_case/{id}','CaseController@unclose_case');
Route::get('/close_case/{id}','CaseController@close_case');
Route::get('/delete_case/{id}','CaseController@delete_case');

//Service provide
Route::get('/add_service_provide','ServiceProvideController@add_service_provide');
Route::post('/add_service_provide','ServiceProvideController@save_service_provide');
Route::get('/all_service_provide','ServiceProvideController@all_service_provide');
Route::get('/edit_service_provide/{id}','ServiceProvideController@edit_service_provide');
Route::post('/edit_service_provide/{id}','ServiceProvideController@update_service_provide');
Route::get('/delete_service_provide/{id}','ServiceProvideController@delete_service_provide');

//Invoice
Route::get('/add_invoice','InvoiceController@add_invoice');
Route::post('/add_invoice','InvoiceController@save_invoice');
Route::get('/all_invoice','InvoiceController@all_invoice');

//Notification
Route::get('/notification/get','NotificationController@get');


// mail
 Route::get('/sendmail/{id}','SendMailController@index');
 Route::get('/inbox','SendMailController@inbox'); 
 Route::post('/sendmail/{id}','SendMailController@send');

//UserFeedback
Route::post('/user_feedback','FeedbackController@save_feedback');
Route::get('/unactive_feedback/{id}','FeedbackController@unactive_feedback');
Route::get('/active_feedback/{id}','FeedbackController@active_feedback');
Route::get('/delete_feedback/{id}','FeedbackController@delete_feedback');

//Bouncher 
Route::get('/invoice/{id}','InvoiceController@bouncher');
Route::get('/delete_invoice/{id}','InvoiceController@delete_invoice');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
