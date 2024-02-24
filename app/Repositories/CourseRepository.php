<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Course;

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
}
