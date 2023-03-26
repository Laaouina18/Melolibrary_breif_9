@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Ajouter un artiste</h1>

    <form action="{{ url('artist') }}" method="post" enctype="multipart/form-data">

        @csrf

        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nom de l'artiste">
        </div>

        <div class="form-group">
            <label for="country">Pays</label>
            <input type="text" class="form-control" id="country" name="country" placeholder="Pays d'origine">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" placeholder="Description de l'artiste"></textarea>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>

        <div class="form-group">
            <label for="birthday">Date de naissance</label>
            <input type="date" class="form-control" id="birthday" name="birthday">
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>

    </form>

</div>

@endsection
