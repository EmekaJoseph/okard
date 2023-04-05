<template>
    <div class="footer-alt py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center text-lg-start">
                        <p class="text-white-50  mb-0">
                            &COPY; {{ (new Date()).getFullYear() }} - OKARD-HGV |
                            <router-link v-if="route.name == 'Admin'" class="text-muted text-decoration-none small"
                                to="/">Home</router-link>

                            <router-link v-else class="text-muted text-decoration-none small"
                                to="/admin">Admin</router-link>

                            <br>
                            <span class="xsmall mb-0 float-lg-end text-muted">
                                Designed By proffictech | 08139590011
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { useRoute } from 'vue-router';
const route = useRoute()
</script>

<style scoped>
.text-white-50 {
    --bs-text-opacity: 1;
    color: rgba(255, 255, 255, .5) !important;
}



p {
    font-size: 16px;
    line-height: 25px;
    margin-bottom: 1rem;
}

p {
    display: block;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
}


.footer-alt {
    background: #222629;
    position: absolute;
    bottom: 0;
    width: 100%;
}

.py-3 {
    padding-top: 1rem !important;
    padding-bottom: 1rem !important;
}
</style>