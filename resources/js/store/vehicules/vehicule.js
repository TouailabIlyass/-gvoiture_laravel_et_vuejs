import axios from 'axios';

const state = {
    vehicules: {},
    vehiculesActif: {},
    vehiculesSearch:{},
    vehicules_errors: false,
    vehiculesActif_errors: false,
};

const getters = {
    allVehicules: (state) => state.vehicules,
    vehiculesErrors: (state) => state.vehicules_errors,

    allVehiculesActif: (state) => state.vehiculesActif,

    allVehiculesSearch: (state) => state.vehiculesSearch,

    vehiculesActifErrors: (state) => state.vehiculesActif_errors,
};

const actions = {
    async  getVehicules({commit}, args = 0)
        {       
            if (typeof args.page === 'undefined')
            { 
                if (args == 0)
                {
                    args = {page:state.vehicules.current_page, refresh:false};
                }
                else{
                    var tmp = args;
                    args={page:tmp, refresh:false};
                }
            } 
            if (typeof state.vehicules.data === 'undefined'|| args.refresh == true || args.page != state.vehicules.current_page){
            await  axios.get('http://localhost:8000/api/vehicules?page='+args.page)
                .then(response => {
                       commit('setVehicules',response.data);
                       console.log('getdata vehicules');
                    })
                .catch(errors => { commit('setVehiculesErrors',errors);});
            }
                
        },

    async  getVehiculesActif({commit}, args = 0 )
        {     
            if (typeof args.page === 'undefined')
            { 
                if (args == 0)
                {
                    args = {page:state.vehiculesActif.current_page, refresh:false};
                }
                else{
                    var tmp = args;
                    args={page:tmp, refresh:false};
                }
            }   
            if (typeof state.vehiculesActif.data === 'undefined' || args.refresh == true || args.page != state.vehiculesActif.current_page){
            await  axios.get('/api/vehicules/actif/paginate?page='+args.page)
                .then(response => {
                       commit('setVehiculesActif',response.data);
                       console.log('getdata vehicules Actif page = '+args.page);
                    })
                .catch(errors => { commit('setVehiculesActifErrors',errors);});
            }
                
        },

        async  getVehiculesSearch({commit}, keyword, page = 1)
        {   if(keyword.trim().length  == 0) return;
                await  axios.get('http://localhost:8000/api/vehicules/find/'+keyword+'?page='+page)
                .then(response => {
                       commit('setVehiculesSearch',response.data);
                       console.log('vehicules search:'+keyword);
                    })
                .catch();
        },

        async deleteVehicule({commit, dispatch}, id)
        {
            await  axios.delete('http://localhost:8000/api/vehicules/'+id)
                    .then(response => {
                        if(response.data == 1)
                        {
                            dispatch('getVehicules', {page:1, refresh:true});
                            dispatch('getVehiculesActif', {page:1, refresh:true});
                            swal("Deleted!", "Vehicule deleted!", "success");
                            $('#btn-retour').click();
                            return;
                        }
                        swal("Error!", "Vehicule cannot be deleted!", "error");
                        console.log(response.data);
                        })
                    .catch(error=>
                       { swal("Error!", "Vehicule cannot be deleted!", "error");}
                    );
        },

};

const mutations = {

    setVehicules:(state, vehicules) => (state.vehicules = vehicules),
    setVehiculesErrors:(state,errors) =>(state.vehicules_errors = errors),

    setVehiculesActif:(state, vehicules) => (state.vehiculesActif = vehicules),
    setVehiculesActifErrors:(state,errors) =>(state.vehiculesActif_errors = errors),

    setVehiculesSearch:(state, vehicules) => (state.vehiculesSearch = vehicules),

};



export default ({
    state,
    getters,
    actions,
    mutations
});