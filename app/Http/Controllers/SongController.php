<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Validator;
use App\Models\Song;
use App\Models\artist;
use App\Models\genre;
use App\Models\groupe;
use App\Models\Commentaire;
use Illuminate\Validation\Rule;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return\Illuminate\Http\response.
     */
    public function index()
    { 
        if(auth()->user()){
        
        $songt=Song::all();
        return view('song.index')->with('song',$songt);}
        else{
            return view('auth.login');
        }
    
    }

    /**
     * Show the form for creating a new resource.
     * @return\Illuminate\Http\response.
     */
    public function create()
    {
        if(auth()->user()){
        $genre = genre::all();
        $artists = Artist::all();
        $groupes = groupe::all();
        return view('song.create', compact('genre', 'artists','groupes'));}
        else{
return view('auth.login');
        }

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
            'image' => 'nullable',
            'filename' => 'required|string|max:255',
            'duration' => 'required',
            'genre_id' => 'required|exists:genre,id',
            'artist_id' => 'required|exists:artist,id',
            'groupe_id' => 'required|exists:groupe,id',
            'lyrics' => 'required|string',
           
        ]);
       
        $chanson = new Song();
        $chanson->title = $validatedData['title'];
        $chanson->year = $validatedData['year'];
        $chanson->track = $validatedData['track'];
        $chanson->filename = $validatedData['filename'];
        $chanson->duration = $validatedData['duration'];
        $chanson->genre_id = $validatedData['genre_id'];
        $chanson->artist_id = $validatedData['artist_id'];
        $chanson->groupe_id = $validatedData['groupe_id'];
        $chanson->lyrics = $validatedData['lyrics'];
    
        if ($request->hasFile('audio_path')) {
            $audio_path = $request->file('audio_path');
            $filename = time() . '.' . $audio_path->getClientOriginalExtension();
            $path = $audio_path->storeAs('public/audio', $filename);
            $chanson->audio_path = $filename;
        }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = $audio_path->storeAs('public/images', $filename);
            $chanson->image = $image;
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
        if(auth()->user()){
        $song=song::find($id);
        $genre = genre::all();
        $artists = Artist::all();
        $groupes= groupe::all();
        return view('song.edit', compact('genre', 'artists','song','groupes'));}
        else{
            return view('auth.login');
        }

        
    }
    public function destroy($id){
        if(auth()->user()){
        $song = song::find($id);
        $song->status = 'archived';
        $song->save();
        return redirect('song')->with('flash_message', 'Song archived');}
        else{
            return view('auth.login');
        }
    }
    public function unarchive($id){
        if(auth()->user()){
        $song = Song::find($id);
        $song->status = 'active';
        $song->save();
        return redirect()->back()->with('flash_message', 'Song unarchived');}
        else{
            return view ('auth.login');
        }
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $chanson = Song::find($id);
    $validatedData = $request->validate([
        "title"=>"required|min:3|max:255",
        "track"=>"required|min:3|max:255",
        "genre_id" => "required|exists:genre,id",
        "artist_id" => "required|exists:artist,id",
        "groupe_id" => "required|exists:groupe,id",
        "filename"=>"required" ,
        "duration" => "required",          
        "year"=>"required:numeric",
        "audio_path"=>"required:mp3,mp4",
        "image"=>"required",
        "lyrics"=>"required"
    ]);

    $chanson->title = $validatedData['title'];
    $chanson->year = $validatedData['year'];
    $chanson->track = $validatedData['track'];
    $chanson->filename = $validatedData['filename'];
    $chanson->duration = $validatedData['duration'];
    $chanson->genre_id = $validatedData['genre_id'];
    $chanson->artist_id = $validatedData['artist_id'];
    $chanson->groupe_id = $validatedData['groupe_id'];
    $chanson->lyrics = $validatedData['lyrics'];

    if ($request->hasFile('audio_path')) {
        $audio_path = $request->file('audio_path');
        $filename = time().'.'.$audio_path->getClientOriginalExtension();
        $path = $audio_path->storeAs('public/audio', $filename);
        $chanson->audio_path = $filename;
    }
    if ($request->hasFile('image')) {
        $image= $request->file('image');
        $filename = time().'.'.$image->getClientOriginalExtension();
        $path = $image->storeAs('public/images', $filename);
        $chanson->image = $filename;
    }

    $chanson->save();

    return redirect()->route('song.index')->with('flash_message', 'chanson modifié avec succès!');
 


}

    /**
     * Remove the specified resource from storage.
     */
  
        
    }

