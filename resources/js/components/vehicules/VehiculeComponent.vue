<template>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" >
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Vehicules</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Vehicules</h1>
			</div>
		</div><!--/.row-->
        <div class="row"  v-if="!editMethod" >
        <div class="col-sm-10">
        <div class="panel panel-default">
            <!-- <div class="panel panel-default hidden"> -->
            <div class="panel-body">
                <form class="form-horizontal" action="" method="post">
                    <fieldset>
                        <!-- Name input-->
                        <div class="form-group">
                            <div class="col-md-4">
                                <input id="searchField" name="name" type="text" placeholder="Immatricule/Marque/Modele" class="form-control" v-model="searchField">
                            </div>
                            
                            <div class="col-md-4 widget-right">
                                <button type="button" class="btn btn-success btn-lg pull-right" id='addVoiture' data-toggle="modal" data-target="#CreateNewProduct">
										<em class="fa fa-plus"></em>Ajouter une Voiture</button>
                            </div>
                        </div>
                        
                    </fieldset>
                </form>
            </div>
        </div>
    </div>


<div class="col-sm-12" style="width: inherit" >
				<div class="panel panel-default">
					<div class="panel-body tabs">
						<ul class="nav nav-tabs">
							<li :class="{active: isTabActif}" ><a href="#tab1" data-toggle="tab" @click="isTabActif = true" >Vehicules Actif</a></li>
							<li :class="{active: !isTabActif}"><a href="#tab2" data-toggle="tab" @click="isTabActif =  false" >Vehicules Inactif</a></li>
						</ul>
						<div class="tab-content">
							<div class="d-flex justify-content-center" v-if="typeof allVehiculesSearch.data != 'undefined'">
								<pagination class="mt-5 mb-5" :data="allVehiculesSearch" @pagination-change-page="getVehiculesSearch" ></pagination>
							</div>
                        	<div class="d-flex justify-content-center" v-else-if="isTabActif">
								<pagination class="mt-5 mb-5" :data="allVehiculesActif" @pagination-change-page="getVehiculesActif" ></pagination>
							</div>
							<div class="d-flex justify-content-center" v-else-if="!isTabActif">
								<pagination class="mt-5 mb-5" :data="allVehicules" @pagination-change-page="getVehicules" ></pagination>
							</div>

                            <div style="color:red"  v-if="!isTabActif && vehiculesErrors">{{vehiculesErrors}}</div>
                            <div style="color:red" v-if="isTabActif && vehiculesActifErrors">{{vehiculesActifErrors}}</div>
							<div class="tab-pane fade in active" id="tab1">
								<table class="table table-striped">
								  <thead>
								    <tr>
								      	<th scope='col'>immatricule</th>
										<th scope='col'>Marque</th>
										<th scope='col'>Modele</th>
										<th scope='col'>Nombre_Place</th>
										<th scope='col'>Puissance</th>
										<th scope='col'>Date_circulation</th>
										<th scope='col'>Lieu_stationnement</th>
										<th scope='col'>Num_chassis</th>
										<th scope='col'>Code_radio</th>
										<th scope='col'>Categorie</th>
										<th scope='col'>Curburant</th>
										<th scope='col'>Couleur</th>
										<th scope='col'>Delai_debut</th>
										<th scope='col'>Delai_fin</th>
	
								    </tr>
								  </thead>
								  <tbody>
                                    <tr v-for="vehicule in vehicules" :key="vehicule.immatricule" >
										<td>{{vehicule.immatricule}}</td>
										<td>{{vehicule.marque}}</td>
										<td>{{vehicule.modele}}</td>
										<td>{{vehicule.Nombre_Place}}</td>
										<td>{{vehicule.Puissance}}</td>
										<td>{{vehicule.Date_circulation}}</td>
										<td>{{vehicule.Lieu_stationnement}}</td>
										<td>{{vehicule.Num_chassis}}</td>
										<td>{{vehicule.Code_radio}}</td>
										<td>{{vehicule.Categorie}}</td>
										<td>{{vehicule.Curburant}}</td>
										<td>{{vehicule.Couleur}}</td>
										<td>{{vehicule.Delai_debut}}</td>
										<td>{{vehicule.Delai_fin}}</td>
	
										<td><button  class="btn btn-primary" @click="selectVehicule(vehicule)"><em class="fa fa-file-o"></em></button></td>
                                    </tr>
                                   
								</tbody>
								</table>
							</div>
						</div>
				</div><!--/.panel-->
			</div><!--/.col-->
		</div>

        <div class="row">
        <!-- Modal -->
        <div class="modal fade" id="CreateNewProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                    <center>
                        <h3 class="modal-title align-middle" id="exampleModalLongTitle">Créer une Voiture</h3>
                    </center>
              </div>
              <div class="modal-body">

                <vehiculeForm-component></vehiculeForm-component>	

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    </div>



        </div>
<vehiculeEdit-component  :vehicule="vehicule" :editMethod="editMethod" @toggleEdit="editMethod = !editMethod" v-if="editMethod" ></vehiculeEdit-component>

    </div>
</template>

<script>
import { mapGetters, mapActions} from 'vuex';
    export default {
		props: [
			
        ],
        watch:{
            allVehicules: function(){
				if (!this.isTabActif)
                	this.vehicules = this.allVehicules.data;
            },
            allVehiculesActif: function(){
				if (this.isTabActif)
               	 this.vehicules = this.allVehiculesActif.data;
            },
            isTabActif: async function(){
                if(this.isTabActif)
					this.vehicules = this.allVehiculesActif.data;
				else
					{	
						if(typeof this.allVehicules.data === 'undefined')
                        	await this.getVehicules(1);
                         
						this.vehicules = this.allVehicules.data;
					}

            }
        },
        mounted() {
			console.log('vehicule Component mounted.')
			this.search();
        },
        data()
        {
            return {
				vehicules : [],
				vehicule: '',
				editMethod: false,
                errors: '',
				isTabActif: true,
				searchField: '',
            }
        }
        ,
         async created()
        {
		   await this.getVehiculesActif(1);
		   this.vehicules = this.allVehiculesActif.data;
		}
		,
		methods:{
			selectVehicule(vehicule){
				this.editMethod = !this.editMethod;
				this.vehicule = vehicule;
            },
            search()
			{	var searchField = $('#searchField');
				searchField.keyup(async function() {
					console.log(searchField.val());
					if(searchField.val().trim().length  == 0){
						if(this.isTabActif)
							this.vehicules = this.allVehiculesActif.data;
						else
						this.vehicules = this.allVehicules.data;
						delete this.allVehiculesSearch.data;
						return;
					}
					await this.getVehiculesSearch(searchField.val(), true);
					this.vehicules = this.allVehiculesSearch.data;
					
				}.bind(this));
            },
		  ...mapActions(['getVehicules', 'getVehiculesActif', 'getVehiculesSearch']),
        }
        ,
        computed:{
             ...mapGetters(['allVehicules', 'allVehiculesActif', 'vehiculesErrors', 'vehiculesActifErrors', 'allVehiculesSearch']),
        }
    }
   
</script>
