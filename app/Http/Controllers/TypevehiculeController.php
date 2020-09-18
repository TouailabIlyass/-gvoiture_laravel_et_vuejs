<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Typevehicule;

class TypevehiculeController extends Controller
{
    public function index()
    {
        $typevehicules = Typevehicule::all();

        return view('typevehicules.index', compact('typevehicules'));
    }

    public function create()
    {
        $typevehicule = new Typevehicule();
        return view('typevehicules.create', compact('typevehicule'));
    }

    public function store()
    {
        $typevehicules = Typevehicule::create($this->validateData());
        return redirect('/typevehicules/'.$typevehicules->id);
    }

    //Route Model Binding => \App\Customer $var
    public function show(Typevehicule $typevehicule)
    {
        return view('typevehicules.show', compact('typevehicule'));
    }

    public function edit(Typevehicule $typevehicule)
    {
        return view('typevehicules.edit', compact('typevehicule'));
    }

    public function update(Typevehicule $typevehicule)
    {
        $typevehicule->update($this->validateData());    

        return redirect('/typevehicules/'.$typevehicules->id);
    }

    public function destroy(Typevehicule $typevehicule)
    {
        $typevehicule->delete();

        return redirect('/typevehicules');
    }


    public function validateData()
    {
        return request()->validate([
			'ModeleV' => 'required|max:30|',

			'MarqueV' => 'required|max:30|',
		]);
 }


    //----------------------------------------Rest Controllers----------------------
    
    public function restIndex($limit = 0)
    {
        return Typevehicule::limit(99)->offset($limit)->get();
    }

    public function restStore()
    {
        return Typevehicule::create($this->validateData());
    }

    //Route Model Binding => \App\Customer $var
    public function restShow(Typevehicule $typevehicule)
    {
        return $typevehicule;
    }

    
    public function restUpdate(Typevehicule $typevehicule)
    {
        return $typevehicule->update($this->validateData());
    }

    public function RestDestroy(Typevehicule $typevehicule)
    {
        return $typevehicule->delete();
    }

    public function restGetAllMarque()
    {
       return Typevehicule::select('marquev')
        ->groupBy('marquev')
        ->get();
    }
    public function restGetModelsByMarque($marques)
    {   
        return Typevehicule::select('modelev')
        ->where('marquev',$marques)
        ->get();
    }
}
        