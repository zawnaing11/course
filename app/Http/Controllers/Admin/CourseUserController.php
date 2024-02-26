<?php

namespace App\Http\Controllers\Admin;

use App\Exports\CourseUsersExport;
use App\Http\Controllers\Controller;
use App\Repositories\CourseUserRepository;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CourseUserController extends Controller
{

    private $CourseUserRepo;

    public function __construct(CourseUserRepository $CourseUserRepo)
    {
        $this->CourseUserRepo = $CourseUserRepo;
    }

    public function studentCourses()
    {
        return view('backend.courses.student_courses', [
            'course_users' => $this->CourseUserRepo->getCourseUsers()
        ]);
    }

    public function changeStatus(Request $request, $id)
    {

        switch ($request->route()->getName()) {
            case 'course.approved':
                $status = 3;
                break;
            case 'course.rejected':
                $status = 4;
                break;
            default:
                $status = 2;
                break;
        }
        $this->CourseUserRepo->changeStatus($status, $id);
        return redirect()->route('courses.student');
    }

    public function studentCoursesExport()
    {
        return Excel::download(new CourseUsersExport(), 'users.xlsx');
    }
}
