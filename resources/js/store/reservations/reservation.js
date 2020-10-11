import axios from 'axios';

const state = {
    reservations: {},
    reservationsActif: {},
    reservationsSearch: {},
    reservation: {},
    reservations_errors:'',
    reservation_errors:'',
    reservationsActif_errors:'',
    generateContrat: false,
};

const getters = {

    allReservations: (state) => state.reservations,

    reservationsErrors: (state) => state.reservations_errors,

    allReservationsActif: (state) => state.reservationsActif,

    reservationsActifErrors: (state) => state.reservationsActif_errors,

    ReservationFromStore:(state) => state.reservation,

    isGenerateConrat:(state) => state.generateContrat,

    allReservationsSearch: (state) => state.reservationsSearch,
};

const actions = {
    async  getReservations({commit}, args = 0)
        {   
            if (typeof args.page === 'undefined')
            { 
                if (args == 0)
                {
                    args = {page:state.reservation.current_page, refresh:false};
                }
                else{
                    var tmp = args;
                    args={page:tmp, refresh:false};
                }
            }  
            if (typeof state.reservations.data === 'undefined' || args.refresh == true || args.page != state.reservations.current_page )
            {
                await  axios.get('/api/reservations?page='+args.page)
                    .then(response => {
                        commit('setReservations',response.data);
                        console.log('getdata Reservations');
                        })
                    .catch(errors => { commit('setReservationsErrors',errors);});
            }
        },
        async  getReservationsActif({commit}, args = 0)
        {   
            if (typeof args.page === 'undefined')
            { 
                if (args == 0)
                {
                    args = {page:state.reservationsActif.current_page, refresh:false};
                }
                else{
                    var tmp = args;
                    args={page:tmp, refresh:false};
                }
            } 
            if (typeof state.reservationsActif.data === 'undefined'|| args.refresh == true || args.page != state.reservation.current_page )
            {
                await  axios.get('/api/reservations/actif/paginate?page='+args.page)
                    .then(response => {
                        commit('setReservationsActif',response.data);
                        console.log('getdata Actif Reservations');
                        })
                    .catch(errors => { commit('setReservationsActifErrors',errors);});
            }
        },

        async  getReservationsSearch({commit}, keyword, page = 1)
        {    if(keyword.trim().length  == 0) return;
                await  axios.get('/api/reservations/find/'+keyword+'?page='+page)
                    .then(response => {
                        commit('setReservationsSearch',response.data);
                        console.log('getdata Search Reservations: '+keyword);
                        })
                    .catch();
        },

        async deleteReservation({commit,dispatch}, id)
        {
            console.log(id);
            await  axios.delete('/api/reservations/'+id)
                    .then(response => {
                        if(response.data == 1)
                        {
                            dispatch('getReservations', {page:1, refresh: true});
                            dispatch('getReservationsActif', {page:1, refresh: true});
                            swal("Deleted!", "Reservation deleted!", "success");
                            $('#btn-retour').click();
                            return;
                        }
                        swal("Error!", "Reservation delete!", "error");
                        console.log(response.data);
                        })
                    .catch(error=>
                       { swal("Error!", "Reservation delete!", "error");}
                    );
        },

        async addReservationST({commit}, reservation)
        {
            //state.reservation = reservation;
            await commit('setReservation', reservation);
            console.log(state.reservation);
        },
        setGenerateContrat({commit}, bool)
        {
            commit('setGenerateContrat',bool);
        },

        async  addProlongations({commit, dispatch}, keyword)
        {       
                $.ajax({
                    url: '/api/prolongations',
                    type: 'post',
                    datatype: 'json',
                    data : $("#formProlongation").serialize(),
                    success: function(data){
                        if(data == 1)
                        {
                            swal("Success!", "Prolongation ajoutee!", "success");
                            dispatch('getProlongations', keyword);
                            return;
                        }
                    swal("Error!", "Prolongation non ajoutee!", "error");
                    }.bind(this),
                    error: function (request, status, error) {
                        swal("Error!", "Prolongation non ajoutee", "error");
                        console.log(error);
                    }.bind(this)

                })   
        },

        async  getProlongations({state, commit}, keyword)
        {    
            await  axios.get('/api/prolongations/find/'+keyword)
                .then(response => {
                    for(var i= 0; i < state.reservationsActif.data.length ; i++)
                    {
                        if (state.reservationsActif.data[i].numRes === keyword )
                            {
                                state.reservationsActif.data[i].prolongation = response.data;
                                break;
                            }
                    }
                })
                .catch();
        },

        async  deleteProlongations({state, commit, dispatch}, {prolongation,keyword}){
            await  axios.delete('/api/prolongations/'+ prolongation)
                .then(response => {
                    dispatch('getProlongations', keyword);
                })
                 .catch(error => {});
              },
        
        validateApp({state}, key)
        {   //10 6 12 22
            var split_key = key.split('-');
            if(split_key.length == 4)
            {  var date = new Date();
                var dm,da,dh,di;
                dm = split_key[0][split_key[0].length-2]+split_key[0][split_key[0].length-1];
                da = split_key[1][split_key[1].length-2];
                dh = split_key[2][split_key[2].length-2]+split_key[2][split_key[2].length-1];
                di = split_key[3][split_key[3].length-2]+split_key[3][split_key[3].length-1];
                console.log('dm='+dm);
                console.log('da='+da);
                console.log('dh='+dh);
                console.log('di='+di);
                if(dm == date.getDate() && da == date.getDay() && dh == date.getHours())
                {
                    if( di >= date.getMinutes()-3 &&  di <= date.getMinutes()+3 )
                    {
                        console.log('if222');
                    }
                    console.log('if11');
                }
            }
        }
    
};

const mutations = {

    setReservations:(state, reservations) => (state.reservations = reservations),
    setReservationsActif:(state, reservations) => (state.reservationsActif = reservations),

    setReservationsSearch:(state, reservations) => (state.reservationsSearch = reservations),

    setReservationsErrors:(state, errors) =>(state.reservations_errors = errors),
    setReservationsActifErrors:(state,errors) =>(state.reservationsActif_errors = errors),

    setReservation:(state ,reservation) => (state.reservation = reservation),
    setGenerateContrat:(state,bool) => (state.generateContrat =  bool),

};



export default ({
    state,
    getters,
    actions,
    mutations
});