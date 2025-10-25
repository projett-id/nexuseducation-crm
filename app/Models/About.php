<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $connection = 'db_compro';
    protected $primaryKey = null;
    public $incrementing = false;
    protected $keyType = 'string'; 
    protected $table = 'about';
    protected $fillable = ['address', 'company_name','proprietor','contact_no','email','vision','mission','values','about','link_maps'];
    protected $casts = [
        'values' => 'array',
    ];
}