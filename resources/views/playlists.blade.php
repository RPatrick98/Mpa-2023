
@include('/layout/header')
<div class="continer">
    <div class="topbar">
        <div class="user-div">{{$data->name}}</div>
    </div>
    <div class="row">
        <div class="" style="margin-top:20px;">
            <h1>Playlists</h1>
            @foreach($Timeplaylists as $timeplaylist)

            @foreach($songs as $song)
            @if($timeplaylist == $song['id'])
            <div>             
               <p>{{$song['name']}}</p>
               <p>{{$song['artist']}}</p>
               <p>{{$song['lenght']}}</p>
               <a href="{{url('delete-Playlist/' .$timeplaylist)}}">Delete</a>

               
              </div>
            @endif
            @endforeach
            @endforeach
            <a href="">Opslaan</a>
            <div class="grid-3-dasboard">
              
              <div class="playlist-card">
                <h4>Playlist Titel</h4>
                <a class="btn btn-block btn-primary" href="">Bewerken</a>
                <a class="btn btn-block btn-danger" href="">Verdwijderen</a>
              </div>
             
            </div>
            
            
            <div class="mainDiv-Modal-Add">
                <button id="myBtn">Open Modal</button>

                <div id="myModal" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                      <span class="close">&times;</span>
                      <form action="{{url('add-playlist')}}" method="post">
                        <div class="form-group">
                            @csrf
                            <label for="name">Playlist Name</label>
                            <input name="name" type="text" class="form-control" placeholder="Enter Name of Your Playlist">
                        </div>
                        
                        <div class="form-group">
                            <button class="btn btn-block btn-primary" type="submit">Aanmaken</button>
                        </div>
                      </form>
                    </div>
                  
                  </div>
            </div>
           
            <div class="dasboard-continer">
                <div class="grid-2-dasboard">
                    <div class="grid-3-dasboard">

                    </div>
                    <div class="songs-div-dasboard">
                      
                    </div>
                </div>
            </div>
            
        </div>
        
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