<?php

namespace App\Http\Controllers;

use App\Models\artist;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return\Illuminate\Http\response.
     */
    public function index()
    { 
        if(auth()->user()){
        $artist=artist::all();
        return view('artist.index')->with('artist',$artist);}
        else{
            return('auth.login');
        }
    
    }

    /**
     * Show the form for creating a new resource.
     * @return\Illuminate\Http\response.
     */
    public function create()
    {
        if(auth()->user()){
        return view('artist.create');
        }else{
            return view ("auth.login");
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'country' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'birthday' => 'nullable|date',
    ]);

    $artist = new Artist;
    $artist->name = $validatedData['name'];
    $artist->country = $validatedData['country'];
    $artist->description = $validatedData['description'];
    $artist->birthday = $validatedData['birthday'];

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = time().'.'.$image->getClientOriginalExtension();
        $path = $image->storeAs('public/images', $filename);
        $artist->image = $filename;
    }

    $artist->save();



        return redirect('artist')->with('flash_message', 'vous avez ajouté un artiste');
       
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
$artist=artist::find($id);
return view('artist.show')->with('artist',$artist);
      
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if(auth()->user()){
        $artist=artist::find($id);
        return view('artist.edit')->with('artist',$artist);}
        else{
            return view('auth.login');
        }
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $artist = artist::find($id);
    $validatedData = $request->validate([
        "name" => "required|string|max:255",
        "country" => "required|string|max:255",
        "description" => "nullable|string",
        "image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        "birthday" => "nullable|date",
    ]);
   $artist->name= $validatedData["name"];
   $artist->country= $validatedData["country"];
   $artist->description= $validatedData["description"];
   $artist->birthday= $validatedData["birthday"];
   if ($request->hasFile('image')) {
    $image= $request->file('image');
    $filename = time().'.'.$image->getClientOriginalExtension();
    $path = $image->storeAs('public/images', $filename);
    $artist->image = $filename;
}
    $artist->save();

    return redirect()->route('artist.index')->with('flash_message', 'Artiste modifié avec succès!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id){
        if(auth()->user()){
        artist::destroy($id);
       return redirect('artist')->with('flash_message','artiste supprimé');}
       else{
        return view('auth.login');
       }
    }
        
    }

