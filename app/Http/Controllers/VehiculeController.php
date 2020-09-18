<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Vehicule;

class VehiculeController extends Controller
{
    public function index()
    {
        $vehicules = Vehicule::all();

        return view('vehicules.index', compact('vehicules'));
    }

    public function create()
    {
        $vehicule = new Vehicule();
        return view('vehicules.create', compact('vehicule'));
    }

    public function store()
    {
        $vehicules = Vehicule::create($this->validateData());
        return redirect('/vehicules/'.$vehicules->id);
    }

    //Route Model Binding => \App\Customer $var
    public function show(Vehicule $vehicule)
    {
        return view('vehicules.show', compact('vehicule'));
    }

    public function edit(Vehicule $vehicule)
    {
        return view('vehicules.edit', compact('vehicule'));
    }

    public function update(Vehicule $vehicule)
    {
        $vehicule->update($this->validateData());    

        return redirect('/vehicules/'.$vehicules->id);
    }

    public function destroy(Vehicule $vehicule)
    {
        $vehicule->delete();

        return redirect('/vehicules');
    }


    public function validateData()
    {
        return request()->validate([
			'immatricule' => 'required|max:30|',

            'marque' => 'required|30',

            'modele' => 'required|30',

			'Nombre_Place' => 'required|max:30|',

			'Puissance' => 'required|max:30|',

			'Date_circulation' => 'required|max:30|',

			'Lieu_stationnement' => 'required|max:30|',

			'Num_chassis' => 'required|max:30|',

			'Code_radio' => 'required|max:30|',

			'Categorie' => 'required|max:30|',

			'Curburant' => 'required|max:30|',

			'Couleur' => 'required|max:30|',

			'Delai_debut' => 'required|max:30|',

            'Delai_fin' => 'required|max:30|',

            'disponible' => 'required',
		]);
 }


    //----------------------------------------Rest Controllers----------------------
    
    public function restIndex($limit = 0)
    {
        return Vehicule::limit(99)->offset($limit)->get();
    }

    public function restStore()
    {
        return Vehicule::create($this->validateData());
    }

    //Route Model Binding => \App\Customer $var
    public function restShow(Vehicule $vehicule)
    {
        return $vehicule;
    }

    
    public function restUpdate(Vehicule $vehicule)
    {
        return $vehicule->update($this->validateData());
    }

    public function RestDestroy(Vehicule $vehicule)
    {
        return $vehicule->delete();
    }

    public function restGetAllMarque()
    {
       return Vehicule::select('marque')
        ->groupBy('marque')
        ->get();
    }
    public function restGetModelesByMarque($marques)
    {   
        return Vehicule::select('modele','immatricule')
        ->where('marque',$marques)
        ->where('disponible',1)
        ->get();
    }
}
        