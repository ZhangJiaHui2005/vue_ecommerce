<template>
    <div class="card shadow">
        <img :src="img" class="card-img-top" height="200" alt="...">

        <div class="card-body">
            <h3 class="card-title my-2">{{ name }}</h3>

            <div class="my-5">
                <h5><span class="fw-bold">Price: </span>{{ price }}</h5>
                <span class="badge text-bg-dark">{{ category }}</span>
            </div>

            <div class="row">
                <div class="col-md-9">
                    <Link :href="`/product/${id}`" class="btn btn-dark w-100">Details</Link>
                </div>

                <div class="col-md-3">
                    <Link class="btn btn-dark w-100">
                        <i class="bi bi-cart-plus"></i>
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
defineProps({
    img: String,
    name: String,
    category: String,
    price: Number,
    id: Number
});
</script>