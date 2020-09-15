<div>
    <div class='col-sm-6'>
    
        <div class="form-group row">
          <label for="pieceIdentite" class="col-sm-2 col-form-label">Piece Identite</label>
          <div class="col-sm-10">
            <input type="text"  class="form-control" id="pieceIdentite" name='pieceIdentite'  value="{{old('pieceIdentite') ?? $client->pieceIdentite}}">
            @error('pieceIdentite'){{$message}}@enderror
          </div>
        </div>
      
      
        <div class="form-group row">
          <label for="numPiece" class="col-sm-2 col-form-label">Numero Piece</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="numPiece" name='numPiece'  value="{{old('numPiece') ?? $client->numPiece }}">
            @error('numPiece'){{$message}}@enderror
          </div>
        </div>
      
        <div class="form-group row">
          <label for="dateDelivrPiece" class="col-sm-2 col-form-label">date delivr piece</label>
          <div class="col-sm-10">
            <input type="date" class="form-control" id="dateDelivrPiece" name='dateDelivrPiece'  value="{{old('dateDelivrPiece') ?? $client->dateDelivrPiece }}">
            @error('dateDelivrPiece'){{$message}}@enderror
          </div>
        </div>
      
        <div class="form-group row">
          <label for="nom" class="col-sm-2 col-form-label">Nom</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="nom" name='nom'  value="{{old('nom') ?? $client->nom }}">
            @error('nom'){{$message}}@enderror
          </div>
        </div>
      
        <div class="form-group row">
          <label for="prenom" class="col-sm-2 col-form-label">Prenom</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="prenom" name='prenom'  value="{{old('prenom') ?? $client->prenom }}">
            @error('prenom'){{$message}}@enderror
          </div>
        </div>  
        
        <div class="form-group row">
          <label for="telephone" class="col-sm-2 col-form-label">Telephone</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="telephone" name='telephone'  value="{{old('telephone') ?? $client->telephone }}">
            @error('telephone'){{$message}}@enderror
          </div>
        </div>  
        
        <div class="form-group row">
          <label for="numPermis" class="col-sm-2 col-form-label">num Permis</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="numPermis" name='numPermis' value="{{old('numPermis') ?? $client->numPermis }}">
            @error('numPermis'){{$message}}@enderror
          </div>
        </div>  
      
          <div class="form-group row">
          <label for="dateDelivrPermis" class="col-sm-2 col-form-label">date delivr permis</label>
          <div class="col-sm-10">
            <input type="date" class="form-control" id="dateDelivrPermis" name='dateDelivrPermis'  value="{{old('dateDelivrPermis') ?? $client->dateDelivrPermis }}">
            @error('dateDelivrPermis'){{$message}}@enderror
          </div>
        </div>
      
        <div class="form-group row">
          <label for="Paye" class="col-sm-2 col-form-label">Paye</label>
          <div class="col-sm-10">
                <select name='nationalite' id='payes'>
                    @foreach ($payes['payes'] as $paye)
                    <option value="{{$paye['id']}}" {{ $client->nationalite == $paye['id']? 'selected' : ''}}>{{$paye['paye']}}</option>       
                    @endforeach
              </select>
              @error('nationalite'){{$message}}@enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="addresse" class="col-sm-2 col-form-label">Address</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="addresse" name='addresse' value="{{old('addresse') ?? $client->addresse }}">
            @error('addresse'){{$message}}@enderror
          </div>
        </div>
      
        <div class="form-group row">
          <label for="Ville" class="col-sm-2 col-form-label">Ville</label>
          <div class="col-sm-10">
          <select name='ville' id='villes'>
            @foreach ($payes['villes'] as $ville)
            <option value="{{$ville['id']}}" {{ $client->ville_id == $ville['id']? 'selected' : ''}}>{{$ville['ville']}}</option>       
            @endforeach
          </select>
          @error('ville'){{$message}}@enderror
          </div>
        </div>
      
        <div class="form-group row">
          <label for="lieuDelivrPiece" class="col-sm-2 col-form-label">lieu_delivr_piece</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="lieuDelivrPiece" name='lieuDelivrPiece' value="{{old('lieuDelivrPiece') ?? $client->lieuDelivrPiece }}">
            @error('lieuDelivrPiece'){{$message}}@enderror
          </div>
        </div>
        
        <div class="form-group row">
          <label for="lieuDelivrPermis" class="col-sm-2 col-form-label">lieu_delivr_permis</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="lieuDelivrPermis" name='lieuDelivrPermis' value="{{old('lieuDelivrPermis') ?? $client->lieuDelivrPermis }}">
            @error('lieuDelivrPermis'){{$message}}@enderror
          </div>
        </div> 
        
         <div class="form-group row">
          <label for="dateNaissance" class="col-sm-2 col-form-label">date_naiss</label>
          <div class="col-sm-10">
            <input type="date" class="form-control" id="dateNaissance" name='dateNaissance' value="{{old('dateNaissance') ?? $client->dateNaissance }}">
            @error('dateNaissance'){{$message}}@enderror
          </div>
        </div>
        
         <div class="form-group row">
          <label for="lieuNaissance" class="col-sm-2 col-form-label">lieuNaissance</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="lieuNaissance" name='lieuNaissance' value="{{old('lieuNaissance') ?? $client->lieuNaissance }}">
            @error('lieuNaissance'){{$message}}@enderror
          </div>
        </div>
      
        
         <div class="form-group row">
          <label for="codePostale" class="col-sm-2 col-form-label">codePostale</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="codePostale" name='codePostale' value="{{old('codePostale') ?? $client->codePostale }}">
            @error('codePostale'){{$message}}@enderror
          </div>
        </div>
      
        <div class="form-group row">
          <label for="email" class="col-sm-2 col-form-label">email</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="email" name='email' value="{{old('email') ?? $client->email }}">
            @error('email'){{$message}}@enderror
          </div>
        </div>
       
        <div class="form-group row">
          <label for="pieceIdentiteScan" class="col-sm-2 col-form-label">pieceIdentite_scan</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="pieceIdentiteScan" name='pieceIdentiteScan' value="{{old('pieceIdentiteScan') ?? $client->pieceIdentiteScan }}">
            @error('pieceIdentiteScan'){{$message}}@enderror
          </div>
        </div>
      
       <div class="form-group row">
          <label for="permisScan" class="col-sm-2 col-form-label">permis scan</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="permisScan" name='permisScan' value="{{old('permisScan') ?? $client->permisScan }}">
            @error('permisScan'){{$message}}@enderror
          </div>
        </div>
        <button class='btn btn-primary' type='submit' name='save'>Save</button>
        @csrf
      
      </div>
      
    </div>