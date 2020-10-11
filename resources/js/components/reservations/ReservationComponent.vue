<template>
	<div>
		 <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" v-if="!valide">
			 	<div class="container">
    				<div class="row justify-content-center">
        				<div class="col-md-8">
									<div class="card" style="margin-top: 10%;margin-left: 16%;">
							<div class="card-header">
								<p>Veuillez Contacter Administrateur:</p>
								<p style="text-decoration: underline;">tel: +212 06 29 49 65 77</p>
								<p style="text-decoration: underline;">Mail: </p>
							</div>

							<div class="card-body">
								<form>
                        <div class="form-group row">
                            

                            <div class="col-md-6">
                                <input id="serial" type="text" class="form-control" placeholder="number ID" name="serial" v-model="serial" required  autofocus>
                                    <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
                               
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                            <button type="button" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
							</div>
						</div>
					</div>
				</div>
				</div>
	 	</div>
    	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" v-if="valide" >
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Reservations</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Reservations</h1>
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
                                <input id="searchField" name="name" type="text" placeholder="Num Reservation/Immatricule" class="form-control" v-model="searchField" >
                            </div>
                            <div class="col-md-4 widget-right">
                            <button type="button" class="btn btn-success btn-lg pull-right"  data-toggle="modal" data-target="#CreateNewReservation">
                            <em class="fa fa-plus"></em> Ajouter Reservation</button>
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
                            <li :class="{active: isTabActif}"><a href="#tab1" data-toggle="tab" @click="isTabActif = true">Reservations Actif</a></li>
							<li :class="{active: !isTabActif}"><a href="#tab2" data-toggle="tab" @click="isTabActif = false">Reservations</a></li>
						</ul>
						<div class="tab-content">
							<div class="d-flex justify-content-center" v-if="typeof allReservationsSearch.data != 'undefined'">
								<pagination class="mt-5 mb-5" :data="allReservationsSearch" @pagination-change-page="getReservationsSearch" ></pagination>
							</div>
                            <div class="d-flex justify-content-center" v-else-if="isTabActif">
								<pagination class="mt-5 mb-5" :data="allReservationsActif" @pagination-change-page="getReservationsActif" ></pagination>
							</div>
							<div class="d-flex justify-content-center" v-else-if="!isTabActif">
								<pagination class="mt-5 mb-5" :data="allReservations" @pagination-change-page="getReservations" ></pagination>
							</div>
							<div style="color:red" v-if="!isTabActif && reservationsErrors">{{reservationsErrors}}</div>
							<div style="color:red" v-if="isTabActif && reservationsActifErrors">{{reservationsActifErrors}}</div>
							<div class="tab-pane fade in active" id="tab1">
								<table class="table table-striped">
								  <thead>
								    <tr>
								      	<th scope='col'>num reservation</th>
										<th scope='col'>num piece</th>
										<th scope='col'>immatricule</th>
										<th scope='col'>Date depart</th>
										<th scope='col'>Lieu depart</th>
										<th scope='col'>Date retour</th>
                                        <th scope='col'>Date retour reelle</th>
										<th scope='col'>Lieu retour</th>
										<th scope='col'>Carburant depart</th>
										<th scope='col'>Carburant retour</th>
										<th scope='col'>Km depart</th>
										<th scope='col'>Km retour</th>
										<th scope='col'>Montant</th>
										<th scope='col'>Mode paiement</th>
										<th scope='col'>num piece conducteur</th>
										<th scope='col'>nom banq</th>
										<th scope='col'>num cart</th>
	
								    </tr>
								  </thead>
								  <tbody>
                                    <tr v-for="reservation in reservations" :key="reservation.numRes" >
										<td>{{reservation.numRes}}</td>
										<td>{{reservation.numPiece}}</td>
										<td>{{reservation.immatricule}}</td>
										<td>{{reservation.Date_depart}}</td>
										<td>{{reservation.Lieu_depart}}</td>
										<td>{{reservation.Date_retour}}</td>
                                        <td>{{reservation.Date_retour_reelle}}</td>
										<td>{{reservation.Lieu_retour}}</td>
										<td>{{reservation.carburant_depart}}</td>
										<td>{{reservation.carburant_retour}}</td>
										<td>{{reservation.km_depart}}</td>
										<td>{{reservation.km_retour}}</td>
										<td>{{reservation.Montant}}</td>
										<td>{{reservation.Mode_paiement}}</td>
										<td>{{reservation.numPieceCond}}</td>
										<td>{{reservation.nom_banq}}</td>
										<td>{{reservation.num_cart}}</td>
	
										<td><button  class="btn btn-primary" @click="selectReservation(reservation)"><em class="fa fa-file-o"></em></button></td>
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
        <div class="modal fade" id="CreateNewReservation" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document" style="width:50%" >
            <div class="modal-content">
              <div class="modal-header">
                    <center>
                        <h3 class="modal-title align-middle" id="exampleModalLongTitle">Créer une Reservation</h3>
                    </center>
              </div>
              <div class="modal-body">

                <reservationForm-component :editMethod="editMethod"></reservationForm-component>	

              </div>
              <div class="modal-footer">
                <button type="button" id='close-model' class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    </div>



        </div>
<reservationEdit-component  :reservation="reservation" :editMethod="editMethod" @toggleEdit="editMethod = !editMethod" v-if="editMethod" ></reservationEdit-component>

    </div>

		</div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex';
    export default {
		props: [
			
        ],
        watch:{
            allReservations: function(){
				if(!this.isTabActif)
					this.reservations = this.allReservations.data;
			},
			allReservationsActif: function(){
				if(this.isTabActif)
					this.reservations = this.allReservationsActif.data;
			},
			isTabActif: async function()
			{
				if(this.isTabActif)
					this.reservations = this.allReservationsActif.data;
				else
					{	
						if(typeof this.allReservations.data === 'undefined')
							await this.getReservations(1);
						this.reservations = this.allReservations.data;
					}
			}
        },
        mounted() {
			console.log('reservation Component mounted.');
			this.search();
        },
        data()
        {
            return {
				reservations : [],
				reservation: '',
				editMethod: false,
                errors: '',
				isTabActif: true,
				searchField: '',
				valide: true,
				serial: '',
            }
        }
        ,
        async created()
        {
		   await this.getReservationsActif(1);
		   this.reservations = this.allReservationsActif.data;
		    ///////////
		   this.validateApp('123ddhdgfe4-11132-2278-3361');
		   ////////////////
		}
		,
		methods:{
			selectReservation(reservation){
				this.editMethod = !this.editMethod;
				this.reservation = reservation;
            },
            search()
			{	var searchField = $('#searchField');
				searchField.keyup(async function() {
					console.log(searchField.val());
					if(searchField.val().trim().length  == 0){
						if(this.isTabActif)
							this.reservations = this.allReservationsActif.data;
						else
						this.reservations = this.allReservations.data;
						delete this.allReservationsSearch.data;
						return;
					}
					await this.getReservationsSearch(searchField.val());
					this.reservations = this.allReservationsSearch.data;
					
                }.bind(this));
            }
            ,...mapActions(['getReservations', 'getReservationsActif', 'getReservationsSearch', 'validateApp']),
        }
        ,
        computed:{
             ...mapGetters(['allReservations', 'allReservationsActif', 'allReservationsSearch', 'reservationsErrors', 'reservationsActifErrors']),
        }
    }
  
</script>
