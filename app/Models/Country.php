<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $connection = 'db_compro';
    protected $fillable = ['name', 'flag', 'status'];
    // One country has many visas
    public function visas()
    {
        return $this->hasMany(Visa::class);
    }

    // One country has many programs
    public function programs()
    {
        return $this->hasMany(ProgramTypes::class);
    }

    public function partnerSchools()
    {
        return $this->hasMany(PartnerSchool::class, 'country_id');
    }

    public function sections()
    {
        return $this->hasMany(CountrySection::class);
    }
}
