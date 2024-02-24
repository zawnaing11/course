<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CourseRequest;
use App\Repositories\CourseRepository;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    private $CourseRepo;

    public function __construct(CourseRepository $CourseRepo)
    {
        $this->CourseRepo = $CourseRepo;
    }

    public function index()
    {
        $courses = $this->CourseRepo->allCourses();

        return view('backend.courses.index', [
            'courses' => $courses
        ]);
    }

    public function create()
    {
        $categories = $this->CourseRepo->getCategories();

        return view('backend.courses.create', [
            'categories' => $categories,
            'teachers' => []
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
        $categories = $this->CourseRepo->getCategories();
        $course = $this->CourseRepo->findCourse($id);

        return view('backend.courses.edit', [
            'course' => $course,
            'categories' => $categories,
            'teachers' => []
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
}
