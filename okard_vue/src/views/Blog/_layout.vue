<template>
    <div class="bg-light" style="padding-bottom: 10rem;">
        <HeaderComponent />
        <div class="container">
            <section class="action-section">
                <div class="row justify-content-center gy-3">
                    <div v-if="route.name == 'Blog'" class="col-md-12 mb-4">
                        <div class="topic-card">
                            <div class="topic-overlay">
                                <span>
                                    <div class="theme-text text-center">OKARD-HGV's Blog</div>
                                    <h2 class="text-white text-center">Our Latest News & Updates</h2>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="row">

                            <RouterView />

                            <div class="col-md-4">
                                <div class="col-md-12 bg-white p-4 mb-3">
                                    <div v-if="route.name !== 'Blog'" class="py-5">
                                        <router-link class=" text-decoration-none fw-bold theme-text" to="/blog">
                                            <i class="bi bi-arrow-left"></i> Back to Blog
                                        </router-link>
                                    </div>
                                    <div v-else>
                                        <div class="fs-6 mb-0 fw-bolder">Categories</div>
                                        <hr class="mt-0">
                                        <ul class="category-list">
                                            <li class="text-muted" v-if="!blog.categories.length">No categories</li>
                                            <li class="hover-tiltX" v-for="(cate, i) in blog.categories">{{ cate }}</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <fieldset class="border rounded-3 p-3">
                                        <legend class="text-muted float-none small p-0 px-2 w-auto">Social Media
                                        </legend>
                                        <div class="social-card">
                                            <a class="hover-tiltY" target="_blank"
                                                href="https://api.whatsapp.com/send?phone=+234#######&text=__"><i
                                                    class="bi bi-whatsapp"></i></a>
                                            <a class="hover-tiltY" target="_blank" href="https://twitter.com/####"><i
                                                    class="bi bi-twitter"></i></a>
                                            <a class="hover-tiltY" target="_blank"
                                                href="https://www.linkedin.com/company/#####/"><i
                                                    class="bi bi-linkedin"></i></a>
                                            <a class="hover-tiltY" target="_blank" href="https://facebook.com/####"><i
                                                    class="bi bi-facebook"></i></a>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>

</template>

<script setup lang="ts">
import { useRoute } from 'vue-router';
import { useBlogStore } from '@/stores/blog';

const route = useRoute()
const blog = useBlogStore()

</script>

<style scoped>
.topic-card {
    /* overflow: hidden; */
    margin-top: -1px;
    height: 100%;
    background: url("@/assets/images/hero-image.jpg");
    background-size: cover;
    background-position: center center;
}

.topic-overlay {
    background-color: rgba(13, 15, 21, 0.788);
    min-height: inherit;
    padding: 20px 10px;

    display: flex;
    -ms-flex-pack: center;
    justify-content: center;
    -ms-flex-align: center;
    align-items: center;
    overflow: hidden;
}

.category-list li {
    list-style: circle;
    margin-bottom: 10px;
    left: -18px;
    text-transform: capitalize;
    cursor: pointer;
}

.category-list li:hover {
    color: var(--theme-color);
}


.social-card {
    /* background-color: var(--theme-main1-transparent); */
    /* padding: 10px 30px; */
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.social-card a {
    color: var(--theme-color) !important;
    font-size: 22px;
    background-color: var(--theme-color-bg);
    padding: 5px 10px;
    border-radius: 10px;
}
</style>


