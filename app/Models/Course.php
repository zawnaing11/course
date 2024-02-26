<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'admin_id',
        'teacher_id',
        'name',
        'code',
        'category_id',
        'description'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function courseUsers()
    {
        return $this->hasMany(CourseUser::class);
    }
}
