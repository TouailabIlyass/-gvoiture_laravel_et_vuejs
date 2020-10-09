<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use App\Client;
use App\Ville;
use App\Paye;
use App\Addresse;


class ClientController extends Controller
{
    public function index()
    {
        $clients = DB::table('clients')
        ->join('payes', 'clients.nationalite', '=', 'payes.id')
        ->join('villes','clients.ville_id','=','villes.id')
        ->get();
        $client = new Client();
        return view('client.clients',compact('clients','client'));
    }

    public function create(Request $request)
    {
        $villes = Ville::all();
        $payes = Paye::all();
        return view('',compact('villes','payes'));
    }
    public function listOfPayes()
    {
       // return DB::table('payes')->join('villes','payes.id','=','villes.id_paye')->get();
       $villes = Ville::all();
       $payes = Paye::all();
       $data = array('payes'=>$payes,'villes'=>$villes);
       return $data;
    }
    public function store(Request $request)
    {
        $client = new Client();
        $data = $this->validateClientData();
        $client->create($data);
        return $data;
    }

    public function edit(Client $client)
    {   
        return view('client.editClient',compact('client'));
    }
    public function editRest(Client $client)
    {
        return $client;
    }

    public function update(Client $client)
    {
        $data = $this->validateClientData();
        $client->update($data);
        return back();
    }
    private function validateClientData()
    {
      return request()->validate([
        'numPiece' => 'required',
        'pieceIdentite' => 'required',
        'dateDelivrPiece' => 'required',
        'nom' => 'required',
        'prenom' => 'required',
        'telephone' => 'required',
        'numPermis' => 'required',
        'dateDelivrPermis' => 'required',
        'dateLivrePermis' => 'required',
        'dateLivrePiece' => 'required',
        'lieuDelivrPiece' => 'required',
        'lieuDelivrPermis' => 'required',
        'dateNaissance' => 'required',
        'lieuNaissance' => 'required',
        'codePostale' => 'required',
        'email' => 'required',
        'pieceIdentiteScan' => 'required',
        'permisScan' => 'required',
        'nationalite' => 'required',
        'addresse' => 'required',
        'ville_id' =>'required'
        ]);
    }
    
    ////////////Rest
    public function restIndex()
    {   
        $clients = DB::table('clients')
        ->join('payes', 'clients.nationalite', '=', 'payes.id')
        ->join('villes','clients.ville_id','=','villes.id')
        ->join('villes as vnaiss','clients.lieuNaissance','=','vnaiss.id')
        ->join('villes as vdeliverpiece','clients.lieuDelivrPiece','=','vdeliverpiece.id')
        ->join('villes as vdeliverpermis','clients.lieuDelivrPermis','=','vdeliverpermis.id')
        ->select('clients.*')
        ->addSelect('payes.paye')
        ->addSelect('villes.ville')
        ->addSelect('vnaiss.ville','vnaiss.ville as vnaiss')
        ->addSelect('vdeliverpiece.ville','vdeliverpiece.ville as vdeliverpiece')
        ->addSelect('vdeliverpermis.ville','vdeliverpermis.ville as vdeliverpermis')
        ->orderBy('created_at','DESC')
        ->paginate(2);
       return $clients;
    }

    public function restClientActif()
    {   
        $clients = DB::table('clients')
        ->join('reservations','clients.numPiece','=','reservations.numPiece')
        ->whereNull('reservations.Date_retour_reelle')
        ->join('payes', 'clients.nationalite', '=', 'payes.id')
        ->join('villes','clients.ville_id','=','villes.id')
        ->join('villes as vnaiss','clients.lieuNaissance','=','vnaiss.id')
        ->join('villes as vdeliverpiece','clients.lieuDelivrPiece','=','vdeliverpiece.id')
        ->join('villes as vdeliverpermis','clients.lieuDelivrPermis','=','vdeliverpermis.id')
        ->select('clients.*')
        ->addSelect('payes.paye')
        ->addSelect('villes.ville')
        ->addSelect('vnaiss.ville','vnaiss.ville as vnaiss')
        ->addSelect('vdeliverpiece.ville','vdeliverpiece.ville as vdeliverpiece')
        ->addSelect('vdeliverpermis.ville','vdeliverpermis.ville as vdeliverpermis')
        ->orderBy('clients.created_at','DESC')
        ->paginate(2);
       return $clients;
    }
    

