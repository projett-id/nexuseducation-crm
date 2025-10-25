<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAddress extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'type',
        'country',
        'address_1',
        'address_2',
        'post_code',
        'state',
        'city',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
