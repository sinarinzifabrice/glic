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
        // Créer un bien avec les propriétés spécifiées
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

        // Vérifie si la vue contient le texte "rue jean", s'assurant ainsi que l'objet "Bien" a été affiché
        $response->assertSee('rue jean');



    }

    public function test_Affiche_un_formulaire_pour_creer_un_bien(){
        // Visitez la route "bien/create"
        // pour afficher la vue du formulaire
        $response = $this->get('/bien/create');

        // Vérifiez si la vue contient
        // un formulaire pour créer un bien
        $response->assertStatus(200);

        // Obtenir le contenu de la réponse HTTP
        // sous forme de texte
        $content = $response->getContent();

        // Vérifiez que les noms des champs correspondent aux propriétés du modèle Crayon
        $response->assertSee('<form', false); // Vérifiez la présence de la balise <form> sans l'analyser en tant que balise HTML complète
        $this->assertStringContainsString('name="loyer"', $content);
        $this->assertStringContainsString('name="marque"', $content);
        $this->assertStringContainsString('name="couleur"', $content);
        $this->assertStringContainsString('name="quantite"', $content);
        $this->assertStringContainsString('name="prix"', $content);
    }
}
