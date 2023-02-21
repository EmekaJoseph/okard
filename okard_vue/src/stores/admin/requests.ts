import { ref, computed } from 'vue'
import { defineStore } from 'pinia'
import { getRequests } from '../functions/axiosInstance'

export const useRequests = defineStore('requests', () => {
    const list = ref<any[]>([])
    const onBoard = ref<any>({})
    const loading = ref<boolean>(true)

    async function getList() {
        let { data } = await getRequests()
        list.value = data
    }

    const unRead = computed(() => {
        let unread = list.value.filter(x => x.isRead == null)
        return unread.length;
    })



    return {
        list,
        unRead,
        onBoard,
        getList,
        loading
    }

})
