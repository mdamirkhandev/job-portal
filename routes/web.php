<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\auth\AccountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\OpenJobController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/all-jobs', [OpenJobController::class, 'index'])->name('all.jobs');
Route::get('/job-details/{id}', [OpenJobController::class, 'show'])->name('job.details');
// applyjob route
Route::post('/apply-job', [JobApplicationController::class, 'applyJob'])->name('apply.job');

//Guest Middleware
Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AccountController::class, 'login'])->name('account.login');
    Route::post('/loginProcess', [AccountController::class, 'loginProcess'])->name('account.loginProcess');
    Route::get('/register', [AccountController::class, 'registration'])->name('account.register');
    Route::post('/registerProcess', [AccountController::class, 'registerProcess'])->name('account.registerProcess');
});

//Auth Middleware
Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', [AccountController::class, 'logout'])->name('account.logout');
    Route::get('/profile', [AccountController::class, 'profile'])->name('account.profile');
    Route::put('/update-profile', [AccountController::class, 'profileUpdate'])->name('account.profileUpdate');
    Route::post('/profile-pic-update', [AccountController::class, 'profilePicUpdate'])->name('account.profilePicUpdate');
    Route::post('/updatePassword', [AccountController::class, 'updatePassword'])->name('account.updatePassword');
    //Jobs route
    Route::resource('/jobs', JobController::class);
    Route::get('/my-applied-jobs', [JobApplicationController::class, 'myAppliedJobs'])->name('my-applied-jobs');
    Route::delete('/my-applied-jobs', [JobApplicationController::class, 'removeJob'])->name('job.remove');
    // Admin Route
    Route::group(['prefix' => 'admin', 'middleware' => 'checkRole'], function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    });
});
