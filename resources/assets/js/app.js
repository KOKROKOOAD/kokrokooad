
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');
 require("./dashboard/js/jquery.validate.min");
// require("./dashboard/js/notify.min");
//  require('jquery-validation');
require('./dashboard/js/validations');
require('../js/calender/notify');
require('../js/calender/script');

window.Vue = require('vue');
import  VueRouter from 'vue-router';
import {routes} from './vue-router/routes';

Vue.use(VueRouter);

import FullCalendar from 'vue-full-calendar'; //Import Full-calendar
Vue.use(FullCalendar);



const router  = new VueRouter({
    mode : 'history',
    routes
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('create-ad', require('./components/create-subscriptions/createAd.vue'));
Vue.component('user-transact', require('./components/transactions/transactions'));
Vue.component('pending-sub', require('./components/success-pages/pendingSub'));
Vue.component('inactive-sub', require('./components/test-components/inactive-sub'));
// Vue.component('active-sub', require('./components/subscriptions/active-sub'));
Vue.component('my-sub', require('./components/subscriptions/mySub'));
Vue.component('payment', require('./components/payment/payment'));
Vue.component('create-print-rate-cards', require('./components/create-subscriptions/createPrintAd'));
Vue.component('create-ad-weekdays', require('./components/create-subscriptions/createAdWeekdays'));
Vue.component('file-size-warning-modal', require('./components/file-uploads/fileSizeWarningModal'));
Vue.component('display-media-houses', require('./components/diplay-media-house/displayMediaHouseImags'));
Vue.component('invoice', require('./components/invoice/invoice'));
Vue.component('del-selected-media-house', require('./components/success-pages/selectedMediaHouse'));
Vue.component('ad-summary', require('./components/creation_of_sub_summary/adSummary'));
Vue.component('payment-type', require('./components/payment/paymentType'));
Vue.component('show-processing', require('./components/payment/showProcess'));
Vue.component('show-processing', require('./components/payment/showProcess'));
Vue.component('file-upload', require('./components/file-uploads/fileUpload'));
Vue.component('select-rate-card', require('./components/fetch-ratecards/selectRateCard'));
Vue.component('side-bar', require('./components/navigation/sidebar.vue'));
Vue.component('pre-loader', require('./components/preloader/preLoader'));
Vue.component('sub', require('./components/success-pages/subs'));
Vue.component('display-select-ratecard', require('./components/display-selected-rate/selectRateAndTime'));





const app = new Vue({
    el: '#app',
    router
});
