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
          <div class="col-lg-12 mb-5">
            <fieldset class="border rounded-3 py-1 px-4 px-lg-5 pb-3 bg-light">
              <legend class="text-muted float-none small p-0 px-2 w-auto">Categories</legend>
              <div class="row g-2 gy-4 justify-content-center">

                <div class="form-check form-check-inlin col-6 col-lg-3">
                  <input class="form-check-input " type="radio" id="All" value="All" v-model="selectedCategory">
                  <label class="form-check-label" for="All">All</label>
                </div>

                <div v-for="(category, index) in images.materialCategories" :key="index"
                  class="form-check form-check-inlin col-6 col-lg-3">
                  <input class="form-check-input " type="radio" :id="category" :value="category"
                    v-model="selectedCategory">
                  <label class="form-check-label" :for="category">{{ category }}</label>
                </div>
              </div>
            </fieldset>
          </div>

          <div class="col-lg-12">
            <div class="card bg-light">
              <div class="card-body">
                <div class="row g-2">
                  <div @click="openRequestModal(show)" v-for="(show, i) in gallery" :key="i"
                    class="col-6 col-lg-2 col-md-4 ">
                    <div class="image-holder">
                      <img class="img-fluid" :src="`slides/materials/${show.img}`" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

    <requestModal :item="selectedImage" imageFolder="materials" />
    <button class="d-none" ref="modalButton" data-bs-toggle="modal" data-bs-target="#requestModal"></button>

  </div>
</template>


<script setup lang="ts">
import { onMounted, ref, computed } from 'vue';
import { useImageSlides } from '@/stores/imageSlides'
import requestModal from '@/components/modals/requestModal.vue';

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


@media (min-width: 994px) {
  .topix {
    font-size: 2.4rem;
  }
}

.img-fluid {
  max-width: 100%;
  height: 100%;
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

img {
  vertical-align: middle;
}

img {
  overflow-clip-margin: content-box;
  overflow: clip;

  object-fit: cover;
}
</style>

