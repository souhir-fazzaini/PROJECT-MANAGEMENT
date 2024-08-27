<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gouvernorat extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nom_gouvernorat_fr',
        'nom_gouvernorat_ar',
    ];
}
