import axios from 'axios';

const state = {
    marques: [

    ]
    ,
    modeles:[

    ]
    ,
    marques_errors:{},
    modeles_errors:{},

};

const getters = {
    allMarques: (state) => state.marques,

    allModeles: (state) => state.modeles,
};

const actions = {
    async  getMarques({commit})
        {       
            if (!state.marques.length){
            await  axios.get('/api/vehicules/marque/marques')
                .then(response => {
                       commit('setMarques',response.data);
                    })
                .catch(errors => { commit('setMarquesErrors',errors);});
            }
                
        },

        async  getModelsByMarques({commit}, marque){
            await  axios.get('/api/vehicules/marque/modeles/'+marque)
                 .then(response => {
                    commit('setModeles',response.data);
                     })
                 .catch(error => {commit('setModelesErrors',error);});
              },
};

const mutations = {

    setMarques:(state, marques) => (state.marques = marques),
    setModeles:(state, modeles) => (state.modeles = modeles),

    setMarquesErrors:(state,errors) =>(state.marques_errors = errors),
    setModelesErrors:(state,errors) =>(state.modeles_errors = errors),
};



export default ({
    state,
    getters,
    actions,
    mutations
});