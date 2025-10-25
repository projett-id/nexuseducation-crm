<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentDocument extends Model
{
    use HasFactory;
    protected $table="documents";
    protected $fillable = [
        'student_id',
        'document_master_id',
        'file_path',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function documentMaster()
    {
        return $this->belongsTo(MasterDocument::class);
    }
}
