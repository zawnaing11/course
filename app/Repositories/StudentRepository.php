<?php

namespace App\Repositories;

use App\Models\Course;
use App\Models\CourseUser;
use App\Models\User;

class StudentRepository
{
    public function allCourses()
    {
        return Course::latest()->paginate(10);
    }

    public function getApplyCourses()
    {
        return CourseUser::where('user_id', auth()->user()->id)->get();
    }
}
