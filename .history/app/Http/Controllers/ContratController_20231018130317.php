<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use App\Models\Contrat;
use App\Models\Locataire;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
