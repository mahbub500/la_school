<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\backend\Setup\StudentYearController;
use App\Http\Controllers\backend\Setup\StudentClassController;
use App\Http\Controllers\backend\Setup\StudentGroupController;
use App\Http\Controllers\backend\Setup\StudentShiftController;
use App\Http\Controllers\backend\Setup\StudentFeeCategoryController;

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
    return view('auth.login');
});
Route::get('/admin', function () {
    return view('backend.admin');
})->name('admin');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/admin/logout',[AdminController::class,'logout'])->name('admin.logout');

// User Management All Route

Route::prefix('user')->group(function(){
        
    Route::get('/view',[UserController::class,'UserView'])->name('user.view');
    Route::get('/adduser',[UserController::class,'UserAdd'])->name('user.add');
    Route::post('/store',[UserController::class,'UserStore'])->name('user.store');
    Route::get('/delete/{id}',[UserController::class,'UserDelete'])->name('user.delete');
    Route::get('/edit/{id}',[UserController::class,'UserEdit'])->name('user.edit');
    Route::post('/update/{id}',[UserController::class,'UserUpdate'])->name('user.update');
   
});

// user profile Manage
Route::prefix('profile')->group(function(){
        
    Route::get('/view',[ProfileController::class,'ProfileView'])->name('Profile.view');
    Route::get('/edit',[ProfileController::class,'ProfileEdit'])->name('Profile.edit');
    Route::post('/store',[ProfileController::class,'ProfileStore'])->name('profile.store');
    Route::get('/Password/View',[ProfileController::class,'PasswordView'])->name('Password.Store');
    Route::post('/Password/Update',[ProfileController::class,'PasswordUpdate'])->name('password.update');
    
});

// Setup Manage
Route::prefix('setups')->group(function(){
        
    Route::get('/view',[StudentClassController::class,'StudentView'])->name('student.class.view');
    Route::get('/add',[StudentClassController::class,'ClassAdd'])->name('class.add');
    Route::post('/student/store',[StudentClassController::class,'ClassStore'])->name('class.store');
    Route::get('/student/edit/{id}',[StudentClassController::class,'ClassEdit'])->name('class.edit');
    Route::Post('/student/update/{id}',[StudentClassController::class,'ClassUpdate'])->name('class.update');
    Route::get('/student/delete/{id}',[StudentClassController::class,'ClassDelete'])->name('class.delete');
    
    
});

// Student Year
Route::prefix('Student')->group(function(){
Route::get('/Year',[StudentYearController::class,'YearView'])->name('student.year.view');
Route::get('/Year/add',[StudentYearController::class,'YearAdd'])->name('student.year.add');
Route::post('/Year/store',[StudentYearController::class,'YearStore'])->name('student.year.store');
Route::get('/year/{id}',[StudentYearController::class,'YearEdit'])->name('year.edit');
Route::Post('/update/{id}',[StudentYearController::class,'YearUpdate'])->name('year.update');
Route::get('/delete/{id}',[StudentYearController::class,'YearDelete'])->name('year.delete');
});
// Student Group
Route::prefix('student')->group(function(){
    Route::get('/group',[StudentGroupController::class,'GroupView'])->name('student.group.view');
    Route::get('/group/add',[StudentGroupController::class,'GroupAdd'])->name('student.group.add');
    Route::POST('/group/store',[StudentGroupController::class,'GroupStore'])->name('student.group.store');
    Route::get('/group/edit/{id}',[StudentGroupController::class,'GroupEdit'])->name('student.group.edit');
    Route::post('/group/update/{id}',[StudentGroupController::class,'GroupUpdate'])->name('student.group.update');
    Route::get('/group/delete/{id}',[StudentGroupController::class,'GroupDelete'])->name('student.group.delete');
});

// Student Shift

Route::prefix('student')->group(function(){
    Route::get('/shift',[StudentShiftController::class,'ShiftView'])->name('student.Shift.view');
    Route::get('/shift/add',[StudentShiftController::class,'ShiftAdd'])->name('student.Shift.add');
    Route::POST('/shift/store',[StudentShiftController::class,'ShiftStore'])->name('student.Shift.store');
    Route::get('/shift/edit/{id}',[StudentShiftController::class,'ShiftEdit'])->name('student.Shift.edit');
    Route::post('/shift/update/{id}',[StudentShiftController::class,'ShiftUpdate'])->name('student.Shift.update');
    Route::get('/shift/delete/{id}',[StudentShiftController::class,'ShiftDelete'])->name('student.Shift.delete');
});

// Student FeeCategory

Route::prefix('student')->group(function(){
    Route::get('/FeeCategory',[StudentFeeCategoryController::class,'FeeCategoryView'])->name('student.FeeCategory.view');
    Route::get('/FeeCategory/add',[StudentFeeCategoryController::class,'FeeCategoryAdd'])->name('student.FeeCategory.add');
    Route::POST('/FeeCategory/store',[StudentFeeCategoryController::class,'FeeCategoryStore'])->name('student.FeeCategory.store');
    Route::get('/FeeCategory/edit/{id}',[StudentFeeCategoryController::class,'FeeCategoryEdit'])->name('student.FeeCategory.edit');
    Route::post('/FeeCategory/update/{id}',[StudentFeeCategoryController::class,'FeeCategoryUpdate'])->name('student.FeeCategory.update');
    Route::get('/FeeCategory/delete/{id}',[StudentFeeCategoryController::class,'FeeCategoryDelete'])->name('student.FeeCategory.delete');
});
