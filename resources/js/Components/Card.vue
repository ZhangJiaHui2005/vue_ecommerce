<template>
    <div class="card">
        <div class="card-header">
            <h5 class="text-center">{{ title }}</h5>
        </div>
        <div class="card-body">
            <h2 class="text-center">{{ quantity }}</h2>
        </div>
    </div>
</template>

<script setup>
    defineProps({
        title: String,
        quantity: Object
    });
</script>