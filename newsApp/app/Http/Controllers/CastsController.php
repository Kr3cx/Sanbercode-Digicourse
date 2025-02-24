<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CastsController extends Controller
{
    public function create()
    {
        return view('casts.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|min:3|max:40',
                'age' => 'required',
                'bio' => 'required',
            ],
            [
                'required' => 'Inputan :attribute harus diisi!.',
                'min' => 'Inputan :attribute minimal 3 Karakter!.',
                'max' => 'Inputan :attribute maximal 40 Karakter!.'

            ]
        );
        DB::table('casts')->insert([
            'name' => $request->input('name'),
            'age' => $request->input('age'),
            'bio' => $request->input('bio')

        ]);

        return redirect('/casts');
    }

    public function index()
    {
        $casts = DB::table('casts')->get();

        return view('casts.index', ['casts' => $casts]);

    }

    public function show($id)
    {
        $casts = DB::table('casts')->find($id);

        return view('casts.detail', ['casts' => $casts]);
    }

    public function edit($id)
    {
        $casts = DB::table('casts')->find($id);

        return view('casts.edit', ['casts' => $casts]);
    }


    public function update($id, Request $request)
    {

        $request->validate(
            [
                'name' => 'required|min:3|max:40',
                'age' => 'required',
                'bio' => 'required',
            ],
            [
                'required' => 'Inputan :attribute harus diisi!.',
                'min' => 'Inputan :attribute minimal 3 Karakter!.',
                'max' => 'Inputan :attribute maximal 40 Karakter!.'

            ]
        );

        $query = DB::table('casts')
            ->where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'age' => $request->input('age'),
                'bio' => $request->input('bio')
            ]);
        return redirect('/casts');
    }


    public function destroy(string $id)
    {
        $casts = DB::table('casts')->where('id', $id)->delete();


        return redirect("/casts");
    }

}
