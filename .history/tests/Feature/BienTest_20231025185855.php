<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BienTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_Affiche_une_liste_de_biens(): void
    {
        // Créer un crayon avec les propriétés spécifiées
        $crayon = Bien::create([
            'type' => 'Crayon de rose',
            'marque' => 'vel',
            'couleur' => 'LightPink',
            'quantite' => 1,
            'prix' => 34,
        ]);

        // Visitez la route "/"
        $response = $this->get('/');

        // Vérifiez si la réponse contient le nombre attendu de crayons dans la base de données
        $response->assertStatus(200);

        // Vérifie si la vue contient le texte "Crayon de rose", s'assurant ainsi que l'objet "Crayon" a été affiché
        $response->assertSee('Crayon de rose');

        // Vérifie si la vue a reçu la variable "crayons" et que cette variable contient l'objet "Crayon" créé
        $response->assertViewHas('crayons', function($collection) use ($crayon){
            return $collection->contains($crayon);
        });



    }
}
