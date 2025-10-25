<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAcademicHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'country',
        'institution_name',
        'course_of_study',
        'level_of_study',
        'start_date',
        'end_date',
        'shift',
        'grading_score',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
