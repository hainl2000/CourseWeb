<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\checkLogin;
use App\Http\Controllers\AdminController;

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

Route::post('/login', [AuthController::class , 'login']);
Route::get('/check', [AuthController::class , 'check']);


//Router teacher manage
Route::group(['prefix' => 'teacher'], function() {
    Route::get('/general',[TeacherController::class,'tongQuan']);
    Route::get('/statistic/newStudent',[TeacherController::class,'newStudent']);
    Route::get('/statistic/topStudents',[TeacherController::class,'topStudents']);
    Route::get('/statistic/newOrders',[TeacherController::class,'newOrders']);
    Route::get('/statistic/listStudent',[TeacherController::class,'listStudent']);
    Route::get('/statistic/listCoures',[TeacherController::class,'listCoures']);
    Route::get('/statistic/listHistory',[TeacherController::class,'listHistory']);


    Route::get('/getListUploadedCourses/{authorID}',[CourseController::class,'getListUploadedCourses']);

    Route::post('/manage/addCourse',[CourseController::class,'addCourse']);
    Route::post('/manage/addChap',[CourseController::class,'addChap']);
    Route::post('/manage/addLesson',[CourseController::class,'addLesson']);

    Route::put('/manage/updateCourse/{courseID}',[CourseController::class,'updateCourse']);
    Route::put('/manage/updateChap/{chapID}',[CourseController::class,'updateChap']);
    Route::put('/manage/updateLesson/{lessonID}',[CourseController::class,'updateLesson']);
});

Route::group(['prefix' => 'admin','middleware'=>['auth:api','admin']],function(){
    Route::get('/getPendingCourses',[CourseController::class,'getPendingCourses']);
    Route::post('/approveCourse',[CourseController::class,'approveCourse']);
    Route::get('/listTeacher', [AdminController::class, 'listTeacher']);
    Route::get('/listStudent', [AdminController::class, 'listStudent']);
    Route::get('/general', [AdminController::class,'general']);
});

Route::middleware('auth:api')->get('/getUserDetail',[AuthController::class,'check']);
// Route::middleware('auth:api')->group(function(){
//     Route::get('/auth',[AuthController::class,'check']);
// });
// Route::group(['middleware'=>['auth:api','admin']],function(){
    
//     Route::get('/auth',[AuthController::class,'check']);
// });
Route::get('/getListCategories',[CategoryController::class,'getListCategories']);
Route::get('/getCourseDetail/{courseID}',[CourseController::class,'getCourseDetail']);
