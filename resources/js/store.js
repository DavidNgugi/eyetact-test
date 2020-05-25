import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        products: [],
    },

    getters: {
        getProducts: state => {
            return state.products;
        },
    },

    mutations: {

        ADD_PRODUCT(state, payload) {
            state.products.push(payload);
        },

        SET_PRODUCTS(state, payload) {
            state.products = payload;
        },

        DELETE_PRODUCT(state, payload) {
            let index = state.products.findIndex(item => item.id === payload.id);
            state.products.splice(index, 1)
        }
    },

    actions: {
        createProduct({ commit }, payload) {
            axios.post('/api/products', payload)
                .then((res) => {
                    commit('ADD_PRODUCT', res.data);
                })
        },

        fetchProducts({ commit }) {
            axios.get('/api/products')
                .then((res) => {
                    commit('SET_PRODUCTS', res.data);
                });
        },

        deleteProduct({ commit }, payload) {
            axios.delete(`/api/products/${payload.id}`)
                .then((res) => {
                    commit('DELETE_PRODUCT', res.data);
                });
        }
    }
});
