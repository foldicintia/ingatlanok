<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategoriak;

class KategoriakController extends Controller
{
    // 1. Összes kategória lekérdezése
    public function index()
    {
        $Kategoriakk = Kategoriak::all();
        return response()->json($Kategoriakk);
    }

    // 2. Új kategória létrehozása
    public function store(Request $request)
    {
        $request->validate([
            'nev' => 'required|string|max:255',
        ]);

        $Kategoriak = Kategoriak::create($request->all());
        return response()->json($Kategoriak, 201);
    }

    // 3. Egy adott kategória lekérdezése ID alapján
    public function show($id)
    {
        $Kategoriak = Kategoriak::findOrFail($id);
        return response()->json($Kategoriak);
    }

    // 4. Kategória frissítése
    public function update(Request $request, $id)
    {
        $Kategoriak = Kategoriak::findOrFail($id);

        $request->validate([
            'nev' => 'required|string|max:255',
        ]);

        $Kategoriak->update($request->all());
        return response()->json($Kategoriak);
    }

    // 5. Kategória törlése
    public function destroy($id)
    {
        $Kategoriak = Kategoriak::findOrFail($id);
        $Kategoriak->delete();
        return response()->json(['message' => 'Kategória törölve']);
    }
}

