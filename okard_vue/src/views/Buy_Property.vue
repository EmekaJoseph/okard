<template>
  <div style="padding-bottom: 10rem;">
    <HeaderComponent />
    <div class="container">
      <section class="action-section">
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="text-center mb-5">
              <h4 class="text-capitalize topix">Buy a Property</h4>
              <div class="title-border"></div>
              <p class="text-muted mt-3 mx-md-5">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur dolores cupiditate inventore esse quas
                voluptas deleniti quidem! Vero ipsum culpa, saepe consectetur quas totam fuga commodi hic ducimus odio
                corporis.
              </p>
            </div>
          </div>
          <div class="col-lg-12 mb-5">
            <fieldset class="border rounded-3 p-3 px-lg-5 bg-light">
              <legend class="text-muted float-none small p-0 px-2 w-auto">Categories</legend>
              <div class="row g-2 gy-4 justify-content-center">
                <div class="form-check col-6 col-lg-3">
                  <input class="form-check-input" type="checkbox" value="All" id="All" v-model="allIsChecked">
                  <label class="form-check-label" for="All">
                    All
                  </label>
                </div>

                <div v-for="(category, index) in categories" :key="index" class="form-check col-6 col-lg-3">
                  <input class="form-check-input" :disabled="allIsChecked" type="checkbox" :value="category"
                    :id="category" v-model="checkedCategories">
                  <label class="form-check-label" :for="category">
                    {{ category }}
                  </label>
                </div>
              </div>
            </fieldset>
          </div>

          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="row g-2">
                  <div @click="openRequestModal(show)" v-for="(show, i) in galleryShow" :key="i"
                    class="col-6 col-lg-2 col-md-4 image-holder">
                    <img class="img-fluid" :src="`slides/property/${show.img}`" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <requestModal :item="selectedImage" imageFolder="property" />
    <button class="d-none" ref="modalButton" data-bs-toggle="modal" data-bs-target="#requestModal"></button>
  </div>
</template>


<script setup lang="ts">
import { onMounted, ref, watchEffect, computed } from 'vue';
import { useImageStore } from '@/stores/imageStore'
import requestModal from '@/components/modals/requestModal.vue';

onMounted(() => window.scrollTo(0, 0))

// get images from store
const images = useImageStore()

const checkedCategories = ref<string[]>([])
const allIsChecked = ref(true)
const modalButton: any = ref(null)
const selectedImage = ref({})

// get category name only
const categories = computed(() => {
  let cats: string[] = [];
  if (images.properties) {
    let names = images.properties.map(x => x.category)
    cats = [...new Set(names)];
  }
  return cats;
})

// populate images according to seletion
const galleryShow = computed(() => {
  let imgBlocks: any = []
  images.properties.forEach((imgObject: { category: string; img: any; }) => {
    if (checkedCategories.value.some(x => x == imgObject.category)) {
      imgBlocks.push(imgObject)
    }
  })
  return imgBlocks;
})

// watch for selection, then update
watchEffect(() => {
  if (allIsChecked.value) {
    categories.value.forEach(x => {
      if (checkedCategories.value.indexOf(x) === -1) {
        checkedCategories.value.push(x);
      }
    })
  }
})

// open the modal on image click
function openRequestModal(img: any) {
  selectedImage.value = img
  modalButton.value.click()

}

</script>




<style scoped>
.form-check-input {
  width: 20px;
  /* height: 20px; */

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
}

.image-holder:hover {
  transform: scale(0.97);
}

/* img {
  vertical-align: middle;
} */

/* img {
  overflow-clip-margin: content-box;
  overflow: clip;
} */
</style>

