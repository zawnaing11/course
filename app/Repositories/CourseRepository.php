<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Course;
use App\Models\CourseUser;
use App\Models\User;

class CourseRepository
{
    public function allCourses()
    {
        return Course::latest()->paginate(10);
    }

    public function storeCourse($data)
    {
        return Course::create($data);
    }

    public function findCourse($id)
    {
        return Course::findOrFail($id);
    }

    public function updateCourse($data, $id)
    {
        $course = Course::findOrFail($id);
        $course->update($data);
    }

    public function destroyCourse($id)
    {
        $Course = Course::findOrFail($id);
        $Course->delete();
    }

    public function getCategories()
    {
        return Category::all();
    }

    public function getTeachers()
    {
        return User::whereHas('roles', function ($q) {
                $q->where('slug', 'teacher');
        })
        ->get();
    }

    public function getTeacherCourses()
    {
        return Course::whereHas('courseUsers', function ($q) {
            $q->where('status', 3);
        })
         ->where('teacher_id', auth()->user()->id)
         ->get();
    }

    public function finishedCourse($data, $id)
    {
        $courses = CourseUser::where('course_id', $id)->where('status', 3)->get();
        foreach ($courses as $course) {
            $course->status = 5;
            $course->grade = $data['grade'];
            $course->mark = $data['mark'];
            $course->save();
        }
    }
}
