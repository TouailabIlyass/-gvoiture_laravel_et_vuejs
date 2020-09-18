<template>
        <form class="form-horizontal" v-on:submit.prevent="onSubmit" id="form">
             <fieldset>
<div class="container">	
                 <input type="hidden" name="_method" value="put" v-if="editMethod">	

<div class="form-group row justify-content-center">
            <div class="col-sm-3 col-3">
            <div class="col-sm-10">
            <label for="numRes" class="col-form-label">num Res</label>
            <input type="text"  class="form-control" id="numRes" name="numRes" v-model="reservation.numRes" >
            <p style="color:red;" v-if="errors" >{{errors.numRes}}</p>
            </div>
        </div>

            <div class="col-sm-3 col-3">
            <div class="col-sm-10">

            <label for="numPiece" class="col-form-label">num Piece</label>
            <input type="text"  class="form-control" id="numPiece" name="numPiece" v-model="reservation.numPiece" >
            <p style="color:red;" v-if="errors" >{{errors.numPiece}}</p>
            </div>
        </div>
</div> 
<!-- nom et prenom -->
<div class="form-group row justify-content-center">
            <div class="col-sm-3 col-3">
            <div class="col-sm-10">
            <label for="numRes" class="col-form-label">Nom</label>
             <input type="text" readonly class="form-control"  v-model="client.nom" >
            </div>
        </div>

        <div class="col-sm-3 col-3">
            <div class="col-sm-10">
            <label for="numPiece" class="col-form-label">Prenom</label>
             <input type="text" readonly class="form-control"  v-model="client.prenom" >
            <p style="color:red;" v-if="errorsClient" >Client n'existe pas !!</p>
            </div>
        </div>
</div> <!-- end nom et prenom -->

<!-- model and marque -->
<div class="form-group row justify-content-center">
            <div class="col-sm-3 col-3">
            <div class="col-sm-10">
            <label for="Date_depart" class="col-form-label">Marque</label>
            <select id='selectMarque' @change="selectMarque()">
                <option :value="marque.marque" v-for="(marque,i) in marques" :key="i">{{marque.marque}}</option>
            </select>
            <p style="color:red;" v-if="errorsMarques" >{{errorsMarquest}}</p>
            </div>
        </div>
        
        <div class="col-sm-3 col-3">
            <div class="col-sm-10">
            <label for="Lieu_depart" class="col-form-label">Modele</label>
            <select id='selectModele' @change="selectModele()">
                <option :value="modele.modele" v-for="(modele,i) in modeles" :key="i">{{modele.modele}}</option>
            </select>
            <p style="color:red;" v-if="errorsModeles" >{{errorsModeles}}</p>
            </div>
        </div>
</div>   



<!-- end model and marque -->




<div class="form-group row justify-content-center">
            <div class="col-sm-3 col-3">
            <div class="col-sm-10">
            <label for="immatricule" class="col-form-label">immatricule</label>
            <input type="text" readonly class="form-control" id="immatricule" name="immatricule" v-model="reservation.immatricule" >
            <p style="color:red;" v-if="errors" >{{errors.immatricule}}</p>
            </div>
        </div>
</div>       

<div class="form-group row justify-content-center">
            <div class="col-sm-3 col-3">
            <div class="col-sm-10">
            <label for="Date_depart" class="col-form-label"> Date_depart</label>
            <input type="text"  class="form-control" id="Date_depart" name="Date_depart" v-model="reservation.Date_depart" >
            <p style="color:red;" v-if="errors" >{{errors.Date_depart}}</p>
            </div>
        </div>
        
        <div class="col-sm-3 col-3">
            <div class="col-sm-10">
            <label for="Lieu_depart" class="col-form-label"> Lieu_depart</label>
            <input type="text"  class="form-control" id="Lieu_depart" name="Lieu_depart" v-model="reservation.Lieu_depart" >
            <p style="color:red;" v-if="errors" >{{errors.Lieu_depart}}</p>
            </div>
        </div>
</div>        

<div class="form-group row justify-content-center">
            <div class="col-sm-3 col-3">
            <div class="col-sm-10">
            <label for="Date_retour" class="col-form-label"> Date_retour</label>
            <input type="text"  class="form-control" id="Date_retour" name="Date_retour" v-model="reservation.Date_retour" >
            <p style="color:red;" v-if="errors" >{{errors.Date_retour}}</p>
            </div>
        </div>
        
            <div class="col-sm-3 col-3">
            <div class="col-sm-10">
            <label for="Lieu_retour" class="col-form-label"> Lieu_retour</label>
            <input type="text"  class="form-control" id="Lieu_retour" name="Lieu_retour" v-model="reservation.Lieu_retour" >
            <p style="color:red;" v-if="errors" >{{errors.Lieu_retour}}</p>
            </div>
        </div>
 </div>       

