<template>
  <div style="padding-bottom: 10rem;">
    <HeaderComponent />
    <div class="container">
      <section class="action-section">
        <div class="row justify-content-center gy-3">
          <div class="col-lg-10">
            <div class="text-center mb-5">
              <h4 class="text-capitalize topix">Request for Bill of Quantity <br> (Building Cost Estimates)</h4>
              <div class="title-border"></div>
              <p class="text-muted mt-3 mx-md-5">
                Request for a bill of Quantity, need cost estimates? fill the form below and let us do the calculation for
                you.
              </p>
            </div>
          </div>
          <div class="col-lg-8 ">
            <Carousel :autoplay="10000" :wrap-around="true">
              <Slide v-for="slide in images.bill" :key="slide">
                <img class="carousel__item" :src="`${hostURL}/slides/${slide}`" alt="">
              </Slide>

              <template #addons>
                <!-- <Pagination /> -->
                <!-- <Navigation class="no-mobile" /> -->
              </template>
            </Carousel>
          </div>

          <div class="col-lg-4">
            <div class="card p-3">
              <RequestForm requestType="Bill" />
            </div>
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
  /* border-radius: 8px; */
  display: flex;
  justify-content: center;
  align-items: center;
}

.fileBtnFake {
  background-color: var(--bs-light);
  padding: 15px 10px;
  border: 1px solid #ccc;
  cursor: pointer;
  font-weight: bold;
  border-radius: 10px;
}

.fileBtnFake:hover {
  background-color: #eee;
  /* color: var(--theme-color); */
}
</style>

