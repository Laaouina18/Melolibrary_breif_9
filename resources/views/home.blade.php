@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <!-- Ajouter un sous-nav pour les genres, les artistes et les chansons -->
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#genres">Genres</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#artists">Artistes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#songs">Chansons</a>
                        </li>
                    </ul>
                </div>

                <!-- Section pour les genres -->
                <div class="card-body" id="genres">
                    <h5 class="card-title">Genres</h5>
                    <p class="card-text">Liste de tous les genres disponibles.</p>
                    <!-- Ajouter votre code pour afficher les genres -->
                </div>

                <!-- Section pour les artistes -->
                <div class="card-body" id="artists">
                    <h5 class="card-title">Artistes</h5>
                    <p class="card-text">Liste de tous les artistes disponibles.</p>
                    <!-- Ajouter votre code pour afficher les artistes -->
                </div>

                <!-- Section pour les chansons -->
                <div class="card-body" id="songs">
                    <h5 class="card-title">Chansons</h5>
                    <p class="card-text">Liste de toutes les chansons disponibles.</p>
                    <!-- Ajouter votre code pour afficher les chansons -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
