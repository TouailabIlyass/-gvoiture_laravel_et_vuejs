/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
Vue.use(VueRouter);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

import Client from './components/clients/ClientComponent.vue';
import Vehicule from './components/vehicules/VehiculeComponent.vue';
import Reservation from './components/reservations/ReservationComponent.vue';
import Contrat from './components/reservations/generationContrat.vue';

import store from './store';
//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('client-component', require('./components/clients/ClientComponent.vue').default);
Vue.component('clientForm-component', require('./components/clients/ClientFormComponent.vue').default);
Vue.component('clientEdit-component', require('./components/clients/ClientEditComponent.vue').default);


Vue.component('reservationForm-component', require('./components/reservations/reservationFormComponent.vue').default);
Vue.component('reservationEdit-component', require('./components/reservations/reservationEditComponent.vue').default);
Vue.component('generation-contrat', require('./components/reservations/generationContrat.vue').default);

Vue.component('vehiculeForm-component', require('./components/vehicules/vehiculeFormComponent.vue').default);
Vue.component('vehiculeEdit-component', require('./components/vehicules/vehiculeEditComponent.vue').default);


Vue.component('sidebar-component', require('./components/SidebarComponent.vue').default);

Vue.component('pagination', require('laravel-vue-pagination'));

const routes = [
    {
        path: '/client',
        component: Client
    },
    {
        path: '/vehicule',
        component: Vehicule
    }
    ,
    {
        path: '/reservation',
        component: Reservation
    },
    {
        path: '/',
        component: Reservation
    },
    ,
    {
        path: '/contrat',
        component: Contrat
    }

];
    
const router = new VueRouter({routes});
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router: router,
    store,
    uri: 'localhost:8080',
});
