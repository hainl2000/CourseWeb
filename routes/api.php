<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/getPendingCourses',[CourseController::class,'getPendingCourses']);
Route::post('/approveCourse',[CourseController::class,'approveCourse']);


Route::get('/getListCategories',[CategoryController::class,'getListCategories']);

Route::group(['prefix' => 'teacher'], function () {
    Route::get('/general',[TeacherController::class,'tongQuan']);
    Route::get('/statistic/newStudent',[TeacherController::class,'newStudent']);
    Route::get('/statistic/topStudents',[TeacherController::class,'topStudents']);
    Route::get('/statistic/newOrders',[TeacherController::class,'newOrders']);
    Route::get('/statistic/listStudent',[TeacherController::class,'listStudent']);
    Route::get('/statistic/listCoures',[TeacherController::class,'listCoures']);
    Route::get('/statistic/listHistory',[TeacherController::class,'listHistory']);
    Route::post('/manage/addCourse',[CourseController::class,'addCourse']);

});
