<template>
        <form class="form-horizontal" v-on:submit.prevent="onSubmit" id="form" enctype="multipart/form-data">
             <fieldset>		
                 <input type="hidden" name="_method" value="put" v-if="editMethod">	
<div class="container">
    <div class="form-group row justify-content-center">
            <div class="col-sm-3 col-3">
                <label for="pieceIdentite" class="col-form-label">piece Identite</label>
                <select id="pieceIdentite" name="pieceIdentite">
                    <option value="CIN">CIN</option>
                    <option value="PASSPORT">PASSPORT</option>
                </select>
            <p style="color:red;" v-if="errors" >{{errors.pieceIdentite}}</p>
            </div>

            <div class="col-sm-3 col-3">
            <label for="numPiece" class="col-form-label">num Piece</label>
            <input type="text"  class="form-control" id="numPiece" name="numPiece" v-model="client.numPiece" >
            <p style="color:red;" v-if="errors" >{{errors.numPiece}}</p>
            </div>

        </div>

    <div class="form-group row justify-content-center">
            <div class="col-sm-3">
            <label for="dateDelivrPiece" class="col-form-label">date Delivr Piece</label>
            <div>
            <input type="date"  class="form-control" id="dateDelivrPiece" name="dateDelivrPiece" v-model="client.dateDelivrPiece" >
            <p style="color:red;" v-if="errors" >{{errors.dateDelivrPiece}}</p>
            </div>
        </div>


        <div class="form-group row justify-content-center">
            <div class="col-sm-3">
            <label for="dateDelivrPermis" class="col-form-label">date Delivr Permis</label>
            <div class="col-sm-10">
            <input type="date"  class="form-control" id="dateDelivrPermis" name="dateDelivrPermis" v-model="client.dateDelivrPermis" >
            <p style="color:red;" v-if="errors" >{{errors.dateDelivrPermis}}</p>
            </div>
            </div>
        </div>
    </div>

    <div class="form-group row justify-content-center">
            <div class="col-sm-3 col-3">
            <div class="col-sm-10">
             <label for="nom" class="col-form-label">nom</label>
            <input type="text"  class="form-control" id="nom" name="nom" v-model="client.nom" >
            <p style="color:red;" v-if="errors" >{{errors.nom}}</p>
            </div>
        </div>
        

    <div class="col-sm-3 col-3">
            <div class="col-sm-10">
            <label for="prenom" class="col-form-label">prenom</label>
            <input type="text"  class="form-control" id="prenom" name="prenom" v-model="client.prenom" >
            <p style="color:red;" v-if="errors" >{{errors.prenom}}</p>
            </div>
        </div>


    </div>

    
        

<div class="form-group row justify-content-center">
 <div class="col-sm-3 col-3">
            <div class="col-sm-10">
            <label for="telephone" class="col-form-label">telephone</label>
            <input type="number"  class="form-control" id="telephone" name="telephone" v-model="client.telephone" >
            <p style="color:red;" v-if="errors" >{{errors.telephone}}</p>
            </div>
        </div>
        

 <div class="col-sm-3 col-3">
            <div class="col-sm-10">
            <label for="numPermis" class="col-form-label">num Permis</label>
            <input type="text"  class="form-control" id="numPermis" name="numPermis" v-model="client.numPermis" >
            <p style="color:red;" v-if="errors" >{{errors.numPermis}}</p>
            </div>
        </div>
      </div>  


        
<div class="form-group row justify-content-center">
            <div class="col-sm-3">
            <div class="col-sm-10">
            <label for="lieuDelivrPiece" class="scol-form-label">lieu Delivr Piece</label>
            <input type="text"  class="form-control" id="lieuDelivrPiece" name="lieuDelivrPiece" v-model="client.lieuDelivrPiece" >
            <p style="color:red;" v-if="errors" >{{errors.lieuDelivrPiece}}</p>
            </div>
        </div>

            <div class="col-sm-3">
            <div class="col-sm-10">
            <label for="lieuDelivrPermis" class="col-form-label">lieu Delivr Permis</label>
            <input type="text"  class="form-control" id="lieuDelivrPermis" name="lieuDelivrPermis" v-model="client.lieuDelivrPermis" >
            <p style="color:red;" v-if="errors" >{{errors.lieuDelivrPermis}}</p>
            </div>
        </div>
</div>     

