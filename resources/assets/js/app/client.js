
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('../bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('forms-component', require('../components/FormsComponent.vue')); //register the components created. 
Vue.component('museums-component', require('../components/MuseumsComponent.vue'));
// Vue.component('gallery-component', require('../components/GalleryComponent.vue'));
 Vue.component('destinationcategory-component', require('../components/DestinationCategoryComponent.vue'));
 Vue.component('plandestination-component', require('../components/PlanDestinationComponent.vue'));
 Vue.component('keyword-destination-component', require('../components/KeywordDestinationComponent.vue'));

//first parameter is the name that will be used by the component, second parameter is where it will be controlled at

const app = new Vue({
    el: '#client-app'
});
