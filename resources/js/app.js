
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
        items: [],
        deleted_items: []
    },
    mounted: function(){
        var query = window.location.search.slice(1); 
        Axios.get('/api/get?' + query).then(response => this.items = response.data);
    },
    computed: {
        listItems: function(){
            return this.items.sort((a, b) => {
                return (a.id < b.id) ? -1 : (a.id > b.id) ? 1 : 0;
              });;
        },
    },
    methods: {
        itemPrice: function(quantity, unit_price){
            if(quantity && unit_price) {
                return quantity * unit_price;
            } else {
                return 0;
            }
        },
        append: function(event) {
            this.items.push({});
        },
        remove: function(id, index) {
            console.log(id);
            this.deleted_items.push(id);
            this.items.splice(index, 1);
            console.log(this.deleted_items);
        },
        saveItems: function() {
            var query = window.location.search.slice(1); 
            var add_items = Object.assign({},this.items);
            var remove_items = Object.assign({},this.deleted_items);
            this.deleted_items = [];
            Axios.post('/api/create?' + query, {items: add_items, delete_items: remove_items}).then(response => this.items = response.data);

        }
    }
});
