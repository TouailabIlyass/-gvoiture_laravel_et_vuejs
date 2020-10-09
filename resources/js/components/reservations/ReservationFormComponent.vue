<template>
        <form class="form-horizontal" v-on:submit.prevent="onSubmit" id="form">
             
       
                 <input type="hidden" name="_method" value="put" v-if="editMethod">	
<div class="form-group row justify-content-center">
    <div class="col-sm-3 col-3">
            <div class="col-sm-10">
            <label for="numRes" class="col-form-label">Num Reservation</label>
            <input type="text"  class="form-control" id="numRes" name="numRes" v-model="reservation.numRes" >
            <p style="color:red;" v-if="errors" >{{errors.numRes}}</p>
            </div>
        </div>
 </div>       
 <fieldset>
<legend>Information Client: </legend>
<div class="form-group row justify-content-center">

            <div class="col-sm-2 col-3">
            <div class="col-sm-10">
            <label for="numPiece" class="col-form-label">Num Piece</label>
            <input type="text"  class="form-control" id="numPiece" name="numPiece" v-model="reservation.numPiece" >
            <p style="color:red;" v-if="errors" >{{errors.numPiece}}</p>
            </div>
        </div>
 
<!-- nom et prenom -->

            <div class="col-sm-2 col-3">
                <div class="col-sm-10">
                <label for="numRes" class="col-form-label">Nom</label>
                <input type="text" readonly name="nom" class="form-control"  v-model="client.nom" >
                </div>
            </div>

        <div class="col-sm-2 col-3">
            <div class="col-sm-10">
            <label for="numPiece" class="col-form-label">Prenom</label>
             <input type="text" readonly name="prenom" class="form-control"  v-model="client.prenom" >
            <p style="color:red;" v-if="client.errorsClient" >Client n'existe pas !!</p>
            </div>
        </div> 
 <!-- end nom et prenom -->      
</div>
            <div class="row">
                    <div class="col-sm-3 col-3">
                        <div class="col-sm-10">
                    <div class="form-group">
                        <label for="isConducteur" >Conducteur</label>
                        <input type="checkbox"  @click="isConducteur = !isConducteur"  v-model="isConducteur" >    
                    </div>
                    </div>
                    </div>
            </div> 

</fieldset>
<fieldset v-show="isConducteur">
    <legend>Information Conducteur:</legend>
    <!-- Conducteur -->
<div class="form-group row justify-content-center"  >

            <div class="col-sm-2 col-3">
            <div class="col-sm-10">
            <label for="numPieceConducteur" class="col-form-label">Num Piece Conducteur</label>
            <input type="text"  class="form-control" id="numPieceConducteur" name="numPieceConducteur" v-model="conducteur.numPiece" >
            </div>
        </div>

        <div class="col-sm-2 col-3">
            <div class="col-sm-10">
            <label for="nomcond" class="col-form-label">Nom Conducteur</label>
             <input type="text" readonly name="nomcond" id="nomcond" class="form-control"  v-model="conducteur.nom" >
            </div>
        </div>

        <div class="col-sm-2 col-3">
            <div class="col-sm-10">
            <label for="prenomcond" class="col-form-label">Prenom Conducteur</label>
             <input type="text" readonly name="prenomcond" id="prenomcond" class="form-control"  v-model="conducteur.prenom" >
            <p style="color:red;" v-if="errorsClientConducteur" >Client n'existe pas !!</p>
            </div>
        </div>

</div> <!-- end Conducteur -->
</fieldset>

<fieldset>
    <legend>Information Voiture:</legend>
