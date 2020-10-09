<template>

        <div class="row">
        <div class="col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Details Client
                </div>
                <div class="panel-body">
                     <!-- Name input-->
                 <clientForm-component :oldClient="client" :editMethod="editMethod"></clientForm-component>
                </div>
            </div>
        </div>
        <div class="col-sm-4 pull-right">
             <div class="panel-heading">
                    <button class="btn btn-md btn-link pull-right" id="btn-retour" @click="changeValue()" ><em class="fa fa-arrow-left"></em> Retour</button>
            </div>
            <hr>
        </div>
</div>
</template>

<script>
    export default {
        props: [
            'editMethod',
            'client'
        ],
        mounted() {
            console.log('client edit Component mounted.')
        },
        methods: {
            changeValue(){
                this.$emit('toggleEdit');
            },
        }
    }
</script>


      
