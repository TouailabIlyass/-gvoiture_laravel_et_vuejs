<template>
        <form class="form-horizontal" v-on:submit.prevent="onSubmit" id="form" enctype="multipart/form-data">
             <fieldset>		
                 <input type="hidden" name="_method" value="put" v-if="editMethod">	
<div class="container">
    <div class="form-group row justify-content-center">
            <div class="col-sm-3 col-3">
                <label for="pieceIdentite" class="col-sm-10 col-form-label text-center">piece Identite</label>
                <select id="pieceIdentite" class="form-control" name="pieceIdentite">
                    <option value="CIN">CIN</option>
                    <option value="PASSPORT">PASSPORT</option>
                </select>
            <p style="color:red;" v-if="errors" >{{errors.pieceIdentite}}</p>
            </div>

            <div class="col-sm-3 col-3">
            <label for="numPiece" class="col-sm-10 col-form-label text-center">num Piece</label>
            <input type="text"  class="form-control text-center" id="numPiece" name="numPiece" v-model="client.numPiece" >
            <p style="color:red;" v-if="errors" >{{errors.numPiece}}</p>
            </div>

        </div>

        <div class="form-group row justify-content-center">
            <div class="col-sm-3">
            <div class="col-sm-10">
            <label for="dateLivrePiece" class="col-sm-10 col-form-label text-center">date Livre Piece</label>
            <input type="date"  class="form-control text-center" id="dateLivrePiece" name="dateLivrePiece" v-model="client.dateLivrePiece" >
            <p style="color:red;" v-if="errors" >{{errors.dateLivrePiece}}</p>
            </div>
        </div>


        <div class="form-group row justify-content-center">
            <div class="col-sm-3">
            <div class="col-sm-10">
            <label for="dateLivrePermis" class="col-form-label">date Livre Permis</label>
            <input type="date"  class="form-control text-center" id="dateLivrePermis" name="dateLivrePermis" v-model="client.dateLivrePermis" >
            <p style="color:red;" v-if="errors" >{{errors.dateLivrePermis}}</p>
            </div>
            </div>
        </div>
    </div>



    <div class="form-group row justify-content-center">
            <div class="col-sm-3">
            <div class="col-sm-10">
            <label for="dateDelivrPiece" class="col-sm-10 col-form-label text-center">date Delivr Piece</label>
            <input type="date"  class="form-control text-center" id="dateDelivrPiece" name="dateDelivrPiece" v-model="client.dateDelivrPiece" >
            <p style="color:red;" v-if="errors" >{{errors.dateDelivrPiece}}</p>
            </div>
        </div>


        <div class="form-group row justify-content-center">
            <div class="col-sm-3">
            <div class="col-sm-10">
            <label for="dateDelivrPermis" class="col-form-label">date Delivr Permis</label>
            <input type="date"  class="form-control text-center" id="dateDelivrPermis" name="dateDelivrPermis" v-model="client.dateDelivrPermis" >
            <p style="color:red;" v-if="errors" >{{errors.dateDelivrPermis}}</p>
            </div>
            </div>
        </div>
    </div>

    <div class="form-group row justify-content-center">
            <div class="col-sm-3 col-3">
            <div class="col-sm-10">
             <label for="nom" class="col-sm-10 col-form-label text-center">nom</label>
            <input type="text"  class="form-control text-center" id="nom" name="nom" v-model="client.nom" >
            <p style="color:red;" v-if="errors" >{{errors.nom}}</p>
            </div>
        </div>
        

    <div class="col-sm-3 col-3">
            <div class="col-sm-10">
            <label for="prenom" class="col-sm-10 col-form-label text-center">prenom</label>
            <input type="text"  class="form-control text-center" id="prenom" name="prenom" v-model="client.prenom" >
            <p style="color:red;" v-if="errors" >{{errors.prenom}}</p>
            </div>
        </div>


    </div>

    
        

