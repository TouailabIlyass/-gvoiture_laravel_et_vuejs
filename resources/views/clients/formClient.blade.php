<div class="form-group row">
            <label for="nom" class="col-sm-2 col-form-label">nom</label>
            <div class="col-sm-10">
            <input type="text"  class="form-control" id="nom" name="nom"  value="{{old('nom') ??  $client->nom}}">
            @error('nom') <p style="color:red;"> {{$message}}</p>@enderror
            </div>
        </div>
        

<div class="form-group row">
            <label for="prenom" class="col-sm-2 col-form-label">prenom</label>
            <div class="col-sm-10">
            <input type="text"  class="form-control" id="prenom" name="prenom"  value="{{old('prenom') ??  $client->prenom}}">
            @error('prenom') <p style="color:red;"> {{$message}}</p>@enderror
            </div>
        </div>
        

<div class="form-group row">
            <label for="midlename" class="col-sm-2 col-form-label">midlename</label>
            <div class="col-sm-10">
            <input type="text"  class="form-control" id="midlename" name="midlename"  value="{{old('midlename') ??  $client->midlename}}">
            @error('midlename') <p style="color:red;"> {{$message}}</p>@enderror
            </div>
        </div>
        

	@csrf