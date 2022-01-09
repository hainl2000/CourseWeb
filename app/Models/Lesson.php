<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    // use HasFactory;
    protected $fillable = ['Lesson_ID','Course_ID','Lesson_header','Lesson_description','Lesson_uploadedAt','Lesson_video','Lesson_view'];
    protected $table = 'lesson';
    protected $primaryKey = 'lesson_ID';
    const CREATED_AT = 'Course_uploadedAt';
    // const UPDATED_AT = 'Course_updatedAt';
    // public $timestamps = false;
    protected $hidden = ['Course_createdAt','Course_updatedAt','Course_approve'];
}
