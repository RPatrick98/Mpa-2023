<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use App\Models\Song;
use App\Models\User;
use App\Models\Playlist;

class SongController extends Controller
{
    


    public function index($id) {
        
        $songs = Song::get();

        $playlists = Playlist::get();
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id', '=', Session::get('loginId'))->first();
            $playlistName = Session::get('playlist');
            $getID = app('App\Http\Controllers\SessionController')->getID();
            
        }
        
        return view('genres', ['songs' => $songs], compact('id', 'data', 'playlists', 'getID'));

    }
}
