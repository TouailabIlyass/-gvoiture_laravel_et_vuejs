<template>

        <div class="row">
        <div class="col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Details Vehicule
                </div>
                <div class="panel-body">
                     <!-- Name input-->
                 <vehiculeForm-component :oldVehicule="vehicule" :editMethod="editMethod"></vehiculeForm-component>
                </div>
            </div>
        </div>
        <div class="col-sm-4 pull-right">

        <div class="panel panel-default">
            <div class="panel-heading">
                    <button class="btn btn-md btn-link pull-right" id="btn-retour" @click="changeValue()" ><em class="fa fa-arrow-left"></em> Retour</button>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        props: [
            'editMethod',
            'vehicule'
        ],
        mounted() {
            console.log('vehicule edit Component mounted.')
        },
        methods: {
            changeValue(){
                this.$emit('toggleEdit');
            },
        }
    }
</script>


      
