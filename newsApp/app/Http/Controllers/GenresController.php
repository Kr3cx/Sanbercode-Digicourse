<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genres;

class GenresController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }


    public function index()
    {
        $genres = Genres::all();
        return view('genres.index', compact('genres'));

    }


    public function create()
    {
        return view('genres.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            [
                'name' => 'required|min:3|max:40',
            ],
            [
                'required' => 'Inputan :attribute harus diisi!.',
                'min' => 'Inputan :attribute minimal 3 Karakter!.',
                'max' => 'Inputan :attribute maximal 40 Karakter!.'

            ]
        ]);

        $genres = Genres::create($request->all());

        return redirect()->route('genres.index')->with('success', 'Genre created successfully');
    }


    public function show(string $id)
    {
        $genres = Genres::findOrFail($id);
        return view('genres.detail', compact('genres')); // Tampilkan view detail genre
    }


    public function edit(string $id)
    {
        $genres = Genres::findOrFail($id);
        return view('genres.edit', ['genres' => $genres]);
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:50',
        ]);

        $genres = Genres::findOrFail($id);
        $genres->update($request->all());

        return redirect()->route('genres.index')->with('success', 'Genre created successfully');
    }


    public function destroy(string $id)
    {
        $genres = Genres::findOrFail($id);
        $genres->delete();

        return redirect("/genres")->with('success', 'Genre deleted successfully');
    }
}
