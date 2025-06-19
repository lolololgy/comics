<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    public function index()
    {
        $comics = auth()->user()->comics;
        return view('comics.index', compact('comics'));
    }

    public function create()
    {
        return view('comics.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'series' => 'nullable|string|max:255',
            'number' => 'nullable|integer',
            'genre' => 'nullable|string|max:255',
            'status' => 'required|in:gelezen,wishlist,in_bezit',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('cover')) {
            $path = $request->file('cover')->store('covers', 'public');
            $validated['cover_path'] = $path;
        }

        auth()->user()->comics()->create($validated);

        return redirect()->route('comics.index')->with('success', 'Comic toegevoegd!');
    }

    public function show(Comic $comic)
    {
        return view('comics.show', compact('comic'));
    }

    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'series' => 'nullable|string|max:255',
            'number' => 'nullable|integer',
            'genre' => 'nullable|string|max:255',
            'status' => 'required|in:gelezen,wishlist,in_bezit',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $comic = Comic::findOrFail($id);

        if ($request->hasFile('cover')) {
            $path = $request->file('cover')->store('covers', 'public');
            $validated['cover_path'] = $path;
        }

        $comic->update($validated);

        return redirect()->route('comics.index')->with('success', 'Comic bijgewerkt.');
    }

    public function destroy(string $id)
    {
        $comic = Comic::findOrFail($id);
        $comic->delete();

        return redirect()->route('comics.index')->with('success', 'Comic verwijderd.');
    }
}
