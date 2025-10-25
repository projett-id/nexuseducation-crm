<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentWorkDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'job_title',
        'company',
        'address',
        'phone_number',
        'start_date',
        'end_date',
        'currently_working',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
