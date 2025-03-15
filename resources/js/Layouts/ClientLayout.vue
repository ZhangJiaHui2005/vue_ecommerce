<template>
    <header class="bg-dark">
        <Navbar />
    </header>

    <div>
        <slot />
    </div>
</template>

<script setup>
    import { usePage } from '@inertiajs/vue3';
import Navbar from '../Components/Navbar.vue';
</script>