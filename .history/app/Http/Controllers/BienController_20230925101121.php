<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

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
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('Bien.AjouterBien');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validateBien($request);
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
        ]);

        return redirect()->route('bien.index')->with('statut', "Le bien a été créer.");
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

    public function validateBien(Request $request): array
    {
        return $request->validate([
            'loyer' => ['required', 'integer'],
            'numappartement' => ['required', 'integer'],
            'numrue' => ['required', 'integer'],
            'nomrue' => ['required', 'string'],
            'quartier' => ['required', 'string'],
            'ville' => ['required', 'string'],


        ]);
    }
}
