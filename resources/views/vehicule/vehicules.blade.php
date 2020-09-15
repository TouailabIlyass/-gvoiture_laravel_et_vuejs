@extends('admin')
@section('content')

<div class="row">
			<div class="col-sm-12">
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
								      <th scope="col">ID</th>
								      <th scope="col">Client</th>
								      <th scope="col"> </th>
								    </tr>
								  </thead>
								  <tbody>
                                    @foreach($vehicules as $vehicule)
                                    <tr>
                                        <td>{{ $vehicule->immatricule}}</td>
                                        <td>{{ $vehicule->Modele }}</td>
                                    </tr>
                                    @endforeach
								</tbody>
								</table>
							</div>
							<div class="tab-pane fade in active" id="tab2">
								<table class="table table-striped">
								  <thead>
								    <tr>
								      <th scope="col">ID</th>
								      <th scope="col">Client</th>
								      <th scope="col"> </th>
								    </tr>
								  </thead>
								  <tbody>
								
								  </tbody>
								</table>
							</div>
						</div>
				</div><!--/.panel-->
			</div><!--/.col-->
		</div>

			<div class="col-sm-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						Details Client
					</div>
					<div class="panel-body">
						<form class="form-horizontal" action="customers.php" method="post">
							<fieldset>
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-5 control-label" for="name">Nom</label>
									<div class="col-md-7">
										</div>
								</div>

								<div class="form-group">
									<label class="col-md-5 control-label" for="name">Prenom</label>
									<div class="col-md-7">
										</div>
								</div>
							
								<!-- Email input-->
								<div class="form-group">
									<label class="col-md-5 control-label" for="email">E-mail</label>
									<div class="col-md-7">
										</div>
								</div>

								<!-- Email input-->
								<div class="form-group">
									<label class="col-md-5 control-label" for="email">Pays</label>
									<div class="col-md-7">
										</div>
								</div>

								<!-- Email input-->
								<div class="form-group">
									<label class="col-md-5 control-label" for="email">Numéro de taxe</label>
									<div class="col-md-7">
										</div>
								</div>

								<!-- Email input-->
								<div class="form-group">
									<label class="col-md-5 control-label" for="email">Téléphone</label>
									<div class="col-md-7">
										</div>
								</div>
								
								<!-- Email input-->
								<div class="form-group">
									<label class="col-md-5 control-label" for="email">Date de naissance</label>
									<div class="col-md-7">
										</div>
								</div>

								<!-- Email input-->
								<div class="form-group">
									<label class="col-md-5 control-label" for="email">Validité</label>
									<div class="col-md-7">
										</div>
								</div>
								
								<!-- Form actions -->
								<div class="form-group">
									<div class="col-md-12 widget-right">
										<button type="submit" class="btn btn-default btn-md pull-right" name="edit_client">Enregistre</button>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-8">

				<div class="panel panel-default">
					<div class="panel-heading">
						<form action="customers.php" method="post">
							Editer Produit 
							<button type="submit" class="btn btn-md btn-link pull-right" name="to_listClt"><em class="fa fa-arrow-left"></em> Retour</button>	
						</form>
					</div>
					<div class="panel-body">
						<div class="row">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-shopping-cart color-blue"></em>
							<h3>CA</h3>
							<div class="text-muted">CA</div>
							
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-comments color-orange"></em>
							<h3>Ventes</h3>
							<div class="text-muted">sales</div>
							
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
							<h3 >Fidélité</h3>
							<div class="text-muted">sales</div>
							
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-xl fa-search color-red"></em>
							<h3>Dernier achat</h3>
							<div class="text-muted">lastSale</div>
							
						</div>
					</div>
				</div>
			</div><!--/.row-->
			<hr>
					</div>
				</div>
			</div>
			<div class="col-sm-8">
				<div class="panel-group" id="accordion">
				  <div class="panel panel-default">
				    <div class="panel-heading">
				      <h3 class="panel-title">
				        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Ventes validées</a>
				      </h3>
				    </div>
				    <div id="collapse1" class="panel-collapse collapse">
				      <div class="panel-body">
				      	<table class="table table-striped">
					  <thead>
					    <tr>
					      <th scope="col">ID</th>
					      <th scope="col">Date</th>
					      <th scope="col">Mode De Paiement</th>
					      <th scope="col">Montant</th>
					      <th scope="col">Points</th>
					      <th scope="col"></th>
					    </tr>
					  </thead>
					  <tbody>
					  
					  	
					  </tbody>
					</table>
				      </div>
				    </div>
				  </div>
				  <div class="panel panel-default">
				    <div class="panel-heading">
				      <h4 class="panel-title">
				        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Ventes en attente</a>
				      </h4>
				    </div>
				    <div id="collapse2" class="panel-collapse collapse">
				      <div class="panel-body">
					<table class="table table-striped">
						  <thead>
						    <tr>
						      <th scope="col">ID</th>
						      <th scope="col">Date</th>
						      <th scope="col">Mode De Paiement</th>
						      <th scope="col">Montant</th>
						      <th scope="col">Points</th>
						      <th scope="col"></th>
						    </tr>
						  </thead>
						  <tbody>
						  	
						  </tbody>
						</table>
				      </div>
				    </div>
				  </div>
				  <div class="panel panel-default">
				    <div class="panel-heading">
				      <h4 class="panel-title">
				        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Produits</a>
				      </h4>
				    </div>
				    <div id="collapse3" class="panel-collapse collapse">
				      <div class="panel-body"><table class="table table-striped">
						  <thead>
						    <tr>
						      <th scope="col">ID</th>
						      <th scope="col">Produit</th>
						      <th scope="col">Prix</th>
						      <th scope="col">Quantite</th>
						      <th scope="col">Points</th>
						      <th scope="col"></th>
						    </tr>
						  </thead>
						  <tbody>
						
						  	
						  </tbody>
						</table></div>
				    </div>
				  </div>
				</div>
			</div>
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
				        <form class="form-horizontal" action="customers.php" method="post">
							<fieldset>
							
								@include('vehicule.vehiculeAdd')
							</fieldset>
						</form>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				      </div>
				    </div>
				  </div>
				</div>
			</div>
			
			
</div><!--/.row-->
@endsection
