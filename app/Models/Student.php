<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['student_name', 'student_email', 'student_phone' , 'student_gender', 'student_hobbies' , 'student_address' , 'student_image'];
}
