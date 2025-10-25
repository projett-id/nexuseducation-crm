<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerSchoolSection extends Model
{
    use HasFactory;
    protected $connection = 'db_compro';
    protected $table = 'partner_schools_sections';
    protected $fillable = ['partner_schools_id', 'title', 'content'];
    
    public function partnerSchool()
    {
        return $this->belongsTo(PartnerSchool::class, 'partner_schools_id');
    }

}
