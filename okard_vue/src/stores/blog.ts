import { ref, computed } from 'vue'
import { defineStore } from 'pinia'
import { blogList, blogDetails } from './functions/axiosInstance';

export const useBlogStore = defineStore('blog', () => {

    const list = ref<any>([])
    const details = ref<any>([])
    const loading = ref<boolean>(true)
    const categories = ref(['category001', 'category002'])

    async function getList(category = null) {
        let { data } = await blogList();
        loading.value = false
        list.value = data
    }

    async function getDetails(id: any) {
        let { data } = await blogDetails(id);
        loading.value = false
        details.value = data
    }

    function getCategories() {
        // set to categories.value
    }

    return { list, categories, getList, getCategories, loading, getDetails, details }
})
