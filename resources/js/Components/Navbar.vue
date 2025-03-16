<template>
    <nav class="navbar navbar-expand-lg container">
        <div class="container-fluid">
            <Link class="navbar-brand text-white" href="/">Electronics Store</Link>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon text-white"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <Link class="nav-link text-white" aria-current="page" href="/">Home</Link>
                    </li>
                    <li class="nav-item">
                        <Link href="/products" class="nav-link text-white">Products</Link>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-disabled="true">Disabled</a>
                    </li>
                </ul>

                <div v-if="user" class="dropdown my-auto">
                    <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ user.name }}
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/logout" class="text-danger px-3">Logout</a>
                        </li>
                    </ul>
                </div>

                <div v-else class="dropdown my-auto">
                    <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Welcome Guest!!!
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/login" class="text-dark px-3">Login</a>
                        </li>

                        <hr>
                        
                        <li>
                            <a href="/register" class="text-dark px-3">Register</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</template>

<script setup>
import { usePage } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';

const page = usePage();
const user = page.props.auth.user;
</script>