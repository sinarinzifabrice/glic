<?php

namespace App\Http\Controllers;

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
        Contrat::create([
            'datedebut' => $request->datedebut,
            'datefin' => $request->datefin,
            'approuve' => $request->boolean('approuve'),
            'bien' => $request->bien,
            'locataire' => $request->locataire,

        ]);

        return redirect()->route('contrats.index')->with('statut', "Le contrat a été créer.");


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

        return redirect()->route('contrats.index')->with('statut', "Le contrat a été modifié.");
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\Contrat  $contrat
     * @return RedirectResponse
     */
    public function destroy(string $id)
    {
        //
    }
}
