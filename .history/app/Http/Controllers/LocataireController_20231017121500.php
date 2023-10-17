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
        return view('Locataire.Locataire', ['locataire' => $locataire]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\Locataire  $locataire
     * @return View

     */
    public function edit(Locataire $locataire): View
    {
        return view('Locataire.ModifierLocataire', ['locataire' => $locataire]);
    }


    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Locataire  $locataire
     * @return RedirectResponse

     */
    public function update(Request $request, Locataire $locataire):RedirectResponse
    {
        $this->validateLocataire($request);
        $locataire->nom = $request->nom;
        $locataire->prenom = $request->prenom;
        $locataire->email = $request->email;
        $locataire->emailcontact = $request->emailcontact;
        $locataire->telephone = $request->telephone;
        $locataire->nomentreprise = $request->nomentreprise;
        $locataire->save();
        
        return redirect()->route('locataires.index')->with('statut', "Le locataire a été modifié.");

    }

    /**
     * Remove the specified resource from storage.
     * @param  Locataire  $locataire
     * @return RedirectResponse

     */
    public function destroy(Locataire $locataire)
    {
        $locataire->delete();
        flash()->addSuccess('la suppression du locataire a été bien effectuée.');
        return redirect()->route('locataires.index');

    }

    public function validateLocataire(Request $request): array
    {
        return $request->validate([
            'nom' => ['required', 'string'],
            'prenom' => ['required', 'string'],
            'email' => ['required', 'email'],
            'emaildecontact' => ['required', 'email'],
            'telephone' => ['required', 'string'],
            'nomentreprise' => ['string'],


        ]);
    }

}
