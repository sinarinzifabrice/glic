<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class BienController extends Controller
{
    /**
     * Affichage de la liste des biens.
     *
     * @return View
     */
    public function index(): View
    {
        return view('Bien.ListedeBien', ['biens' => Bien::all()]);
    }

    /**
     * Affiche le formulaire
     * pour ajouter un bien
     */
    public function create(): View
    {
        return view('Bien.AjouterBien');
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
        return view('Bien.Bien', ['bien' => $bien]);
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bien  $bien
     * @return View
     */
    public function edit(Bien $bien): View
    {
        return view('Bien.ModifierBien', ['bien' => $bien]);
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

        
        // try {
        //     $filename = $request->photo->getClientOriginalName();
        //     $request->file('photo')->storeAs(
        //         'images',
        //         $filename,
        //         'public'
        //     );
        // } catch (\Throwable $e) {

        //     $filename = 'pas-de-photo.jpg';
        // }

        $bien->loyer = $request->loyer;
        $bien->numappartement = $request->numappartement;
        $bien->numrue = $request->numrue;
        $bien->nomrue = $request->nomrue;
        $bien->quartier = $request->quartier;
        $bien->ville = $request->ville;
        $bien->statut = $request->boolean('statut');
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
        $bien->delete();
        flash()->addSuccess('Le bien a été supprimé.');
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
