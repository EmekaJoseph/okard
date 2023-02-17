<template>
  <div style="padding-bottom: 10rem;">
    <HeaderComponent />
    <div class="container">
      <section class="action-section">
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="text-center mb-5">
              <h4 class="text-capitalize topix">Buy Building Materials</h4>
              <div class="title-border"></div>
              <p class="text-muted mt-3 mx-md-5">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur dolores cupiditate inventore esse quas
                voluptas deleniti quidem! Vero ipsum culpa, saepe consectetur quas totam fuga commodi hic ducimus odio
                corporis.
              </p>
            </div>
          </div>

          <div class="col-lg-3 col-12 mb-5">
            <fieldset class="border rounded-3 py-1 py-lg-4 px-4 ps-lg-4 pb-3 bg-light h-100">
              <legend class="text-muted float-none small p-0 px-2 w-auto">Categories</legend>
              <div class="row g-2 gy-4">

                <div class="form-check col-6 col-lg-12">
                  <input class="form-check-input " type="radio" id="All" value="All" v-model="selectedCategory">
                  <label class="form-check-label" :class="{ 'activeLabel': selectedCategory == 'All' }"
                    for="All">All</label>
                </div>

                <div v-for="(category, index) in images.materialCategories" :key="index"
                  class="form-check form-check-inlin col-6 col-lg-12">
                  <input class="form-check-input " type="radio" :id="category" :value="category"
                    v-model="selectedCategory">
                  <label class="form-check-label" :class="{ 'activeLabel': selectedCategory == category }"
                    :for="category">{{ category }}</label>
                </div>
              </div>
            </fieldset>
          </div>

          <div class="col-lg-9 col-12">
            Showing:
            <span class="text-success fw-bold">
              ({{ selectedCategory }})</span>
            <!-- <legend class="text-muted small">Select Image to Continue &nbsp;
            </legend> -->
            <div class="card border-0 bg-light h-100">
              <div class="card-body">
                <div class="row g-2">
                  <div @click="openRequestModal(show)" v-for="(show, i) in gallery" :key="i"
                    class="col-6 col-lg-4 col-md-4 ">
                    <div class="image-holder fill">
                      <img class="img-fluid" :src="`/slides/${show.img}`" alt="">
                      <div class="details-overlay">
                        <div class="text-warning">{{ show.name }}</div>
                        <div class="text-white">{{ show.desc }}</div>
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

    <enquiryModal :item="selectedImage" />
    <button class="d-none" ref="modalButton" data-bs-toggle="modal" data-bs-target="#enquiryModal"></button>

  </div>
</template>


<script setup lang="ts">
import { onMounted, ref, computed } from 'vue';
import { useImageSlides } from '@/stores/imageSlides'
import enquiryModal from '@/components/modals/enquiryModal.vue';

onMounted(() => window.scrollTo(0, 0))

// get images from store
const images = useImageSlides()

const selectedCategory = ref('All')
const modalButton: any = ref(null)
const selectedImage = ref({});

// populate images according to seletion
const gallery = computed(() => {
  let imgBlocks: any = []
  if (selectedCategory.value == 'All') {
    imgBlocks = images.materials
  }
  else {
    images.materials.forEach((imgObject: { category: string; img: any; }) => {
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
</script>


<style scoped>
.form-check-input:checked[type=radio] {
  background-image: none;
}

.form-check-label:hover {
  color: var(--theme-color);
}


/* .img-fluid {
  height: 300px;
  width: 100%;
} */

.image-holder {
  cursor: pointer;
  transition: all 0.5s ease;
  height: 150px;
  width: auto;
}



.image-holder:hover {
  transform: scale(0.97);
}

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
  height: 35%;
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
    height: 250px;
    width: 100%;
  }
}


@media (max-width: 994px) {
  .details-overlay {
    font-size: 12px;
    height: 50%;
  }
}
</style>

