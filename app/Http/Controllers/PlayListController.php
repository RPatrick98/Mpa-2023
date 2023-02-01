<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Hash;
use App\Models\User;
use App\Models\Song;

class PlayListController extends Controller
{

    public function index() {
        $data = array();
        if(Session::has('loginId')){
            $songs = Song::get();
            $data = User::where('id', '=', Session::get('loginId'))->first();
            $Timeplaylists = Session::get('TimeInPlaylist', 'songs');

        }
        
        return view('playlists', compact('data', 'Timeplaylists', 'songs'));
        
    }
/*
    public function addPlaylist(Request $request) {
        
        if(Session::has('loginId')){

            $item = [
                'name' => $request['name']
            ];
            
            $request->session()->push('Timeplaylists', $item);
            return redirect('playlists');
            
            
            
        }
    
        
        
    }

*/
    public function deletePlaylist($id) {
        
        $data = array();
        if(Session::has('loginId')){
            
            $data = User::where('id', '=', Session::get('loginId'))->first();
            $playlistSes = Session::get('TimeInPlaylist');


            $sesions = session()->pull('TimeInPlaylist', []);
            
            
        
            $arSearch = array_search($id, $playlistSes);


            $getSongs = $playlistSes = Session::get('InPlayList');
            
            
            //
            
            unset($playlistSes[$arSearch]);
            Session::put('InPlayList', $playlistSes);

            
            if(($key = array_search($arSearch, $sesions)) !== false ) {
                unset( $sesions[$key]);
            }

            session()->put('playlists', $sesions);
            
            //dd( $playlistSes);
           // unset($playlistSes[$arSearch] );
           // Session::pull('playlist.'.$arSearch);
           return redirect('playlists');
        }

        /*
        
         
        
        
        
        for($x = 0; $x < $lenght; $x++) {
            $playListArray = $playlistSes[$x];
            if($playListArray == $name) {

            }
            
        }
        
       
        */

        

    }

    public function addSongTime(Request $request) {

        if(Session::has('loginId')){
            
            //dd($request['list']);

            $request->session()->push('TimeInPlaylist' , $request['songID']);
        }

        return redirect('dashboard');
    }
    
}
