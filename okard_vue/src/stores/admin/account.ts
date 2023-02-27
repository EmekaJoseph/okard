import { ref } from 'vue'
import { defineStore } from 'pinia'
import { useStorage } from '@vueuse/core'

export const useAccount = defineStore('account', () => {
    const nullState = {
        id: null,
        username: null,
        role: null,
    }

    const state = ref<any>(useStorage('okard-str', nullState, localStorage))

    return {
        state,
        nullState
    }

})
