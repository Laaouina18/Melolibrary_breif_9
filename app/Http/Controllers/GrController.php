<?php

namespace App\Http\Controllers;

use App\Models\groupe;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class GrController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return\Illuminate\Http\response.
     */
    public function index()
    { 
        if(auth()->user()){
        $groupe=groupe::all();
        return view('groupe.index')->with('groupe',$groupe);}
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
        return view('groupe.create');}
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
            'pays' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'date_creation' => 'nullable|date',
        ]);
    
        $artist = new groupe;
        $artist->name = $validatedData['name'];
        $artist->pays = $validatedData['pays'];
        $artist->description = $validatedData['description'];
        $artist->date_creation = $validatedData['date_creation'];
    
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $path = $image->storeAs('public/images', $filename);
            $artist->image = $filename;
        }
    
        $artist->save();
    
    
    
            return redirect('groupe')->with('flash_message', 'vous avez ajouté un groupe');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
$groupe=groupe::find($id);
return view('groupe.show')->with('groupe',$groupe);
      
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if(auth()->user()){
        $groupe=groupe::find($id);
        return view('groupe.edit')->with('groupe',$groupe);
        }else{
            return view('auth.login');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $groupe = groupe::find($id);
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'pays' => 'required|string|max:255',
      
        'image' => 'nullable|string',
        'date_creation' => 'nullable|date',
    ]);
    $groupe->fill($validatedData);
    $groupe->save();

    return redirect()->route('groupe.index')->with('flash_message', 'groupe modifié avec succès!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id){
        if(auth()->user()){
        groupe::destroy($id);
       return redirect('groupe')->with('flash_message','groupe supprimé');}
       else{
        return view('auth.login');
       }
    }
        
    }

