<template>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" >
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
                                <input id="searchField" name="name" type="text" placeholder="Nom/Prenom/Email/Id" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary btn-lg">Recherch</button>
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


<div class="col-sm-12">
				<div class="panel panel-default">
					<div class="panel-body tabs">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#tab1" data-toggle="tab">Clients Actif</a></li>
							<li><a href="#tab2" data-toggle="tab">Clients Inactif</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane fade in active" id="tab1">
								<table class="table table-striped">
								  <thead>
								    <tr>
								      									<th scope='col'>pieceIdentite</th>
										<th scope='col'>numPiece</th>
										<th scope='col'>dateDelivrPiece</th>
										<th scope='col'>nom</th>
										<th scope='col'>prenom</th>
										<th scope='col'>telephone</th>
										<th scope='col'>numPermis</th>
										<th scope='col'>dateDelivrPermis</th>
										<th scope='col'>lieuDelivrPiece</th>
										<th scope='col'>lieuDelivrPermis</th>
										<th scope='col'>dateNaissance</th>
										<th scope='col'>lieuNaissance</th>
										<th scope='col'>codePostale</th>
										<th scope='col'>email</th>
										<th scope='col'>pieceIdentiteScan</th>
										<th scope='col'>permisScan</th>
										<th scope='col'>nationalite</th>
										<th scope='col'>addresse</th>
										<th scope='col'>ville_id</th>
	
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
										<td>{{client.dateDelivrPermis}}</td>
										<td>{{client.lieuDelivrPiece}}</td>
										<td>{{client.lieuDelivrPermis}}</td>
										<td>{{client.dateNaissance}}</td>
										<td>{{client.lieuNaissance}}</td>
										<td>{{client.codePostale}}</td>
										<td>{{client.email}}</td>
										<td>{{client.pieceIdentiteScan}}</td>
										<td>{{client.permisScan}}</td>
										<td>{{client.nationalite}}</td>
										<td>{{client.addresse}}</td>
										<td>{{client.ville_id}}</td>
	
										<td><button  class="btn btn-primary" @click="selectClient(client)"><em class="fa fa-file-o"></em></button></td>
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
    export default {
		props: [
			
		],
        mounted() {
			console.log('client Component mounted.');
			this.search();
        },
        data()
        {
            return {
				clients : [],
				clientsSearch: [],
				client: '',
				editMethod: false,
                errors: '',
            }
        }
        ,
        created()
        {
            axios.get('http://localhost:8000/api/clients'
            ).then(response => 
			   { this.clients = response.data;
			 	this.clientsSearch = this.clients;  
			   }
			).catch(error => this.errors = error);
		}
		,
		methods:{
			selectClient(client){
				this.editMethod = !this.editMethod;
				this.client = client;
			},
			search()
			{	var searchField = $('#searchField');
				searchField.keyup(function() {
					console.log(searchField.val());
					if(searchField.val().trim().length  == 0){
						this.clients = this.clientsSearch;
						return;
					}
					axios.get('http://localhost:8000/api/clients/find/'+searchField.val()
           			 ).then(res =>{
							if(searchField.val().trim().length  != 0)
							this.clients = res.data;
						}
						).catch(error => this.errors = error)
					
				}.bind(this));
			}
		}
    }
   
</script>
