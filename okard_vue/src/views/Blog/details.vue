<template>
  <div class="col-md-8 ">
    <div class="bg-whit p-3">
      <h2>{{ thisBlog.topic }}</h2>
      <div class="text-muted">{{ thisBlog.text }}</div>

      <div v-if="thisBlog.images.length" class="row g-2 mt-3">
        <div v-for="(img, i) in thisBlog.images" :key="i" class="col-6 col-md-4 ">
          <div class="image-holder">
            <img class="img-fluid" :src="`/blog-images/${img}`" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { computed, onMounted, ref } from 'vue';
import { useBlogStore } from '@/stores/blog';
import useFunction from '@/stores/functions/useFunction'
import { useRoute } from 'vue-router';

const route = useRoute()
const fxn = useFunction.fx

const blog = useBlogStore()
onMounted(() => {
  window.scrollTo(0, 0)
  console.log(thisBlog.value.images);
})


const thisBlog: any = computed(() => {
  let thisRouteId: any = route.query.blog
  return blog.list.find(blog => blog.id == thisRouteId)
})

</script>

<style scoped>
.img-fluid {
  max-width: 100%;
  height: 100%;
}

.image-holder {
  cursor: pointer;
  transition: all 0.5s ease;
  height: auto;
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


