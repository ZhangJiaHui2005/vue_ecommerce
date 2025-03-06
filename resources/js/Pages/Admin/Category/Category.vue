<script setup>
import { route } from '../../../../../vendor/tightenco/ziggy/src/js';
import AdminLayout from '../../../Layouts/AdminLayout.vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    categories: Object,
    errors: Object
});

defineOptions({ layout: AdminLayout });
</script>

<template>
    <div>
        <div class="d-flex justify-content-center align-items-center">
            <h1 class="mb-5">Categories</h1>
        </div>

        <div class="mb-5">
            <Link href="/admin/categories/create" class="btn btn-dark">Create new category</Link>
        </div>

        <div class="container-fluid">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <td>
                            id
                        </td>
                        <td>
                            name
                        </td>

                        <td>
                            description
                        </td>

                        <td>
                            actions
                        </td>
                    </tr>
                </thead>

                <tbody>
                    <tr v-for="category in categories" :key="category.id">
                        <td>
                            {{ category.id }}
                        </td>
                        <td>
                            {{ category.name }}
                        </td>
                        <td>
                            {{ category.description }}
                        </td>
                        <td class="d-flex gap-3">
                            <Link :href="route('categories.edit', { id: category.id })" method="GET" class="btn btn-dark">
                                <i class="bi bi-pen fs-5"></i>
                            </Link>

                            <Link :href="route('categories.destroy', { id: category.id })" method="DELETE" class="btn btn-dark">
                                <i class="bi bi-trash fs-5"></i>
                            </Link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>