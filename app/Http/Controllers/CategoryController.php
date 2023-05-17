<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required'
        ]);

        $categorie = new Category();
        $categorie->label = $request->input('label');
        $categorie->save();

        return redirect('/categories')->with('success', 'Catégorie ajoutée avec succès.');
    }

    public function edit(Category $categorie)
    {
        return view('categories.edit', compact('categorie'));
    }

    public function update(Request $request, Category $categorie)
    {
        $request->validate([
            'label' => 'required'
        ]);

        $categorie->label = $request->input('label');
        $categorie->save();

        return redirect('/categories')->with('success', 'Catégorie modifiée avec succès.');
    }

    public function destroy(Category $categorie)
    {
        $categorie->delete();

        return redirect('/categories')->with('success', 'Livre supprimé avec succès.');
    }
}
