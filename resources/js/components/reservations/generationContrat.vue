<template>
  
    <div class="container" id="ctn" style="margin-top:-60px">
        <div class="row">
            <div class="col-md-4 col-xs-4">
                <h3>SoftwayCar</h3>
                <h6>location de voitures</h6>
            </div>
            <div class="col-md-4 col-xs-4">
               <div>Logo</div>
            </div>
    
            <div class="col-md-4 col-xs-4">
                <h3>SoftwayCar</h3>
                <h6>location de voitures</h6>
            </div>
             <button type="button" class="btn btn-primary" id="btngeneratePdf" @click="generate()">print</button>
        </div>
        <div class="container">
            <div class="header col align-self-center">
                <h3 style="text-align: center">CONTRACT DE LOCATION <span>N: </span><span>{{ReservationFromStore.numRes}}</span></h3>
            </div> <!-- end header -->
    
            <!-- information client -->
            <div class="infos">
                <h5>INFORMATION CLIENT</h5>
                <p><span>Nom & Prenom:</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ReservationFromStore.client.nom + ' '+ReservationFromStore.client.prenom}}</span></p>
                <p><span>Date et lieu de naissance:</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ReservationFromStore.client.dateNaissance+' '+ReservationFromStore.client.lieuNaissance}}</span></p>
                <div class="row" v-if="ReservationFromStore.pieceIdentite === 'cin'">
                    <div class="col-md-4 col-xs-4"><span>N de C.I.N:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>{{ReservationFromStore.client.numPiece}}</span></div>
                    <div class="col-md-6 col-xs-4"><span>Valable jusqu'au:</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ReservationFromStore.client.dateDelivrPiece}}</span></div>
                </div>
                <div class="row" v-if="ReservationFromStore.pieceIdentite === 'passport'">
                    <div class="col-md-4 col-xs-4"><span>N de Passport:</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ReservationFromStore.client.numPiece}}</span></div>
                    <div class="col-md-4 col-xs-4"><span>Delivre le:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ReservationFromStore.client.dateDelivrPiece}}</div>
                    <div class="col-md-4 col-xs-4"><span>a:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ReservationFromStore.client.lieuDelivrPiece}}</div>
                </div>
                <p><span>N d'entree:</span></p>
                <div class="row">
                    <div class="col-md-4 col-xs-4"><span>N de permis:</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ReservationFromStore.client.numPermis}}</span></div>
                    <div class="col-md-4 col-xs-4"><span>Delivre le:</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ReservationFromStore.client.dateDelivrPermis}}</span></div>
                    <div class="col-md-4 col-xs-4"><span>a:</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ReservationFromStore.client.lieuDelivrPermis}}</span></div>
                </div>
                <p><span>Adresse:</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ReservationFromStore.client.addresse}}</span></p>
            </div><!-- information client -->
    
            <!-- information conducteur -->
            <div class="infos">
                <h5>INFORMATION CONDUCTEUR</h5>
                <p><span>Nom & Prenom:</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ReservationFromStore.conducteur.nom}}&nbsp;&nbsp; {{ReservationFromStore.conducteur.prenom}}</span></p>
                <p><span>Date et lieu de naissance:</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ReservationFromStore.conducteur.dateNaissance}}&nbsp;&nbsp; {{ReservationFromStore.conducteur.lieuNaissance}}</span></p>
                <div class="row" v-if="ReservationFromStore.conducteur.numPiece === 'cin'">
                    <div class="col-md-4 col-xs-4"><span>N de C.I.N:</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ReservationFromStore.conducteur.numPiece}}</span></div>
                    <div class="col-md-4 col-xs-4"><span>Valable jusqu'au:</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ReservationFromStore.conducteur.dateDelivrPiece}}</span></div>
                </div>
                <div class="row" v-if="ReservationFromStore.conducteur.numPiece === 'passport'">
                    <div class="col-md-4 col-xs-4"><span>N de Passport:</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ReservationFromStore.conducteur.numPiece}}</span></div>
                    <div class="col-md-4 col-xs-4"><span>Delivre le:</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ReservationFromStore.conducteur.dateDelivrPiece}}</span></div>
                    <div class="col-md-4 col-xs-4"><span>a:</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ReservationFromStore.conducteur.lieuDelivrPiece}}</span></div>
                </div>
                <p><span>N d'entree:</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ReservationFromStore.conducteur.numPermis}}</span></p>
                <div class="row">
                    <div class="col-md-4 col-xs-4"><span>N de permis:</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ReservationFromStore.conducteur.numPermis}}</span></div>
                    <div class="col-md-4 col-xs-4"><span>Delivre le:</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ReservationFromStore.conducteur.dateDelivrPermis}}</span></div>
                    <div class="col-md-4 col-xs-4"><span>a:</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ReservationFromStore.conducteur.lieuDelivrPermis}}</span></div>
                </div>
                <p><span>Adresse:</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ReservationFromStore.conducteur.addresse}}</span></p>
            </div>
             <!-- information voiture -->
             <div class="infos">
                <h5>INFORMATION SUR LA VOITURE</h5>
                <div class="row">
                    <div class="col-md-4 col-xs-4"><span>Marque:</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ReservationFromStore.marque+'  '+ReservationFromStore.modele}}</span></div>
                    <div class="col-md-4 col-xs-4"><span>immatriculation:</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ReservationFromStore.immatricule}}</span></div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-xs-4"><span>Agence depart:</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ReservationFromStore.Lieu_depart}}</span></div>
                    <div class="col-md-4 col-xs-4"><span>Agence retour:</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ReservationFromStore.Lieu_retour}}</span></div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-xs-4"><span>Jour deprat:</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ReservationFromStore.Date_depart}}</span></div>
                    <div class="col-md-4 col-xs-4"><span>Retour Prevu:</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ReservationFromStore.Date_retour}}</span></div>
                    <div class="col-md-4 col-xs-4"><span>Retour Reel:</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ReservationFromStore.Date_retour_reelle}}</span></div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-xs-4"><span>Carburant depart:</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ReservationFromStore.carburant_depart}}</span></div>
                    <div class="col-md-4 col-xs-4"><span>Carburant retour:</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ReservationFromStore.carburant_retour}}</span></div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-xs-4"><span>KM depart:</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ReservationFromStore.km_depart}}</span></div>
                    <div class="col-md-4 col-xs-4"><span>KM retour:</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ReservationFromStore.km_retour}}</span></div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nbre jour</th>
                            <th>PU</th>
                            <th>Prix location</th>
                            <th>Assurance</th>
                            <th>Frais livraison</th>
                            <th>Montant (H.T)</th>
                            <th>Montant (T.T.C)</th>
                            <th>Carburant</th>
                            <th>Depot</th>
                            <th>Solde</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>{{ReservationFromStore.nombreJours}}</td>
                        <td>{{ReservationFromStore.pu}}</td>
                        <td>{{ReservationFromStore.Montant}}</td>
                        <td>-</td>
                        <td>-</td>
                        <td>{{ReservationFromStore.Montant}}</td>
                        <td>{{ReservationFromStore.Montant*0.2+ReservationFromStore.Montant}}</td>
                        <td>{{ReservationFromStore.carburant}}</td>
                        <td>{{ReservationFromStore.depot}}</td>
                        <td>{{ReservationFromStore.solde}}</td>
                        </tr>
                    </tbody>
                </table>
            </div><!-- information voiture -->
    
                <div id="contract">
                    <div class="row" style="margin:0; padding:0 ;border-bottom: 4px solid #000">
                        <div class="col-md-4 col-xs-4">Mode de reglement:</div>
                        <div class="col-md-4 col-xs-4">Montant Franchise:</div>
                        <div class="col-md-4 col-xs-4">Montant Caution:</div>
                    </div>
                    <h5 style="border-bottom: 1px solid #000">NB: Ce contrat ne vaut en aucun cas comme facture</h5>
                    <div class="row">
                        <div class="col-md-4 col-xs-4">
                            <p style="margin-bottom:60px">SIGNATURE DE L'AGENT QUI A UNE</p>
                            <p style="margin-bottom:60px">SIGNATURE DE LOCATAIRE</p>
                            <p style="margin-bottom:60px">SIGNATURE DE DECHARGE</p>
                        </div>
                        <div class="col-md-4 col-xs-4">
                            <img src="storage/img/bt.png" />
                        </div>
                        <div class="col-md-4 col-xs-4">
                            <div style="padding: 0 2%;border: 1px solid #000">
                                <div style="border-bottom: 1px solid #000;padding: 0 30% 0 5%;">
                                    <div style="display:flex;justify-content: space-between;font-size:smaller;">  
                                        <p style="margin-right:30%">Avances</p>
                                        <p style="margin:0">Prolongations</p>
                                    </div>
                                </div>
                                <div style="display:flex;">
                                    <div style="padding: 0px 1%;font-size:smaller;border-right: 1px solid #000">
                                        <p style="margin-top: 12px;">...................</p>
                                        <p>...................</p>
                                        <p>...................</p>
                                        <p>...................</p>
                                        <p>...................</p>
                                        <p>...................</p>
                                    </div>
                                    <div style="padding: 0px 1%;font-size:smaller">
                                        <p style="margin-top: 12px;">Du: ......... Au: .........</p>
                                        <p>Du: ......... Au: .........</p>
                                        <p>Du: ......... Au: .........</p>
                                        <p>Du: ......... Au: .........</p>
                                        <p>Du: ......... Au: .........</p>
                                        <p>Du: ......... Au: .........</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>


