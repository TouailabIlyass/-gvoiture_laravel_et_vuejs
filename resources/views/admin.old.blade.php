
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SoftCaisse - Ventes</title>
	<link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{ asset('css/font-awesome.min.css')}}" rel="stylesheet">
	<link href="{{ asset('css/datepicker3.css')}}" rel="stylesheet">
	<link href="{{ asset('css/styles.css')}}" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="../js/html5shiv.js"></script>
	<script src="../js/respond.min.js"></script>
	<![endif]-->
</head>
<body>

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
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

	
		<div class="row">

			<div class="col-sm-12">
				<div class="panel panel-default">
					<!-- <div class="panel panel-default hidden"> -->
					<div class="panel-body">
						<form class="form-horizontal" action="" method="post">
							<fieldset>
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-1 control-label" for="name">Vente</label>
									<div class="col-md-1">
										<input id="name" name="name" type="text" placeholder="Vente" class="form-control">
									</div>
									<label class="col-md-1 control-label" for="date">Date</label>
									<div class="col-md-2">
										<input id="date" name="date" type="date" placeholder="Your email" class="form-control">
									</div>
								
								
									<label class="col-md-1 control-label" for="client">Client</label>
									<div class="col-md-1">
										<input id="client" name="client" type="text" placeholder="Client" class="form-control">
									</div>
									<div class="col-md-1">
										<button type="submit" class="btn btn-primary btn-md">Recherch</button>
									</div>
									<div class="col-md-4 widget-right">
										<form action="index.php" method="post">
											<button type="submit" class="btn btn-success btn-lg pull-right" value="" name="NewSale">
											<em class="fa fa-plus"></em> Nouvelle Vente</button>
										</form>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
	
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">Salle !
						<span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<form class="form-horizontal" action="index.php" method="post">
							<fieldset>
								<!-- Name input-->

								<div class="form-group">
									<div class="col-md-8">
										
									</div>
									<div class="col-md-4">
                                    
                                </div>
								</div>
								<div class="form-group">
									<div class="col-md-4">
									</div>
									<div class="col-md-4">
									</div>
									<div class="col-md-4">
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-8">
									</div>
									<div class="col-md-4">
									</div>
								</div>
								
							
							</fieldset>
						</form>
					</div>
				</div>
			</div><!--/.col-->
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">Salle !
						<span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<form class="form-horizontal" action="index.php" method="post">
							<fieldset>
								<!-- Name input-->

								<div class="form-group">
									<div class="col-md-8">
										
									</div>
									<div class="col-md-4">
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-4">
                                
                                </div>
									<div class="col-md-4">
									</div>
									<div class="col-md-4">
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-8">
									</div>
									<div class="col-md-4">
									</div>
								</div>
								
							
							</fieldset>
						</form>
					</div>
				</div>
			</div><!--/.col-->

			<div class="col-sm-12">
				<div class="panel panel-default">
					<div class="panel-body tabs">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#tab1" data-toggle="tab">Vente En Attent</a></li>
							<li><a href="#tab2" data-toggle="tab">Vente Validee</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane fade in active" id="tab1">
								<table class="table table-striped">
								  <thead>
								    <tr>
								      <th scope="col">Vente</th>
								      <th scope="col">Date de Creation</th>
								      <th scope="col">Date de Retrait</th>
								      <th scope="col">Vendeur</th>
								      <th scope="col">Client</th>
								      <th scope="col">Paiement</th>
								      <th scope="col">Total</th>
								      <th scope="col">Visiter Vente</th>
								    </tr>
								  </thead>
								  <tbody>
								   
								  </tbody>
								</table>
							</div>
							<div class="tab-pane fade" id="tab2">
								<table class="table table-striped">
								  <table class="table table-striped">
								  <thead>
								    <tr>
								      <th scope="col">Vente</th>
								      <th scope="col">Date de Creation</th>
								      <th scope="col">Date de Retrait</th>
								      <th scope="col">Vendeur</th>
								      <th scope="col">Client</th>
								      <th scope="col">Paiement</th>
								      <th scope="col">Total</th>
								      <th scope="col">Visiter Vente</th>
								    </tr>
								  </thead>
								  <tbody>
								   
								  </tbody>
								</table>
								</table>
							</div>
						</div>
				</div><!--/.panel-->
			</div><!--/.col-->
		</div>

			<div class="col-sm-7">
				<div class="panel panel-default">
					<div class="panel-heading">
						<form action="index.php" method ="post" class="form-group">
							<div class="col-md-3">
								<button type="submit" class="btn btn-md btn-primary pull-left"><em class="fa fa-arrow-left"></em></button>
							</div>
						</form>
					</div>
					<div class="panel-body">
						<div class="panel panel-default">
							<div class="panel-body tabs">
								<ul class="nav nav-pills nav-stacked col-md-3">
									<!-- <li class="active"><a href="#pilltab1" data-toggle="tab">Cat 1</a></li>
									<li><a href="#pilltab2" data-toggle="tab">Cat 2</a></li>
									<li><a href="#pilltab3" data-toggle="tab">Cat 3</a></li> -->
								</ul>
								<div class="tab-content col-md-9">
                                
                            </div>
							</div>
						</div><!--/.panel-->
					</div>
				</div>
			</div>

			<div class="col-sm-7">
				<div class="panel panel-default">
					<form action="index.php" method="post">
					<div class="panel-heading">
						Paiement
						
							<button type="submit" class="btn btn-md btn-link pull-right" name="back" ><em class="fa fa-arrow-left"></em> Retour</button>
						
					</div>
					</form> 
					<div class="panel-body">
					
							<div class="alert bg-success" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> Cette vente a été cloturée, il n'est donc pas possible d'y ajouter de nouveaux produits</div>
							<center>
								<h4>Date de validation : <?php echo $current_sale['completedAt'] ?></h4>
								<h4>Date de création : <?php echo $current_sale['createdAt'] ?></h4>
								<h4>ID : 2020-08-1-6</h4>
								<h4>Z : 20200819</h4>
								<h4>Total : <?php echo $current_sale['total'] ?> DH</h4>
							</center>
						
						<div class="row">
							<div class="col-md-12">
								<form method="post" action="index.php">
								
								</form>
							</div>
							</div>
						<hr>
						<div class="row">
							<form class="col-md-4 form-horizontal" name="calculator" method="post" action="index.php">
								<div class="form-group" >
									<div class="col-md-10">
										<?php 
											 echo '<input type="hidden" name="sale_id" value="'.$current_sale['id'].'">';
											 echo '<input id="screen" name="screen" type="text"  class="form-control" value='.$taken_money.'>';
										?>
										
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-3">
										<button type="button" name="" name="b7" class="btn btn-default btn-md" onClick="calcNumbers(7)">7</button>
									</div>
									<div class="col-md-3">
										<button type="button" name="" name="b8" class="btn btn-default btn-md" onClick="calcNumbers(8)">8</button>
									</div>
									<div class="col-md-3">
										<button type="button" name="" name="b9" class="btn btn-default btn-md" onClick="calcNumbers(9)">9</button>
									</div>
								</div>

								<div class="form-group">
									<div class="col-md-3">
										<button type="button" name="" name="b4" class="btn btn-default btn-md" onClick="calcNumbers(4)">4</button>
									</div>
									<div class="col-md-3">
										<button type="button" name="" name="b5" class="btn btn-default btn-md" onClick="calcNumbers(5)">5</button>
									</div>
									<div class="col-md-3">
										<button type="button" name="" name="b6" class="btn btn-default btn-md" onClick="calcNumbers(6)">6</button>
									</div>
								</div>

								<div class="form-group">
									<div class="col-md-3">
										<button type="button" name="" name="b1" class="btn btn-default btn-md" onClick="calcNumbers(1)">1</button>
									</div>
									<div class="col-md-3">
										<button type="button" name="" name="b2" class="btn btn-default btn-md" onClick="calcNumbers(2)">2</button>
									</div>
									<div class="col-md-3">
										<button type="submit" name="" name="b3" class="btn btn-default btn-md" onClick="calcNumbers(3)">3</button>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-3">
										<button type="button" name="" name="b0" class="btn btn-default btn-md" onClick="calcNumbers(0)">0</button>
									</div>
									<div class="col-md-3">
										<button type="button" name="" name="b." class="btn btn-default btn-md" onClick="calcNumbers('.')">.</button>
									</div>
									<div class="col-md-3">
										<button type="button" name="" name="trash" class="btn btn-default btn-md" onClick="calcNumbers(-1)"><em class="fa fa-trash"></em></button>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-10">
										<button type="submit" name="RenduSale" class="btn btn-primary btn-block ">rendu</button>
									</div>
								</div>
							</form>
							<div class="col-md-8">
						
							<button type="submit" name="" class="btn btn-lg btn-info btn-block"><em class="fa fa-money"></em> Overture tiroir</button>
								</div>
						</div>


					
						<hr>
						<div class="row">
							<div class="col-md-12">
								<button type="submit" name="" class="btn btn-lg btn-info"><em class="fa fa-print"></em> Imprimer Ticket</button>
								<button type="submit" name="" class="btn btn-lg btn-info"><em class="fa fa-file-o"></em> PDF A4</button>
								<button type="submit" name="" class="btn btn-lg btn-info"><em class="fa a-paper-plane"></em> Email</button>
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<form method="post" action="index.php">
							<div class="input-group col-lg-12">
							<input type="hidden" name="sale_id" <?php echo 'value="'.$sale_id.'"'; ?> >
							<input type="hidden" name="paiement" <?php echo 'value="'.$paiement.'"'; ?> >
								<button type="submit" class="btn btn-primary btn-lg btn-block" name="CloseSale" value="CASH">Valider Vente</button>
							
							<button type="submit" class="btn btn-success btn-lg btn-block" value="NewSale" name="NewSale"><em class="fa fa-plus"></em> Nouvelle Vente</button>
						</div>
						</form>
						
					</div>
				</div>
			</div>
            
            <div class="col-sm-5">
				<div class="panel panel-default">
					<div class="panel-heading">
						</div>
					<div class="panel-body">
						<form class="form-horizontal" action="index.php" method="post">
							<fieldset>
								<!-- Name input-->
								<div class="form-group">
									<div class="col-md-9">
										<div class="input-group">
											<input id="ClientCodeInput" name="ClientCodeInput" type="text" class="form-control input-md" placeholder="Information Client" /><span class="input-group-btn">
												<button class="btn btn-primary btn-md" id="btn-chat" name="ClientCodeBtn"><em class="fa fa-check"></em></button>
											</span>
										</div>
									</div>
									
								</div>
								<hr>
								<!-- Email input-->
								<div class="form-group">
									<div class="col-md-12">
										<ul class="todo-list">
										</ul>
									</div>
								</div>
								
								<!-- Message body -->
								<div class="form-group">
									<div class="col-md-12">
										<div class="panel panel-blue">
											<div class="panel-body">
											
											</div>
										</div>
									</div>
								</div>
								<form method="post" action="index.php" name="BarCodeForm">
								<div class="form-group" >
									<div class="col-md-9">
										<div class="input-group">
											<?php echo'<input id="sale_id" name="sale_id" type="hidden" class="form-control input-md" value="'.$sale_id.'" />';?>
											<input id="BarCodeInput" name="BarCodeInput" class="form-control input-md" placeholder="Ajouter Produit" /><span class="input-group-btn">
												<button type="submit" class="btn btn-primary btn-md" name="BarCodeBtn" value="BarCodeBtn"><em class="fa fa-plus"></em></button>
											</span>
										</div>
									</div>
								</div>
								</form>
								<!-- Form actions -->
								
								
								<form action="index.php" method="post">
								
								</form>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
			
			</div>
			
			<div class="row">
				<div class="col-sm-12">
				<p class="back-link">SoftCaisse Theme by <a href="https://www.softandscripts.com">Soft&Scripts</a></p>
			</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
	<script>
	function calcNumbers(result){
		// console.log(result);
		if (result==-1) 
		{
			calculator.screen.value='0';
		}
		else
		{
			if (calculator.screen.value==0)
				calculator.screen.value=result;
			else
				calculator.screen.value=calculator.screen.value+result;
		}
		
	}

	</script>
	<script src="{{ asset('js/jquery-1.11.1.min.js')}}"></script>
	<script src="{{ asset('js/bootstrap.min.js')}}"></script>
	<script src="{{ asset('js/chart.min.js')}}"></script>
	<script src="{{ asset('js/chart-data.js')}}"></script>
	<script src="{{ asset('js/easypiechart.js')}}"></script>
	<script src="{{ asset('js/easypiechart-data.js')}}"></script>
	<script src="{{ asset('js/bootstrap-datepicker.js')}}"></script>
	<script src="{{ asset('js/custom.js')}}"></script>
	<script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
	</script>
		
</body>
</html>