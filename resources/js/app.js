
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
Vue.component('item-table', {
    template : `<tr>
                  <td>
                    <input type="text" class="form-control" v-model="item.name" v-on:keyup.enter="append">
                  </td>
                  <td>
                    <input type="text" class="form-control" v-model="item.unit">
                  </td>
                  <td>
                    <input type="text" class="form-control" v-model="item.quenity">
                  </td>
                  <td>
                    <input type="text" class="form-control" v-model="item.unit_price">
                  </td>
                  <td>
                    <input type="text" class="form-control" v-model="item.other">
                  </td>
                  <td>
                    <span v-on:click="append"><i class="fas fa-plus"></i></span>
                  </td>
                  <td>
                  <span v-on:click="remove"><i class="fas fa-trash-alt"></i></span>
                  </td>
                </tr>`,
    props : ['item', 'index'],
    methods: {
        append: function(event) {
            app.$data.items.push({});
             return false;
        },
        remove: function(event) {
            app.$data.item.splice(-1);
        }
    }
});

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
        save_items: function() {
            Axios.post('/api/create',{
                name: this.name
            })
        }
    }
});
