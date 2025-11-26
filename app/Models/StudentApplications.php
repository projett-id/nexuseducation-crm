<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentApplications extends Model
{
    use HasFactory;
    protected $fillable = ['student_id','country','level_of_study','programme','last_status','institution_name','start_date'];

    public function students(){
        return $this->belongsTo(Student::class,'student_id');
    }

    public function histories(){
        return $this->hasMany(StudentApplicationHistory::class,'application_id');
    }
}
