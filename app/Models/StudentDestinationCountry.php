<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentDestinationCountry extends Model
{
    use HasFactory;
    protected $table = "student_destinations_countries";
    protected $fillable = [
        'student_id',
        'country',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
