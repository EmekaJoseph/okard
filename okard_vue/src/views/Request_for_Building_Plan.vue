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
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur dolores cupiditate inventore esse quas
                voluptas deleniti quidem! Vero ipsum culpa, saepe consectetur quas totam fuga commodi hic ducimus odio
                corporis.
              </p>
            </div>
          </div>
          <div class="col-lg-6">
            <Carousel :autoplay="3000" :wrap-around="true">
              <Slide v-for="slide in images.plan" :key="slide">
                <img class="carousel__item" :src="`slides/buildingPlan/${slide}`" alt="">
              </Slide>

              <template #addons>
                <Pagination />
                <Navigation class="no-mobile" />
              </template>
            </Carousel>
          </div>
          <div class="col-lg-6 ">
            <form class="form mt-4 mt-lg-0">
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <input type="text" class="form-control form-control-lg" placeholder="Your Name">
                  </div>
                </div>
                <!--end col-->
                <div class="col-md-6">
                  <div class="mb-3">
                    <input type="tel" class="form-control form-control-lg" placeholder="Phone Number">
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="mb-3">
                    <input type="email" class="form-control form-control-lg" placeholder="Email">
                  </div>
                </div>
                <!--end col-->
                <div class="col-lg-12">
                  <div class="mb-3">
                    <textarea class="form-control " placeholder="Leave a message here" style="height: 80px;"></textarea>
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="mb-3">
                    <label>Include a file?: (Image/PDF/Word Document.. etc)</label>
                    <input type="file" ref="fileBtn"
                      accept="image/jpeg, image/png, image/jpg, .doc,.docx,application/msword, .pdf, .txt, .xlsx, .xls"
                      class="form-control form-control-lg">
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="mb-3">
                    <label>Add voice note?</label>
                    <button type="button" class="btn"> <i class="bi bi-mic"></i> </button>
                  </div>
                </div>

              </div>
              <!--end row-->
              <button type="button" class="btn float-end theme-btn">Send
                Message</button>
            </form>
          </div>
        </div>
      </section>
    </div>

  </div>
</template>


<script setup lang="ts">
import { onMounted, ref, reactive } from 'vue';
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel';
import { useImageSlides } from '@/stores/imageSlides'
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


/* .carousel__prev,
.carousel__next {
  box-sizing: content-box;
  border: 5px solid white;
}

.carousel__slide {
  padding: 10px;
} */
</style>

