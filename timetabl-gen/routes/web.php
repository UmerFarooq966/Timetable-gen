<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TimetableController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('index');
});

Auth::routes(['verify'=> true]);


/*-
All Normal Users Routes List
-*/
Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

/*-
All Admin Routes List
-*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('/addtime/{course}', [CourseController::class, 'show']);
    Route::post('{courseId}/addtime/', [CourseController::class, 'storeClassTiming'])->name('storeClassTiming');
    //Route::post('/admin/course/{courseId}/storeClassTiming', 'CourseController@storeClassTiming')->name('admin.course.storeClassTiming');


});





Route::get('/home', [HomeController::class, 'index'])->name('home');

// Timetable Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/timetable', [TimetableController::class,'index'])->name('timetable');
});
