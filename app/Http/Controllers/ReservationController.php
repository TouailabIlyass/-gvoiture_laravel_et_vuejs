<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Reservation;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();

        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        $reservation = new Reservation();
        return view('reservations.create', compact('reservation'));
    }

    public function store()
    {
        $reservations = Reservation::create($this->validateData());
        return redirect('/reservations/'.$reservations->id);
    }

    //Route Model Binding => \App\Customer $var
    public function show(Reservation $reservation)
    {
        return view('reservations.show', compact('reservation'));
    }

    public function edit(Reservation $reservation)
    {
        return view('reservations.edit', compact('reservation'));
    }

    public function update(Reservation $reservation)
    {
        $reservation->update($this->validateData());    

        return redirect('/reservations/'.$reservations->id);
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect('/reservations');
    }


    public function validateData()
    {
        return request()->validate([
			'numRes' => 'required|max:30|',

			'numPiece' => 'required|max:30|',

			'immatricule' => 'required|max:30|',

			'Date_depart' => 'required|max:50|',

			'Lieu_depart' => 'required|max:30|',

			'Date_retour' => 'required|max:50|',

			'Lieu_retour' => 'required|max:30|',

			'Montant' => 'required|max:30|',

			'Mode_paiement' => 'required|max:30|',

			'numPieceCond' => 'max:30|',

			'nom_banq' => 'required|max:30|',

			'num_cart' => 'required|max:30|',
		]);
 }


    //----------------------------------------Rest Controllers----------------------
    
    public function restIndex($limit = 0)
    {
        return Reservation::limit(99)->offset($limit)->get();
    }

    public function restStore()
    {
        return Reservation::create($this->validateData());
    }

    //Route Model Binding => \App\Customer $var
    public function restShow(Reservation $reservation)
    {
        return $reservation;
    }

    
    public function restUpdate(Reservation $reservation)
    {
        return $reservation->update($this->validateData());
    }

    public function RestDestroy(Reservation $reservation)
    {
        return $reservation->delete();
    }
}
        