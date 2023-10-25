<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use App\Models\TypedeBien;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\QueryException;

class BienController extends Controller
{
    /**
     * Affichage de la liste des biens.
     *
     * @return View
     */
    public function index(): View
    {
        return view('Bien.ListedeBien', ['biens' => Bien::orderBy('created_at', 'desc')->get()]);
    }

    /**
     * Affiche le formulaire
     * pour ajouter un bien
     */
    public function create(): View
    {
        return view('Bien.AjouterBien', ['types' => TypedeBien::all()]);
    }

    /**
     *
     * Ajout du bien dans la base de donnée.
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validateBien($request);

        try {
            $filename = $request->photo->getClientOriginalName();
            $request->file('photo')->storeAs(
                'images',
                $filename,
                'public'
            );
        } catch (\Throwable $e) {

            $filename = 'pas-de-photo.jpg';
        }


        Bien::create([
            'loyer' => $request->loyer,
            'numappartement' => $request->numappartement,
            'numrue' => $request->numrue,
            'nomrue' => $request->nomrue,
            'codepostale' => $request->codepostale,
            'ville' => $request->ville,
            'quartier' => $request->quartier,
            'typede_bien' => $request->typede_bien,
            'province' => $request->province,
            'statut' => $request->boolean('statut'),
            'photo' => $filename,
        ]);
        flash()->addSuccess('Le bien a été crée.');
        return redirect('bien');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bien $bien)
    {
        return view('Bien.Bien', ['bien' => $bien,['types' => TypedeBien::all()]]);
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bien  $bien
     * @return View
     */
    public function edit(Bien $bien): View
    {
        return view('Bien.ModifierBien', ['bien' => $bien, 'types' => TypedeBien::all()]);
    }

   /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bien  $bien
     * @return RedirectResponse
     */
    public function update(Request $request, Bien $bien): RedirectResponse
    {
        $this->validateBien($request);

        if($request->hasFile('photo')){

            $filename = $request->photo->getClientOriginalName();
            $request->file('photo')->storeAs(
                'images',
                $filename,
                'public'
            );

        }else{
            $filename = $bien->photo;
        }


        $bien->loyer = $request->loyer;
        $bien->numappartement = $request->numappartement;
        $bien->numrue = $request->numrue;
        $bien->nomrue = $request->nomrue;
        $bien->quartier = $request->quartier;
        $bien->ville = $request->ville;
        $bien->statut = $request->boolean('statut');
        $bien->photo = $filename;
        $bien->save();

        flash()->addSuccess('Le bien a été modifié.');
        return redirect('bien');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bien  $bien
     * @return RedirectResponse
     */
    public function destroy(Bien $bien): RedirectResponse
    {

        try {
            $bien->delete();
            flash()->addSuccess('Le bien a été supprimé.');
        } catch (QueryException $e) {
            // Gérer l'erreur ici, par exemple, afficher un message d'erreur
            flash()->addError('Impossible de supprimer le bien car il est rattaché à un contrat.');
        }

        return redirect()->route('bien.index');
    }

    public function validateBien(Request $request): array
    {
        return $request->validate([
            'loyer' => ['required', 'integer'],
            'numrue' => ['required', 'integer'],
            'nomrue' => ['required', 'string'],
            'quartier' => ['required', 'string'],
            'ville' => ['required', 'string'],


        ]);
    }
}