<!-- model and marque -->
<div class="form-group row justify-content-center">
            
            <div class="col-sm-3 col-3">
            <div class="col-sm-10">
            <label for="marque" class="col-form-label">Marque</label>
            <select id='marque' class="form-control" name="marque" @change="selectMarque" v-model="reservation.marque" >
                <option  v-for="(marque,i) in allMarques" :key="i" :value="marque.marque" :selected="marque.marque==reservation.marque">{{marque.marque}}</option>
            </select>
            <p style="color:red;" v-if="errors" >{{errors.marque}}</p>
            </div>
        </div>
        
        <div class="col-sm-3 col-3">
            <div class="col-sm-10">
            <label for="modele" class="col-form-label">Modele</label>
            <select id='modele' class="form-control" name="modele" @change="selectModele" v-model="reservation.modele" >
                <option  v-for="(modele,i) in allModeles" :key="i" :value="modele.modele" :selected="modele.modele==reservation.modele">{{modele.modele}}</option>
            </select>
            <p style="color:red;" v-if="errors" >{{errors.modele}}</p>
            </div>
        </div>

        <div class="col-sm-2 col-3">
            <div class="col-sm-10">
            <label for="immatricule" class="col-form-label">Immatricule</label>
            <input type="text"  v-if="reservation.immatricule.length == 1" readonly class="form-control" id="immatricule" name="immatricule" v-model="reservation.immatricule[0]" >
            <select id='selectImmatricule'  class="form-control" name="immatricule" v-else @change="selectModele()">
                <option :value="immatricule" v-for="(immatricule,i) in reservation.immatricule" :key="i">{{immatricule}}</option>
            </select>
            <p style="color:red;" v-if="errors" >{{errors.immatricule}}</p>
            </div>
        </div>
</div>   

<!-- carburant -->
<div class="form-group  justify-content-center">
            
            <div class="col-sm-2 col-3">
            <div class="col-sm-10">
            <label for="carburant_depart" class="col-form-label">Carburant depart</label>
            <input type="number" class="form-control" id="carburant_depart" name="carburant_depart" min='0' v-model="reservation.carburant_depart">
            <p style="color:red;" v-if="errors" >{{errors.carburant_depart}}</p>
            </div>
        </div>

        <div class="col-sm-2 col-3">
            <div class="col-sm-10">
            <label for="carburant_retour" class="col-form-label">Carburant retour</label>
            <input type="number" class="form-control" id="carburant_retour" name="carburant_retour" min='0' v-model="reservation.carburant_retour">
            <p style="color:red;" v-if="errors" >{{errors.carburant_retour}}</p>
            </div>
        </div>
        

</div>
<!-- end carburant -->



<!-- kilometrage -->
<div class="form-group  justify-content-center">
            
            <div class="col-sm-2 col-3">
            <div class="col-sm-10">
            <label for="km_depart" class="col-form-label">KM depart</label>
            <input type="number" class="form-control" id="km_depart" name="km_depart" min="0" v-model="reservation.km_depart">
            <p style="color:red;" v-if="errors" >{{errors.km_depart}}</p>
            </div>
        </div>

        <div class="col-sm-2 col-3">
            <div class="col-sm-10">
            <label for="km_retour" class="col-form-label">KM retour</label>
            <input type="number" class="form-control" id="km_retour" name="km_retour" min="0" v-model="reservation.km_retour">
            <p style="color:red;" v-if="errors" >{{errors.km_retour}}</p>
            </div>
        </div>

</div>
<!-- end kilemetrage -->
</fieldset>
<!-- end model and marque -->
       

<fieldset>
    <legend>Information Contract:</legend>
<div class="form-group row justify-content-center">
            <div class="col-sm-3 col-3" style="width:50%">
            <div class="col-sm-10">
            <label for="Date_depart" class="col-form-label">Date Depart</label>
            <input type="date"  class="form-control" id="Date_depart" name="Date_depart" v-model="reservation.Date_depart" >
            <p style="color:red;" v-if="errors" >{{errors.Date_depart}}</p>
            </div>
        </div>
        
        <div class="col-sm-3 col-3" style="width:50%">
            <div class="col-sm-10">
            <label for="Lieu_depart" class="col-form-label">Lieu Depart</label>
            <input type="text"  class="form-control" id="Lieu_depart" name="Lieu_depart" v-model="reservation.Lieu_depart" >
            <p style="color:red;" v-if="errors" >{{errors.Lieu_depart}}</p>
            </div>
        </div>
