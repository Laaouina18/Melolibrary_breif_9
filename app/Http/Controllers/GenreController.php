<?php

namespace App\Http\Controllers;

use App\Models\genre;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GenreController extends Controller
{
    //
      /**
     * Display a listing of the resource.
     * @return\Illuminate\Http\response.
     */
    public function index()
    { 
        $genre=genre::all();
        return view('genre.index')->with('genre',$genre);
    
    }

    /**
     * Show the form for creating a new resource.
     * @return\Illuminate\Http\response.
     */
    public function create()
    {
        return view('genre.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $input = $request->except('_token');
        genre::create($input);
        return redirect('genre')->with('flash_message', 'vous avez ajouté un genre');
       
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
$genre=genre::find($id);
return view('genre.show')->with('genre',$genre);
      
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $genre=genre::find($id);
        return view('genre.edit')->with('genre',$genre);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $genre = genre::find($id);
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
   
        'description' => 'nullable|string',
        'image' => 'nullable|string'
  
    ]);
    $genre->fill($validatedData);
    $genre->save();

    return redirect()->route('genre.index')->with('flash_message', 'genre modifié avec succès!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id){

        genre::destroy($id);
       return redirect('genre')->with('flash_message','genre supprimé');
    }
}
