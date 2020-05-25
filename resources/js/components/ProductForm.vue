<template>
    <form @submit.prevent="submit(product)" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                {{ product }}
                <div class="col-md-12 form-group">
                    <input
                        type="checkbox"
                        class="form-control col-md-1"
                        v-model="product.carrier"
                    >
                    <span style="margin-top: 8px;">Carrier</span>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Name"
                            required
                            v-model="product.name"
                        >
                    </div>

                    <div class="form-group col-md-6">
                        <label for="material_id">Material ID</label>
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Material ID"
                            required
                            v-model="product.material_id"
                        >
                    </div>
                </div>

                <label>Properties</label>

                <div class="row">
                    <div class="form-group col-md-6">
                        <select
                            class="form-control"
                            name="ingredient"
                            v-model="property.ingredient"
                        >
                            <option value="ingredient 1">Ingredient 1</option>
                            <option value="ingredient 2">Ingredient 2</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <input
                            type="number"
                            class="form-control"
                            placeholder="Value"
                            v-model="property.value"
                        >
                    </div>
                </div>

                <table class="table" v-show="product.properties.length > 0">
                    <thead>
                        <tr>
                            <th>Ingredient</th>
                            <th>Value</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-for="property in product.properties" :key="property.value">
                            <td>{{ property.ingredient }}</td>
                            <td>{{ property.value }}</td>
                            <td>
                                <i class="fa fa-trash-o" @click="remove(property)"></i>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="row pull-right">
                    <button
                        type="button"
                        class="btn btn-primary btn-rounded"
                        style="margin-top: 10px; border-radius: 50%;"
                        @click="add"
                    >
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group col-md-12">
                    <label for="description">Description</label>
                    <textarea
                        class="form-control"
                        placeholder="Description"
                        required
                        v-model="product.description"
                    >
                    </textarea>
                </div>

                <div class="form-group col-md-12">
                    <vueDropzone ref="dropzone" id="dropzone" :options="options"/>
                </div>
            </div>
        </div>

        <div class ="row pull-right">
            <a href = "/products" class="btn btn-primary" style = "margin-right: 5px;">Cancel</a>
            <button type="submit" class="btn btn-primary" @click.prevent="submit(product)">Save</button>
        </div>
    </form>
</template>
 
<script>
import vueDropzone from "vue2-dropzone";
import 'vue2-dropzone/dist/vue2Dropzone.min.css';

export default {
    name: 'ProductForm',

    components: {
        vueDropzone,
    },

    data() {
        return {
            product: {
                properties: [],
                attachments: null,
            },

            options: {
                url: '/products',
                thumbnailWidth: 150,
                maxFilesize: 0.5,
            },

            property: {},
        };
    },

    methods: {
        submit(product) {
            console.log(this.$refs.dropzone.dropzone.files);
            this.product.attachments = this.$refs.dropzone.dropzone.files;
            this.$store.dispatch('createProduct', product);
        },

        add() {
            if(Object.keys(this.property).length > 0){
                this.product.properties.push(this.property);
                this.property = {};
            }
        },

        remove(property) {
            const index = this.product.properties.findIndex(x => x.value === property.value);
            this.product.properties.splice(index, 1);
        }
    },
};
</script>

<style>

</style>