</div>        

<div class="form-group row justify-content-center">
            <div class="col-sm-3 col-3" style="width:50%">
            <div class="col-sm-10">
            <label for="Date_retour" class="col-form-label">Date Retour</label>
            <input type="date"  class="form-control" id="Date_retour" name="Date_retour" v-model="reservation.Date_retour" >
            <p style="color:red;" v-if="errors" >{{errors.Date_retour}}</p>
            </div>
        </div>

            <div class="col-sm-3 col-3" style="width:50%">
            <div class="col-sm-10">
            <label for="Lieu_retour" class="col-form-label">Lieu Retour</label>
            <input type="text"  class="form-control" id="Lieu_retour" name="Lieu_retour" v-model="reservation.Lieu_retour" >
            <p style="color:red;" v-if="errors" >{{errors.Lieu_retour}}</p>
            </div>
        </div>
 </div>       
<div class="form-group row justify-content-center" v-if="!editMethod">

    <div class="col-sm-3 col-3">
            <div class="col-sm-10">
            <label for="nombreJours" class="col-form-label">Nombre Jours</label>
            <input type="text" readonly class="form-control" id="nombreJours" name="nombreJours" v-model="nombreJours" >
            <p style="color:red;" v-if="errors" >{{errors.nombreJours}}</p>
            </div>
        </div>

        <div class="col-sm-2 col-2">
            <div class="col-sm-10">
            <label for="Montant" class="col-form-label">PU</label>
            <input type="number"  class="form-control" id="pu" name="pu" min="-20" v-model="reservation.pu" >
            <p style="color:red;" v-if="errors" >{{errors.pu}}</p>
            </div>
        </div>

        <div class="col-sm-2 col-2">
            <div class="col-sm-10">
            <label for="Montant" class="col-form-label">Montant</label>
            <input type="text" readonly class="form-control" id="Montant" name="Montant" v-model="reservation.Montant" >
            <p style="color:red;" v-if="errors" >{{errors.Montant}}</p>
            </div>
        </div>

</div>


<!-- if editMethod -->
<div class="form-group row justify-content-center" v-if="editMethod">

    <div class="col-sm-3 col-3" style="width:30%">
            <div class="col-sm-12">
            <label for="Date_retour_reelle" class="col-form-label">Date Retour Reelle</label>
            <input type="date"  class="form-control" id="Date_retour_reelle" name="Date_retour_reelle" v-model="reservation.Date_retour_reelle" >
            <p style="color:red;" v-if="errors" >{{errors.Date_retour_reelle}}</p>
            </div>
    </div>

    <div class="col-sm-3 col-3" style="width:19%">
            <div class="col-sm-12">
            <label for="nombreJours" class="col-form-label">Nb Jours</label>
            <input type="text" readonly class="form-control" id="nombreJours" name="nombreJours" v-model="nombreJours" >
            <p style="color:red;" v-if="errors" >{{errors.nombreJours}}</p>
            </div>
        </div>

        <div class="col-sm-3 col-3" style="width:23%">
            <div class="col-sm-12">
            <label for="Montant" class="col-form-label">PU</label>
            <input type="number"  class="form-control" id="pu" name="pu" min="0" v-model="reservation.pu" >
            <p style="color:red;" v-if="errors" >{{errors.pu}}</p>
            </div>
        </div>

        <div class="col-sm-3 col-3" style="width:23%">
            <div class="col-sm-12">
            <label for="Montant" class="col-form-label">Montant</label>
            <input type="text" readonly class="form-control" id="Montant" name="Montant" v-model="reservation.Montant" >
            <p style="color:red;" v-if="errors" >{{errors.Montant}}</p>
            </div>
        </div>

</div>
<!-- end edit -->

