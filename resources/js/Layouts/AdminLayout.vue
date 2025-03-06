<template>
    <div>
        <header class="py-3 bg-light">
            <div class="container d-flex align-items-center justify-content-between">
                <button class="btn" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                    <i class="bi bi-list fs-3"></i>
                </button>

                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
                    aria-labelledby="offcanvasExampleLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title text-primary" id="offcanvasExampleLabel">Admin Page</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                      <a href="/admin/" class="fs-4 text-decoration-none text-black">Dashboard</a>
                      <hr>

                      <a href="/admin/categories" class="fs-4 text-decoration-none text-black">Categories</a>
                    </div>
                </div>

                <h3>Electronics Store</h3>


            </div>
        </header>

        <div class="container mt-5">
            <slot />
        </div>
    </div>
</template>

<script setup>
  import { Link } from '@inertiajs/vue3';
</script>