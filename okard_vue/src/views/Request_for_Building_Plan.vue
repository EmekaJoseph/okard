<template>
  <div style="padding-bottom: 10rem;">
    <HeaderComponent />
    <div class="container">
      <section class="action-section">
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="text-center mb-5">
              <h4 class="text-capitalize topix">Request for Building Plan</h4>
              <div class="title-border"></div>
              <p class="text-muted mt-3 mx-md-5">
                Let us draw that building plan for you, fll the form below to reach us
              </p>
            </div>
          </div>
          <div class="col-lg-6 ">
            <Carousel :autoplay="3000" :wrap-around="true">
              <Slide v-for="slide in images.plan" :key="slide">
                <img class="carousel__item" :src="`${hostURL}/slides/${slide}`" alt="">
              </Slide>

              <template #addons>
                <Pagination />
                <Navigation class="no-mobile" />
              </template>
            </Carousel>
          </div>

          <div class="col-lg-6">
            <RequestForm requestType="Plan" />
          </div>

        </div>
      </section>
    </div>

  </div>
</template>


<script setup lang="ts">
import { onMounted } from 'vue';
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel';
import { useImageSlides } from '@/stores/imageSlides'
import RequestForm from '@/components/RequestForm.vue';
import { hostURL } from '@/stores/functions/axiosInstance';


onMounted(() => window.scrollTo(0, 0))

const images = useImageSlides()

</script>

<style scoped>
@media (min-width: 994px) {
  .topix {
    font-size: 2.4rem;
  }
}

.carousel__item {
  min-height: 200px;
  width: 100%;
  background-color: var(--vc-clr-primary);
  color: var(--vc-clr-white);
  font-size: 20px;
  border-radius: 8px;
  display: flex;
  justify-content: center;
  align-items: center;
}
</style>