<div class="form-group row justify-content-center">

            <div class="col-sm-3 col-3">
            <div class="col-sm-10">
            <label for="Mode_paiement" class="col-form-label">Mode Paiement</label>
            <select type="text"  class="form-control" id="Mode_paiement" name="Mode_paiement" v-model="reservation.Mode_paiement" >
                <option value="espece" selected>Espece</option>
                <option value="carte">Carte</option>
            </select>
            <p style="color:red;" v-if="errors" >{{errors.Mode_paiement}}</p>
            </div>
        </div>

        <div class="col-sm-3 col-3" v-if="reservation.Mode_paiement == 'carte'">
            <div class="col-sm-10">
            <label for="nom_banq" class="col-form-label">Nom Banque</label>
            <input type="text"  class="form-control" id="nom_banq" name="nom_banq" v-model="reservation.nom_banq" >
            <p style="color:red;" v-if="errors" >{{errors.nom_banq}}</p>
            </div>
        </div>

         <div class="col-sm-3 col-3" v-if="reservation.Mode_paiement == 'carte'">
            <div class="col-sm-10">
            <label for="num_cart" class="col-form-label">Numero Carte</label>
            <input type="text"  class="form-control" id="num_cart" name="num_cart" v-model="reservation.num_cart" >
            <p style="color:red;" v-if="errors" >{{errors.num_cart}}</p>
            </div>
        </div>

</div>

<div class="form-group row justify-content-center">

            <div class="col-sm-3 col-3">
            <div class="col-sm-10">
            <label for="depot" class="col-form-label">Depot</label>
            <input type="number"  class="form-control" id="depot" name="depot" v-model="reservation.depot" >
            <p style="color:red;" v-if="errors" >{{errors.depot}}</p>
            </div>
        </div>

         <div class="col-sm-3 col-3">
            <div class="col-sm-10">
            <label for="solde" class="col-form-label">Solde</label>
            <input type="number"  class="form-control" id="solde" name="solde" v-model="reservation.solde" >
            <p style="color:red;" v-if="errors" >{{errors.solde}}</p>
            </div>
        </div>

</div>
</fieldset>

        <input type='hidden' name='_token' :value='token' />

       <button type="button" v-if="editMethod" class="btn btn-primary" @click='addReservation'>Save</button>

       <button type="button"  class="btn btn-info" id='saveToStore'  @click='addReservationToStore()'>View and print</button>
       <button type="button"  v-if="editMethod" class="btn btn-danger" @click='deleteReservation(reservation.numRes)'>Delete</button>

    </form>
</template>


