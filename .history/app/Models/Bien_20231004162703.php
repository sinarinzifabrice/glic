<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    use HasFactory;

    // Fillabale nous permet d'inserrer les donnée reçu dans la requête
    protected $fillable = ['loyer', 'numappartement', 'numrue', 'nomrue', 'quartier', 'ville', 'statut', 'photo', 'typede_bien'];


    public function typede_bien()
    {
        return $this->belongsTo(TypedeBien::class, 'typede_bien', 'id');
    }

    public function bien()
    {
        return $this->hasMany(Contrat::class);
    }

}
