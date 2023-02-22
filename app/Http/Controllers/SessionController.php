<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\User;


class SessionController extends Controller
{
    // function to add song to session 

   
    public function addSongTime(Request $request) {

        if(Session::has('loginId')){
            
            //dd($request['list']);

            $request->session()->push('TimeInPlaylist' , $request['songID']);
        }

        return redirect('dashboard');
    }

    // function to delete song from the session 

    

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





    // function to get the user id 

   
    public function getID(){

        $id = Session::get('loginId');
        return $id;


    }

    public function deleteUserID() {
        Session::pull('loginId');
    }


    // function to get the playlist from the session 


    public function getAllTempSong() {
        
        $TempInPlaylist = Session::get('TimeInPlaylist');
        
        return $TempInPlaylist;
    }
   
    


    // function to get playlist name from session 
    





   



    // function to delete user id from the session 

   public function deleteAllSongsTemp() {
    Session::pull('TimeInPlaylist'); 
   }

    
}
