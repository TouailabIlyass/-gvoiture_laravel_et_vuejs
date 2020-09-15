<?php

 namespace App;

use Illuminate\Database\Eloquent\Model;


class Reservation extends Model {
	
    protected $primaryKey = 'numRes';
public $incrementing = false;
    protected $fillable = [
	'numRes',
	'numPiece',
	'immatricule',
	'Date_depart',
	'Lieu_depart',
	'Date_retour',
	'Lieu_retour',
	'Montant',
	'Mode_paiement',
	'numPieceCond',
	'nom_banq',
	'num_cart',
	];
}