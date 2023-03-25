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
        $groupe=groupe::all();
        return view('groupe.index')->with('groupe',$groupe);
    
    }

    /**
     * Show the form for creating a new resource.
     * @return\Illuminate\Http\response.
     */
    public function create()
    {
        return view('groupe.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $input = $request->except('_token');
        groupe::create($input);
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
        $groupe=groupe::find($id);
        return view('groupe.edit')->with('groupe',$groupe);
        
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

        groupe::destroy($id);
       return redirect('groupe')->with('flash_message','groupe supprimé');
    }
        
    }

