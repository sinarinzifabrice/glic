<?php

namespace App\Http\Controllers;

use App\Models\TypedeBien;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TypedeBienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('typedebien.ListeTypeBien', ['types' => TypedeBien::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('typedebien.AjouterTypeBien');
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validerType($request);
        TypedeBien::create([
            'type' => $request->type,
        ]);

        return redirect()->route('typedebiens.index')->with('statut', "Le type de bien a été créer.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\TypedeBien  $typedeBien
     * @return View
     */
    public function edit(string $id)
    {
        return view('typedebien.ModifierTypeBien', ['typedebien' => $typedebien]);

    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TypedeBien  $typedeBien
     * @return RedirectResponse
     */
    public function update(Request $request, string $id)
    {
        $request->validate(['type' => ['required']]);
        $typedebien->type = $request->type;
        $typedebien->update();
        return redirect()->route('typedebiens.index')->with('statut', "Le type de bien dont le muméro est $typedebien->id  a été modifié.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }
}
