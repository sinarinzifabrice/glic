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
}
