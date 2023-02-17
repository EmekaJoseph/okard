import { ref, computed } from 'vue'
import { defineStore } from 'pinia'

export const useRequests = defineStore('requests', () => {
    // const list = ref<any[]>([])
    // const onBoard = ref<any>({})

    function getRequets() {
        // set list.value
    }

    const unRead = computed(() => {
        let unread = list.value.filter(x => x.isRead == '0')
        return unread.length;
    })



    // #####################################

    const onBoard = ref<any>({
        id: 1,
        name: 'Reside',
        contact: '080234567891',
        message: 'This is the message send to the user for apprehension',
        refImage: null,
        sent: 'just now',
        isRead: '0',
        voiceNote: 'id_2ajkdubksjkks.mp3',
        doc: 'file.pdf',
        type: 'Bill'
    })

    // const onBoard = ref<any>({
    //     id: 1,
    //     name: 'Amala',
    //     contact: '080234567891',
    //     message: null,
    //     refImage: 'door1.jpeg',
    //     sent: 'just now',
    //     isRead: '0',
    //     voiceNote: null,
    //     doc: null,
    //     type: 'Property'
    // })





    const list = ref<any[]>([
        {
            id: 1,
            name: 'Reside',
            contact: '080234567891',
            sent: 'just now',
            isRead: '0'
        },
        {
            id: 1,
            name: 'Okard',
            contact: 'okard@mail.com',
            sent: 'yesterday',
            isRead: '1'
        },
        {
            id: 1,
            name: 'Junior',
            contact: '080234500101',
            sent: '2 weeks ago',
            isRead: '0'
        },

    ])


    // #####################################


    return {
        list,
        unRead,
        onBoard,
        getRequets
    }

})
