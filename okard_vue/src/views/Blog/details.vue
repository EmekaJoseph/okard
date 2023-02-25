<template>
  <div class="col-md-8 ">
    <div v-if="blog.loading" class="card-body">
      <PageLoading />
    </div>

    <div v-else class="card p-3 py-5">
      <h2>{{ blog.details.title }}</h2>
      <div class="text-muted">{{ blog.details.text }}</div>

      <div v-if="blog.details.images" class="row g-2 mt-3">
        <div v-for="(img, i) in blog.details.images" :key="i" class="col-6 col-md-4 ">
          <div class="image-holder">
            <img class="img-fluid" :src="`${hostURL}/blog-images/${img}`" alt="">
          </div>
        </div>
      </div>
    </div>

  </div>
</template>

<script setup lang="ts">
import { computed, onMounted, onUnmounted } from 'vue';
import { useBlogStore } from '@/stores/blog';
import { useRoute } from 'vue-router';
import { hostURL } from '@/stores/functions/axiosInstance';

const route = useRoute()

const blog = useBlogStore()
onMounted(() => {
  let thisRouteId: any = route.query.blog
  blog.getDetails(thisRouteId)
  window.scrollTo(0, 0)
})

onUnmounted(() => {
  blog.details = {}
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


