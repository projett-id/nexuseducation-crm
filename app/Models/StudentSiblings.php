<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSiblings extends Model
{
    use HasFactory;
    protected $fillable = ['student_id','name','gender','birthdate'];
}