<div class="form-group row justify-content-center">
            <div class="col-sm-3">
            <div class="col-sm-10">
            <label for="dateNaissance" class="col-form-label">date Naissance</label>
            <input type="date"  class="form-control" id="dateNaissance" name="dateNaissance" v-model="client.dateNaissance" >
            <p style="color:red;" v-if="errors" >{{errors.dateNaissance}}</p>
            </div>
        </div>
        
            <div class="col-sm-3">
            <div class="col-sm-10">
            <label for="lieuNaissance" class="col-form-label">lieu Naissance</label>
            <input type="text"  class="form-control" id="lieuNaissance" name="lieuNaissance" v-model="client.lieuNaissance" >
            <p style="color:red;" v-if="errors" >{{errors.lieuNaissance}}</p>
            </div>
        </div>
</div>        

<div class="form-group row justify-content-center">
            <div class="col-sm-3">
            <div class="col-sm-10">
            <label for="codePostale" class="col-form-label">code Postale</label>            
            <input type="text"  class="form-control" id="codePostale" name="codePostale" v-model="client.codePostale" >
            <p style="color:red;" v-if="errors" >{{errors.codePostale}}</p>
            </div>
        </div>
        
            <div class="col-sm-3">
            <div class="col-sm-10">
            <label for="email" class="col-form-label">email</label>            
            <input type="email"  class="form-control" id="email" name="email" v-model="client.email" >
            <p style="color:red;" v-if="errors" >{{errors.email}}</p>
            </div>
        </div>
</div>        

<div class="form-group row justify-content-center">
            <div class="col-sm-3">
            <div class="col-sm-10">
            <label for="pieceIdentiteScan" class="col-form-label">piece Identite Scan</label>
            <input type="file"  class="form-control" id="pieceIdentiteScan" name="uploadPieceIdentiteScan"  >
            <p style="color:red;" v-if="errors" >{{errors.pieceIdentiteScan}}</p>
            </div>
        </div>
        
            <div class="col-sm-3">
            <div class="col-sm-10">
            <label for="permisScan" class="col-form-label">permis Scan</label>
            <input type="file"  class="form-control" id="permisScan" name="uploadPermisScan" >
            <p style="color:red;" v-if="errors" >{{errors.permisScan}}</p>
            </div>
        </div>
</div>

<div class="form-group row">
    <div class="col-sm-5">
            <label for="addresse" class="col-sm-2 col-form-label">addresse</label>
            <div class="col-sm-10">
            <input type="text"  class="form-control" id="addresse" name="addresse" v-model="client.addresse" >
            <p style="color:red;" v-if="errors" >{{errors.addresse}}</p>
            </div>
        </div>
</div>

<div class="form-group row justify-content-center">
            <div class="col-sm-3">
            <div class="col-sm-10">
            <label for="nationalite" class="col-form-label">nationalite</label>
             <select name='nationalite' id='payes'>
                <option v-for="paye in payes.payes" :key="paye.id"  :value="paye.id">{{paye.paye}}</option> 
              </select>
              <p v-if="errors" >{{errors.nationalite}}</p>
              <p v-if="payesErrors" >{{payesErrors}}</p>
            </div>
        </div>       

    <div class="col-sm-3">
            <div class="col-sm-10">
            <label for="ville_id" class="col-form-label">ville</label>
            <select name='ville_id' id='villes'>
            <option v-for="ville in payes.villes" :key="ville.id"  :value="ville.id">{{ville.ville}}</option>       
            </select>
          <p v-if="errors" >{{errors.ville}}</p>
            </div>
        </div>
</div>
        <input type='hidden' name='_token' :value='token' />

        <button class='btn btn-primary'  @click='addClient()' name='save'>Save</button>
</div>
        </fieldset>
  
    </form>
</template>


<script>
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
				 pieceIdentite: 'cin',
                    numPiece: '111',
                    dateDelivrPiece: '2020-09-01',
                    nom: 'il',
                    prenom: 'pre',
                    telephone: '0610',
                    numPermis: '14',
                    dateDelivrPermis: '2020-09-02',
                    nationalite: '1',
                    addresse: 'adrrr1',
                    ville_id: '1',
                    lieuDelivrPiece: '1',
                    lieuDelivrPermis: '1',
                    dateNaissance: '2020-09-03',
                    lieuNaissance: '1',
                    codePostale: '4600',
                    email: 'email@gmail.com',
                    pieceIdentiteScan: 'walo',
                    permisScan: ''
            },
            errors: '',
            payes: '',
            errorsPayes: '',
            }
        },
        created()
        {
            axios.get('http://localhost:8000/payes'
            ).then(res => 
                this.payes = res.data
            )
            .catch(error => this.errorsPayes = error);
        },
    methods: {
        addClient()
        {   
            var url = 'http://localhost:8000/api/clients/';
            var type = 'post';
            var form  = $("#form")[0];
            var formData = new FormData(form);
            if(this.editMethod) {url+=this.client.numPiece;}
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
        },
       
        
       
    }
</script>
        