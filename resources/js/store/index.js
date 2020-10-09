import Vuex from 'vuex';
import Vue from 'vue';
import modeles from './modeles';
import reservations from './reservations/reservation';
import clients from './clients/client';
import vehicules from './vehicules/vehicule';


Vue.use(Vuex);

export default new Vuex.Store({
    modules:{
        modeles,
        reservations,
        clients,
        vehicules,
    }
});