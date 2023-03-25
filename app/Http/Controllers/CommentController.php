<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Commentaire;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs = Song::all();
        $commentaires = Commentaire::all();
        return view('song.show', compact('songs', 'commentaires'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('commentaire.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Song $song)
    {
        $request->validate([
            'body' => 'required|max:255'
        ]);
    
        $comment = new Commentaire();
        $comment->body = $request->body;
        $comment->user_id = auth()->user()->id;
        $song->comments()->save($comment);
    
        return back();
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $commentaire = Commentaire::findOrFail($id);
        return view('commentaire.show', compact('commentaire'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $commentaire = Commentaire::findOrFail($id);
        return view('commentaire.edit', compact('commentaire'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $commentaire = Commentaire::findOrFail($id);
        $validatedData = $request->validate([
            'body' => 'required|string',
            'user_id' => 'required|numeric',
            'song_id' => 'required|numeric'
        ]);
        $commentaire->update($validatedData);

        return redirect()->route('commentaire.index')->with('success', 'Commentaire modifié avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Commentaire::destroy($id);
        return redirect()->back()->with('success', 'Commentaire supprimé avec succès!');
    }
}