    public function restStore(Request $request)
    {  
        try{
            if($request->hasFile('uploadPermisScan') && $request->hasFile('uploadPieceIdentiteScan')){
                $date = date('Y-m-d-H-i-s');
                $fileNamePermisScan = request()->input('numPiece').'_'.$date.'_permis_'.$request->uploadPermisScan->getClientOriginalName();
                $fileNamePieceIdentiteScan = request()->input('numPiece').'_'.$date.'_carte_'.$request->uploadPieceIdentiteScan->getClientOriginalName();
                $request->file('uploadPermisScan')->storeAs('permis_scan', $fileNamePermisScan, 'public');
                $request->file('uploadPieceIdentiteScan')->storeAs('pieceIdentite_scan', $fileNamePieceIdentiteScan, 'public');
                request()->merge([
                    'permisScan' => $fileNamePermisScan,
                    'pieceIdentiteScan' => $fileNamePieceIdentiteScan
                ]);
            $client = new Client();
            $client->create($this->validateClientData());
            return true;
            }
            $error='{"errors":{"pieceIdentiteScan":"piece identite is required","permisScan":"permis is required"}}';
            return $error;
        } catch (\Exception $e) {
            return false;
        } catch (\Throwable $e) {
            return false;
        }
    }

    public function restUpdate(Request $request, Client $client)
    {
       try{
            if ($client == null) return false;
            if(!$request->hasFile('uploadPermisScan') && !$request->hasFile('uploadPieceIdentiteScan'))
            {
                request()->merge([
                    'permisScan' => $client->permisScan,
                    'pieceIdentiteScan' => $client->pieceIdentiteScan
                ]);
            
            }
            if($request->hasFile('uploadPermisScan')){
                $date = date('Y-m-d-H-i-s');
                $fileNamePermisScan = request()->input('numPiece').'_'.$date.'_permis_'.$request->uploadPermisScan->getClientOriginalName();
                $request->file('uploadPermisScan')->storeAs('permis_scan', $fileNamePermisScan, 'public');
                request()->merge([
                    'permisScan' => $fileNamePermisScan,
                    'pieceIdentiteScan' =>  $client->pieceIdentiteScan
                ]);
            }
            if($request->hasFile('uploadPieceIdentiteScan')){
                $date = date('Y-m-d-H-i-s');
            
                $fileNamePieceIdentiteScan = request()->input('numPiece').'_'.$date.'_carte_'.$request->uploadPieceIdentiteScan->getClientOriginalName();
                
                $request->file('uploadPieceIdentiteScan')->storeAs('pieceIdentite_scan', $fileNamePieceIdentiteScan, 'public');
                request()->merge([
                    'permisScan' => $client->permisScan,
                    'pieceIdentiteScan' => $fileNamePieceIdentiteScan
                ]);
            }
            $client->update($this->validateClientData());
            return true;
        }catch(Exception $e){
            return false;
        }
        return false;
    }

    public function RestGetOne($keyword)
    {   if(strlen(trim($keyword)) == 0) return;
        $data = Client::where('nom', 'LIKE', '%'.$keyword.'%')
        ->orWhere('numPiece','LIKE',"%{$keyword}%")
        ->paginate(2);
        return $data;
    }

    public function restDestroy(Client $client)
    {
        try{
            $client->delete();
            return true;
        }catch(\Exception $e)
        {
            return false;
        }
    }
}
