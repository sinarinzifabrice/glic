<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BienControllerTest extends TestCase
{

    use RefreshDatabase;


    public function testAllRoutesReturn200()
    {
        $routes = [
            'bien.index',        // Remplacez 'bien.index' par le nom de la route de votre liste de biens
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

    public function test_Affiche_une_liste_de_crayons(): void
    {
        // Créer un crayon avec les propriétés spécifiées
        $crayon = Bien::create([
            'loyer' => 1200,
            'numappartement' => null,
            'numrue' => 23,
            'nomrue' => 'rue jean',
            'ville' => $request->ville,
            'quartier' => $request->quartier,
            'typede_bien' => $request->typede_bien,
            'statut' => 0,
            'photo' => 'pas-de-photo.jpg',
        ]);
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
