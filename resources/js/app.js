
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

const { default: Axios } = require('axios');
const { iteratee } = require('lodash');

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app',
    data: {
        items: []
    },
    mounted: function(){
        var query = window.location.search.slice(1); 
        Axios.get('/api/get?' + query).then(response => this.items = response.data);
    },
    methods: {
        append: function(event) {
            this.items.push({});
        },
        saveItems: function() {
            var query = window.location.search.slice(1); 
            var convert = Object.assign({},this.items);
            Axios.post('/api/create?' + query, {items: convert}).then(response => this.items = response.data);;
        }
    }
});
