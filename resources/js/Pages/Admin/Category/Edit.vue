<script setup>
import { reactive } from 'vue';
import AdminLayout from '../../../Layouts/AdminLayout.vue';
import { router } from '@inertiajs/vue3';
import { route } from '../../../../../vendor/tightenco/ziggy/src/js';

defineOptions({ layout: AdminLayout });
defineProps({
    errors: Object,
    category: Object
});

const form = reactive({
    name: null,
    description: null
});
</script>

<template>
    <div>
        <div class="d-flex justify-content-center align-items-center mx-5">
            <h1>Update {{ category.name }}</h1>
        </div>

        <div>
            <form @submit.prevent="router.put(route('categories.update', { id: category.id }), form)">
                <div class="mb-3">
                    <label for="name" class=" form-label">Name:</label>
                    <input type="text" v-model="form.name" class="form-control">
                    <span class="text-danger" v-if="errors.name">{{ errors.name }}</span>
                </div>

                <div class="mb-3">
                    <label for="description">Description:</label>
                    <textarea v-model="form.description" class="form-control"></textarea>
                    <span class="text-danger" v-if="errors.description">{{ errors.description }}</span>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary w-100">Update</button>
                </div>
            </form>
        </div>
    </div>
</template>