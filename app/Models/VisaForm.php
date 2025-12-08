<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisaForm extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'birth_place', 'birth_date', 'marital_status',
        'address', 'district', 'sub_district', 'city', 'province', 'postal_code',
        'home_phone', 'mobile_phone', 'email',
        'company_name', 'company_address', 'company_city', 'company_province',
        'company_postal_code', 'company_phone', 'employment_start', 'job_position',
        'coworker_name', 'coworker_phone',
        'education_school', 'education_major',
        'spouse_name', 'spouse_birth_date',
        'father_name', 'father_birth_date',
        'mother_name', 'mother_birth_date',
        'child_name', 'child_birth_date',
        'relative_name', 'relative_relationship', 'relative_phone', 'relative_email',
        'active_visa', 'visa_rejected', 'visa_reject_reason', 'travel_history'
    ];

    public function documents()
    {
        return $this->hasMany(VisaFormDocument::class,'visa_id');
    }

}
