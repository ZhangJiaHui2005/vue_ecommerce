<template>

    <div class="d-flex align-items-center my-5">
        <hr class="flex-grow-1 border border-dark border-2 opacity-50">
        <h1 class="mx-2">{{ title }}</h1>
        <hr class="flex-grow-1 border border-dark border-2 opacity-50">
    </div>


</template>

<script setup>
defineProps({
    title: String
});
</script>