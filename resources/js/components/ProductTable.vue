<template>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <!-- <th>Properties</th> -->
                <!-- <th>Attachements</th> -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="product in products" :key="product.id">
                <td>{{ product.id }}</td>
                <td>{{ product.name }}</td>
                <td>{{ product.description }}</td>
                <!-- <td>{{ product.properties }}</td> -->
                <!-- <td>{{ product.attachments }}</td> -->
                <td></td>
            </tr>
        </tbody>
    </table>
</template>

<script>
import { mapGetters } from 'vuex';

export default {
    name: 'ProductTable',

    computed: {
        ...mapGetters({
            products: 'getProducts'
        }),
    },

    mounted() {
        this.$store.dispatch('fetchProducts');
    },

    methods: {
        deleteProduct(product) {
            this.$store.dispatch('deleteProduct', product);
        }
    }
};
</script>

<style>

</style>
