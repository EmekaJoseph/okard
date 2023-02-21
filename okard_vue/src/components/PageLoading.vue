<template>
    <div class="main">
        <span class="spinner"></span>
    </div>
</template>



<style scoped>
.main {
    display: flex;
    justify-content: center;
    align-items: center;
}

.spinner {
    width: 75px;
    height: 75px;
    display: inline-block;
    border-width: 2px;
    border-color: rgba(255, 255, 255, 0.05);
    border-top-color: var(--theme-color);
    animation: spin 1s infinite linear;
    border-radius: 100%;
    border-style: solid;
}

@keyframes spin {
    100% {
        transform: rotate(360deg);
    }
}
</style>