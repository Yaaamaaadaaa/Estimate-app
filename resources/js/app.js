
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
        items_price: [],
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
              });
        },
        totalPrice: function(){
            return this.items_price.reduce(function(sum, element){
                return sum + element;
            }, 0);
        },
        taxPrice: function(){
            return this.totalPrice * 0.08;
        },
        totalPriceWithTax: function() {
            return this.totalPrice + this.taxPrice;
        }
    },
    methods: {
        itemPrice: function(quantity, unit_price, index) {
            let calculationPrice = 0;
            if(quantity && unit_price) {
                calculationPrice = quantity * unit_price;
            }
            this.items_price.splice(index, 1, calculationPrice);
            return calculationPrice;
        },
        append: function(event) {
            this.items.push({});
            console.log(this.totalPrice);
        },
        remove: function(id, index) {
            this.deleted_items.push(id);
            this.items.splice(index, 1);
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
