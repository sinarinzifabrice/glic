<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Bien;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery\Undefined;

class BienTest extends TestCase
{
    /**
     * A basic feature test example.
     */


    public function test_Affiche_une_liste_de_biens(): void
    {
        // Créer un crayon avec les propriétés spécifiées
        $bien = Bien::create([
            'loyer' => 1200,
            'numappartement' =>7,
            'numrue' => 23,
            'nomrue' => 'rue jean',
            'ville' => 'bujumbura',
            'quartier' => 'rohero',
            'typede_bien' => 3,
            'statut' => 0,
            'photo' => 'pas-de-photo.jpg',

        ]);


        // Visitez la route "/"
        $response = $this->get('/');

        // Vérifiez si la réponse contient le nombre attendu de crayons dans la base de données
        $response->assertStatus(200);

        // Vérifie si la vue contient le texte "Crayon de rose", s'assurant ainsi que l'objet "Crayon" a été affiché
        $response->assertSee('rue jean');

        

    }
}
