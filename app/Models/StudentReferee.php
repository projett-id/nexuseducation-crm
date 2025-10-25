<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentReferee extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'name',
        'position',
        'title',
        'work_email',
        'duration',
        'phone_number',
        'relationship',
        'institution_name',
        'institution_address',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
