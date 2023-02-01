
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
                        <div class="grid-3-dasboard">

                        @foreach($genres as $genre)
                        <a href="{{ url('genres/'.$genre->id) }}">
                            <div class="genre-card">
                                <div class="genre-img">

                                </div>
                                <h4>{{$genre->name}}</h4>
                                <p>25 liedjes</p>
                            </div>
                        </a>
                            
                        @endforeach
                            
                        </div>
                        <div class="songs-div-dasboard">
                            
                        </div>
                    </div>
                </div>
                
            </div>
            @dd(Session::all())
        </div>
    </div>

        
    @include('layout/footer')