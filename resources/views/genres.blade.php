
@include('/layout/header')
<div class="continer">
    <div class="topbar">
        <div class="user-div">{{$data->name}}</div>
    </div>
    <div class="row">
        <div class="" style="margin-top:20px;">
            <h1>Genres</h1>
            <div class="dasboard-continer">
                <div class="grid-2-dasboard">
                    

                    <div>
                        <img src="" alt="">
                        <div><h4></h4></div>
                        
                    </div>
                    @foreach($songs as $song)
                    @if($song->genre_id == $id)
                    <div class="songs-div-dasboard">
                         <h4>{{$song->artist}}</h4>
                         <p>{{$song->name}}</p>
                         <p>{{$song->lenght}}</p>
                         <button id="{{$song->id}}">+</button>
                    </div>

                    <div id="myModal" class="modal">

                        <!-- Modal content -->
                        <div class="modal-content">
                          <span class="close">&times;</span>
                          <form action="{{route('add-Song')}}" method="post">
                            @csrf
                            <div class="form-group">                   
                                
                            </div>
                            <div class="form-group">
                                <label for="songID">Voeg aan de tijdelijk playlist toe:</label>
                                <input name="songID" id="songID" type="hidden" value="">
                            </div>
                            
                                                       
                            <div class="form-group">
                                <input type="submit" value="Opslaan">
                            </div>
                            
                            
                          </form>



                          <form action="{{url('add-toplaylist')}}" method="post">
                            @csrf
                            <div class="form-group">
                              <label for="toPlaylists">Voeg aan de bestande playlists toe</label>

                              <select name="toPlaylists" id="cars">
                                @if(!empty($playlists))
                                @foreach($playlists as $playlist)
                                @if($playlist->user_id == $getID)
                                <option value="{{$playlist->id}}">{{$playlist->name}}</option>
                                @endif
                                @endforeach

                                @elseif(empty($playlists))
                                  <div><p>Maak eerst een playlist</p></div>
                                @endif
                              </select>
                            </div>

                            <div class="form-group">
                              <input type="hidden" id="songID2" name="songID2" value="">
                            </div>

                            <div class="form-group">
                              <input type="submit" value="Toevoegen">
                            </div>
                           

                          </form>
                        </div>
                      
                      </div>
                     
                    <script>
                        // Get the modal
                        var modal = document.getElementById("myModal");
                        
                        // Get the button that opens the modal
                        var btn = document.getElementById("{{$song->id}}");

                        var songID = document.getElementById("songID");
                        var songID2 = document.getElementById("songID2");

                        var songTitel = document.getElementById("songTitel");

                        var songArtist = document.getElementById("songArtist");

                        var songLenght = document.getElementById("songLenght");
                        
                        // Get the <span> element that closes the modal
                        var span = document.getElementsByClassName("close")[0];
                        
                        // When the user clicks the button, open the modal 
                        btn.onclick = function() {
                          modal.style.display = "block";
                          songID.value = "{{$song->id}}";  
                          songID2.value = "{{$song->id}}";                                            
                          
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
                        
                        console.log(btn);
                        </script>

                    @endif
                    @endforeach

                    
                </div>
            </div>
            
        </div>
        
    </div>
</div>


    
@include('layout/footer')