<div class="form-group row justify-content-center">
 <div class="col-sm-3 col-3">
            <div class="col-sm-10">
            <label for="telephone" class="col-sm-10 col-form-label text-center">telephone</label>
            <input type="number"  class="form-control text-center" id="telephone" name="telephone" v-model="client.telephone" >
            <p style="color:red;" v-if="errors" >{{errors.telephone}}</p>
            </div>
        </div>
        

 <div class="col-sm-3 col-3">
            <div class="col-sm-10">
            <label for="numPermis" class="col-sm-10 col-form-label text-center">num Permis</label>
            <input type="text"  class="form-control text-center" id="numPermis" name="numPermis" v-model="client.numPermis" >
            <p style="color:red;" v-if="errors" >{{errors.numPermis}}</p>
            </div>
        </div>
      </div>  


        
<div class="form-group row justify-content-center">
            <div class="col-sm-3">
            <div class="col-sm-10">
            <label for="lieuDelivrPiece" class="col-sm-10 col-form-label text-center">lieu Delivr Piece</label>
            <select name='lieuDelivrPiece' class="form-control text-center" id='lieuDelivrPiece' v-model="client.lieuDelivrPiece" >
            <option v-for="ville in allPayes.villes" :key="ville.id"  :value="ville.id">{{ville.ville}}</option>       
            </select>
            <p style="color:red;" v-if="errors" >{{errors.lieuDelivrPiece}}</p>
            </div>
        </div>

            <div class="col-sm-3">
            <div class="col-sm-10">
            <label for="lieuDelivrPermis" class="col-sm-10 col-form-label text-center">lieu Delivr Permis</label>
            <select name='lieuDelivrPermis' class="form-control text-center" id='lieuDelivrPermis' v-model="client.lieuDelivrPermis" >
            <option v-for="ville in allPayes.villes" :key="ville.id"  :value="ville.id">{{ville.ville}}</option>       
            </select>
            <p style="color:red;" v-if="errors" >{{errors.lieuDelivrPermis}}</p>
            </div>
        </div>
</div>     

<div class="form-group row justify-content-center">
            <div class="col-sm-3">
            <div class="col-sm-10">
            <label for="dateNaissance" class="col-sm-10 col-form-label text-center">date Naissance</label>
            <input type="date"  class="form-control text-center" id="dateNaissance" name="dateNaissance" v-model="client.dateNaissance" >
            <p style="color:red;" v-if="errors" >{{errors.dateNaissance}}</p>
            </div>
        </div>
        
            <div class="col-sm-3">
            <div class="col-sm-10">
            <label for="lieuNaissance" class="col-sm-10 col-form-label text-center">lieu Naissance</label>
            <select name='lieuNaissance' class="form-control text-center" id='lieuNaissance' v-model="client.lieuNaissance" >
            <option v-for="ville in allPayes.villes" :key="ville.id"  :value="ville.id">{{ville.ville}}</option>       
            </select>
            <p style="color:red;" v-if="errors" >{{errors.lieuNaissance}}</p>
            </div>
        </div>
</div>        

<div class="form-group row justify-content-center">
            <div class="col-sm-3">
            <div class="col-sm-10">
            <label for="codePostale" class="col-sm-10 col-form-label text-center">code Postale</label>            
            <input type="text"  class="form-control text-center" id="codePostale" name="codePostale" v-model="client.codePostale" >
            <p style="color:red;" v-if="errors" >{{errors.codePostale}}</p>
            </div>
        </div>
        
            <div class="col-sm-3">
            <div class="col-sm-10">
            <label for="email" class="col-sm-10 col-form-label text-center">email</label>            
            <input type="email"  class="form-control text-center" id="email" name="email" v-model="client.email" >
            <p style="color:red;" v-if="errors" >{{errors.email}}</p>
            </div>
        </div>
</div>        

<div class="form-group row justify-content-center">
            <div class="col-sm-3">
            <div class="col-sm-10">
            <label for="pieceIdentiteScan" class="col-form-label text-center">piece Identite Scan</label>
            <input type="file"  class="form-control text-center" id="pieceIdentiteScan" name="uploadPieceIdentiteScan"  >
            <p style="color:red;" v-if="errors" >{{errors.pieceIdentiteScan}}</p>
            </div>
        </div>
        
            <div class="col-sm-3">
            <div class="col-sm-10">
            <label for="permisScan" class="col-sm-10 col-form-label text-center">permis Scan</label>
            <input type="file"  class="form-control text-center" id="permisScan" name="uploadPermisScan" >
            <p style="color:red;" v-if="errors" >{{errors.permisScan}}</p>
            </div>
        </div>
