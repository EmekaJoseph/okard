<script setup lang="ts">
import { RouterView } from 'vue-router'
import FooterComponent from '@/components/FooterComponent.vue'
</script>

<template>
  <div class="whole-site">
    <RouterView v-slot="{ Component, route }">
      <transition name="fade">
        <component :is="Component" :key="route.path" />
      </transition>
    </RouterView>
    <FooterComponent />
  </div>
</template>

<style>
.whole-site {
  padding-bottom: 2.8rem;
}
</style>
