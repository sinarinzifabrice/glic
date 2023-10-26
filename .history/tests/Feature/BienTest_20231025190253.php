<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Bien;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BienTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testAllRoutesReturn200()
    {
        $routes = [
            'bien',        // Remplacez 'bien.index' par le nom de la route de votre liste de biens
            'bien.create',       // Remplacez 'bien.create' par le nom de la route pour créer un bien
            'bien.store',        // Remplacez 'bien.store' par le nom de la route pour enregistrer un bien
            'bien.show',         // Remplacez 'bien.show' par le nom de la route pour afficher un bien
            'bien.edit',         // Remplacez 'bien.edit' par le nom de la route pour modifier un bien
            'bien.update',       // Remplacez 'bien.update' par le nom de la route pour mettre à jour un bien
            'bien.destroy',      // Remplacez 'bien.destroy' par le nom de la route pour supprimer un bien
        ];

        foreach ($routes as $route) {
            $response = $this->get(route($route));
            $response->assertStatus(200);
        }
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
