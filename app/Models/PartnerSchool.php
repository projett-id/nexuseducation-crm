<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerSchool extends Model
{
    use HasFactory;
    protected $connection = 'db_compro';
    protected $fillable = ['country_id', 'logo', 'name','location', 'website', 'maps','banner_header','slug'];
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function sections()
    {
        return $this->hasMany(PartnerSchoolSection::class, 'partner_schools_id');
    }

}
