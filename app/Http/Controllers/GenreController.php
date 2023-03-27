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
    {  if(auth()->user()){
        $genre=genre::all();
        return view('genre.index')->with('genre',$genre);}
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
        return view('genre.create');}
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
            'name' => 'required|string|max:255',
          
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          
        ]);
    
        $artist = new genre;
        $artist->name = $validatedData['name'];
        
        $artist->description = $validatedData['description'];
     
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $path = $image->storeAs('public/images', $filename);
            $artist->image = $filename;
        }
    
        $artist->save();
    
    
    
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
        if(auth()->user()){
        $genre=genre::find($id);
        return view('genre.edit')->with('genre',$genre);}
        else{
            return view('auth.login');
        }
        
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $genre->name = $validatedData['name'];
        $genre->description = $validatedData['description'];
     
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $path = $image->storeAs('public/images', $filename);
            $genre->image = $filename;
        }
    
        $genre->save();
    
        return redirect()->route('genre.index')->with('flash_message', 'genre modifié avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id){
        if(auth()->user()){
        genre::destroy($id);
       return redirect('genre')->with('flash_message','genre supprimé');}
       return view('auth.login');
    }
}
