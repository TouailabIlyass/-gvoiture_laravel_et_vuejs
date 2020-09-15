@extends('admin')
@section('content')

<div class="row" id='content'>
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
                                    @foreach($clients as $clt)
                                    <tr>
										<td>{{ $clt->numPiece}}</td>
										<td>{{ $clt->prenom }}</td>
										<td><a href="{{url('clients/'.$clt->numPiece.'/edit')}}" class="btn btn-primary"><em class="fa fa-file-o"></em></a></td>
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
					  <form class="form-horizontal" action="{{url('clients')}}" method="POST">
							<fieldset>
								<x-formClient :client="$client"/>
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