<?php

namespace App\Exports;

use App\Models\CourseUser;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CourseUsersExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'Id',
            'Name',
            'Email',
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::select('id', 'name', 'email')->whereHas('courseUsers')->get();
    }
}
