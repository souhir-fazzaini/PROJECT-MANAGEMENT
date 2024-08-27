<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    use HasFactory;
    protected $table='Communes';

    protected $fillable=[
        'id',
        'id_gouvernorat',
        'nom_commune_fr	',
        'nom_commune_ar	',
        
       
    ];
}
