<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    public function index()
    {
        $music = Music::all();
        return view('music.index', compact('music'));
    }

    public function create()
    {
        return view('music.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
        ]);

        Music::create([
            'name' => $request->name,
            'artist' => $request->artist,
            'genre' => $request->genre,
        ]);

        return redirect()->route('music.index')->with('success', 'Music added successfully!');
    }

    public function destroy($id)
    {
        $music = Music::findOrFail($id);
        $music->delete();

        return redirect()->route('music.index')->with('success', 'Music deleted successfully.');
    }

    public function edit($id)
    {
        $music = Music::findOrFail($id);
        return view('music.edit', compact('music'));
    }

    /**
     * Update the specified music entry in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
        ]);

        $music = Music::findOrFail($id);
        $music->update($validated);

        return redirect()->route('music.index')->with('success', 'Music updated successfully.');
    }
}