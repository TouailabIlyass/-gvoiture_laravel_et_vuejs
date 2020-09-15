<template>
   <form class="form-horizontal" v-on:submit.prevent="onSubmit" method="POST" id='form'>
		<fieldset>		
            <input type="hidden" name="_method" value="put" v-if="editMethod">				
    <div class="col-sm-6">
        <div class="form-group row">
          <label for="pieceIdentite" class="col-sm-2 col-form-label">Piece Identite</label>
          <div class="col-sm-10">
            <input type="text"  class="form-control" id="pieceIdentite" name='pieceIdentite' v-model="client.pieceIdentite">
            <p v-if="errors" >{{errors.pieceIdentite}}</p>
          </div>
        </div>

        <div class="form-group row">
          <label for="numPiece" class="col-sm-2 col-form-label">Numero Piece</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="numPiece" name='numPiece'  v-model="client.numPiece" >
            <p v-if="errors" >{{errors.numPiece}}</p>
          </div>
        </div>
      
        <div class="form-group row">
          <label for="dateDelivrPiece" class="col-sm-2 col-form-label">date delivr piece</label>
          <div class="col-sm-10">
            <input type="date" class="form-control" id="dateDelivrPiece" name='dateDelivrPiece'  v-model="client.dateDelivrPiece"  >
            <p v-if="errors" >{{errors.dateDelivrPiece}}</p>
          </div>
        </div>
      
        <div class="form-group row">
          <label for="nom" class="col-sm-2 col-form-label">Nom</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="nom" name='nom'   v-model="client.nom" >
           <p v-if="errors" >{{errors.nom}}</p>
          </div>
        </div>
      
        <div class="form-group row">
          <label for="prenom" class="col-sm-2 col-form-label">Prenom</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="prenom" name='prenom'   v-model="client.prenom" >
            <p v-if="errors" >{{errors.prenom}}</p>
          </div>
        </div>  
        
        <div class="form-group row">
          <label for="telephone" class="col-sm-2 col-form-label">Telephone</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="telephone" name='telephone' v-model="client.telephone" >
           <p v-if="errors" >{{errors.telephone}}</p>
          </div>
        </div>  
        

