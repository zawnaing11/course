<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\StudentRepository;

class StudentController extends Controller
{
    private $StudentRepo;

    public function __construct(StudentRepository $StudentRepository)
    {
        $this->StudentRepo = $StudentRepository;
    }
    public function courseList()
    {
        return view('backend.students.index', [
            'courses' => $this->StudentRepo->allCourses(),
            'apply_courses' => $this->StudentRepo->getApplyCourses()
        ]);
    }
}
