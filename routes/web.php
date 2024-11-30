<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AppointmentController;
use App\Models\Patient;

Route::get('/', function () {
    return view('landingpage');
})->name('landingpage');

Route::get('/admin-login', [AdminController::class, 'adminLogin'])->name('admin.login');
Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/doctors', [AdminController::class, 'doctorIndex'])->name('admin.doctor.index');
Route::get('/admin/schedule', [AdminController::class, 'scheduleIndex'])->name('admin.schedule.index');
Route::get('/admin/doctors/create', [AdminController::class, 'createDoctor'])->name('admin.create.doctor');
Route::get('/admin/schedule/create', [AdminController::class, 'createSchedule'])->name('admin.create.schedule');
Route::get('/admin/admin-appointment', [AdminController::class, 'appointmentIndex'])->name('admin.appointment.index');
Route::get('/admin/admin-patient', [AdminController::class, 'patientIndex'])->name('admin.patients.index');
Route::get('/admin/doctor/{doctor}', [AdminController::class, 'doctorShow'])->name('admin.doctor.show');
Route::get('/admin/doctors/{doctor}/edit', [AdminController::class, 'doctorEdit'])->name('admin.doctor.edit');
Route::put('/admin/doctors/{doctor}', [AdminController::class, 'doctorUpdate'])->name('admin.doctor.update');
Route::delete('/admin/doctors/{doctor}', [AdminController::class, 'doctorDestroy'])->name('admin.doctor.destroy');
Route::get('/admin/schedules/{schedule}', [AdminController::class, 'scheduleShow'])->name('admin.schedule.show');
Route::delete('/admin/schedules/{schedule}', [AdminController::class, 'scheduleDestroy'])->name('admin.schedule.destroy');
Route::delete('/admin/appointments/{appointment}', [AdminController::class, 'appointmentDestroy'])->name('admin.appointment.destroy');
Route::get('/admin/patients/{patient}', [AdminController::class, 'patientShow'])->name('admin.patients.show');
Route::get('/admin-settings', [AdminController::class, 'settings'])->name('admin.settings');




Route::get('/doctor/dashboard', [DoctorController::class, 'index'])->name('doctor.dashboard');
Route::post('/doctor', [DoctorController::class, 'store'])->name('doctor.store');
Route::get('/doctor/my-sessions', [DoctorController::class, 'scheduleIndex'])->name('doctor.schedule.index');
Route::get('/doctor/my-appointments', [DoctorController::class, 'myAppointments'])->name('doctor.myAppointments');
Route::get('/doctor/my-patients', [DoctorController::class, 'myPatients'])->name('doctor.myPatients');
Route::get('/doctor/settings', [DoctorController::class, 'settings'])->name('doctor.settings');
Route::get('/doctor/my-appointments/{appointment}', [DoctorController::class, 'myAppointmentsShow'])->name('doctor.myAppointments.show');
Route::delete('/doctor/appointments/{appointment}', [DoctorController::class, 'myAppointmentDestroy'])->name('doctor.myAppointment.destroy');
Route::get('/doctor/my-sessions/{schedule}', [DoctorController::class, 'myScheduleShow'])->name('doctor.mySchedule.show');
Route::delete('/doctor/my-schedule/{schedule}', [DoctorController::class, 'myScheduleDestroy'])->name('doctor.mySchedule.destroy');
Route::get('/doctor/my-patient/{patient}', [DoctorController::class, 'myPatientShow'])->name('doctor.myPatient.show');




Route::get('/patient-login', [PatientController::class, 'login'])->name('patient.login');
Route::get('/patient-loginn', [PatientController::class, 'loginPatient'])->name('patient.login2');
Route::post('/login-patient', [PatientController::class, 'authenticate'])->name('patient.authenticate'); //Patient Authenticate
Route::get('/register-patient', [PatientController::class, 'patientCreate'])->name('patient.create');
Route::get('/patient/all-doctors', [PatientController::class, 'allDoctors'])->name('patient.allDoctors');
Route::get('/patient/scheduled-sessions', [PatientController::class, 'scheduledSessions'])->name('patient.scheduledSessions');
Route::post('/patient/book-appointment', [PatientController::class, 'bookAppointment'])->name('patient.bookAppointment');
Route::get('/patient/my-bookings', [PatientController::class, 'myBookings'])->name('patient.myBookings');
Route::get('/patient-settings', [PatientController::class, 'settings'])->name('patient.settings');
Route::post('/patient-logout', [PatientController::class, 'logout'])->name('patient.logout');
Route::post('/patients', [PatientController::class, 'store'])->name('patients.store');
Route::get('/patients-dashboard', [PatientController::class, 'patientDashboard'])->name('patient.dashboard');
Route::get('/patient-appointment-history', [PatientController::class, 'appointmentHistory'])->name('patient.appointmentHistory');



//From ChatGpt
Route::post('/patient/book-appointment', [PatientController::class, 'bookAppointment'])->name('patient.bookAppointment');
Route::get('/patient/doctor/{doctor}', [PatientController::class, 'doctorShow'])->name('patient.doctor.show');
Route::delete('/patient/delete-account', [PatientController::class, 'deleteAccount'])->name('patient.deleteAccount');
Route::get('/patient/edit', [PatientController::class, 'edit'])->name('patient.edit');
Route::put('/patient/update', [PatientController::class, 'update'])->name('patient.update');
Route::delete('/patient/my-bookings/{appointment}', [PatientController::class, 'myBookingDestroy'])->name('patient.booking.destroy');






Route::put('/appointments/{id}/status', [AppointmentController::class, 'updateStatus'])->name('appointment.updateStatus');




Route::post('/schedule', [ScheduleController::class, 'store'])->name('schedule.store');


Route::get('/login', [LoginController::class, 'loginForm'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/doctor-dashboard', function () {
    return view('doctor.doctor_dashboard');
})->name('doctor.dashboard');