<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits = Produit::join('categories', 'produits.categorie_id', '=', 'categories.id')
            ->select('produits.*', 'categories.nom as categorie_nom')
            ->orderBy('categories.nom', 'asc')
            ->get();

        return response()->json($produits);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        foreach ($data as $item) {
            Produit::create([
                'nom' => $item['nom'],
                'description' => $item['description'],
                'code_barre' => $item['code_barre'],
                'prix_unitaire' => $item['prix_unitaire'],
                'stock_disponible' => $item['stock_disponible'],
                'categorie_id' => $item['categorie_id'],
            ]);
        }

        return response()->json(['message' => 'Produits ajoutés avec succès'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($code_barre)
    {
        // Recherche du produit avec le code_barre
        $produit = Produit::where('code_barre', $code_barre)->first();

        // Si le produit n'est pas trouvé, retournez une erreur
        if (!$produit) {
            return response()->json([
                'message' => 'Produit non trouvé'
            ], 404);
        }

        // Retournez le produit trouvé
        return response()->json($produit, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produit $produit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produit $produit)
    {
        //
    }
}
