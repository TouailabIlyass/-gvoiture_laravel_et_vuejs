<template>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" >
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Clients</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Clients</h1>
			</div>
		</div><!--/.row-->
        <div class="row"  v-if="!editMethod" >
        <div class="col-sm-10">
        <div class="panel panel-default">
            <!-- <div class="panel panel-default hidden"> -->
            <div class="panel-body">
                <form>
                    <fieldset>
                        <!-- Name input-->
                        <div class="form-group">
                            <div class="col-md-4">
                                <input id="searchField" name="name" type="text" placeholder="Nom/Prenom/Email/Id" class="form-control" v-model="searchField">
                            </div>
                            <div class="col-md-4 widget-right">
                                <button type="button" class="btn btn-success btn-lg pull-right" id='addClient' data-toggle="modal" data-target="#CreateNewProduct">
										<em class="fa fa-plus"></em> Cree Un Client</button>
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
							<li :class="{active: isTabActif}"><a href="#tab1" data-toggle="tab" @click="isTabActif = true">Clients Actif</a></li>
							<li :class="{active: !isTabActif}"><a href="#tab2" data-toggle="tab" @click="isTabActif = false">Clients Inactif</a></li>
						</ul>
						<div class="tab-content">
							<div class="d-flex justify-content-center" v-if="typeof allClientsSearch.data != 'undefined'">
								<pagination class="mt-5 mb-5" :data="allClientsSearch" @pagination-change-page="getClientsSearch(searchField)" ></pagination>
							</div>

							<div class="d-flex justify-content-center" v-else-if="isTabActif">
								<pagination class="mt-5 mb-5" :data="allClientsActif" @pagination-change-page="getClientsActif" ></pagination>
							</div>
							<div class="d-flex justify-content-center" v-else-if="!isTabActif">
								<pagination class="mt-5 mb-5" :data="allClients" @pagination-change-page="getClients" ></pagination>
							</div>
							<div style="color:red" v-if="!isTabActif && clientsErrors">{{clientsErrors}}</div>
							<div style="color:red" v-if="isTabActif && clientsActifErrors">{{clientsActifErrors}}</div>
							<div class="tab-pane fade in active" id="tab1">
								<table class="table table-striped">
								  <thead>
								    <tr>
								      	<th scope='col'>piece identite</th>
										<th scope='col'>num piece</th>
										<th scope='col'>date deliver piece</th>
										<th scope='col'>nom</th>
										<th scope='col'>prenom</th>
										<th scope='col'>telephone</th>
										<th scope='col'>num permis</th>
										<th scope="col">date livre permis</th>
										<th scope="col">date livre piece</th>
										<th scope='col'>lieu deliver permis</th>
										<th scope='col'>date naissance</th>
										<th scope='col'>lieu naissance</th>
										<th scope='col'>date deliver permis</th>
										<th scope='col'>lieu deliver piece</th>
										<th scope='col'>code postale</th>
										<th scope='col'>email</th>
										<th scope='col'>piece identite scan</th>
										<th scope='col'>permis scan</th>
										<th scope='col'>nationalite</th>
										<th scope='col'>addresse</th>
										<th scope='col'>ville</th>
	
								    </tr>
								  </thead>
								  <tbody>
                                    <tr v-for="client in clients" :key="client.numPiece" >
										<td>{{client.pieceIdentite}}</td>
										<td>{{client.numPiece}}</td>
										<td>{{client.dateDelivrPiece}}</td>
										<td>{{client.nom}}</td>
										<td>{{client.prenom}}</td>
										<td>{{client.telephone}}</td>
										<td>{{client.numPermis}}</td>
										<td>{{client.dateLirePermis}}</td>
										<td>{{client.dateLivrePiece}}</td>
										<td>{{client.vdeliverpermis}}</td>
										<td>{{client.dateNaissance}}</td>
										<td>{{client.vnaiss}}</td>
										<td>{{client.dateDelivrPermis}}</td>
										<td>{{client.vdeliverpiece}}</td>
										<td>{{client.codePostale}}</td>
										<td>{{client.email}}</td>
										<td>{{client.pieceIdentiteScan}}</td>
										<td>{{client.permisScan}}</td>
										<td>{{client.paye}}</td>
										<td>{{client.addresse}}</td>
										<td>{{client.ville}}</td>
	
										<td><button  class="btn btn-primary" @click="selectClient(client)"><em class="fa fa-file-o"></em></button></td>
                                    </tr>
								</tbody> <!-- end tabactif -->

								
								</table>
							</div>
						</div>
				</div><!--/.panel-->
			</div><!--/.col-->
		</div>

        <div class="row">
        <!-- Modal -->
        <div class="modal fade" id="CreateNewProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document" >
            <div class="modal-content">
              <div class="modal-header">
                    <center>
                        <h3 class="modal-title align-middle" id="exampleModalLongTitle">Créer un Client</h3>
                    </center>
              </div>
              <div class="modal-body">

                <clientForm-component></clientForm-component>	

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    </div>



        </div>
<clientEdit-component  :client="client" :editMethod="editMethod" @toggleEdit="editMethod = !editMethod" v-if="editMethod" ></clientEdit-component>

    </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex';
    export default {
		props: [
			
		],
		watch:{
			allClients: function(){
				if (!this.isTabActif)
					this.clients = this.allClients.data;
			},
			allClientsActif: function(){
				if (this.isTabActif)
				this.clients = this.allClientsActif.data;
			},
			isTabActif: async function()
			{
				if(this.isTabActif)
					this.clients = this.allClientsActif.data;
				else
					{	
						if(typeof this.allClients.data === 'undefined')
							await this.getClients(1);
						this.clients = this.allClients.data;
					}
			},
		}
		,
        mounted() {
			console.log('client Component mounted.');
			this.search();
        },
        data()
        {
            return {
				clients : [],
				client: '',
				editMethod: false,
				isTabActif: true,
				searchField: '',
            }
        }
        ,
       async created()
        {
		   await this.getClientsActif(1);
		   this.clients = this.allClientsActif.data;
		}
		,
		methods:{
			selectClient(client){
				this.editMethod = !this.editMethod;
				this.client = client;
			},
			search()
			{	var searchField = $('#searchField');
				searchField.keyup(async function() {
					console.log(searchField.val());
					if(searchField.val().trim().length  == 0){
						if(this.isTabActif)
							this.clients = this.allClientsActif.data;
						else
						this.clients = this.allClients.data;
						delete this.allClientsSearch.data;
						return;
					}
					await this.getClientsSearch(searchField.val());
					this.clients = this.allClientsSearch.data;
				
				}.bind(this));
			},
		...mapActions(['getClients', 'getClientsActif', 'getClientsSearch']),
        }
        ,
        computed:{
             ...mapGetters(['allClients', 'allClientsActif', 'allClientsSearch','clientsErrors', 'clientsActifErrors']),
        }
    }
   
</script>