<div class="form-group row justify-content-center">
            <div class="col-sm-3 col-3">
            <div class="col-sm-10">
            <label for="Montant" class="col-form-label">Montant</label>
            <input type="text"  class="form-control" id="Montant" name="Montant" v-model="reservation.Montant" >
            <p style="color:red;" v-if="errors" >{{errors.Montant}}</p>
            </div>
        </div>
        
            <div class="col-sm-3 col-3">
            <div class="col-sm-10">
            <label for="Mode_paiement" class="col-form-label">Mode_paiement</label>
            <input type="text"  class="form-control" id="Mode_paiement" name="Mode_paiement" v-model="reservation.Mode_paiement" >
            <p style="color:red;" v-if="errors" >{{errors.Mode_paiement}}</p>
            </div>
        </div>
</div>

<div class="form-group row justify-content-center">
            <div class="col-sm-3 col-3">
            <div class="col-sm-10">
            <label for="numPieceCond" class="col-form-label">num Piece Cond</label>
            <input type="text"  class="form-control" id="numPieceCond" name="numPieceCond" v-model="reservation.numPieceCond" >
            <p style="color:red;" v-if="errors" >{{errors.numPieceCond}}</p>
            </div>
        </div>

            <div class="col-sm-3 col-3">
            <div class="col-sm-10">
            <label for="nom_banq" class="col-form-label">nom_banq</label>
            <input type="text"  class="form-control" id="nom_banq" name="nom_banq" v-model="reservation.nom_banq" >
            <p style="color:red;" v-if="errors" >{{errors.nom_banq}}</p>
            </div>
        </div>
</div>        

<div class="form-group row justify-content-center">
            <div class="col-sm-3 col-3">
            <div class="col-sm-10">
            <label for="num_cart" class="col-form-label">num_cart</label>
            <input type="text"  class="form-control" id="num_cart" name="num_cart" v-model="reservation.num_cart" >
            <p style="color:red;" v-if="errors" >{{errors.num_cart}}</p>
            </div>
        </div>
</div>        	
        <input type='hidden' name='_token' :value='token' />

        <button class='btn btn-primary'  @click='addReservation()' name='save' v-if="errorsClient == ''">Save</button>
</div>
        </fieldset>
  
    </form>
</template>


<script>
    export default {
    props:[
        'editMethod',
        'oldReservation'
    ]
    ,
    watch:{
      
    }
    ,
    data()
    {
        return {
            token: $('meta[name="csrf-token"]').attr('content'),
            reservation : {
				
            },
            errors: '',
            errorsClient: '',
            errorsMarques: '',
            errorsModeles: '',
            isNumResFocused: false,
            client: {
                nom: '',
                prenom: '',
            },
            marques: {},
            modeles: {},
            }
        },
        mounted() {
            console.log('reservationForm mounted.');
            if(this.editMethod)
                this.reservation = this.oldReservation;
            console.log('reservation created');
            $("#numPiece").focus(function(){
            this.isNumResFocused = true;
            this.errorsClient = '';
            console.log('focus');
            }.bind(this));
            ////
            $("#numPiece").focusout(function(){
                if(this.isNumResFocused == true)
                {   if(this.reservation.numPiece == '') return;
                    axios.get('http://localhost:8000/api/clients/'+this.reservation.numPiece
                    ).then(res => 
                        {
                            this.client.nom = res.data.nom;
                            this.client.prenom = res.data.prenom
                        }
                    )
                    .catch(error =>{ this.errorsClient = error
                        this.client.nom = '';
                        this.client.prenom = ''
                    });
               this.isNumResFocused = false;
            }
            console.log('yyyy');
            }.bind(this));
            //////////Model
            $('#selectMarque').change(function() {
                
            });
        },
        async  created()
        {       await  axios.get('http://localhost:8000/api/vehicules/marque/marques')
                .then(response => {
                       this.marques = response.data;
                    })
                .catch(error => {this.errorsMarques = error});
                this.selectMarque();
        },
        computed:{
            
        }
        ,
    methods: {
        addReservation()
        {   
            var url = 'http://localhost:8000/api/reservations/';
            var type = 'post';
            if(this.editMethod) {url+=this.reservation.numRes;}
            $.ajax({
                url: url,
                type: 'post',
                datatype: 'json',
                data : $("#form").serialize(),
                success: function(data){
                    console.log(data);
                },
                error: function (request, status, error) {
                    console.log(request);
                    console.log(error);
                    this.errors = request.responseJSON.errors;
                }.bind(this)

               })
        },
        onSubmit(){}
        ,
       async  selectMarque(){
           await  axios.get('http://localhost:8000/api/vehicules/marque/modeles/'+$('#selectMarque').val())
                .then(response => {
                       //this.modeles = JSON.parse(JSON.stringify(response.data));
                       this.modeles = response.data;
                       this.reservation.immatricule = this.modeles[0].immatricule;
                       console.log(response.data);
                       console.log($('#selectMarque').val());
                    })
                .catch(error => {this.errorsModeles = error});
            console.log('---');
                console.log(this.modeles);
             },
       
        //////select modele
              selectModele(){
                 var modele = $('#selectModele').val();
                 for(var i=0;i<this.modeles.length;i++)
                 {
                        if(this.modeles[i].modele == modele)
                            {
                                 this.reservation.immatricule = this.modeles[i].immatricule;
                                 break;
                            }
                 }
              },  
            },

        ///end select modele

    }
</script>
        