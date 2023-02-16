<template>
    <div class="admin-page">
        <nav class="navbar sticky-top navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">OKARD-HGV | Admin</a>
                <span type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu"
                    aria-controls="offcanvasMenu" class="menu-btn"><i class="bi bi-list"></i>Menu</span>
            </div>
        </nav>
        <RouterView />
        <offcanvasMenu />
    </div>
</template>

<script setup lang="ts">
import offcanvasMenu from './_offCanvas.vue';

</script>

<style scoped>
.admin-page {
    min-height: 100vh;
    background-color: #eee;
}

.menu-btn {
    font-size: 16px;
    background-color: var(--theme-color-bg);
    color: var(--theme-color);
    border-radius: 10px;
    padding-inline: 10px;
    cursor: pointer;
}

@media (max-width: 994px) {
    .navbar-brand {
        font-size: 16px;
    }
}
</style>