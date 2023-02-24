<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use App\Models\Song;
use App\Models\User;
use App\Models\Playlist;

class SongController extends Controller
{
    
    //hier worden alle songs opgehaald en verstuurd naar een bijhorende genre
    public function index($id) {
        
        $songs = Song::get();

        $playlists = Playlist::get();
        $data = array();
        if(Session::has('loginId')){

            $getID = new SessionController();
            $userID = $getID->getID();
            $data = User::where('id', '=', $userID)->first();
            $playlistName = Session::get('playlist');
            
        }
        
        return view('genres', ['songs' => $songs], compact('id', 'data', 'playlists', 'userID'));

    }
}
