<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use App\Models\Song;
use App\Models\User;

class SongController extends Controller
{
    


    public function index($id) {
        
        $songs = Song::get();


        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id', '=', Session::get('loginId'))->first();
            $playlistName = Session::get('playlist');
            
        }
        
        return view('genres', ['songs' => $songs], compact('id', 'data', 'playlistName'));

    }
}
