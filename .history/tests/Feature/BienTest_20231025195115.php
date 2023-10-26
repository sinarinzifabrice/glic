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

        // Vérifiez si la réponse contient le nombre attendu de biens dans la base de données
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

        // Vérifiez que les noms des champs correspondent aux propriétés du modèle Bein
        $response->assertSee('<form', false); // Vérifiez la présence de la balise <form> sans l'analyser en tant que balise HTML complète
        $this->assertStringContainsString('name="loyer"', $content);
        $this->assertStringContainsString('name="numappartement"', $content);
        $this->assertStringContainsString('name="numrue"', $content);
        $this->assertStringContainsString('name="nomrue"', $content);
        $this->assertStringContainsString('name="ville"', $content);
        $this->assertStringContainsString('name="quartier"', $content);
        $this->assertStringContainsString('name="typede_bien"', $content);
        $this->assertStringContainsString('name="statut"', $content);
        $this->assertStringContainsString('name="photo"', $content);

    }

    public function test_Creer_un_bien_avec_toutes_les_valeur_fournies(){

        // Crée un tableau associatif contenant les détails du bien à créer
        $bien = [
            'loyer' => 1200,
            'numappartement' =>7,
            'numrue' => 23,
            'nomrue' => 'rue jean',
            'ville' => 'bujumbura',
            'quartier' => 'rohero',
            'typede_bien' => 3,
            'statut' => 0,
            'photo' => 'pas-de-photo.jpg',
        ];

        // Effectue une requête HTTP POST pour créer un bien avec les détails fournis
        $response = $this->post('biens',$bien);

        // Vérifie si la réponse a un code de statut HTTP 302 (redirection)
        $response->assertStatus(302);

        // Vérifie si la réponse redirige vers la route 'biens'
        $response->assertRedirect('biens');

        // Vérifie si les données du crayon existent dans la base de données
        $this->assertDatabaseHas('biens', $bien);

        // Récupère le dernier crayon de la base de données
        $derniercrayon = Bien::latest()->first();

        // Vérifie si les propriétés du dernier crayon correspondent aux détails fournis
        $this->assertEquals($bien['loyer'], $derniercrayon->loyer);
        $this->assertEquals($bien['typede_bien'], $derniercrayon->prix);

    }
}
