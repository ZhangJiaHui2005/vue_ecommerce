<template>
    <div class="d-flex justify-content-center align-items-center my-5">
        <form class="p-5" @submit.prevent="submit">
            <h1>Login</h1>

            <div class="mb-3">
                <label for="name">Name:</label>
                <input type="text" class="form-control" v-model="form.name">
                <span v-if="errors.name" class="text-danger">{{ errors.name }}</span>
            </div>

            <div class="mb-3">
                <label for="email">Email:</label>
                <input type="email" class="form-control" v-model="form.email">
                <span v-if="errors.email" class="text-danger">{{ errors.email }}</span>
            </div>

            <div class="mb-3">
                <label for="password">Password:</label>
                <input type="password" class="form-control" v-model="form.password">
                <span v-if="errors.password" class="text-danger">{{ errors.password }}</span>
                <span v-if="errors.credentials" class="text-danger">{{ errors.credentials }}</span>
            </div>

            <button type="submit" class="btn btn-dark w-100 mb-3">Login</button>

            <div>
                <p>Don't have an account? <Link href="/register" class="text-dark">Register</Link></p>
            </div>
        </form>
    </div>
</template>

<script setup>
import { reactive } from 'vue';
import { router } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';

    defineProps({
        errors: Object
    });

    const form = reactive({
        name: null,
        email: null,
        password: null
    })

    function submit() {
        router.post('/login', form);
    }
</script>

<style>
    @media (min-width: 768px) {
        form {
            width: 50%;
        } 
    }
</style>