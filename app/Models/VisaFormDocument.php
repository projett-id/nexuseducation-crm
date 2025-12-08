<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisaFormDocument extends Model
{
    use HasFactory;
    protected $table="visa_form_documents";
    protected $fillable = [
        'visa_id',
        'document_master_id',
        'file_path',
    ];

    public function visaForm()
    {
        return $this->belongsTo(VisaForm::class);
    }

    public function documentMaster()
    {
        return $this->belongsTo(MasterDocument::class);
    }
}
