import { ref, computed } from 'vue'
import { defineStore } from 'pinia'

export const useImageSlides = defineStore('slides', () => {
  // const bill = ref<string[]>([])
  // const plan = ref<string[]>([])
  // const properties = ref<any[]>([])
  // const materials = ref<any[]>([])

  const materialCategories = computed(() => {
    return materials.value.length ? [...new Set(materials.value.map(x => x.category))] : [];
  })
  const propertiesCategories = computed(() => {
    return properties.value.length ? [...new Set(properties.value.map(x => x.category))] : [];
  })

  function getBillImages() {
    // set bill.value
  }

  function getPlanImages() {
    // set plan.value
  }

  function getPropertyImages() {
    // set properties.value
  }


  function getMaterialsImages() {
    // set materials.value
  }



  // #####################################

  const bill = ref<string[]>(['bill1.jpeg', 'bill2.jpeg'])
  const plan = ref<string[]>(['plan1.jpeg'])

  const properties = ref<any[]>([
    {
      id: 1,
      name: 'Reside',
      category: 'Residential',
      img: 'resid1.jpeg',
      desc: 'info for resid1.jpeg under Resid',
      location: 'location',
      type: 'Property'
    },
    {
      id: 2,
      name: 'Reside',
      category: 'Residential',
      img: 'resid2.jpeg',
      desc: 'info for resid2.jpeg under Resid',
      location: 'location',
      type: 'Property'
    },
    {
      id: 3,
      name: 'Comm',
      category: 'Commercial',
      img: 'comm1.jpeg',
      desc: 'info for comm1.jpeg under Comm',
      location: 'location',
      type: 'Property'
    },
    {
      id: 4,
      name: 'Landd',
      category: 'Lands',
      img: 'land1.jpeg',
      desc: 'info for land1.jpeg under Land',
      location: 'location',
      type: 'Property'
    },
  ])

  const materials = ref<any[]>([
    {
      id: 1,
      name: 'Door',
      category: 'Doors',
      img: 'door1.jpeg',
      desc: 'info for resid1.jpeg under Resid',
      location: null,
      type: 'Material'
    },
    {
      id: 2,
      name: 'Plumb',
      category: 'Plunbing Fittings',
      img: 'plumb1.jpeg',
      desc: 'info for resid2.jpeg under Resid',
      location: null,
      type: 'Material'
    },
    {
      id: 3,
      name: 'Plumb',
      category: 'Plunbing Fittings',
      img: 'plumb2.jpeg',
      desc: 'info for resid2.jpeg under Resid',
      location: null,
      type: 'Material'
    },
    {
      id: 4,
      name: 'POP',
      category: 'POP Cement',
      img: 'pop1.jpeg',
      desc: 'info for comm1.jpeg under Comm',
      location: null,
      type: 'Material'
    },
    {
      id: 5,
      name: 'POP',
      category: 'POP Cement',
      img: 'pop2.jpeg',
      desc: 'info for comm1.jpeg under Comm',
      location: null,
      type: 'Material'
    },
    {
      id: 6,
      name: 'Rods',
      category: 'Rods',
      img: 'rod1.jpeg',
      desc: 'info for land1.jpeg under Land',
      location: null,
      type: 'Material'
    },
    {
      id: 7,
      name: 'Tiles',
      category: 'Tiles',
      img: 'tile1.jpeg',
      desc: 'info for land1.jpeg under Land',
      location: null,
      type: 'Material'
    },
    {
      id: 8,
      name: 'Sheets',
      category: 'Roofing',
      img: 'roof1.jpeg',
      desc: 'info for land1.jpeg under Land',
      location: null,
      type: 'Material'
    },
  ])

  // #####################################


  return {
    properties,
    materials,
    bill,
    plan,
    materialCategories,
    propertiesCategories,
    getBillImages,
    getMaterialsImages,
    getPropertyImages,
    getPlanImages
  }

})
