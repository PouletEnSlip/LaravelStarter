<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

class LivreController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'category' => 'required',
            'year' => 'required'
        ]);

        $livre = new Book();
        $livre->title = $request->input('title');
        $livre->author = $request->input('author');
        $livre->category_id = $request->input('category');
        $livre->year = $request->input('year');
        $livre->save();

        return redirect('/livres')->with('success', 'Livre ajouté avec succès.');
    }

    public function edit(Book $livre)
    {
        $categories = Category::all();
        return view('livres.edit', compact('livre', 'categories'));
    }

    public function update(Request $request, Book $livre)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'category' => 'required',
            'year' => 'required'
        ]);

        $livre->title = $request->input('title');
        $livre->author = $request->input('author');
        $livre->category_id = $request->input('category');
        $livre->year = $request->input('year');
        $livre->save();

        return redirect('/livres')->with('success', 'Livre modifié avec succès.');
    }

    public function destroy(Book $livre)
    {
        $livre->delete();

        return redirect('/livres')->with('success', 'Livre supprimé avec succès.');
    }
}
