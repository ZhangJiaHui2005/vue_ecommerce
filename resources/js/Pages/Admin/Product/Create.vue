<template>
    <div>
        <div class="my-5">
            <h1 class="text-center">Create new product</h1>
        </div>

        <div>
            <form @submit.prevent="submit" class="w-100">
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" v-model="form.name">
                    <span v-if="errors.name" class="text-danger">{{ errors.name }}</span>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea class="form-control" v-model="form.description"></textarea>
                    <span v-if="errors.description" class="text-danger">{{ errors.description }}</span>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price:</label>
                    <input type="number" class="form-control" v-model="form.price">
                    <span v-if="errors.price" class="text-danger">{{ errors.price }}</span>
                </div>

                <div class="mb-3">
                    <label for="stock_quantity" class="form-label">Stock Quantity:</label>
                    <input type="number" class="form-control" v-model="form.stock_quantity">
                    <span v-if="errors.stock_quantity" class="text-danger">{{ errors.stock_quantity }}</span>
                </div>

                <div class="mb-3">
                    <label for="image_url">Image:</label>
                    <input type="file" class="form-control" @input="form.image_url = $event.target.files[0]">
                    <span v-if="errors.image_url" class="text-danger">{{ errors.image_url }}</span>
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Category:</label>
                    <select class="form-control" v-model="form.category_id">
                        <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}</option>
                    </select>

                    <span v-if="errors.category_id" class="text-danger">{{ errors.category_id }}</span>
                </div>

                <button type="submit" class="btn btn-dark w-100">Add</button>
            </form>
        </div>
    </div>
</template>

<script setup>
import { reactive } from 'vue';
import AdminLayout from '../../../Layouts/AdminLayout.vue';
import { router } from '@inertiajs/vue3';

    defineOptions({ layout: AdminLayout })
    defineProps({
        errors: Object,
        categories: Object
    })

    const form = reactive({
        name: null,
        description: null,
        price: null,
        stock_quantity: null,
        image_url: null,
        category_id: null
    })

    function submit() {
        router.post('/admin/products/create', form);
    }
</script>