</template>

<script>
import { mapGetters, mapActions } from 'vuex';
    export default {
        props:[
           
        ],
        data() {
            return {
            }
        },
        computed:{
              ...mapGetters(['ReservationFromStore']),
        }
        ,methods:{
            ...mapActions(['setGenerateContrat', 'getReservations', 'getReservationsActif','getClients', 'getClientsActif', 'getVehicules', 'getVehiculesActif']),
            generate()
            {
                if (typeof this.ReservationFromStore.editMethod == 'undefined')
                    {
                        var btn = $('#btngeneratePdf');
                        btn.hide();
                        window.print();
                        btn.show();
                        return;
                    }
                this.addReservation();
            },
            addReservation()
            {   
                var url = 'http://localhost:8000/api/reservations/';
                var form = this.ReservationFromStore.form;
                if(this.ReservationFromStore.editMethod) {url+=this.ReservationFromStore.numRes;}
                $.ajax({
                    url: url,
                    type: 'post',
                    datatype: 'json',
                    data : form,
                    success: function(data){
                        if(data == 1)
                        {
                            swal("Success!", "Reservation ajoutee!", "success");
                            this.getReservations({page:1,refresh:true});
                            this.getReservationsActif({page:1,refresh:true});
                            this.getClients({page:1,refresh:true});
                            this.getClientsActif({page:1,refresh:true});
                            this.getVehicules({page:1,refresh:true});
                            this.getVehiculesActif({page:1,refresh:true});
                            var btn = $('#btngeneratePdf');
                            btn.hide();
                            window.print();
                            btn.show();
                            return;
                        }
                        swal("Error!", "Reservation non ajoutee!", "error");
                    }.bind(this),
                    error: function (request, status, error) {
                        console.log(error);
                        this.errors = request.responseJSON.errors;
                    }.bind(this)

                })
            },
        },
        beforeDestroy(){
            this.setGenerateContrat(false);
        }
    }

</script>
<style>
body{
    background-color: #fff;
}
span{
    color: #000;
}
 .infos > p , .infos > h5 , .infos > div.row
        {
            border-bottom: 1px solid #000;
            
        }
        .infos > div.row , .infos > div.row > div[class^="col"]{
            padding: 0;
            margin: 0;
        }
       
</style>