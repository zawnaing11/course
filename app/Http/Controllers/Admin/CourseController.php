<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CourseRequest;
use App\Http\Requests\Admin\TeacherCourseRequest;
use App\Repositories\CourseRepository;

class CourseController extends Controller
{
    private $CourseRepo;

    public function __construct(CourseRepository $CourseRepo)
    {
        $this->CourseRepo = $CourseRepo;
    }

    public function index()
    {
        return view('backend.courses.index', [
            'courses' => $this->CourseRepo->allCourses()
        ]);
    }

    public function create()
    {
        return view('backend.courses.create', [
            'categories' => $this->CourseRepo->getCategories(),
            'teachers' => $this->CourseRepo->getTeachers()
        ]);
    }

    public function store(CourseRequest $request)
    {
        $validated = $request->validated();
        $validated['admin_id'] = auth()->user()->id ?? 1;

        $this->CourseRepo->storeCourse($validated);

        return redirect()->route('courses.index')
            ->with('alert.success', 'Course Created Successfully');
    }

    public function edit($id)
    {
        return view('backend.courses.edit', [
            'course' => $this->CourseRepo->findCourse($id),
            'categories' => $this->CourseRepo->getCategories(),
            'teachers' => $this->CourseRepo->getTeachers()
        ]);
    }

    public function update(CourseRequest $request, $id)
    {
        $validated = $request->validated();

        $this->CourseRepo->updateCourse($validated, $id);

        return redirect()->route('courses.index')
            ->with('alert.success', 'Course Updated Successfully');
    }

    public function destroy($id)
    {
        $this->CourseRepo->destroyCourse($id);

        return redirect()->route('courses.index')
            ->with('alert.success', 'Course Deleted Successfully');
    }

    public function teacherCourses()
    {
        return view('backend.teacher_courses.index', [
            'courses' => $this->CourseRepo->getTeacherCourses()
        ]);
    }

    public function teacherCourseEdit($id)
    {
        return view('backend.teacher_courses.edit', [
            'course' => $this->CourseRepo->findCourse($id)
        ]);
    }

    public function teacherCourseUpdate(TeacherCourseRequest $request, $id)
    {
        $validated = $request->validated();

        $this->CourseRepo->finishedCourse($validated, $id);

        return redirect()->route('courses.teacher')
            ->with('alert.success', 'Course Finished Successfully');
    }
}
