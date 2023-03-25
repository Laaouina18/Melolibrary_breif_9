<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Validator;
use App\Models\Song;
use App\Models\artist;
use App\Models\genre;
use App\Models\Commentaire;


class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return\Illuminate\Http\response.
     */
    public function index()
    { 
        $songt=Song::all();
        return view('welcome')->with('song',$songt);
    
    }

    /**
     * Show the form for creating a new resource.
     * @return\Illuminate\Http\response.
     */
    public function create()
    {
       
        $genre = genre::all();
        $artists = Artist::all();
        return view('song.create', compact('genre', 'artists'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'required|integer|min:1900',
            'track' => 'required|string|max:255',
            'audio_path' => 'nullable',
            'filename' => 'required|string|max:255',
            'duration' => 'required',
            'genre_id' => 'required|exists:genre,id',
            'artist_id' => 'required|exists:artist,id',
            'lyrics' => 'required|string'
        ]);
       
        $chanson = new Song();
        $chanson->title = $validatedData['title'];
        $chanson->year = $validatedData['year'];
        $chanson->track = $validatedData['track'];
        $chanson->filename = $validatedData['filename'];
        $chanson->duration = $validatedData['duration'];
        $chanson->genre_id = $validatedData['genre_id'];
        $chanson->artist_id = $validatedData['artist_id'];
        $chanson->lyrics = $validatedData['lyrics'];
    
        if ($request->hasFile('audio_path')) {
            $audio_path = $request->file('audio_path');
            $filename = time() . '.' . $audio_path->getClientOriginalExtension();
            $path = $audio_path->storeAs('public/audio', $filename);
            $chanson->audio_path = $filename;
        }
  
        $chanson->save();
    
        return redirect('song')->with('flash_message', 'Vous avez ajouté une chanson.');
    }
    
    

    /**
     * Display the specified resource.
     */
 
    public function show($id)
    {
$song=song::find($id);
$comments = Commentaire::all();
$commentaires=Commentaire::all();
 return view('song.show', compact('commentaires', 'song'));

      
    }
    /**
     * Show the form for editing the specified resource.
     */
    
    public function edit($id)
    {
        $song=song::find($id);
        $genre = genre::all();
        $artists = Artist::all();
        return view('song.edit', compact('genre', 'artists','song'));

        
    }
    public function destroy($id){
        song::destroy($id);
       return redirect('song')->with('flash_message','song supprimé');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $song = song::find($id);
    $genre=genre::all();
    $artists=artist::all();
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'year' => 'required|integer|min:1900',
        'track' => 'required|string|max:255',
        'audio_path' => 'nullable',
        'filename' => 'required|string|max:255',
        'duration' => 'required',
        'genre_id' => 'required|exists:genre,id',
        'artist_id' => 'required|exists:artist,id',
        'lyrics' => 'required|string'
    ]);
    $song->fill($validatedData);
    $song->save();

    return redirect()->route('song.index')->with('flash_message', 'Artiste modifié avec succès!');
}

    /**
     * Remove the specified resource from storage.
     */
  
        
    }

