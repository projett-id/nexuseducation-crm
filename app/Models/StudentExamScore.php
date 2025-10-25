<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentExamScore extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'test_taken',
        'writing_score',
        'reading_score',
        'listening_score',
        'speaking_score',
        'overall_score',
        'date',
        'test_reference_id',
        'remarks',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
