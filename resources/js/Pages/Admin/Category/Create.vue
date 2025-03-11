<script setup>
import { reactive } from 'vue';
import AdminLayout from '../../../Layouts/AdminLayout.vue';
import { router } from '@inertiajs/vue3';

defineOptions({ layout: AdminLayout });
defineProps({
    errors: Object,
    category: Object
});

const form = reactive({
    name: null,
    description: null
});

function submit() {
    router.post('/admin/categories/create', form);
}
</script>

<template>
    <div>
        <div class="d-flex justify-content-center align-items-center mx-5">
            <h1>Create new category</h1>
        </div>

        <div>
            <form @submit.prevent="submit" class="w-100">
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
                    <button type="submit" class="btn btn-dark w-100">Add</button>
                </div>
            </form>
        </div>
    </div>
</template>