<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Session;
use Hash;
use App\Models\User;
use App\Models\Song;
use App\Models\Playlist;
use App\Models\Between;
use DB;

class PlayListController extends Controller
{

    public function index() {
        $data = array();
        if(Session::has('loginId')){
            $beetwens = Between::get();
            $songs = Song::get();
            $getID = app('App\Http\Controllers\SessionController')->getID();
            $data = User::where('id', '=', $getID)->first();
            $Timeplaylists = app('App\Http\Controllers\SessionController')->getAllTempSong();
            
            $selectPlaylists = Playlist::get();

        }
        
        return view('playlists', compact('data', 'Timeplaylists', 'songs', 'selectPlaylists', 'getID'));
        
    }

    public function addPlaylist(Request $request) {
        
        if(Session::has('loginId')){
            
            $newPlaylist = Playlist::get();
                           

                $playlist = new Playlist;
                $playlist->name = $request->name;
                $playlist->user_id = app('App\Http\Controllers\SessionController')->getID();
                $playlist->save();

                

                $selectedSongs = app('App\Http\Controllers\SessionController')->getAllTempSong();
                $maxId = Playlist::max('id');


                foreach( $selectedSongs as $selected) {

                $between = new Between;

                $between->playlist_id = $maxId;
                $between->song_id = $selected;
                
                $between->save();
                
                }

                app('App\Http\Controllers\SessionController')->deleteAllSongsTemp();
        }

            /*
            $item = [
                'name' => $request['name']
            ];
            */
            
           // $request->session()->push('Timeplaylists', $item);
            return redirect('playlists');
            
            
            
        
    
        
        
    }


   

    

    public function selectedPlaylist($id) {

        $data = array();
        if(Session::has('loginId')){
            $getID = app('App\Http\Controllers\SessionController')->getID();
            $data = User::where('id', '=', $getID)->first();
            $betweens = Between::get();
            $songs = Song::get();
            $playlists = Playlist::get();
            
        }    
        return view('playlist', compact('data', 'id', 'betweens', 'playlists', 'songs', 'getID'));
    }



    public function deletePlaylistSong($idSong, $list){

      
        Between::where([
            ['playlist_id', '=', $list],
            ['song_id', '=', $idSong]

        ])->delete();
            
        return redirect('playlist/'. $list);

    }

    public function deleteList($list) {
        Between::where('playlist_id', '=', $list)->delete();
        Playlist::where('id', '=', $list)->delete();

        return redirect('playlists');
    }


    public function updateName($id, Request $request) {
        
        //dd($request->name);
        Playlist::where('id', '=', $id)->update(['name'=> $request->name]);

     
        return redirect('playlist/'. $id);
    }

    public function addtoPlaylist(Request $request) {

        $data = array();
        if(Session::has('loginId')){

            $getID = app('App\Http\Controllers\SessionController')->getID();
            $data = User::where('id', '=', $getID)->first();
            $between = new Between;

            $between->playlist_id = $request['toPlaylists'];
            $between->song_id = $request['songID2'];
            
            $between->save();
        }
        return redirect('dashboard');
    }

    public function berekenen($id) {


        if(Session::has('loginId')){
            $getID = app('App\Http\Controllers\SessionController')->getID();
            $data = User::where('id', '=', $getID)->first();
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
