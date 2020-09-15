@extends('admin')
@section('content')
<div id='content_editClient'>
<div class="col-sm-4">
    <div class="panel panel-default">
        <div class="panel-heading">
            Details Client
        </div>
        <div class="panel-body">
        <form class="form-horizontal" action="{{url('clients/'.$client->numPiece)}}" method="POST">
                <fieldset>
                  <input type="hidden" name="_method" value="put">
                    <!-- Name input-->
                    <x-formClient :client="$client" />
                </fieldset>
            </form>
        </div>
    </div>
</div>
<div class="col-sm-8">

    <div class="panel panel-default">
        <div class="panel-heading">
                Editer Produit 
                <a href="{{url('clients/')}}" class="btn btn-md btn-link pull-right" ><em class="fa fa-arrow-left"></em> Retour</a>
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

</div>

@endsection