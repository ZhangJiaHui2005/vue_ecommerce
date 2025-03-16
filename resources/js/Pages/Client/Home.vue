<template>
    <div>
        <Carausel />
    </div>

    <div class="container my-5">
        <TitleHeader title="Latest Products" />

        <div class="row gy-5">
            <div v-for="product in products" :key="product.id" class="col-md-4">
                <ProductCard :id="product.id" :img="`/storage/${product.image_url}`" :name="product.name"
                    :price="product.price" :category="product.category.name" />
            </div>
        </div>

        <TitleHeader title="Laptop" />

        <div class="row gy-5">
            <div v-for="laptop in laptops" :key="laptop.id" class="col-md-4">
                <ProductCard :id="laptop.id" :img="`/storage/${laptop.image_url}`" :name="laptop.name"
                    :price="laptop.price" :category="laptop.category.name" />
            </div>
        </div>
    </div>
</template>

<script setup>
import Carausel from '../../Components/Carausel.vue';
import ClientLayout from '../../Layouts/ClientLayout.vue';
import TitleHeader from '../../Components/TitleHeader.vue';
import ProductCard from '../../Components/ProductCard.vue';

defineOptions({
    layout: ClientLayout
});

defineProps({
    products: Object,
    laptops: Array
});
</script>