@extends('layouts.app')

<form action="{{ route('search') }}" method="get">
    <div class="form-group">
        <label for="query">Recherche:</label>
        <input type="text" class="form-control" name="query" placeholder="Entrez votre recherche ici">
    </div>
    <button type="submit" class="btn btn-primary">Rechercher</button>
</form>
