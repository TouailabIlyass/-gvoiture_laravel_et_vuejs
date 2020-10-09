import axios from 'axios';

const state = {
    clients: {},
    clientsActif:{},
    clientsSearch:{},
    payes:[],
    clients_errors: false,
    payes_errors:{},
    clientsActif_errors: false,

};

const getters = {

    allClients: (state) => state.clients,
    allClientsActif: (state) => state.clientsActif,
    allClientsSearch: (state) => state.clientsSearch,
    clientsErrors: (state) => state.clients_errors,
    clientsActifErrors: (state) => state.clientsActif_errors,
    allPayes: (state) => state.payes,
    payesErrors: (state) => state.payes_errors,
};

const actions = {

    async  getClients({commit}, args = 0)
    {  
        if (typeof args.page === 'undefined')
        { 
            if (args == 0)
            {
                args = {page:state.clients.current_page, refresh:false};
            }
            else{
                var tmp = args;
                args={page:tmp, refresh:false};
            }
        } 
        if (typeof state.clients.data === 'undefined' || args.refresh == true || args.page != state.clients.current_page)
        {
            await  axios.get('http://localhost:8000/api/clients?page='+args.page)
                .then(response => {
                    commit('setClients',response.data);
                    console.log('getdata Client');
                    })
                .catch(errors => { commit('setClientsErrors',errors);});
        }
    },

    async  getClientsActif({commit}, args = 0)
        {    
            if (typeof args.page === 'undefined')
            { 
                if (args == 0)
                {
                    args = {page:state.clientsActif.current_page, refresh:false};
                }
                else{
                    var tmp = args;
                    args={page:tmp, refresh:false};
                }
            } 
            if (typeof state.clientsActif.data === 'undefined' || args.refresh == true || args.page != state.clientsActif.current_page)
            {
                await  axios.get('http://localhost:8000/api/clients/actif/paginate?page='+args.page)
                    .then(response => {
                        commit('setClientsActif',response.data);
                        console.log('getdata Client Actif');
                        })
                    .catch(errors => { commit('setClientsActifErrors',errors);});
            }
        },

        async  getClientsSearch({commit}, keyword, page = 1)
        {   if(keyword.trim().length  == 0) return;
                await  axios.get('http://localhost:8000/api/clients/find/'+keyword+'?page='+page)
                    .then(response => {
                        commit('setClientsSearch', response.data);
                        console.log('getdata Client Search:'+keyword);
                        })
                    .catch();
        },

        async deleteClient({commit, dispatch}, id)
        {
            await  axios.delete('http://localhost:8000/api/clients/'+id)
                    .then(response => {
                        if(response.data == 1)
                        {
                            dispatch('getClients', {page:1, refresh:true});
                            dispatch('getClientsActif', {page:1, refresh:true});
                            swal("Deleted!", "Client deleted!", "success");
                            $('#btn-retour').click();
                            return;
                        }
                        swal("Error!", "Client cannot be deleted!", "error");
                        console.log(response.data);
                        })
                    .catch(error=>
                       { swal("Error!", "Client cannot be  deleted!", "error");}
                    );
        },


        async  getPayes({commit},refresh = false)
        {    if (!state.clients.length || refresh == true)
            {
                await  axios.get('http://localhost:8000/api/payes')
                    .then(response => {
                        commit('setPayes',response.data);
                        })
                    .catch(errors => { commit('setPayesErrors',errors);});
            }
        },
    
};

const mutations = {

    setClients:(state, clients) => (state.clients = clients),
    setClientsErrors:(state,errors) =>(state.clients_errors = errors),

    setClientsActif:(state, clients) => (state.clientsActif = clients),
    setClientsActifErrors:(state,errors) =>(state.clientsActif_errors = errors),

    setClientsSearch:(state, clients) => (state.clientsSearch = clients),

    setPayes:(state, payes) => (state.payes = payes),
    setPayesErrors:(state,errors) =>(state.payes_errors = errors),
  
};



export default ({
    state,
    getters,
    actions,
    mutations
});