<script>
import { mapGetters, mapActions } from 'vuex';
    export default {
    props:[
        'editMethod',
        'oldReservation'
    ]
    ,
    watch:{

        'reservation.pu' : function(){this.reservation.Montant = this.reservation.pu * this.nombreJours; this.reservation.depot = this.reservation.Montant},
        nombreJours: function(){this.reservation.Montant = this.reservation.pu * this.nombreJours; this.reservation.depot = this.reservation.Montant},
    }
    ,
    data()
    {
        return {
            token: $('meta[name="csrf-token"]').attr('content'),
            reservation : {
                numPiece: '',
                immatricule: [],
                Date_retour: '',
                Date_depart: '',
                Montant: 0,
                Mode_paiement: 'espece',
                num_cart: 0,
                nom_banq: '',
                marque: '',
                modele: 'tttttt',
                km_depart: '',
                km_retour: '',
                Lieu_depart: '',
                Lieu_retour: '',
                carburant_depart: '',
                carburant_retour: '',
                depot: 0,
                solde: 0,
                pu: 0,
            },
            errors: '',
            errorsClient: '',
            errorsClientConducteur: false,
            errorsMarques: '',
            errorsModeles: '',
            client: {
                nom: '',
                prenom: ''
            },
            isValide: false,
            isConducteur: false,
            conducteur: {
                numPiece: '',
                nom: '',
                prenom: '',
            }
            ,
            generateContrat: false,
            }
        },
        mounted() {
            console.log('reservationForm mounted.');
            if(this.editMethod)
               { 
                    this.reservation = this.oldReservation;
                    this.client = this.reservation.client;
                   // this.reservation.Montant = this.oldReservation.Montant;
                    if(this.reservation.conducteur != null)
                        this.conducteur = this.reservation.conducteur;
                    this.isValide = true;
                    console.log(this.oldReservation);
               }
            ////
            $('#numPiece').focusout(function(){
                    if(this.reservation.numPiece == '') return;
                    axios.get('http://localhost:8000/api/clients/'+this.reservation.numPiece
                    ).then(res => 
                        {
                            this.client = res.data
                            this.isValide = true;
                            this.client.errorsClient = false;
                        }
                    )
                    .catch(error =>{ this.client.errorsClient = error
                        this.client.nom = '';
                        this.client.prenom = ''
                        this.isValide = false;
                    });
            }.bind(this));
            ///Conducteur
            $('#numPieceConducteur').focusout(function(){
                console.log('focc cond');
                    if(this.conducteur.numPiece == '') return;
                    axios.get('http://localhost:8000/api/clients/'+this.conducteur.numPiece
                    ).then(res => 
                        {
                            this.conducteur = res.data;
                            this.errorsClientConducteur = false;
                        }
                    )
                    .catch(error =>{ this.errorsClientConducteur = error
                        this.conducteur.nom = '';
                        this.conducteur.prenom = '';
                        this.isValide = false;
                    });
            }.bind(this));
            ///endConducteur
        },
        async  created()
        {       await  this.getMarques();
        },
        
    methods: {
        ...mapActions(['getMarques', 'getModelsByMarques', 'addReservationST', 'getReservations', 'getReservationsActif', 'deleteReservation']),
        addReservation()
        {   
            var url = 'http://localhost:8000/api/reservations/';
            if(this.editMethod) {url+=this.reservation.numRes;}
            $.ajax({
                url: url,
                type: 'post',
                datatype: 'json',
                data : $("#form").serialize(),
                success: function(data){
                    if(data == 1)
                    {
                        swal("Success!", "Reservation modifie!", "success");
                        this.getReservations({page:1,refresh:true});
                        this.getReservationsActif({page:1,refresh:true});
                        return;
                    }
                   swal("Error!", "Reservation non modifie!", "error");
                }.bind(this),
                error: function (request, status, error) {
                    console.log(error);
                    this.errors = request.responseJSON.errors;
                    swal("Error!", "Reservation non "+type, "error");
                }.bind(this)

            })
        },
        addReservationToStore(){
            if(this.formValidate())
                return ;
            if(!this.editMethod)
                $('#saveToStore').attr('data-dismiss','modal');
            var obj = {};
            var form = $('#form');
            var a = form.serializeArray();
            obj.form = form.serialize();
            $.each(a, function() {
                if (obj[this.name] !== undefined) {
                    if (!obj[this.name].push) {
                        obj[this.name] = [obj[this.name]];
                    }
                    obj[this.name].push(this.value || '');
                } else {
                    obj[this.name] = this.value || ''; 
                }
            });
            obj.client = this.client;
            if(this.conducteur.nom != '')
                obj.conducteur = this.conducteur;
            else obj.conducteur = {};
            obj.carburant='test';
            obj.editMethod = this.editMethod;
            console.log(obj);
            this.addReservationST(obj);
            this.$router.push('Contrat');
          
        },
        onSubmit(){},
            formValidate()
            {
                var errors={};
                var errStr = 'not a valide data';
                if (isNaN(this.reservation.pu) || this.reservation.pu <= 0 )
                    errors.pu = errStr;
                if (isNaN(this.reservation.Montant) || this.reservation.Montant <= 0 )
                    errors.Montant = errStr;
                if (isNaN(this.reservation.depot) || this.reservation.depot < 0 )
                    errors.depot = errStr;
                if (isNaN(this.reservation.solde) || this.reservation.solde < 0 )
                    errors.solde = errStr;
                if (isNaN(this.nombreJours) || this.nombreJours < 0 )
                    errors.nombreJours = errStr;
                if (isNaN(this.reservation.km_depart) || this.reservation.km_depart == '' || this.reservation.km_depart<0)
                    errors.km_depart = errStr;
                if (isNaN(this.reservation.km_retour) || this.reservation.km_depart == '' || this.reservation.km_retour<0)
                    errors.km_retour = errStr;
                if (isNaN(this.reservation.carburant_depart) || this.reservation.carburant_depart == '' || this.reservation.carburant_depart<0)
                    errors.carburant_depart = errStr;
                if (isNaN(this.reservation.carburant_retour) || this.reservation.carburant_retour == '' || this.reservation.carburant_retour<0)
                    errors.carburant_retour = errStr;
                if (isNaN(Date.parse(this.reservation.Date_depart)) || this.reservation.Date_depart == '' )
                    errors.Date_depart = errStr;
                if (isNaN(Date.parse(this.reservation.Date_retour)) || this.reservation.Date_retour == '' )
                    errors.Date_retour = errStr;
                if (this.reservation.Mode_paiement !='espece')
                {
                    if (this.reservation.num_cart == '' || isNaN(this.reservation.num_cart) ||this.reservation.num_cart  < 0)
                        errors.num_cart = errStr;
                    if (this.reservation.nom_banque == '' || isNaN(this.reservation.nom_banq))
                        errors.nom_banq = errStr;
                }
                if (this.reservation.marque == '' )
                    errors.marque = errStr;
                if (this.reservation.modele == '' )
                    errors.modele = errStr;
                if (this.reservation.Lieu_depart == '' )
                    errors.Lieu_depart = errStr;
                if (this.reservation.Lieu_retour == '' )
                    errors.Lieu_retour = errStr;
                console.log(errors);
                if (!jQuery.isEmptyObject(errors))
                {
                    this.errors = errors;
                    return true;
                }
                return false;
            },
            async selectMarque()
            {
                console.log('changed: '+this.reservation.marque);
                await this.getModelsByMarques(this.reservation.marque);
            },
            selectModele()
            {
                this.reservation.immatricule = [];
                for(var i=0;i<this.allModeles.length;i++)
                {  
                    if(this.allModeles[i].modele == this.reservation.modele)
                    { 
                        this.reservation.immatricule.push(this.allModeles[i].immatricule);
                    }
                }
            },
        },
        computed:{
                nombreJours: function()
                {
                    if(this.reservation.Date_retour == '' || this.reservation.Date_depart == '') return 0;
                    var Fdate_retour= this.reservation.Date_retour.split("-");
                    var Fdate_depart= this.reservation.Date_depart.split("-");
                    //var date_retour = new Date(Fdate_retour[2], Fdate_retour[1] - 1, Fdate_retour[0]);
                    //var date_depart = new Date(Fdate_depart[2], Fdate_depart[1] - 1, Fdate_depart[0]);
                    var date_retour = new Date(Fdate_retour[1] +'/'+ Fdate_retour[2] +'/'+ Fdate_retour[0]);
                    var date_depart = new Date(Fdate_depart[1]+'/'+ Fdate_depart[2] +'/'+ Fdate_depart[0]);
                    var days = (date_depart.getTime() - date_retour.getTime()) / (1000 * 3600 * 24);
                    return Math.round(Math.abs(days));
                },
                ...mapGetters(['allMarques', 'allModeles', 'ReservationFromStore']),
            },
           

       

    }
</script>
<style  scoped>



fieldset{
   margin-bottom: 30px;
    border: 1px solid silver;
}
legend{
    
}
div.form-group {
  
    padding: 5px;
   
}
div.form-group > div{
    width: 33%;

}
</style>        