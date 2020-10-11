<template>
        <form class="form-horizontal" v-on:submit.prevent="onSubmit" id="form">
             <fieldset>		
                 <input type="hidden" name="_method" value="put" v-if="editMethod">	

<div class="form-group row justify-content-center">
            <div class="col-sm-10 col-sm-offset-2">
            <label for="immatricule" class="col-sm-10 col-form-label text-center">immatricule</label>
            <input type="text"  class="form-control text-center" id="immatricule" name="immatricule" v-model="vehicule.immatricule" >
            <p style="color:red;" v-if="errors" >{{errors.immatricule}}</p>
            </div>
        </div>
        

<div class="form-group row justify-content-center">
            <div class="col-sm-2 col-3">
            <div class="col-sm-10">
            <label for="marque" class="col-sm-10 col-form-label text-center">Marque</label>
            <input type="text" class="form-control text-center" name="marque" id="maqrue" v-model="vehicule.marque">
              <p style="color:red;" v-if="errors" >{{errors.marque}}</p>
            </div> 
        </div>       

    <div class="col-sm-2 col-3">
            <div class="col-sm-10">
            <label for="modele" class="col-sm-10 col-form-label text-center">Modele</label>
            <input type="text" name='modele' class="form-control text-center" id='modele' v-model="vehicule.modele">
            <p style="color:red;" v-if="errors" >{{errors.modele}}</p>
            </div>
        </div>
</div>
        

<div class="form-group row justify-content-center">
     <div class="col-sm-2 col-3">
            <div class="col-sm-10">
            <label for="Nombre_Place" class="col-sm-10 col-form-label text-center">Nombre Place</label>
             <input type="number" min="2" max="8" class="form-control text-center" name="Nombre_Place" id="Nombre_Place" v-model="vehicule.Nombre_Place">
              <p style="color:red;" v-if="errors" >{{errors.Nombre_Place}}</p>
            </div> 
        </div>   

    <div class="col-sm-2 col-3">
                <div class="col-sm-10">
                <label for="Puissance" class="col-sm-10 col-form-label text-center">Puissance</label>
                <input type="text"  class="form-control text-center" id="Puissance" name="Puissance" v-model="vehicule.Puissance" >
                <p style="color:red;" v-if="errors" >{{errors.Puissance}}</p>
                </div>
            </div>
</div>        

<div class="form-group row justify-content-center">
            <div class="col-sm-2 col-3">
            <div class="col-sm-10">
            <label for="Date_circulation" class="col-sm-10 col-form-label text-center">Date circulation</label>
            <input type="date"  class="form-control text-center" id="Date_circulation" name="Date_circulation" v-model="vehicule.Date_circulation" >
            <p style="color:red;" v-if="errors" >{{errors.Date_circulation}}</p>
            </div>
        </div>
        

        <div class="col-sm-2 col-3">
            <div class="col-sm-10">
            <label for="Lieu_stationnement" class="col-sm-10 col-form-label text-center">Lieu stationnement</label>
            <input type="text"  class="form-control text-center" id="Lieu_stationnement" name="Lieu_stationnement" v-model="vehicule.Lieu_stationnement" >
            <p style="color:red;" v-if="errors" >{{errors.Lieu_stationnement}}</p>
            </div>
        </div>
</div>        

<div class="form-group row justify-content-center">
            <div class="col-sm-2 col-3">
            <div class="col-sm-10">
            <label for="Num_chassis" class="col-sm-10 col-form-label text-center">Num chassis</label>
            <input type="text"  class="form-control text-center" id="Num_chassis" name="Num_chassis" v-model="vehicule.Num_chassis" >
            <p style="color:red;" v-if="errors" >{{errors.Num_chassis}}</p>
            </div>
        </div>
        

        <div class="col-sm-2 col-3">
            <div class="col-sm-10">
            <label for="Code_radio" class="col-sm-10 col-form-label text-center">Code radio</label>
            <input type="text"  class="form-control text-center" id="Code_radio" name="Code_radio" v-model="vehicule.Code_radio" >
            <p style="color:red;" v-if="errors" >{{errors.Code_radio}}</p>
            </div>
        </div>
</div>        

