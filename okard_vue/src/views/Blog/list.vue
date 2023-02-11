<template>


  <div class="col-md-8">
    <div class="mb-4" v-if="!blog.list.length">
      <span class="h4 text-muted">No updates to show now, comeback later</span>
    </div>
    <div v-else v-for="(post, index) in blog.list" :key="index" class="card blog-card mb-3">
      <div class="col-md-12">
        <span class="float-end category-label">
          {{ post.category }}
        </span>
      </div>
      <div @click="viewDetails(post)" class="fw-bold blog-title hover-tiltY h5 mb-0">{{ post.topic }}</div>
      <div>{{ fxn.truncateStr(post.text, 50) }}</div>
      <small class="blog-date text-muted mt-3"> {{
        post.posted
      }}</small>
    </div>
  </div>
</template>

<script setup lang="ts">
import { onMounted } from 'vue';
import { useBlogStore } from '@/stores/blog';
import { useRouter } from 'vue-router';
import useFunction from '@/stores/functions/useFunction'

const fxn = useFunction.fx
const router = useRouter()

const blog = useBlogStore()
onMounted(() => {
  window.scrollTo(0, 0)
})


function viewDetails(post: any) {
  router.push({
    path: '/blog/details',
    query: {
      blog: post.id,
      t: post.topic
    }
  })
}
</script>

<style scoped>
.blog-card {
  /* cursor: pointer; */
  border: none;
  border-left: 2px solid var(--theme-color);
  border-radius: 0%;
  padding: 20px;
  /* padding-top: 10px; */
  box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075) !important;
}

.category-label {
  font-size: 9px;
  background-color: var(--bs-light);
  padding: 4px 13px;
  border-radius: 20px;
}

.blog-title {
  cursor: pointer;
}

.blog-card:hover .blog-title {
  color: var(--theme-color);
}

@media (max-width: 994px) {
  .blog-title {
    color: var(--theme-color);
  }
}
</style>


