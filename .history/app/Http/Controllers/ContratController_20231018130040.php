<?php

namespace App\Http\Controllers;

use App\Models\Contrat;
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
    public function create(): View
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
