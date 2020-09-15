<template>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" >
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
                                <input id="name" name="name" type="text" placeholder="Nom/Prenom/Email/Id" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary btn-lg">Recherch</button>
                            </div>
                            <div class="col-md-4 widget-right">
                            <button type="button" class="btn btn-success btn-lg pull-right"  data-toggle="modal" data-target="#CreateNewProduct">
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
								      									<th scope='col'>numRes</th>
										<th scope='col'>numPiece</th>
										<th scope='col'>immatricule</th>
										<th scope='col'>Date_depart</th>
										<th scope='col'>Lieu_depart</th>
										<th scope='col'>Date_retour</th>
										<th scope='col'>Lieu_retour</th>
										<th scope='col'>Montant</th>
										<th scope='col'>Mode_paiement</th>
										<th scope='col'>numPieceCond</th>
										<th scope='col'>nom_banq</th>
										<th scope='col'>num_cart</th>
	
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
										<td>{{reservation.Lieu_retour}}</td>
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
        <div class="modal fade" id="CreateNewProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                    <center>
                        <h3 class="modal-title align-middle" id="exampleModalLongTitle">Créer un Client</h3>
                    </center>
              </div>
              <div class="modal-body">

                <reservationForm-component></reservationForm-component>	

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    </div>



        </div>
<reservationEdit-component  :reservation="reservation" :editMethod="editMethod" @toggleEdit="editMethod = !editMethod" v-if="editMethod" ></reservationEdit-component>

    </div>
</template>

<script>
    export default {
		props: [
			
		],
        mounted() {
            console.log('reservation Component mounted.')
        },
        data()
        {
            return {
				reservations : [],
				reservation: '',
				editMethod: false,
                errors: '',
            }
        }
        ,
        created()
        {
            axios.get('http://localhost:8000/api/reservations/limit/'
            ).then(response => 
                this.reservations = response.data
            ).catch(error => this.errors = error)
		}
		,
		methods:{
			selectClient(reservation){
				this.editMethod = !this.editMethod;
				this.reservation = reservation;
			}
		}
    }
   
</script>
