import { ref, computed } from 'vue'
import { defineStore } from 'pinia'

export const useBlogStore = defineStore('blog', () => {

    // const list = ref<any>([])
    // const categories= ref<string[]>([])

    function getFirstTen(category = null) {
        // set to list.value
    }

    function getCategories() {
        // set to categories.value
    }


    // #####################################


    const list = ref([
        {
            id: 1,
            topic: 'The first topic of the blog',
            text: `Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae enim quasi, ex
                    consectetur vero expedita accusantium labore nobis praesentium autem nesciunt neque
                    asperiores cum laborum doloremque maxime inventore, optio aspernatur.`,
            posted: '10th Feb 2023',
            images: ['blog1.jpeg'],
            category: 'the place'
        },
        {
            id: 2,
            topic: 'The second topic of the blog',
            text: `Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae enim quasi, ex
                    consectetur vero expedita accusantium labore nobis praesentium autem nesciunt neque
                    asperiores cum laborum doloremque maxime inventore, optio aspernatur.`,
            posted: '12th June 2023',
            images: ['blog1.jpeg', 'blog1.jpeg'],
            category: 'food store'
        },
        {
            id: 3,
            topic: 'The third topic of the blog',
            text: `Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae enim quasi, ex
                    consectetur vero expedita accusantium labore nobis praesentium autem nesciunt neque
                    asperiores cum laborum doloremque maxime inventore, optio aspernatur.`,
            posted: '12th March 2023',
            images: ['blog1.jpeg', 'blog1.jpeg', 'blog1.jpeg'],
            category: 'bukka amala'
        }
    ]);

    const categories = ref(['category001', 'category002'])


    // #####################################


    return { list, categories, getFirstTen, getCategories }
})
