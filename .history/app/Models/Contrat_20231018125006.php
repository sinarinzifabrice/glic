<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    use HasFactory;

    // Fillabale nous permet d'inserrer les donnée reçu dans la requête
    protected $fillable = ['datedebut', 'datefin', 'approuve', 'bien', 'locataire'];

    public function bien()
    {
        return $this->belongsTo(Bien::class, 'bien', 'id');
    }
    public function locataire()
    {
        return $this->belongsTo(Locataire::class, 'locataire', 'id');
    }
}
