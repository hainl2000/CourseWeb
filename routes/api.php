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
Route::get('/teacher/general',[TeacherController::class,'tongQuan']);
Route::get('/teacher/statistic/newStudent',[TeacherController::class,'newStudent']);
Route::get('/teacher/statistic/topStudents',[TeacherController::class,'topStudents']);
Route::get('/teacher/statistic/newOrders',[TeacherController::class,'newOrders']);
Route::get('/teacher/statistic/listStudent',[TeacherController::class,'listStudent']);
Route::get('/teacher/statistic/listCoures',[TeacherController::class,'listCoures']);
Route::get('/teacher/statistic/listHistory',[TeacherController::class,'listHistory']);

Route::post('/teacher/manage/addCourse',[CourseController::class,'addCourse']);
Route::post('/teacher/manage/addChap',[CourseController::class,'addChap']);
Route::post('/teacher/manage/addLesson',[CourseController::class,'addLesson']);

Route::put('/teacher/manage/updateCourse/{courseID}',[CourseController::class,'updateCourse']);
Route::put('/teacher/manage/updateChap/{chapID}',[CourseController::class,'updateChap']);
Route::put('/teacher/manage/updateLesson/{lessonID}',[CourseController::class,'updateLesson']);
Route::get('/getListCategories',[CategoryController::class,'getListCategories']);
