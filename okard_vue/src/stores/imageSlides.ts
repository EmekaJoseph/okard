import { ref, computed } from 'vue'
import { defineStore } from 'pinia'
import { getImageSlides } from '@/stores/functions/axiosInstance'

export const useImageSlides = defineStore('slides', () => {
  const imageSlides = ref<any[]>([])
  const bill = ref<string[]>(['bill1.jpeg', 'bill2.jpeg'])
  const plan = ref<string[]>(['plan1.jpeg'])

  const loading = ref<boolean>(true)

  const properties = computed(() => {
    return imageSlides.value.filter(img => img.type == 'Property')
  })

  const materials = computed(() => {
    return imageSlides.value.filter(img => img.type == 'Material')
  })

  const materialCategories = computed(() => {
    return materials.value.length ? [...new Set(materials.value.map(x => x.category))] : [];
  })

  const propertiesCategories = computed(() => {
    return properties.value.length ? [...new Set(properties.value.map(x => x.category))] : [];
  })

  const cart = computed(() => {
    return imageSlides.value.filter(x => x.inCart);
  })

  async function getImages() {
    let { data } = await getImageSlides();
    loading.value = false
    imageSlides.value = data
  }


  return {
    loading,
    properties,
    materials,
    bill,
    plan,
    materialCategories,
    propertiesCategories,
    getImages,
    cart,
    imageSlides
  }
})
