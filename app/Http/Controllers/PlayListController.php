<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Session;
use Hash;
use App\Models\User;
use App\Models\Song;
use App\Models\Playlist;
use App\Models\Between;
use App\Http\Controllers\SessionController;
use DB;

class PlayListController extends Controller
{


    // Hier worden songs van db opgehaal en functies van Session Controller opgeroepen
    public function index() {
        $data = array();
        if(Session::has('loginId')){
           
            $songs = Song::get();
            $getID = new SessionController();
            $userID = $getID->getID();
            $data = User::where('id', '=', $userID)->first();

            $getTempplaylist = new SessionController();
            $Timeplaylists = $getTempplaylist->getAllTempSong();
            
            $selectPlaylists = Playlist::get();

        }
        
        return view('playlists', compact('data', 'Timeplaylists', 'songs', 'selectPlaylists', 'userID'));
        
    }

    // Met deze functie wordt een nieuwe vaste playlist aangemaakt in db en gelijk naar tussen tabel toegevoegd
    public function addPlaylist(Request $request) {
        
        if(Session::has('loginId')){
            
            $newPlaylist = Playlist::get();
                           

                $playlist = new Playlist;
                $playlist->name = $request->name;

                $getID = new SessionController();
                $userID = $getID->getID();
                $playlist->user_id = $userID;
                $playlist->save();

                

                $selectedSongs = new SessionController();
                $selectedSongs->getAllTempSong();
                $maxId = Playlist::max('id');


                foreach( $selectedSongs as $selected) {

                $between = new Between;

                $between->playlist_id = $maxId;
                $between->song_id = $selected;
                
                $between->save();
                
                }

                $sessionController = new SessionController();

                $sessionController->deleteAllSongsTemp();
        }

            /*
            $item = [
                'name' => $request['name']
            ];
            */
            
           // $request->session()->push('Timeplaylists', $item);
            return redirect('playlists');
             
        
    }


    //Hier wordt playlist db opgehaald met ingeloogde gebruiker id om bijhoorende playlists te selecteren
    public function selectedPlaylist($id) {

        $data = array();
        if(Session::has('loginId')){

            $getID = new SessionController();
            $userID = $getID->getID();
            $data = User::where('id', '=', $userID)->first();
            $betweens = Between::get();
            $songs = Song::get();
            $playlists = Playlist::get();
            
        }    
        return view('playlist', compact('data', 'id', 'betweens', 'playlists', 'songs', 'userID'));
    }


    //Met deze functie wordt een geklikte song van een vaste playlist verdwenen 
    public function deletePlaylistSong($idSong, $list){

      
        Between::where([
            ['playlist_id', '=', $list],
            ['song_id', '=', $idSong]

        ])->delete();
            
        return redirect('playlist/'. $list);

    }

    //Hier wordt hele vaste playlist verdwenen 
    public function deleteList($list) {
        Between::where('playlist_id', '=', $list)->delete();
        Playlist::where('id', '=', $list)->delete();

        return redirect('playlists');
    }


    //Hier wordt een ophehaalde naam van een playlist veranderd
    public function updateName($id, Request $request) {
        
        //dd($request->name);
        Playlist::where('id', '=', $id)->update(['name'=> $request->name]);

     
        return redirect('playlist/'. $id);
    }

    //Met deze functie wordt een song toegevoegd aan een vaste playlist
    public function addtoPlaylist(Request $request) {

        $data = array();
        if(Session::has('loginId')){


            $getID = new SessionController();
            $userID = $getID->getID();
            $data = User::where('id', '=', $userID)->first();
            $between = new Between;

            $between->playlist_id = $request['toPlaylists'];
            $between->song_id = $request['songID2'];
            
            $between->save();
        }
        return redirect('dashboard');
    }

    // Hier wordt bereken totaale duur van een playlist
    public function berekenen($id) {


        if(Session::has('loginId')){


            $getID = new SessionController();
            $userID = $getID->getID();
            $data = User::where('id', '=', $userID)->first();
            $total = DB::select("SELECT SUM(lenght) FROM songs JOIN betweens ON songs.id=betweens.song_id && betweens.playlist_id = $id;");
                       
            $sumString = 'SUM(lenght)';
            $childTotal = $total[0];
            $array = json_decode(json_encode($total[0]), true);
            //$key = array_search('+"SUM(lenght)"', $childTotal);
           // dd($array[$sumString]);
            $arraySum = $array[$sumString];

            //print_r($arraySum);
        }

        return redirect('playlist/'. $id);
        
    }
    
}
