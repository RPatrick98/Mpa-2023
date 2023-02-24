<?php 



            $total = DB::select("SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(lenght))) FROM songs JOIN betweens ON betweens.song_id=songs.id && betweens.playlist_id = $id;");
            
            
            $sumString = 'SEC_TO_TIME(SUM(TIME_TO_SEC(lenght)))';
            $array = json_decode(json_encode($total[0]), true);
            //$key = array_search('+"SUM(lenght)"', $childTotal);
           // dd($array[$sumString]);
            $arraySum = $array[$sumString];

?>




@include('/layout/header')
<div class="continer">
    <div class="topbar">
        <div class="user-div">{{$data->name}}</div>
    </div>
    <div class="row">
        
        
      
      @foreach($playlists as $playlist)
      @if($playlist->id == $id)
      <div class="in-line">
        <h1>{{$playlist->name}}</h1>


      <!-- Trigger/Open The Modal -->
      <button class="btn btn-block btn-primary" id="myBtn">Naam veranderen</button>

      <p>{{$arraySum}}</p>
     
   
      </div>
      

      <!-- The Modal -->
      <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
          <span class="close">&times;</span>
          <form action="{{url('update-name/'. $id)}}" method="post">
            @csrf
            <div class="form-group">
              <label for="name">Tip een andere naam</label>
              <input type="text" name="name">
            </div>
            <div class="form-group">
              <input class="btn btn-success" type="submit" value="Opslaan">
            </div>
            <label for="name"></label>
            
          </form>
        </div>

      </div>
     

      <div class="grid-3-playlist">
        <h5>Artist</h5>
        <h5>Name</h5>
        <h5>Lenght</h5>
      </div>
      <hr>
      
      @foreach($betweens as $between)
      
      @foreach($songs as $song)
      @if($between->song_id == $song['id'])
      @if($between->playlist_id == $playlist['id'])
      <div class="grid-4-playlist">
        <p>{{$song['artist']}}</p>
        <p>{{$song['name']}}</p>
        <p>{{$song['lenght']}}</p>
        <a class="playlist-btn btn btn-block btn-danger" href="{{url('delete-Playlist-song/'.$song['id'].'/'.$playlist['id'])}}">Delete</a>
      </div>
      @endif
      @endif
      @endforeach
      @endforeach

      @endif
      @endforeach

             
        
            
        
        
    </div>
</div>



<script>
    // Get the modal
    var modal = document.getElementById("myModal");
    
    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");
    
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    
    // When the user clicks the button, open the modal 
    btn.onclick = function() {
      modal.style.display = "block";
    }
    
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
    </script>

    
@include('layout/footer')