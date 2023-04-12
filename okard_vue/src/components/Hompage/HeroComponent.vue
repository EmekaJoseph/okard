<template>
    <div>
        <Carousel :autoplay="5000" :wrap-around="true">
            <Slide v-for="slide in imgArr" :key="slide">
                <div class="hero" id="Home" :style="{ 'background-image': `url(${hostURL}/slides/hero/${slide.img})` }">
                    <div class="trans-lay">
                        <div class="container content-la">
                            <div class="row justify-content-center">
                                <div class="col-md-11 writ-part">
                                    <p class=" text-center hero-sub fs-24 fw-bold">
                                        OKARD HEIGHT GLOBAL VENTURES LIMITED
                                    </p>
                                    <h1 class="text-white text-center hero-heading">
                                        {{ slide.title }}
                                    </h1>

                                    <div class="text-center text-light text-exp">
                                        <!-- Production of building materials and general
                                        merchandise -->
                                        {{ slide.sub }}
                                    </div>

                                    <div class="d-flex justify-content-center d-lg-none">
                                        <!-- <router-link :to="{ path: '/', hash: '#Contact' }" -->
                                        <router-link to="/about" class="btn theme-btn mt-3 mt-lg-4 hover-tiltX border-0">
                                            Read more..
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </Slide>

            <template #addons>
                <!-- <Pagination /> -->
                <!-- <Navigation class="no-mobile" /> -->
            </template>
        </Carousel>

    </div>
</template>

<script lang="ts" setup>
import { hostURL } from '@/stores/functions/axiosInstance';
import { ref } from 'vue';
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel';

const imgArr = ref<any>([

    {
        img: 'hero-image.jpg',
        title: 'Building Construction',
        sub: 'Professional group of Engineers and Architects.'
    },

    {
        img: 'hero-image2_new.jpg',
        title: 'Real Estate Developers',
        sub: 'Beautiful & Luxurious Residential Apartments & Commercial houses.'
    },

    {
        img: 'hero-image3_new.jpg',
        title: 'Building Designs & Interior',
        sub: 'Professional Building designs & Interior designs'
    },

    {
        img: 'hero-image4_new.jpg',
        title: 'Building Materials Production & Sells',
        sub: 'Strong & High Quality Building Materials.'
    },



])


// onMounted(() => {
//     // randomizeImage()

// })

// const imgArr = ref<any>(['hero-image.jpg', 'hero-image2.jpg', 'hero-image3.jpg', 'hero-image4.jpg'])


// const randomizeImage = () => {
//     setInterval(() => {
//         hero_image.value = imgArr.value[Math.floor(Math.random() * imgArr.value.length)];
//         console.log(hero_image.value);

//     }, 5000);
// };

</script>

<style scoped>
.hero {
    /* overflow: hidden; */
    margin-top: -1px;
    height: 100vh;
    width: 100% !important;
    background-size: cover !important;
    background-position: center center !important;
}

.trans-lay {
    /* background-color: rgba(13, 15, 21, 0.267); */
    /* background-color: rgba(13, 15, 21, 0.171); */
    /* min-height: inherit; */
    padding-top: 200px;
    padding-bottom: 100px;
    height: 100%;


    display: flex;
    -ms-flex-pack: center;
    justify-content: center;
    -ms-flex-align: center;
    align-items: center;
    /* transition: 1.8s ease-in-out; */
    overflow: hidden;
}


@media (min-width: 994px) {
    .trans-lay {
        padding-top: 300px;
    }
}

.text-light {
    /* color: rgba(255, 255, 255, .5) !important; */
    margin-top: 1.5rem !important;
    font-size: 16px;
}

.hero-heading {
    font-weight: 600;
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
    /* text-shadow: 0px 2px 2px #f15825; */
}

.hero-sub {
    color: #f15825;
    text-shadow: 0px 2px 2px rgba(17, 17, 17, 0.945);
    /* font-weight: 400; */
    animation-name: moveInleft;
    animation-duration: 3s;
    /* text-shadow: 0px 2px 2px rgba(17, 17, 17, 0.945); */
}

/* .text-exp {
    text-shadow: 0px 2px 2px rgba(17, 17, 17, 0.945);

} */

.writ-part {
    background-color: rgba(17, 17, 17, 0.425) !important;
    padding-block: 20px;
    border-radius: 30px;
}



@media (max-width: 994px) {
    .fs-24 {
        font-size: 17px;
        /* margin-bottom: 1rem; */
    }

    .writ-part {
        background-color: transparent !important;
    }

    .hero-heading,
    .text-exp {
        text-shadow: 0px 2px 2px rgba(17, 17, 17, 0.945);
    }

    .hero-sub {
        /* text-shadow: 0px 2px 2px rgba(17, 17, 17, 0.945); */
        background-color: white;
        text-shadow: none;
        font-size: 15px !important;
        border-radius: 2px;
        padding-block: 3px;
    }
}
</style>
