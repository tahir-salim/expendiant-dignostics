<?php

use App\Http\Controllers\Lab\LabController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| test
 */

Route::get('/', function () {
    return redirect('login');
});
Auth::routes();

Route::get('/check_user_role', [App\Http\Controllers\MiddlewareController::class, 'check_user_role'])->name('check_user_role');
Route::post('/hospital_register', [App\Http\Controllers\Auth\RegisterController::class, 'hospital_register'])->name('hospital_register');

// Hospital routes

Route::group(['middleware' => ['hospital']], function () {
    Route::get('/hospital/dashboard', [App\Http\Controllers\HospitalController::class, 'index'])->name('hospital.dashboard');
    Route::post('/hospital/post_test_details', [App\Http\Controllers\HospitalController::class, 'post_test_details'])->name('hospital.post_test_details');

    Route::get('/hospital/all-test-appointments', [App\Http\Controllers\HospitalController::class, 'all_test_appointments'])->name('hospital.all_test_appointments');
    Route::get('/hospital/test-report', [App\Http\Controllers\HospitalController::class, 'test_report'])->name('hospital.test_report');
    Route::get('/hospital/help-center', [App\Http\Controllers\HospitalController::class, 'help_center'])->name('hospital.help_center');

});

// Lab routes
Route::group(['middleware' => ['lab']], function () {
    Route::get('/lab/dashboard', [LabController::class, 'index'])->name('lab.dashboard');
    Route::get('/lab/schedule', [LabController::class, 'schedule'])->name('lab.schedule');
    Route::get('/lab/patient-list', [LabController::class, 'patientList'])->name('lab.patient.list');
    Route::get('/lab/hospital-list', [LabController::class, 'hospitalList'])->name('lab.hospital.list');
    Route::get('/lab/lab-history', [LabController::class, 'labHistory'])->name('lab.lab.history');
    Route::get('/lab/lab-test-menu', [LabController::class, 'testMenu'])->name('lab.test.menu');
    Route::get('/lab/help-center', [LabController::class, 'helpCenter'])->name('lab.help.center');
    Route::post('/lab/deletetest', [LabController::class, 'deleteTest'])->name('lab.deleteTest');
    Route::get('/lab/hospital-detail/{hospital_id}', [LabController::class, 'hospitalDetail'])->name('lab.hospital.detail');
    Route::get('/lab/patient-detials', [LabController::class, 'patientDetails'])->name('lab.patient_detials');
    Route::get('/lab/lab-hospital-patient-detail/{hospital_test_id}', [LabController::class, 'labHospitalPatientDetail'])->name('lab.hospital.patient.detail');
    Route::get('/lab/lab-history-pdf', [LabController::class, 'labHistoryPdf']);
    Route::get('/lab/hospital-list-pdf', [LabController::class, 'hospitalListPdf']);
    Route::get('/lab/patient-list-pdf', [LabController::class, 'patientListPdf']);
    Route::get('/lab/hospital-patient-list-pdf/{id}', [LabController::class, 'hospitalPatientListPdf']);
    Route::post('/lab/update/hospital-detail/{id}', [LabController::class, 'updateHospitalDetail']);
    Route::get('/lab/delete/hospital-detail/{id}', [LabController::class, 'deleteHospitalDetail']);
    Route::post('/lab/search', [LabController::class, 'labSearch'])->name('lab.search');
    Route::post('/lab/addtest', [LabController::class, 'addtest'])->name('lab.addtest');
    Route::post('/lab/create_category', [LabController::class, 'create_category'])->name('lab.create_category');
    Route::post('/lab/dltTestofPatient', [LabController::class, 'dltTestofPatient'])->name('lab.dltTestofPatient');
    Route::post('/lab/update_patient_details', [LabController::class, 'update_patient_details'])->name('lab.update_patient_details');

});

// Patient routes
Route::group(['middleware' => ['patient']], function () {
    Route::get('/patient/dashboard', [PatientController::class, 'index'])->name('patient.dashboard');
    Route::get('/patient/test-appointment', [PatientController::class, 'testAppointment'])->name('patient.test.appointment');
    Route::get('/patient/test-report', [PatientController::class, 'testReport'])->name('patient.test.report');
    Route::get('/patient/help-center', [PatientController::class, 'helpCenter'])->name('patient.help.center');
    Route::post('/patient/selected-tests', [PatientController::class, 'selectedTests'])->name('patient.select.tests');
    Route::post('/patient/search', [PatientController::class, 'patientSearch'])->name('patient.search');
    Route::post('/patient/addappointment', [PatientController::class, 'addAppointment'])->name('patient.addAppointment');
    Route::post('/patient/checkTimeAvailability', [PatientController::class, 'checkTimeAvailability'])->name('patient.checkTimeAvailability');
    Route::get('/patient/appointmentdetails/{id}', [PatientController::class, 'appointmentDetails'])->name('patient.appointmentDetails');
    Route::get('/patient/appointmentgenratepdf/{id}', [PatientController::class, 'appointmentGeneratePdf'])->name('patient.appointmentGeneratePdf');
    Route::get('/patient/appointmentList', [PatientController::class, 'appointmentList'])->name('patient.appointmentList');
});