<div class="form-group row justify-content-center">
            <div class="col-sm-2 col-3">
            <div class="col-sm-10">
            <label for="Categorie" class="col-sm-10 col-form-label text-center">Categorie</label>
            <input type="text"  class="form-control text-center" id="Categorie" name="Categorie" v-model="vehicule.Categorie" >
            <p style="color:red;" v-if="errors" >{{errors.Categorie}}</p>
            </div>
        </div>
        
        <div class="col-sm-2 col-3">
            <div class="col-sm-10">
            <label for="Curburant" class="col-sm-10 col-form-label text-center">Curburant</label>
            <input type="text"  class="form-control text-center" id="Curburant" name="Curburant" v-model="vehicule.Curburant" >
            <p style="color:red;" v-if="errors" >{{errors.Curburant}}</p>
            </div>
        </div>
</div>        

<div class="form-group row justify-content-center">
            <div class="col-sm-2 col-3">
                <div class="col-sm-10">
                <label for="Delai_debut" class="col-sm-10 col-form-label text-center">Delai debut</label>
                <input type="date"  class="form-control text-center" id="Delai_debut" name="Delai_debut" v-model="vehicule.Delai_debut" >
                <p style="color:red;" v-if="errors" >{{errors.Delai_debut}}</p>
                </div>
            </div>
            
            <div class="col-sm-2 col-3">
            <div class="col-sm-10">
            <label for="Delai_fin" class="col-sm-10 col-form-label text-center">Delai fin</label>
            <input type="date"  class="form-control text-center" id="Delai_fin" name="Delai_fin" v-model="vehicule.Delai_fin" >
            <p style="color:red;" v-if="errors" >{{errors.Delai_fin}}</p>
            </div>
            </div>
</div>

<div class="form-group row justify-content-center">
            <div class="col-sm-2 col-3">
            <div class="col-sm-10">
            <label for="Couleur" class="col-sm-10 col-form-label text-center">Couleur</label>
            <input type="text"  class="form-control text-center" id="Couleur" name="Couleur" v-model="vehicule.Couleur" >
            <p style="color:red;" v-if="errors" >{{errors.Couleur}}</p>
            </div>
        </div>

        <div class="col-sm-2 col-3">
            <div class="col-sm-3">
            <input type="hidden" name="disponible" :value="vehicule.disponible">
            <label for="isDisponible" class="col-form-label">Disponible</label>
            <input type="checkbox" checked style="padding:0" class="form-control" id="isDisponible" name="isDisponible" @click="vehicule.disponible == 1 ? vehicule.disponible = 0 : vehicule.disponible = 1" >
            <p style="color:red;" v-if="errors" >{{errors.disponible}}</p>
            </div>
        </div>
</div>

        <input type='hidden' name='_token' :value='token' />

        <button class='btn btn-primary' data-dismiss="modal" @click='addVehicule()' name='save'>Save</button>
        <button type="button"  v-if="editMethod" class="btn btn-danger" @click='deleteVehicule(vehicule.immatricule)'>Delete</button>


        </fieldset>
    </form>
</template>


<script>
import { mapActions } from 'vuex';
    export default {
    props:[
        'editMethod',
        'oldVehicule'
    ],
    mounted() {
        console.log('vehiculeForm mounted.');
        if(this.editMethod)
            this.vehicule = this.oldVehicule;
            console.log(this.vehicule);
            
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
                disponible: 1,
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
            var url = '/api/vehicules/';
            var type = 'ajoutee!';
            if(this.editMethod) {url+=this.vehicule.immatricule;type = 'modifiee!';}
            $.ajax({
                url: url,
                type: 'post',
                datatype: 'json',
                data : $("#form").serialize(),
                success: function(data){
                   if(data == 1)
                    {
                        if(type == 'modifiee!')
                        {
                            $('#btn-retour').click();
                            this.getVehiculesActif({page:1, refresh:true});
                        }
                        this.getVehicules({page:1,refresh:true});
                        swal("Success!", "Vehicule "+type, "success");
                        return;
                    }
                    swal("Error!", "Vehicule non "+type, "error");
                }.bind(this),
                error: function (request, status, error) {
                    console.log(request);
                    console.log(error);
                    this.errors = request.responseJSON.errors;
                    swal("Error!", "Vehicule non "+type, "error");
                }.bind(this)

               })
        },
        onSubmit(){},
        ...mapActions(['getVehicules', 'getVehiculesActif','deleteVehicule']),
        },
       
        
       
    }
</script>

<style  scoped>
div.form-group {
  
    padding: 5px;
   
}
div.form-group > div{
    width: 50%;

}
</style> 
</style>