<div class="form-group row">
          <label for="numPermis" class="col-sm-2 col-form-label">num Permis</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="numPermis" name="numPermis" v-model="client.numPermis">
           <p v-if="errors" >{{errors.numPermis}}</p>
          </div>
        </div>  
      
          <div class="form-group row">
          <label for="dateDelivrPermis" class="col-sm-2 col-form-label">date delivr permis</label>
          <div class="col-sm-10">
            <input type="date" class="form-control" id="dateDelivrPermis" name='dateDelivrPermis'  v-model="client.dateDelivrPermis">
            <p v-if="errors" >{{errors.dateDelivrPermis}}</p>
          </div>
        </div>
      
        <div class="form-group row">
          <label for="Paye" class="col-sm-2 col-form-label">Paye</label>
          <div class="col-sm-10">
                <select name='nationalite' id='payes'>
    
                    <option v-for="paye in payes.payes" :key="paye.id"  :value="paye.id">{{paye.paye}}</option>       
                   
              </select>
              <p v-if="errors" >{{errors.nationalite}}</p>
              <p v-if="payesErrors" >{{payesErrors}}</p>
          </div>
        </div>
        <div class="form-group row">
          <label for="addresse" class="col-sm-2 col-form-label">Address</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="addresse" name="addresse" v-model="client.addresse">
          <p v-if="errors" >{{errors.addresse}}</p>
          </div>
        </div>
      
        <div class="form-group row">
          <label for="Ville" class="col-sm-2 col-form-label">Ville</label>
          <div class="col-sm-10">
          <select name='ville_id' id='villes'>
            <option v-for="ville in payes.villes" :key="ville.id"  :value="ville.id">{{ville.ville}}</option>       
          </select>
          <p v-if="errors" >{{errors.ville}}</p>
          </div>
        </div>
      
        <div class="form-group row">
          <label for="lieuDelivrPiece" class="col-sm-2 col-form-label">lieu_delivr_piece</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="lieuDelivrPiece" name='lieuDelivrPiece' v-model="client.lieuDelivrPiece">
            <p v-if="errors" >{{errors.lieuDelivrPiece}}</p>
          </div>
        </div>
        
        <div class="form-group row">
          <label for="lieuDelivrPermis" class="col-sm-2 col-form-label">lieu_delivr_permis</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="lieuDelivrPermis" name='lieuDelivrPermis' v-model="client.lieuDelivrPermis">
            <p v-if="errors" >{{errors.lieuDelivrPermis}}</p>
          </div>
        </div> 
        
         <div class="form-group row">
          <label for="dateNaissance" class="col-sm-2 col-form-label">date_naiss</label>
          <div class="col-sm-10">
            <input type="date" class="form-control" id="dateNaissance" name='dateNaissance' v-model="client.dateNaissance">
            <p v-if="errors" >{{errors.dateNaissance}}</p>
          </div>
        </div>
        
         <div class="form-group row">
          <label for="lieuNaissance" class="col-sm-2 col-form-label">lieuNaissance</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="lieuNaissance" name='lieuNaissance' v-model="client.lieuNaissance">
            <p v-if="errors" >{{errors.lieuNaissance}}</p>
          </div>
        </div>
      
        
         <div class="form-group row">
          <label for="codePostale" class="col-sm-2 col-form-label">codePostale</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="codePostale" name='codePostale' v-model="client.codePostale">
            <p v-if="errors" >{{errors.codePostale}}</p>
          </div>
        </div>
      
        <div class="form-group row">
          <label for="email" class="col-sm-2 col-form-label">email</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="email" name='email' v-model="client.email" >
       <p v-if="errors" >{{errors.email}}</p>
          </div>
        </div>
       
        <div class="form-group row">
          <label for="pieceIdentiteScan" class="col-sm-2 col-form-label">pieceIdentite_scan</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="pieceIdentiteScan" name='pieceIdentiteScan' v-model="client.pieceIdentiteScan" >
            <p v-if="errors" >{{errors.pieceIdentiteScan}}</p>
          </div>
        </div>
      
       <div class="form-group row">
          <label for="permisScan" class="col-sm-2 col-form-label">permis scan</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="permisScan" name='permisScan' v-model="client.permisScan" >
            <p v-if="errors" >{{errors.permisScan}}</p>
          </div>
        </div>
           <input type="hidden" name="_token" :value="token" />

        <button class='btn btn-primary'  @click="addClient()" name='save'>Save</button>

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

  watch: {
  },
        mounted() {
            console.log('ClientForm mounted.');
            if(this.editMethod)
                this.client = this.oldClient;
        },
        data()
        {
            return {
                payes: {},
                errors: '',
                payesErrors: '',
                token: $('meta[name="csrf-token"]').attr('content'),
                client: {
                    pieceIdentite: 'cin',
                    numPiece: '111',
                    dateDelivrPiece: '01/09/2020',
                    nom: 'il',
                    prenom: 'pre',
                    telephone: '0610',
                    numPermis: '14',
                    dateDelivrPermis: '02/09/2020',
                    nationalite: '1',
                    addresse: 'adrrr1',
                    ville: '1',
                    lieuDelivrPiece: '1',
                    lieuDelivrPermis: '1',
                    dateNaissance: '03/09/2020',
                    lieuNaissance: '1',
                    codePostale: '4600',
                    email: 'email',
                    pieceIdentiteScan: 'walo',
                    permisScan: 'walo'
                },
            }
        },
         created()
        {
            axios.get('http://localhost:8000/payes'
       
            ).then(res => 
                this.payes = res.data
            )
            .catch(error => this.payesErrors = error);
        },
        methods: {
             addClient()
            {   var url = 'http://localhost:8000/api/clients/';
                var type = 'post';
                 var form  = $("#form")[0];
                var formData = new FormData(form);
                console.log($("#form").serialize());
                console.log('-------------');
    
                if(this.editMethod) {url+=this.client.numPiece;type='put'}
                $.ajax({
                    url: url,
                    type: 'post',
                    dataype: 'json',
                    enctype: 'multipart/form-data',
                    data : formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data){
                        console.log(data);
                    },
                    error: function (request, status, error) {
                        console.log(request);
                        console.log(error);
                        this.errors = request.responseJSON.errors;
                    }.bind(this)

                })
                //axios({method: 'post', url:'http://localhost:8000/api/clients', data: this.client})
                /*axios.post('http://localhost:8000/clients',this.client,{
                    headers:{
                        'X-CSRF-TOKEN': this.token
                    }
                }
                ).then(resp => console.log(resp))
                .catch(error=> console.log(error))
               // .catch(error => this.errors = error.response.data.errors);
                console.log('added'+this.client.pieceIdentite);*/
                //console.log(this.errors);
    
            },
            updateClient()
            {

            },
            onSubmit(){}
        },
       
        
       
    }
</script>
