<?php

namespace App\Repositories;

use App\Models\CourseUser;
use Illuminate\Http\Request;

class CourseUserRepository
{
    public function getCourseUsers()
    {
        return CourseUser::with(['user', 'course'])->get();
    }

    public function changeStatus($status, $id)
    {
        $course_user = CourseUser::findOrFail($id);
        $course_user->status = $status;
        $course_user->save();
    }
}
