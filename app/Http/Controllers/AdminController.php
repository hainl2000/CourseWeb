<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
use App\Models\CourseEnrollment;
use App\Models\PaymentHistory;

class AdminController extends Controller
{
    //
    public function listTeacher () {
        $value = DB::select('SELECT u.User_ID, u.User_name,User_account ,User_phone,COUNT(c.Course_ID) count
            FROM user u, course c
            WHERE u.User_role = 1
            AND u.User_ID = c.Author_ID
            GROUP BY u.User_ID, u.User_name, User_phone,User_account');

        for ($i = 0; $i < count($value) ; ++$i) {
            $value[$i]->total = (int) DB::table('PaymentHistory')
                ->join('CourseEnrollment', 'CourseEnrollment.Payment_ID', 'PaymentHistory.Payment_ID')
                ->join('Course', 'CourseEnrollment.Course_ID', 'Course.Course_ID')
                -> where('Author_ID', $value[$i]->User_ID)->sum('Payment_price');

        }

        return response()->json([
            $value
        ],200);
    }

    public function listStudent () {

        $value = DB::select('SELECT u.User_ID, u.User_name,User_account ,User_phone
            FROM user u
            WHERE u.User_role = 2');

        for ($i = 0; $i < count($value) ; ++$i) {
            $value[$i]->total = (int) DB::table('PaymentHistory')
                ->join('CourseEnrollment', 'CourseEnrollment.Payment_ID', 'PaymentHistory.Payment_ID')
                -> where('User_ID', $value[$i]->User_ID)->sum('Payment_price');

        }

        for ($i = 0; $i < count($value) ; ++$i) {
            $value[$i]->count = DB::table('CourseEnrollment')
                -> where('User_ID', $value[$i]->User_ID)->count();

        }

        return response()->json([
            $value
        ],200);
    }
}
