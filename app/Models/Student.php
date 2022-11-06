<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class Student extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['student_name', 'student_email', 'student_phone' , 'student_gender', 'student_hobbies' , 'student_address' , 'student_image','student_password'];
}
