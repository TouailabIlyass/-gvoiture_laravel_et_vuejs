<template>

    <div class="row">
        <div class="col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Details Reservation
                </div>
                <div class="panel-body">
                     <!-- Name input-->
                 <reservationForm-component :oldReservation="reservation" :editMethod="editMethod"></reservationForm-component>
                </div>
            </div>
        </div>
        <div class="col-sm-4 pull-right">

        <div class="panel panel-default">
            <div class="panel-heading">
                    <button id="btn-retour" class="btn btn-md btn-link pull-right" @click="changeValue()" ><em class="fa fa-arrow-left"></em> Retour</button>
            </div>
            <div class="panel-body">
                <div class="row">
                 <button type="button" class="btn btn-default" id='saveToStore'  @click='printReservation()'>View and print</button>
                  </div><!--/.row-->
                  <hr>
                <form style="margin:10px" id="formProlongation"> 
                    <fieldset>
                        <legend>Ajouter Prolongation:</legend>
                        <input type="hidden" name="num_res" :value="reservation.numRes" />
                        <input type="date" class="form-control" name="date_debut" placeholder="Date Debut" style="margin-bottom: 10px;">
                        <input type="date" class="form-control" name="date_fin" placeholder="Date Fin" style="margin-bottom: 10px;">
                        <input type="number" class="form-control" name="avance" placeholder="Avance" style="margin-bottom: 10px;">
                        <select type="text"  class="form-control" id="mode_paiement" name="mode_paiement" style=" margin-bottom: 10px" >
                            <option value="espece" selected>Espece</option>
                            <option value="carte">Carte</option>
                        </select>
                        <input type='hidden' name='_token' :value='token' />
                        <button type="button" v-if="reservation.prolongation.length < 5" class="btn btn-success" @click="addProlongations(reservation.numRes)" style="margin-bottom: 10px;" >Ajouter Prolongation</button>
                    </fieldset>
                </form>

             </div>
        </div>
    </div>
     <div>
                    <table>
                        <thead>
                            <th>Date Debut</th>
                            <th>Date Fin</th>
                            <th>Avance</th>
                            <th>Mode de paiement</th>
                        </thead>
                            <tbody>
                                <tr v-for="(value,i) in reservation.prolongation" :key="i">
                                    <td>{{value.date_debut}}</td>
                                    <td>{{value.date_fin}}</td>
                                    <td>{{value.avance}}</td>
                                    <td>{{value.mode_paiement}}</td>
                                    <td>
                                        <button type="button" @click="deleteProlongations({prolongation: value.id, keyword: reservation.numRes})" class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                    </table>

                </div>
</div>
</template>

<script>
import { mapActions } from 'vuex';
    export default {
        props: [
            'editMethod',
            'reservation'
        ],
        data() {
            return {
                token: $('meta[name="csrf-token"]').attr('content'),
            }
        },
        mounted() {
            console.log('reservation edit Component mounted.')
        },
        methods: {
             ...mapActions(['addReservationST', 'addProlongations', 'deleteProlongations']),
            changeValue(){
                this.$emit('toggleEdit');
            },
            printReservation()
            {
                if(this.reservation.conducteur == null)
                    this.reservation.conducteur = {};
                this.addReservationST(this.reservation);
                this.$router.push('Contrat');
            },
        },
    }
</script>


      
