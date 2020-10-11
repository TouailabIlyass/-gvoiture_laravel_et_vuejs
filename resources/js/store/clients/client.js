import axios from 'axios';

const state = {
    clients: {},
    clientsActif:{},
    clientsSearch:{},
    clients_errors: false,
    clientsActif_errors: false,

};

const getters = {

    allClients: (state) => state.clients,
    allClientsActif: (state) => state.clientsActif,
    allClientsSearch: (state) => state.clientsSearch,
    clientsErrors: (state) => state.clients_errors,
    clientsActifErrors: (state) => state.clientsActif_errors,
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
            await  axios.get('/api/clients?page='+args.page)
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
                await  axios.get('/api/clients/actif/paginate?page='+args.page)
                    .then(response => {
                        commit('setClientsActif',response.data);
                        console.log('getdata Client Actif');
                        })
                    .catch(errors => { commit('setClientsActifErrors',errors);});
            }
        },

        async  getClientsSearch({commit}, keyword, page = 1)
        {   if(keyword.trim().length  == 0) return;
                await  axios.get('/api/clients/find/'+keyword+'?page='+page)
                    .then(response => {
                        commit('setClientsSearch', response.data);
                        console.log('getdata Client Search:'+keyword);
                        })
                    .catch();
        },

        async deleteClient({commit, dispatch}, id)
        {
            await  axios.delete('/api/clients/'+id)
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

};

const mutations = {

    setClients:(state, clients) => (state.clients = clients),
    setClientsErrors:(state,errors) =>(state.clients_errors = errors),

    setClientsActif:(state, clients) => (state.clientsActif = clients),
    setClientsActifErrors:(state,errors) =>(state.clientsActif_errors = errors),

    setClientsSearch:(state, clients) => (state.clientsSearch = clients),
  
};



export default ({
    state,
    getters,
    actions,
    mutations
});