<template>
    <div>
        <div class="d-flex justify-content-center align-items-center my-5">
            <h1>Products</h1>
        </div>

        <div class="mb-5">
            <Link href="/admin/products/create" class="btn btn-dark">Create new product</Link>
        </div>

        <div class="container-fluid">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <td>id</td>
                        <td>name</td>
                        <td>description</td>
                        <td>price</td>
                        <td>stock quantity</td>
                        <td>category id</td>
                        <td>actions</td>
                    </tr>
                </thead>

                <tbody>
                    <tr v-for="product in products" :key="product.id">
                        <td>{{ product.id }}</td>
                        <td>{{ product.name }}</td>
                        <td>{{ product.description }}</td>
                        <td>{{ product.price }}</td>
                        <td>{{ product.stock_quantity }}</td>
                        <td>{{ product.category_id }}</td>
                        <td>
                            <Link :href="route('products.edit', { id: product.id })" method="GET" class="btn btn-dark">
                                <i class="bi bi-pen"></i>
                            </Link>

                            <Link :href="route('products.destroy', { id: product.id })" method="DELETE" class="btn btn-dark">
                                <i class="bi bi-trash"></i>
                            </Link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script setup>
import AdminLayout from '../../../Layouts/AdminLayout.vue';
import { Link } from '@inertiajs/vue3';

    defineOptions({ layout: AdminLayout })
    defineProps({
        products: Object,
    });
</script>