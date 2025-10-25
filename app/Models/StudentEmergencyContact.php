<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentEmergencyContact extends Model
{
    use HasFactory;
    protected $table = 'student_emergency_contact';
    protected $fillable = [
        'student_id',
        'name',
        'relationship',
        'phone_number',
        'email',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
