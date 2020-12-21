<?php

use App\Mail\StudentRegistration;
use App\Mail\Subscribe;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
|   example -   Method 1 -  use App\Http\Controllers\HomeController;
|                           Route::get('/home',[HomeController::class,'indexhome']);
|               Method 2 -  Route::get('/home','App\Http\Controllers\HomeController@indexhome');
*/

/*
|--------------------------------------------------------------------------
| WEBSITE ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', [App\Http\Controllers\Website\Home::class,'index']);
Route::get('/programme', [App\Http\Controllers\Website\Program::class,'index']);
Route::get('/registration',[App\Http\Controllers\Website\Registration::class,'index']);
Route::get('/learning',[App\Http\Controllers\Website\Learning::class,'index']);
Route::get('/contact',[App\Http\Controllers\Website\Contact::class,'index']);
Route::get('/examination',[App\Http\Controllers\Website\Examination::class,'index']);
Route::get('/faq',[App\Http\Controllers\Website\Faq::class, 'index']);
Route::get('/announcements', [App\Http\Controllers\Website\AnouncementsController::class, 'index']);

Route::post('/student/registration',[App\Http\Controllers\Website\Registration::class,'emailLink']);
Route::post('/student/registration/subscribe',[App\Http\Controllers\Website\Registration::class,'subscribe']);

Route::get('/email',function(){
  return new Subscribe();
});

/*
|--------------------------------------------------------------------------
| PORTAL ROUTES
|--------------------------------------------------------------------------
*/
Auth::routes();

/*
|--------------------------------------------------------------------------
| STAFF PORTAL ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/portal/staff/', [App\Http\Controllers\Portal\Staff\HomeController::class, 'index'])->name('home');
Route::get('/portal/staff/applications', [App\Http\Controllers\Portal\Staff\HomeController::class, 'getApplicantList'])->name('applicant.list');

Route::get('/portal/staff/students', [App\Http\Controllers\Portal\Staff\StudentController::class, 'index'])->name('students');
Route::get('student-list',[App\Http\Controllers\Portal\Staff\StudentController::class, 'getStudentList'])->name('student.list');
Route::get('/portal/staff/student/profile',[App\Http\Controllers\Portal\Staff\StudentController::class, 'viewStudent'])->name('student.profile');

Route::get('/portal/staff/exams', [App\Http\Controllers\Portal\Staff\ExamsController::class, 'index'])->name('exams');
Route::get('exam-list',[App\Http\Controllers\Portal\Staff\ExamsController::class, 'getExamList'])->name('exams.list');
Route::post('portal/staff/exams',[App\Http\Controllers\Portal\Staff\ExamsController::class, 'createSchedule'])->name('exams.create');

Route::get('/portal/staff/results', [App\Http\Controllers\Portal\Staff\ResultsController::class, 'index'])->name('results');
Route::get('/portal/staff/result/view/{id}', [App\Http\Controllers\Portal\Staff\ResultsController::class, 'viewResults'])->where('id', '[0-9]+')->name('results.view');

Route::get('/portal/staff/users', [App\Http\Controllers\Portal\Staff\UsersController::class, 'index'])->name('users');
Route::get('/portal/staff/users/user-list',[App\Http\Controllers\Portal\Staff\UsersController::class, 'getUserList'])->name('user.list');
Route::get('/portal/staff/user/profile',[App\Http\Controllers\Portal\Staff\UsersController::class, 'viewUser'])->name('user.profile');

Route::get('/portal/staff/system', [App\Http\Controllers\Portal\Staff\SystemController::class, 'index'])->name('system');

/*
|--------------------------------------------------------------------------
| STUDENT PORTAL ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/portal/student/', [App\Http\Controllers\Portal\Student\HomeController::class, 'index'])->name('student.home');

Route::get('/portal/student/registration',[App\Http\Controllers\Portal\Student\RegistrationController::class,'index'])->name('student.registration');
Route::post('/portal/student/registration/saveInfoValidator',[App\Http\Controllers\Portal\Student\RegistrationController::class,'saveInfoValidator']);
Route::post('/portal/student/registration/getcountries',[App\Http\Controllers\Portal\Student\RegistrationController::class,'getCountries']);
Route::post('/portal/student/registration/getstates',[App\Http\Controllers\Portal\Student\RegistrationController::class,'getStates']);
Route::post('/portal/student/registration/getcities',[App\Http\Controllers\Portal\Student\RegistrationController::class,'getCities']);

Route::get('/portal/student/exams',[App\Http\Controllers\Portal\Student\ExamsController::class,'index'])->name('student.exams');

Route::get('/portal/student/results',[App\Http\Controllers\Portal\Student\ResultsController::class,'index'])->name('student.results');

Route::get('/portal/student/payment',[App\Http\Controllers\Portal\Student\PaymentController::class,'index'])->name('payment');

Route::get('/guest/{email}/fit/{token}', [App\Http\Controllers\Portal\Student\UserController::class,'setPassword'])->name('email.link');

Route::post('/guest/update/account', [App\Http\Controllers\Portal\Student\UserController::class,'updateAccount'])->name('update.account');







