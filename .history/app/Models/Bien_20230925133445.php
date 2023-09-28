<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    use HasFactory;

    // Fillabale nous permet d'inserrer les donnée reçu dans la requête
    protected $fillable = ['loyer', 'numappartement', 'numrue', 'nomrue', 'quartier', 'ville', 'statut'];


}
