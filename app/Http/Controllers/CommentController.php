<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Comment;
use App\Models\User;

class CommentController extends Controller
{
    //
    public function showComment(Request $request)
    {
        $Course_ID = $request->input('Course_ID');
        $Comment_in_course = Comment::where('Course_ID','=',$Course_ID)->get();
        return response()->json([$Comment_in_course],201);
    }
}
