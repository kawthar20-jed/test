<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // Affiche une liste des articles
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    // Montre un formulaire pour créer un nouvel article
    public function create()
    {
        return view('articles.create');
    }

    // Enregistre un nouvel article dans la base de données
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'author' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $article = Article::create($validatedData);

        return redirect()->route('articles.index')->with('success', 'Article créé avec succès');
    }

    // Affiche un article spécifique
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }

    // Montre un formulaire pour éditer un article existant
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article'));
    }

    // Met à jour un article dans la base de données
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'author' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $article = Article::findOrFail($id);
        $article->update($validatedData);

        return redirect()->route('articles.index')->with('success', 'Article mis à jour avec succès');
    }

    // Supprime un article de la base de données
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Article supprimé avec succès');
    }
}
