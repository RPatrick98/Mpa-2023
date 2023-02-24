<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Genre;



class GenreController extends Controller
{

    // Hier worden genres opgehaald en naar dashboard (Homepage) verstuurd
    public function index() {
         
        $genres = Genre::get();
        
        return view('dashboard', ['genres' => $genres]);
    }
}
