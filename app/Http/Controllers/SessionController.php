<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\User;


class SessionController extends Controller
{
    // Hier wordt song aan een session toegevoegd

   

    public function addSongTime(Request $request) {

        if(Session::has('loginId')){
            
            //dd($request['list']);

            $request->session()->push('TimeInPlaylist' , $request['songID']);
        }

        return redirect('dashboard');
    }

    // Met deze functie wordt een geklikte song van een session verdwenen

    

    public function deletePlaylist($id) {
        
        $data = array();
        if(Session::has('loginId')){
            
            $data = User::where('id', '=', Session::get('loginId'))->first();
            $playlistSes = Session::get('TimeInPlaylist');


            
            
            
        
            $arSearch = array_search($id, $playlistSes);

            $sesions = session()->pull('TimeInPlaylist', []);
            //
            
            //unset($playlistSes[$arSearch]);
           // Session::put('TimeInPlaylist', $playlistSes);

            if(($key = array_search($id, $sesions)) !== false ) {
                unset( $sesions[$key]);
                
            }

            session()->put('TimeInPlaylist', $sesions);
            
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





    // Hier wordt een id van ingelogde user van een session opgehaald

   
    public function getID(){

        $id = Session::get('loginId');
        return $id;


    }

    public function deleteUserID() {
        Session::pull('loginId');
    }


    // Hier worden alle opgeslagen songs van een session opgehaald


    public function getAllTempSong() {
        
        $TempInPlaylist = Session::get('TimeInPlaylist');
        
        return $TempInPlaylist;
    }
   


    // Met deze functie worden alle songd van een session verdwenens

   public function deleteAllSongsTemp() {
    Session::pull('TimeInPlaylist'); 
   }

    
}
