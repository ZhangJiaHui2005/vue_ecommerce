<template>
    <div class="container">
        <TitleHeader title="Products" />

        <div class="row gy-5">
            <div class="col-md-3 border rounded border-dark" style="height: 350px;">
                <h3 class="text-bg-dark bg-dark text-center p-3 rounded">Categories</h3>

                <ul style="list-style: none;">
                    <li v-for="category in categories" :key="category.id" class="p-3">
                        <Link :href="`/${category.name}`" class="text-dark text-decoration-none">
                        <h5>{{ category.name }}</h5>
                        </Link>

                        <hr>
                    </li>
                </ul>
            </div>

            <div class="col-md-9">
                <div class="row gy-5">
                    <div v-for="smartphone in smartphones" :key="smartphone.id" class="col-md-4">
                        <ProductCard :id="smartphone.id" :img="`/storage/${smartphone.image_url}`" :name="smartphone.name"
                            :price="smartphone.price" :category="smartphone.category.name" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import ClientLayout from '../../Layouts/ClientLayout.vue';
import TitleHeader from '../../Components/TitleHeader.vue';
import { Link } from '@inertiajs/vue3';
import ProductCard from '../../Components/ProductCard.vue';

defineOptions({
    layout: ClientLayout
});

defineProps({
    smartphones: Array,
    categories: Object
})
</script>