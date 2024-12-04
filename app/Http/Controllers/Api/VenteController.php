<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Detail_vente;
use App\Models\Vente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class VenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $total = 0.00;
        foreach ($data as $item) {
            $total += $item["sous_total"];
        }
        $now = Date::now();
        $vente = Vente::create([
            'date_vente' => $now,
            'total' => $total,
        ]);

        $vente_id = $vente->id;

        foreach ($data as $item) {
            Detail_vente::create([
                'vente_id' => $vente_id,
                'produit_id' => $item["produit_id"],
                'quantite' => $item["quantite"],
                'prix_unitaire' => $item["prix_unitaire"],
                'sous_total' => $item["sous_total"],
            ]);
        }

        return response()->json(['message' => 'Vente créée avec succès'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Vente $vente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vente $vente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vente $vente)
    {
        //
    }
}
