<template>
    <h1 class="text-center my-5">Dashboard</h1>

    <div class="row">
        <Link :href="route('categories.index')" class="col-md-4 my-3 text-decoration-none">
            <Card title="Categories Quantity" :quantity="categories_quantity" />
        </Link>

        <Link :href="route('products.index')" class="col-md-4 my-3 text-decoration-none">
            <Card title="Products Quantity" :quantity="products_quantity" />
        </Link>

        <Link href="" class="col-md-4 my-3 text-decoration-none">
            <Card title="Users Quantity" :quantity="users_quantity" />
        </Link>
    </div>
</template>

<script setup>
    import Card from '../../Components/Card.vue';
import AdminLayout from '../../Layouts/AdminLayout.vue';
import { Link } from '@inertiajs/vue3';
import { route } from '../../../../vendor/tightenco/ziggy/src/js';

    defineOptions({layout: AdminLayout});

    defineProps({
        categories_quantity: Object,
        products_quantity: Object,
        users_quantity: Object
    });
</script>