<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reviews;
use Illuminate\Support\Facades\Auth;
class ReviewsController extends Controller
{
    public function store(Request $request, $film_id)
    {
        $request->validate(

            [
                'content' => 'required|min:3|max:40',
            ],
            [
                'required' => 'Inputan :Konten Review harus diisi!.',
                'min' => 'Inputan :attribute minimal 3 Karakter.',
                'max' => 'Inputan :attribute maximal 100 Karakter.',
            ]
        );
        $user_id = Auth::id();

        $reviews = new Reviews;


        $reviews->content = $request['content'];
        $reviews->point = $request->point;
        $reviews->user_id = $user_id;
        $reviews->film_id = $film_id;


        $reviews->save();

        return redirect('/films');



    }

}
