<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseUser;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function applyCourse($course_id)
    {
        $user = auth()->user()->roles->first();
        // check user roles is student
        if ($user && $user->slug != 'student') {
            return response()->json([
                'message' => 'Other user can not apply courses'
            ], 401);
        }
        // check course is exists
        $course = Course::find($course_id);
        if (!$course) {
            return response()->json([
                'message' => 'Course Not Found'
            ], 404);
        }
        // check course is already apply
        $applied_course = CourseUser::where([
                ['user_id', $user->id],
                ['course_id', $course->id],
                ['status', '!=', 4] // user can apply again if this course is rejected.
            ])
            ->exists();

        if ($applied_course) {
            return response()->json([
                'message' => 'This Course is already apply'
            ], 404);
        }

        CourseUser::updateOrCreate(
            ['user_id' => $user->id, 'course_id' => $course->id],
            ['status' => 1]
        );

        return response()->json([
            'message' => 'Applied Course'
        ]);
    }
}
