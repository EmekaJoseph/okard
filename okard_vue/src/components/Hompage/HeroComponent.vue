<template>
    <div class="hero" id="Home" :style="{ 'background-image': `url(${hostURL}/slides/${hero_image})` }">
        <!-- <div class="hero" id="Home"> -->
        <div class="trans-lay">
            <div class="container content-la">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <p class="text-whit text-center hero-sub fs-24" style="color: #24F2C3;">
                            OKARD HEIGHT GLOBAL VENTURES LIMITED
                            <!-- Okard Height Global Ventures Limited -->
                        </p>
                        <h1 class="text-white text-center hero-heading">
                            Bulding Construction & Sales <br>
                            (Real Estate Developers)
                            <!-- Production, Building Materials Merchandise -->
                            <!-- ▪︎ -->
                        </h1>

                        <div class="text-center text-light">
                            We are BUILDING CONTRACTORS, production of building materials and general merchandise
                        </div>

                        <div class="d-flex justify-content-center">
                            <a href="#Contact" class="btn btn-lg theme-btn mt-3 mt-lg-4 hover-tiltX">
                                Connect With Us
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</template>

<script lang="ts" setup>
import { hostURL } from '@/stores/functions/axiosInstance';
import { ref, onMounted } from 'vue';

onMounted(() => {
    randomizeImage()

})

const hero_image = ref<string>('hero-image.jpg')
const imgArr = ref<any>(['hero-image.jpg', 'hero-image2.jpg', 'hero-image3.jpg'])


const randomizeImage = () => {
    setInterval(() => {
        hero_image.value = imgArr.value[Math.floor(Math.random() * imgArr.value.length)];
        console.log(hero_image.value);

    }, 5000);
};

</script>

<style scoped>
.hero {
    /* overflow: hidden; */
    margin-top: -1px;
    height: 100%;
    /* background: url("@/assets/images/hero-image.jpg"); */
    background-size: cover;
    background-position: center center;
}

.trans-lay {
    background-color: rgba(13, 15, 21, 0.795);
    background-color: rgba(13, 15, 21, 0.664);
    min-height: inherit;
    padding-top: 200px;
    padding-bottom: 100px;


    display: flex;
    -ms-flex-pack: center;
    justify-content: center;
    -ms-flex-align: center;
    align-items: center;
    /* transition: 1.8s ease-in-out; */
    overflow: hidden;
}

.content-lay {
    opacity: 1;
}

@media (min-width: 994px) {
    .trans-lay {
        padding-top: 300px;
    }
}

.text-light {
    color: rgba(255, 255, 255, .5) !important;
    margin-top: 1.5rem !important;
    font-size: 16px;
}

.hero-heading {
    font-weight: 500;
    font-size: calc(1.425rem + 2.1vw);
    margin-top: 1.5rem !important;
}

.fs-24 {
    font-size: 23px;
    margin-bottom: 1rem;
}

.hero-heading {
    animation-name: moveInRight;
    animation-duration: 3s;
}

.hero-sub {
    animation-name: moveInleft;
    animation-duration: 3s;
}
</style>
