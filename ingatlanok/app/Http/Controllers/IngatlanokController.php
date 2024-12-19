<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingatlanok;

class IngatlanokController extends Controller
{
    // 1. Összes ingatlan lekérdezése
    public function index()
    {
        $ingatlanok = Ingatlanok::with('kategoria')->get();
        return response()->json($ingatlanok);
    }

    // 2. Új ingatlan létrehozása
    public function store(Request $request)
    {
        $request->validate([
            'kategoria' => 'required|exists:kategoriak,id',
            'leiras' => 'required|string',
            'hirdetesDatum' => 'nullable|date',
            'tehermentes' => 'required|boolean',
            'ar' => 'required|integer',
            'kepUrl' => 'nullable|string',
        ]);

        $ingatlan = Ingatlanok::create($request->all());
        return response()->json($ingatlan, 201);
    }

    public function show($id)
    {
        $ingatlan = Ingatlanok::with('kategoria')->findOrFail($id);
        return response()->json($ingatlan);
    }


    public function update(Request $request, $id)
    {

        $ingatlan = Ingatlanok::findOrFail($id);

        $request->validate([
            'kategoria' => 'nullable|exists:kategoriak,id',
            'leiras' => 'nullable|string',
            'hirdetesDatum' => 'nullable|date',
            'tehermentes' => 'nullable|boolean',
            'ar' => 'nullable|integer',
            'kepUrl' => 'nullable|string',
        ]);
    

        $ingatlan->update($request->all());
    

        return response()->json($ingatlan);
    }


    public function destroy($id)
    {
        $ingatlan = Ingatlanok::findOrFail($id);
        $ingatlan->delete();
        return response()->json(['message' => 'Ingatlan törölve']);
    }
}

