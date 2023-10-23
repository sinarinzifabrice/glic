<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Bien;
use App\Models\Contrat;
use App\Models\Locataire;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ContratController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index(): View
    {
        return view('Contrat.ListedesContrat', ['contrats' => Contrat::all()]);

    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create():View
    {
        return view('Contrat.AjouterContrat', ['biens' => Bien::where('statut', '==', false)->get(), 'locataires' => Locataire::all()]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validateContrat($request);

        $contratData = [
            'datedebut' => $request->datedebut,
            'datefin' => $request->datefin,
            'approuve' => $request->boolean('approuve'),
            'bien' => $request->bien,
            'locataire' => $request->locataire,
        ];

        // Vérifie si le contrat est approuve
        if ($contratData['approuve']) {
        // Mettre à jour le statut du bien à 1
        Bien::where('id', $contratData['bien'])->update(['statut' => 1]);
        }

        Contrat::create([
            'datedebut' => $request->datedebut,
            'datefin' => $request->datefin,
            'approuve' => $request->boolean('approuve'),
            'bien' => $request->bien,
            'locataire' => $request->locataire,

        ]);

        flash()->addSuccess('Le contrat a été crée.');
        return redirect()->route('contrats.index');


    }

    /**
     * Display the specified resource.
     * @param  \App\Models\Contrat  $contrat
     * @return View
     */
    public function show(Contrat $contrat): View
    {
        return view('Contrat.Contrat', ['contrat' => $contrat, 'bien' => Bien::all(), 'locataire' => Locataire::all()]);

    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\Contrat  $contrat
     * @return View
     */
    public function edit(Contrat $contrat): View
    {
        return view('Contrat.ModifierContrat', ['contrat' => $contrat, 'biens' => Bien::all(), 'locataires' => Locataire::all()]);

    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contrat  $contrat
     * @return RedirectResponse
     */
    public function update(Request $request, Contrat $contrat): RedirectResponse
    {
        $this->validateContrat($request);
        $contrat->datedebut = $request->datedebut;
        $contrat->datefin = $request->datefin;
        $contrat->approuve = $request->boolean('approuve');
        $contrat->bien = $request->bien;
        $contrat->locataire = $request->locataire;
        $contrat->save();

        // Vérifier si approuve est true avant de mettre à jour le statut du bien
        if ($contrat->approuve) {
            $bien = Bien::find($request->bien);
            if ($bien) {
                $bien->statut = 1;
                $bien->save();
            }
        }
        flash()->addSuccess('Le contrat a été modifié.');
        return redirect()->route('contrats.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\Contrat  $contrat
     * @return RedirectResponse
     */
    public function destroy(Contrat $contrat): RedirectResponse
    {
        $contrat->delete();

        flash()->addSuccess('la suppression du contrat a été bien effectuée.');
        return redirect()->route('contrats.index');
    }


    public function validateContrat(Request $request): array
    {
        return $request->validate([
            'datedebut' => ['required', 'date'],
            'datefin' => [
                'required',
                'date',
                function ($attribute, $value, $fail) use ($request) {
                    // Convertir les dates en objets DateTime
                    $dateDebut = new DateTime($request->input('datedebut'));
                    $dateFin = new DateTime($value);

                    // Calculer la différence en mois
                    $diff = $dateDebut->diff($dateFin);

                    // Vérifier si la différence est inférieure à 6 mois
                    if ($diff->m < 6) {
                        $fail('La date de fin doit être au moins 6 mois après la date de début.');
                    }
                },
            ],
            'bien' => ['required'],
            'locataire' => ['required'],
        ]);
    }
}
