import { ref, computed } from 'vue'
import { defineStore } from 'pinia'

export const useImageStore = defineStore('images', () => {

  const properties = ref([
    {
      id: 1,
      category: 'Residential',
      img: 'resid1.jpeg',
      desc: 'info for resid1.jpeg under Resid'
    },
    {
      id: 2,
      category: 'Residential',
      img: 'resid2.jpeg',
      desc: 'info for resid2.jpeg under Resid'
    },
    {
      id: 3,
      category: 'Commercial',
      img: 'comm1.jpeg',
      desc: 'info for comm1.jpeg under Comm'
    },
    {
      id: 4,
      category: 'Lands',
      img: 'land1.jpeg',
      desc: 'info for land1.jpeg under Land'
    },
  ])

  const materials = ref([
    {
      id: 1,
      category: 'Doors',
      img: 'door1.jpeg',
      desc: 'info for resid1.jpeg under Resid'
    },
    {
      id: 2,
      category: 'Plunbing Fittings',
      img: 'plumb1.jpeg',
      desc: 'info for resid2.jpeg under Resid'
    },
    {
      id: 3,
      category: 'Plunbing Fittings',
      img: 'plumb2.jpeg',
      desc: 'info for resid2.jpeg under Resid'
    },
    {
      id: 4,
      category: 'POP Cement',
      img: 'pop1.jpeg',
      desc: 'info for comm1.jpeg under Comm'
    },
    {
      id: 5,
      category: 'POP Cement',
      img: 'pop2.jpeg',
      desc: 'info for comm1.jpeg under Comm'
    },
    {
      id: 6,
      category: 'Rods',
      img: 'rod1.jpeg',
      desc: 'info for land1.jpeg under Land'
    },
    {
      id: 7,
      category: 'Tiles',
      img: 'tile1.jpeg',
      desc: 'info for land1.jpeg under Land'
    },
    {
      id: 8,
      category: 'Roofing',
      img: 'roof1.jpeg',
      desc: 'info for land1.jpeg under Land'
    },
  ])

  return { properties, materials }
})
