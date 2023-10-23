<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locataire extends Model
{
    use HasFactory;

    // Fillabale nous permet d'inserrer les donnée reçu dans la requête
    protected $fillable = ['nom', 'prenom', 'email', 'emailcontact', 'telephone', 'nomentreprise'];

    public function locataire()
    {
        return $this->hasMany(Contrat::class);
    }

}
