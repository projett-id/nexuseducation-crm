<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramTypes extends Model
{
    use HasFactory;
    protected $connection = 'db_compro';
    protected $fillable = ['title', 'country_id', 'content'];
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
