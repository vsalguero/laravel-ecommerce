
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

const Vuex = require('vuex');

window.store = new Vuex.Store({
    state: {
        productsCount: 0
    },
    mutations: {
        increment(state){
            return state.productsCount++;
        },
        set(state, value){
           return state.productsCount = value;
        }
    }
})

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('products-component', require('./components/products/ProductsComponent.vue'));
Vue.component('product-card-component', require('./components/products/ProductCardComponent.vue'));
Vue.component('material-transition-group', require('./components/animations/MaterialCollectionComponent.vue'));
Vue.component('add-product-btn', require('./components/products/AddToCartComponent.vue'));
Vue.component('product-counter-component', require('./components/shopping_cart/CounterComponent.vue'));
Vue.component('products-shopping-component', require('./components/shopping_cart/ProductsShoppingCartComponent.vue'));

const app = new Vue({
    el: '#app'
});
