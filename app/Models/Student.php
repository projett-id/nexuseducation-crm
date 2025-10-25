<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
     protected $fillable = [
        'first_name',
        'family_name',
        'email',
        'phone_number',
        'date_of_birth',
        'gender',
        'nationality',
        'country_of_birth',
        'native_language',
        'passport_name',
        'passport_issue_location',
        'passport_number',
        'passport_issue_date',
        'passport_expiry_date',
    ];

    public function addresses()
    {
        return $this->hasMany(StudentAddress::class);
    }

    public function emergencyContacts()
    {
        return $this->hasMany(StudentEmergencyContact::class);
    }

    public function destinationStudies()
    {
        return $this->hasMany(StudentDestinationCountry::class);
    }

    public function academicHistories()
    {
        return $this->hasMany(StudentAcademicHistory::class);
    }

    public function academicInterests()
    {
        return $this->hasMany(StudentAcademicInterest::class);
    }

    public function examScores()
    {
        return $this->hasMany(StudentExamScore::class);
    }

    public function referees()
    {
        return $this->hasMany(StudentReferee::class);
    }

    public function workDetails()
    {
        return $this->hasMany(StudentWorkDetail::class);
    }

    public function documents()
    {
        return $this->hasMany(StudentDocument::class);
    }
}