</div>

<div class="form-group row">
    <div class="col-sm-5" style="margin-left:6%">
            <div class="col-sm-10">
            <label for="addresse" class="col-sm-10 col-form-label text-center">addresse</label>
            <input type="text"  class="form-control text-center" id="addresse" name="addresse" v-model="client.addresse" >
            <p style="color:red;" v-if="errors" >{{errors.addresse}}</p>
            </div>
        </div>
</div>

<div class="form-group row justify-content-center">
            <div class="col-sm-3">
            <div class="col-sm-10">
            <label for="nationalite" class="col-sm-10 col-form-label text-center">nationalite</label>
             <select name='nationalite' class="form-control text-center" id='payes'>
                <option v-for="paye in allPayes.payes" :key="paye.id"  :value="paye.id">{{paye.paye}}</option> 
              </select>
              <p v-if="errors" >{{errors.nationalite}}</p>
            </div>
        </div>       

    <div class="col-sm-3">
            <div class="col-sm-10">
            <label for="ville_id" class="col-sm-10 col-form-label text-center">ville</label>
            <select name='ville_id' class="form-control text-center" id='villes'>
            <option v-for="ville in allPayes.villes" :key="ville.id"  :value="ville.id">{{ville.ville}}</option>       
            </select>
          <p v-if="errors" >{{errors.ville}}</p>
            </div>
        </div>
</div>
        <input type='hidden' name='_token' :value='token' />

        <button class='btn btn-primary' data-dismiss="modal" @click='addClient()' name='save'>Save</button>

       <button type="button"  v-if="editMethod" class="btn btn-danger" @click='deleteClient(client.numPiece)'>Delete</button>

</div>
        </fieldset>
    </form>
</template>


<script>
import { mapGetters, mapActions } from 'vuex';
    export default {
    props:[
        'editMethod',
        'oldClient'
    ],
    mounted() {
        console.log('clientForm mounted.');
        if(this.editMethod)
            this.client = this.oldClient;
        },

    data()
    {
        return {
            token: $('meta[name="csrf-token"]').attr('content'),
            client : {
				 pieceIdentite: '',
                    numPiece: '',
                    dateDelivrPiece: '',
                    nom: '',
                    prenom: '',
                    telephone: '',
                    numPermis: '',
                    dateDelivrPermis: '',
                    nationalite:'',
                    addresse: '',
                    ville_id:'',
                    lieuDelivrPiece:'',
                    lieuDelivrPermis:'',
                    dateLivrePermis: '',
                    dateLivrePiece: '',
                    dateNaissance: '',
                    lieuNaissance:'',
                    codePostale: '',
                    email: '',
                    pieceIdentiteScan: '',
                    permisScan: ''
            },
            errors: '',
            }
        },
        async created()
        {
            await this.getPayes();
        },
    methods: {
        addClient()
        {   
            var url = 'http://localhost:8000/api/clients/';
            var type = 'ajoutee!';
            var form  = $("#form")[0];
            var formData = new FormData(form);
            if(this.editMethod) {url+=this.client.numPiece; type = 'modifiee!';}
            $.ajax({
                url: url,
                type: 'post',
                datatype: 'json',
                data : formData,
                enctype: 'multipart/form-data',
                processData: false,
                contentType: false,
                cache: false,
                success: function(data){
                    if(data == 1)
                    {
                        if(type == 'modifiee!')
                        {
                            $('#btn-retour').click();
                            this.getClientsActif({page:1,refresh:true});
                        }
                        this.getClients({page:1,refresh:true});
                        swal("Success!", "Client "+type, "success");
                        return;
                    }
                    var response=jQuery.parseJSON(data);
                    if(typeof response =='object')
                    {
                        this.errors = response.errors;
                    }
                    swal("Error!", "Client non "+type, "error");
                }.bind(this),
                error: function (request, status, error) {
                    console.log(request);
                    console.log(error);
                    this.errors = request.responseJSON.errors;
                    swal("Error!", "Client non "+type, "error");
                }.bind(this)

               })
        },
        onSubmit(){},
        ...mapActions(['getPayes', 'getClients', 'getClientsActif', 'deleteClient']),
        }
        ,
        computed:{
            ...mapGetters(['allPayes']),
        }
        
       
    }
</script>
        