

<div class='col-sm-6'>
<form action="{{ url('client/save/')}}" method='POST'>
  <div class="form-group row">
    <label for="immatricule" class="col-sm-2 col-form-label">Immatricule</label>
    <div class="col-sm-10">
      <input type="text"  class="form-control" id="immatricule" name='immatricule'>
    </div>
  </div>


  <div class="form-group row">
    <label for="Marque" class="col-sm-2 col-form-label">Marque</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="Marque" name='Marque'>
    </div>
  </div>

  <div class="form-group row">
    <label for="Modele" class="col-sm-2 col-form-label">Modele</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="Modele" name='Modele'>
    </div>
  </div>

  <div class="form-group row">
    <label for="Nombre_Place" class="col-sm-2 col-form-label">Nombre_Place</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="Nombre_Place" name='Nombre_Place'>
    </div>
  </div>

  <div class="form-group row">
    <label for="Puissance" class="col-sm-2 col-form-label">Puissance</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="Puissance" name='Puissance'>
    </div>
  </div>  
  
  <div class="form-group row">
    <label for="Date_circulation" class="col-sm-2 col-form-label">Date_circulation</label>
    <div class="col-sm-10">
      <input type="Date_circulation" class="form-control" id="Date_circulation" name='Date_circulation'>
    </div>
  </div>  
  
  <div class="form-group row">
    <label for="Lieu_stationnement" class="col-sm-2 col-form-label">Lieu_stationnement</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="Lieu_stationnement" name='Lieu_stationnement'>
    </div>
  </div>  

    <div class="form-group row">
    <label for="Num_chassis" class="col-sm-2 col-form-label">Num_chassis</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="Num_chassis" name='Num_chassis'>
    </div>
  </div>

 
  <div class="form-group row">
    <label for="Code_radio" class="col-sm-2 col-form-label">Code_radio</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="Code_radio" name='Code_radio'>
    </div>
  </div>


  <div class="form-group row">
    <label for="Categorie" class="col-sm-2 col-form-label">Categorie</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="Categorie" name='Categorie'>
    </div>
  </div>
  
  <div class="form-group row">
    <label for="curburant" class="col-sm-2 col-form-label">Curburant</label>
    <div class="col-sm-10">
          <select name='curburant' id='curburant'>
          <option value="1">Gasoil</option>
          <option value="2">Essence</option>
        </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="couleur" class="col-sm-2 col-form-label">Couleur</label>
    <div class="col-sm-10">
          <select name='couleur' id='couleur'>
          <option value="1">Noir</option>
          <option value="2">Blanc</option>
        </select>
    </div>
  </div>


   <div class="form-group row">
    <label for="Delai_debut" class="col-sm-2 col-form-label">Delai_debut</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="Delai_debut" name='Delai_debut'>
    </div>
  </div>

  <div class="form-group row">
    <label for="Delai_fin" class="col-sm-2 col-form-label">Delai_fin</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="Delai_fin" name='Delai_fin'>
    </div>
  </div>
  
   
  <button class='btn btn-primary' type='submit' name='save'>Save</button>
  @csrf
</form>
</div>
