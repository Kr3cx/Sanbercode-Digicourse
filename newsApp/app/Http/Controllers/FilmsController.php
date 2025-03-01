<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Films;
use App\Models\Genres;
use Illuminate\Support\Facades\File;

class FilmsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }


    public function index()
    {
        $films = Films::all();

        return view('films.index', ["films" => $films]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genres::all();

        return view('films.create', ["genres" => $genres]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $request->validate(
            [
                'title' => 'required|min:3|max:40',
                'summary' => 'required',
                'release_year' => 'required',
                'poster' => 'required|image|mimes:png,jpg,jpeg',
                'genre_id' => 'required|exists:genres,id',

            ],
            [
                'required' => 'Inputan :attribute harus diisi!.',
                'min' => 'Inputan :attribute minimal 3 Karakter.',
                'max' => 'Inputan :attribute maximal 40 Karakter.',
                'exists' => 'Inputan :attribute tidak terdaftar.',
                'image' => 'Inputan :attribute harus berupa gambar.'
            ]
        );

        $filmsImageName = time() . '.' . $request->poster->extension();

        $request->poster->move(public_path('uploads'), $filmsImageName);

        $films = new Films;

        $films->title = $request['title'];
        $films->summary = $request['summary'];
        $films->release_year = $request['release_year'];
        $films->genre_id = $request['genre_id'];
        $films->poster = $filmsImageName;

        $films->save();

        return redirect()->route('films.index')->with('success', 'Film created successfully');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $films = Films::find($id);

        return view('films.detail', ["films" => $films]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $films = Films::find($id);
        $genres = Genres::all();

        return view('films.edit', ["films" => $films, "genres" => $genres]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'title' => 'required|min:3|max:40',
                'summary' => 'required',
                'release_year' => 'required',
                'poster' => 'image|mimes:png,jpg,jpeg',
                'genre_id' => 'required|exists:genres,id',

            ],
            [
                'required' => 'Inputan :attribute harus diisi!.',
                'min' => 'Inputan :attribute minimal 3 Karakter.',
                'max' => 'Inputan :attribute maximal 40 Karakter.',
                'exists' => 'Inputan :attribute tidak terdaftar.',
                'image' => 'Inputan :attribute harus berupa gambar.'
            ]
        );

        $films = Films::find($id);

        if ($request->has('poster')) {
            File::delete('uploads/' . $films->poster);

            $filmsImageName = time() . '.' . $request->poster->extension();

            $request->poster->move(public_path('uploads'), $filmsImageName);

            $films->poster = $filmsImageName;

        }

        $films->title = $request['title'];
        $films->summary = $request['summary'];
        $films->release_year = $request['release_year'];
        $films->genre_id = $request['genre_id'];
        $films->update();
        return redirect('/films');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $films = Films::find($id);


        if (!$films) {
            return redirect('/films')->with('error', 'Film tidak ditemukan!');
        }


        if ($films->poster && File::exists(public_path('uploads/' . $films->poster))) {
            File::delete(public_path('uploads/' . $films->poster));
        }


        $films->delete();

        return view('films.show', compact('film', 'reviews'));
    }
}
