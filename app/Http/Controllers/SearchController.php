<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Artist;
use App\Models\Genre;

class SearchController extends Controller
{
    public function index()
    { 
        $query ='Joseph';
        $songs = Song::where('title', 'LIKE', "%$query%")->get();
        $artists = Artist::where('name', 'LIKE', "%$query%")->get();
        $genres = Genre::where('name', 'LIKE', "%$query%")->get();
        return view('recherche', compact('songs', 'artists', 'genres'));
    
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        $songs = Song::where('title', 'LIKE', "%$query%")->get();
        $artists = Artist::where('name', 'LIKE', "%$query%")->get();
        $genres = Genre::where('name', 'LIKE', "%$query%")->get();

        return view('recherche', compact('songs', 'artists', 'genres'));
    }
}
