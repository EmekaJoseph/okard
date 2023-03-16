<template>
    <div class="bg-light" style="padding-bottom: 10rem;">
        <HeaderComponent />
        <div class="container">
            <section class="action-section">
                <div class="row justify-content-center gy-3">
                    <div class="col-md-12 mb-4">
                        <div class="topic-card">
                            <div class="topic-overlay">
                                <span>
                                    <div class="theme-text text-center">OKARD-HGV LIMITED</div>
                                    <h2 class="text-white text-center">OUR PORTFOLIO</h2>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="row gy-3">
                            <div class="col-md-8 ">
                                <div v-if="loading" class="py-5">
                                    <PageLoading />
                                </div>

                                <div v-else style="min-height: 50vh;">
                                    <div v-if="!list.length" class="py-5 fs-3">
                                        No Portfolios to show
                                    </div>

                                    <div v-else class="row">
                                        <div v-for="(show, i) in list" :key="i" class="col-6 col-md-4">
                                            <div @click="clickedPortfolio = show" data-bs-toggle="modal"
                                                data-bs-target="#portfolioModal" class="image-holder fill">
                                                <img class="img-fluid" :src="`${hostURL}/portfolios/${show.image}`" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="col-md-4">
                                <social_media_handles />
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>

        <portfolioModal :item="clickedPortfolio" />
    </div>
</template>

<script setup lang="ts">
import social_media_handles from '@/components/social_media_handles.vue';
import { onMounted, ref } from 'vue';
import { portfolioList, hostURL } from '@/stores/functions/axiosInstance';
import PageLoading from '@/components/PageLoading.vue';
import portfolioModal from '@/components/modals/portfolioModal.vue';

onMounted(() => {
    window.scrollTo(0, 0)
    loadPortfolio()
})

const list = ref<any>('')
const loading = ref(true)
const clickedPortfolio = ref<any>({})

async function loadPortfolio() {
    let { data } = await portfolioList()
    loading.value = false
    list.value = data
}
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

.image-holder {
    cursor: pointer;
    transition: all 0.5s ease;
    height: 150px;
    width: auto;
}

.image-holder:hover {
    transform: scale(0.97);
}

.fill {
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden
}

.fill img {
    flex-shrink: 0;
    min-width: 100%;
    min-height: 100%
}

@media (min-width: 994px) {
    .image-holder {
        height: 200px;
        width: 100%;
    }
}
</style>


