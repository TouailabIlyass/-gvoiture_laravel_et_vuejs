<template>
        <form class="form-horizontal" v-on:submit.prevent="onSubmit" id="form">
             <fieldset>		
                 <input type="hidden" name="_method" value="put" v-if="editMethod">	

<div class="form-group row">
            <label for="immatricule" class="col-sm-2 col-form-label">immatricule</label>
            <div class="col-sm-10">
            <input type="text"  class="form-control" id="immatricule" name="immatricule" v-model="vehicule.immatricule" >
            <p style="color:red;" v-if="errors" >{{errors.immatricule}}</p>
            </div>
        </div>
        

<div class="form-group row">
            <label for="Marque" class="col-sm-2 col-form-label"> Marque</label>
            <div class="col-sm-10">
            <input type="text"  class="form-control" id="Marque" name="Marque" v-model="vehicule.Marque" >
            <p style="color:red;" v-if="errors" >{{errors.Marque}}</p>
            </div>
        </div>
        

<div class="form-group row">
            <label for="Modele" class="col-sm-2 col-form-label"> Modele</label>
            <div class="col-sm-10">
            <input type="text"  class="form-control" id="Modele" name="Modele" v-model="vehicule.Modele" >
            <p style="color:red;" v-if="errors" >{{errors.Modele}}</p>
            </div>
        </div>
        

<div class="form-group row">
            <label for="Nombre_Place" class="col-sm-2 col-form-label"> Nombre_ Place</label>
            <div class="col-sm-10">
            <input type="text"  class="form-control" id="Nombre_Place" name="Nombre_Place" v-model="vehicule.Nombre_Place" >
            <p style="color:red;" v-if="errors" >{{errors.Nombre_Place}}</p>
            </div>
        </div>
        

<div class="form-group row">
            <label for="Puissance" class="col-sm-2 col-form-label"> Puissance</label>
            <div class="col-sm-10">
            <input type="text"  class="form-control" id="Puissance" name="Puissance" v-model="vehicule.Puissance" >
            <p style="color:red;" v-if="errors" >{{errors.Puissance}}</p>
            </div>
        </div>
        

<div class="form-group row">
            <label for="Date_circulation" class="col-sm-2 col-form-label"> Date_circulation</label>
            <div class="col-sm-10">
            <input type="text"  class="form-control" id="Date_circulation" name="Date_circulation" v-model="vehicule.Date_circulation" >
            <p style="color:red;" v-if="errors" >{{errors.Date_circulation}}</p>
            </div>
        </div>
        

<div class="form-group row">
            <label for="Lieu_stationnement" class="col-sm-2 col-form-label"> Lieu_stationnement</label>
            <div class="col-sm-10">
            <input type="text"  class="form-control" id="Lieu_stationnement" name="Lieu_stationnement" v-model="vehicule.Lieu_stationnement" >
            <p style="color:red;" v-if="errors" >{{errors.Lieu_stationnement}}</p>
            </div>
        </div>
        

<div class="form-group row">
            <label for="Num_chassis" class="col-sm-2 col-form-label"> Num_chassis</label>
            <div class="col-sm-10">
            <input type="text"  class="form-control" id="Num_chassis" name="Num_chassis" v-model="vehicule.Num_chassis" >
            <p style="color:red;" v-if="errors" >{{errors.Num_chassis}}</p>
            </div>
        </div>
        

<div class="form-group row">
            <label for="Code_radio" class="col-sm-2 col-form-label"> Code_radio</label>
            <div class="col-sm-10">
            <input type="text"  class="form-control" id="Code_radio" name="Code_radio" v-model="vehicule.Code_radio" >
            <p style="color:red;" v-if="errors" >{{errors.Code_radio}}</p>
            </div>
        </div>
        

<div class="form-group row">
            <label for="Categorie" class="col-sm-2 col-form-label"> Categorie</label>
            <div class="col-sm-10">
            <input type="text"  class="form-control" id="Categorie" name="Categorie" v-model="vehicule.Categorie" >
            <p style="color:red;" v-if="errors" >{{errors.Categorie}}</p>
            </div>
        </div>
        

<div class="form-group row">
            <label for="Curburant" class="col-sm-2 col-form-label"> Curburant</label>
            <div class="col-sm-10">
            <input type="text"  class="form-control" id="Curburant" name="Curburant" v-model="vehicule.Curburant" >
            <p style="color:red;" v-if="errors" >{{errors.Curburant}}</p>
            </div>
        </div>
        

<div class="form-group row">
            <label for="Couleur" class="col-sm-2 col-form-label"> Couleur</label>
            <div class="col-sm-10">
            <input type="text"  class="form-control" id="Couleur" name="Couleur" v-model="vehicule.Couleur" >
            <p style="color:red;" v-if="errors" >{{errors.Couleur}}</p>
            </div>
        </div>
        

<div class="form-group row">
            <label for="Delai_debut" class="col-sm-2 col-form-label"> Delai_debut</label>
            <div class="col-sm-10">
            <input type="text"  class="form-control" id="Delai_debut" name="Delai_debut" v-model="vehicule.Delai_debut" >
            <p style="color:red;" v-if="errors" >{{errors.Delai_debut}}</p>
            </div>
        </div>
        

<div class="form-group row">
            <label for="Delai_fin" class="col-sm-2 col-form-label"> Delai_fin</label>
            <div class="col-sm-10">
            <input type="text"  class="form-control" id="Delai_fin" name="Delai_fin" v-model="vehicule.Delai_fin" >
            <p style="color:red;" v-if="errors" >{{errors.Delai_fin}}</p>
            </div>
        </div>
        	
        <input type='hidden' name='_token' :value='token' />

        <button class='btn btn-primary'  @click='addVehicule()' name='save'>Save</button>

        </fieldset>
  
    </form>
</template>


<script>
    export default {
    props:[
        'editMethod',
        'oldVehicule'
    ],
    mounted() {
        console.log('vehiculeForm mounted.');
        if(this.editMethod)
            this.client = this.oldClient;
        },

    data()
    {
        return {
            token: $('meta[name="csrf-token"]').attr('content'),
            vehicule : {
                
				immatricule : '',
				Marque : '',
				Modele : '',
				Nombre_Place : '',
				Puissance : '',
				Date_circulation : '',
				Lieu_stationnement : '',
				Num_chassis : '',
				Code_radio : '',
				Categorie : '',
				Curburant : '',
				Couleur : '',
				Delai_debut : '',
				Delai_fin : '',
            },
            errors: '',
            }
        },
        created()
        {
        
        },
    methods: {
        addVehicule()
        {   
            var url = 'http://localhost:8000/api/vehicules/';
            var type = 'post';
            if(this.editMethod) {url+=this.vehicule.immatricule;type='put'}
            $.ajax({
                url: url,
                type: type,
                datatype: 'json',
                data : $("#form").serialize(),
                success: function(data){
                    console.log(data);
                },
                error: function (request, status, error) {
                    console.log(request);
                    console.log(error);
                    this.errors = request.responseJSON.errors;
                }.bind(this)

               })
        },
        onSubmit(){}
        },
       
        
       
    }
</script>
        