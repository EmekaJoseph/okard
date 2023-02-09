<script setup lang="ts">
import { onMounted, ref, reactive } from 'vue';
import HeroSection from '@/components/Hompage/HeroComponent.vue'
import AboutSection from '@/components/Hompage/AboutComponent.vue'
import ServicesSection from '@/components/Hompage/ServicesComponent.vue'
import ContactSection from '@/components/Hompage/ContactComponent.vue'
import HeaderComponent from '@/components/HeaderComponent.vue'

onMounted(() => window.scrollTo(0, 0))
</script>

<template>
  <div>
    <HeaderComponent />

    <HeroSection />
    <AboutSection />
    <ServicesSection />
    <ContactSection />
  </div>
</template>

<style>
.section {
  padding-top: 90px;
  padding-bottom: 90px;
  position: relative;
}

.title-border {
  width: 90px;
  height: 1px;
  background: linear-gradient(to right, transparent, var(--theme-color), transparent);
  margin: 0 auto;
}

h3 {
  display: block;
  /* font-size: 1.17em; */
  margin-block-start: 1em;
  margin-block-end: 1em;
  margin-inline-start: 0px;
  margin-inline-end: 0px;
  /* font-weight: bold; */
  margin-top: 0;
  margin-bottom: 0.5rem;
  font-size: calc(1.3rem + .6vw);
  font-family: "Poppins", sans-serif;
  font-weight: 500;
  line-height: 1.3;
}

.mt-3 {
  margin-top: 1rem !important;
}



.mb-5 {
  margin-bottom: 3rem !important;
}

.card {
  height: 100%;
}
</style>
