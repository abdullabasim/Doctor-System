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

//Route::get('/', function () {
//    return view('prescription_print2');
//});



Auth::routes();

Route::group(['middleware' => 'MobileCheker'], function () {
    Route::get('/', 'HomeController@managePatient')->name('home');

    Route::get('/home', 'HomeController@managePatient')->name('home');

    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

    Route::get('/addPatient', 'HomeController@addPatientPage');

    Route::post('/addPatient', 'HomeController@addPatient');

    Route::get('/managePatient', 'HomeController@managePatient');

    Route::get('/patientDelete/{id}', 'HomeController@patientDelete');

    Route::post('/editPatient', 'HomeController@editPatient');

    Route::get('/addSession/{id}', 'HomeController@addSessionPage');

    Route::post('/addSession', 'HomeController@addSession');

    Route::get('/manageSession/{id}', 'HomeController@manageSession');

    Route::get('/getMedicals', 'HomeController@getMedicals');

    Route::post('/editMedical', 'HomeController@editMedical');

    Route::post('/addExamination', 'HomeController@addExamination');

    Route::get('/getExamination', 'HomeController@getExamination');

    Route::post('/editExamination', 'HomeController@editExamination');

    Route::get('/sessionDelete/{id}/{patientId}', 'HomeController@sessionDelete');

    Route::get('/examinationDelete/{id}', 'HomeController@examinationDelete');

    Route::get('/prescriptionPrint/{id}', 'HomeController@prescriptionPrint');

    Route::get('/manageSession/examinationPrint/{id}', 'HomeController@examinationPrint');

});

Route::get('Mobilechecker',function (){

    if(Session::has('error')){

        Auth::logout();
        return redirect('login')->with('error','This Application allowed only from PC or Laptop');
    }
});

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
