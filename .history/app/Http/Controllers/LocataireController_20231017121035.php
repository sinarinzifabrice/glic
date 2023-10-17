<?php

namespace App\Http\Controllers;

use App\Models\Locataire;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class LocataireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */

    public function index():View
    {
        return view('Locataire.ListedesLocataires', ['locataires' => Locataire::all()]);
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        return view('Locataire.AjouterLocataire');
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse

     */
    public function store(Request $request):RedirectResponse
    {
        $this->validateLocataire($request);
        Locataire::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'emailcontact' => $request->emailcontact,
            'telephone' => $request->telephone,
            'nomentreprise' => $request->nomentreprise,

        ]);
        return redirect()->route('locataires.index')->with('statut', "Le locataire a été créer.");

    }

    /**
     * Display the specified resource.
     * @param  \App\Models\Locataire  $locataire
     * @return View

     */
    public function show(Locataire $locataire): View
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Locataire $locataire)
    {
        
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Locataire $locataire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Locataire $locataire)
    {
        //
    }
}
