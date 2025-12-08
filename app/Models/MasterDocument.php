<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterDocument extends Model
{
    use HasFactory;
    protected $fillable = [
        'form_type',
        'document_name',
        'document_type',
        'description',
        'allowed_file_type',
        'max_file_size',
        'max_number_of_documents',
    ];

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}
