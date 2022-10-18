<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseModule extends Model
{
    protected $table='courses';
    protected $primarykey='id';
    protected $filelabel=['course_name','course_fee'];
}