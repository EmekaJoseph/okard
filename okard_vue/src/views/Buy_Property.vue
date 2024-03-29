<template>
  <div style="padding-bottom: 10rem;">
    <HeaderComponent />
    <div class="container">
      <section class="action-section">
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="text-center mb-5">
              <h4 class="text-capitalize topix">Buy Properties</h4>
              <div class="title-border"></div>
              <p class="text-muted mt-3 mx-md-5">
                <b>Make enquiry</b> by adding as many items as possible to CART and send us a request,
                we will reach you as soon as possible.
              </p>
            </div>
          </div>

          <div v-show="images.loading" class="p-4">
            <PageLoading />
          </div>

          <div v-show="!images.loading" class="col-lg-3 col-12 mb-5">
            <fieldset class="border rounded-3 py-1 py-lg-4 px-4 ps-lg-4 pb-3 bg-ligh h-100">
              <legend class="text-muted float-none small p-0 px-2 w-auto">Select category</legend>
              <div class="row g-2 gy-4">

                <div class="form-check col-6 col-lg-12">
                  <input class="form-check-input " type="radio" id="All" value="All" v-model="selectedCategory">
                  <label class="form-check-label" :class="{ 'activeLabel': selectedCategory == 'All' }"
                    for="All">All</label>
                </div>

                <div v-for="(category, index) in images.propertiesCategories" :key="index"
                  class="form-check form-check-inlin col-6 col-lg-12">
                  <input class="form-check-input " type="radio" :id="category" :value="category"
                    v-model="selectedCategory">
                  <label class="form-check-label" :class="{ 'activeLabel': selectedCategory == category }"
                    :for="category">{{ category }}</label>
                </div>
              </div>
            </fieldset>
          </div>

          <div v-show="!images.loading" class="col-lg-9 col-12">

            <div class="row gy-3">

              <div class="col-12">
                Showing:
                <span class="text-success small fw-bold">
                  ({{ selectedCategory }})
                </span>

                <button @click="showCart" type="button" class="btn btn-light float-end m-0">
                  <i v-if="!images.cart.length" class="bi bi-cart3"></i>
                  <i v-else class="bi bi-cart-check-fill"></i>
                  Cart
                  <span class="badge bg-dark"> {{ images.cart.length }}</span>
                </button>
              </div>


              <div class="col-12">
                <div class="card h-100 border-0">
                  <div class="card-body">

                    <div class="row g-2">
                      <div v-for="(show, i) in gallery" :key="i" class="col-12 col-lg-4 col-md-4">
                        <div class="card h-100 mt-lg-0 hover-tiltY">
                          <div class="image-holder fill">
                            <img class="img-fluid rounded-top" :src="`${hostURL}/slides/${show.img}`" alt="okard-hgv">
                          </div>

                          <div class=" card-body">
                            <div class="text-uppercase" style="cursor: pointer;" @click="openRequestModal(show)">
                              <b> {{ show.name }}</b>
                            </div>
                            <small>N{{ fxn.AddCommas(show.price) }}</small>

                            <div class="col-12 mt-2">
                              <div class="float-end" @click="show.inCart = !show.inCart">
                                <button v-if="!show.inCart" class="btn theme-btn-line small m-0 p-0 px-2 ">
                                  <i class="bi bi-cart"></i> cart &nbsp; &nbsp;<i class="bi bi-square"></i>
                                </button>
                                <button v-else class="btn theme-btn small m-0 p-0 px-2 ">
                                  <i class="bi bi-cart"></i> cart &nbsp; &nbsp;<i class="bi bi-check-square-fill"></i>
                                </button>
                              </div>
                              <div class="float-end me-2">
                                <button @click="openRequestModal(show)" class="btn btn-secondary small m-0 p-0 px-2">
                                  <i class="bi bi-info-circle"> </i> details
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>




          </div>
        </div>
      </section>
    </div>

    <enquiryModal :item="selectedImage" @show-cart="showCart" />
    <cartModal />
    <button class="d-none" ref="modalButton" data-bs-toggle="modal" data-bs-target="#enquiryModal"></button>
    <button class="d-none" ref="modalButtonCart" data-bs-toggle="modal" data-bs-target="#cartModal"></button>

  </div>
</template>


<script setup lang="ts">
import { onMounted, ref, computed } from 'vue';
import { useImageSlides } from '@/stores/imageSlides'
import enquiryModal from '@/components/modals/enquiryModal.vue';
import cartModal from '@/components/modals/cartModal.vue';
import useFunction from '@/stores/functions/useFunction';
import { hostURL } from '@/stores/functions/axiosInstance';

const fxn = useFunction.fx

onMounted(() => {
  window.scrollTo(0, 0);
  images.getImages()
})

// get images from store
const images = useImageSlides()

const selectedCategory = ref('All')
const modalButton: any = ref(null)
const modalButtonCart: any = ref(null)
const selectedImage = ref({});

// populate images according to seletion
const gallery = computed(() => {
  let imgBlocks: any = []
  if (selectedCategory.value == 'All') {
    imgBlocks = images.properties
  }
  else {
    images.properties.forEach((imgObject: { category: string; img: any; }) => {
      if (imgObject.category == selectedCategory.value) {
        imgBlocks.push(imgObject)
      }
    })
  }
  return imgBlocks;
})


// open the modal on image click
function openRequestModal(img: any) {
  selectedImage.value = img
  modalButton.value.click()
}

function showCart() {
  modalButtonCart.value.click()
}
</script>


<style scoped>
.form-check-input:checked[type=radio] {
  background-image: none;
}

.form-check-label:hover {
  color: var(--theme-color);
}



.image-holder {
  cursor: pointer;
  transition: all 0.5s ease;
  height: 150px;
  width: auto;
}



/* .image-holder:hover {
  transform: scale(0.97);
} */

/* img {
  vertical-align: middle;
}

img {
  overflow-clip-margin: content-box;
  overflow: clip;

  object-fit: cover;
} */

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

.activeLabel {
  background-color: var(--theme-color-bg);
  color: var(--theme-color);
  padding: 0px 10px 0px 5px;
  border-radius: 4px;
  /* border-bottom: 1px solid var(--theme-color); */
}

.details-overlay {
  position: absolute;
  height: 50%;
  width: 100%;
  bottom: 0;
  /* left: 0; */
  background-color: rgba(15, 1, 1, 0.555);
  /* border: 1px solid #eee; */
  padding: 10px;
  /* border-radius: 20px; */
  /* display: none; */
  /* font-size: 12px; */
}


@media (min-width: 994px) {
  .topix {
    font-size: 2.4rem;
  }

  .image-holder {
    height: 200px;
    width: 100%;
  }
}


@media (max-width: 994px) {}

.bottom-text {
  position: absolute;
  bottom: 0;
  left: 0;
  margin-left: 10px;
  margin-bottom: 10px;
}


.btns-overlay {
  position: absolute;
  height: 100%;
  width: 100%;
  bottom: 0;
  left: 0;
  /* border: 1px solid #eee; */
  padding: 10px;
  /* border-radius: 20px; */
  /* display: none; */
  /* font-size: 12px; */
}

.top-btns {
  position: absolute;
  top: 0;
  right: 0;
  margin-right: 10px;
  margin-top: 10px;
}
</style>

