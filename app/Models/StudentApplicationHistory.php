<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentApplicationHistory extends Model
{
    use HasFactory;
    protected $table = 'student_application_history';
    protected $fillable = ['application_id','status','attachment','note'];
}