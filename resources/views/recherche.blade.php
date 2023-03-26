@extends('layouts.app')
@section('content')
<div class="container-fluid" style="  background: linear-gradient(to right,#434043, #1595be);" >
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline" style="color:white;">LISTE DE MUSIQUE</span>
                        </a>
                    </li>
                    <li>
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline" style="color:white;">Dashboard</span> </a>
                        <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline" style="color:white;">ARTISTES</span>  </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline" style="color:white;">RECHRCHE</span>  </a>
                            </li>
                        </ul>
                    </li>
                 
                   
                </ul>
                <hr>
                <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1">loser</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col py-3">
        <div class="container-fluid mt-4">
    <div class="row">
       
    <div class="container">
        <form action="{{ route('search') }}" method="get">
            <div class="form-group">
                <label for="query">Recherche:</label>
                <input type="text" class="form-control" name="query" placeholder="Entrez votre recherche ici">
            </div>
            <button type="submit" class="btn btn-info">Rechercher</button>
        </form>
        
      
            <h3>Résultats de la recherche pour les chansons:</h3>
            <div class="row">
                @foreach($songs as $song)
                @if($song->status!='archived')
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="{{ asset('storage/images/'.$song->artist->image) }}" alt="{{ $song->title }}">
                            <div class="card-body">
                                <p class="card-text">{{ $song->title }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ route('search', $song) }}" class="btn btn-sm btn-outline-secondary">Voir</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
       
        
      
        
       
    </div>
    </div>
</div>
        </div>
    </div>
</div>



@endsection
