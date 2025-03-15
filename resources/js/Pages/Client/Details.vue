<template>
    <div class="container my-5">
        <h3>{{ product.name }}</h3>

        <hr>

        <div class="row mt-5">
            <div class="col-md-8 d-flex justify-content-center">
                <img :src="`/storage/${product.image_url}`" alt=""product image>
            </div>

            <div class="col-md-4">                
                <h3>{{ product.price }}</h3>
                <p class="badge text-bg-dark">{{ product.category.name }}</p>
                <p>{{ product.description }}</p>
                
                <div class="row gap-2">
                    <button class="btn btn-dark col-md-8">Buy Now</button>
                    <Link class="btn btn-dark col-md-2">
                        <i class="bi bi-cart-plus"></i>
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import ClientLayout from '../../Layouts/ClientLayout.vue';
import { Link } from '@inertiajs/vue3';

defineOptions({
    layout: ClientLayout
});

defineProps({
    product: Object
});
</script>