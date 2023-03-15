<template>
    <div class="over_all">
        <div class="container">
            <h6 class="mb-3">
                <i class="bi bi-chat-left-text"></i> Messages:
                <span class="badge rounded-4 bg-light text-black fw-light small">{{ unreadMessages }} unread</span>
            </h6>
            <div class="card bg-transparent border-0 main">
                <div class="card-body pt-5">
                    <div class="row g-3">
                        <div class="col-12" :class="{ 'col-lg-7': selectedMessage.text }">
                            <div class="card border-0 min-vh-100 h-100">
                                <div class="card-header border-0">Inbox</div>
                                <div class="card-body">
                                    <div v-if="!messages.length" class="text-center my-5 fs-4 text-muted">No Messages</div>
                                    <div v-else class="table-responsive table-sm text-nowrap table-bordered ">
                                        <table class="table">
                                            <tbody>
                                                <tr :class="{ 'unread-line': !line.isRead }"
                                                    v-for="(line, index) in messages" :key="index">
                                                    <td>
                                                        <i v-if="!line.isRead" class="bi bi-envelope-fill"></i>
                                                        <i v-else class="bi bi-envelope-open"></i>
                                                    </td>
                                                    <td @click="getDetails(line.id)">{{ line.name }}</td>
                                                    <td @click="getDetails(line.id)">{{ line.subject }}</td>
                                                    <th @click="getDetails(line.id)" class="text-muted xsmall">{{ line.sent
                                                    }}
                                                    </th>
                                                    <td @click="deleteMessage(line.id)">
                                                        <button class="btn btn-sm p-0 m-0 text-danger">
                                                            <i class="bi bi-trash3"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div v-show="selectedMessage.text" class="col-12 col-lg-5" ref="messageBodyBlock">
                            <div class="card border-0 h-100">
                                <div class="card-header border-0">Message Body

                                    <span @click="selectedMessage = {}" style="cursor: pointer;"
                                        class="float-end text-danger cursor-pointer">clear</span>
                                </div>
                                <div class="card-body">
                                    <div v-if="!selectedMessage.text">...</div>
                                    <div v-else>
                                        <div class="fw-bold">{{ selectedMessage.subject }}</div>
                                        <div>{{ selectedMessage.text }}</div>
                                        <div class="mt-4 small text-muted">{{ selectedMessage.contact }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script setup lang="ts">
import { ref, onMounted, onUnmounted, computed } from 'vue';
import useFunction from '@/stores/functions/useFunction';
import { messageDelete, messageDetails, messageList } from '@/stores/functions/axiosInstance';
import { useWindowSize } from '@vueuse/core'

onMounted(() => {
    window.scrollTo(0, 0);
    getMessages()
})

const messageBodyBlock = ref<any>(null)
const { width: windowWidth } = useWindowSize()

const messages = ref<any>([])

const selectedMessage = ref<any>({})
const fxn = useFunction.fx

async function getMessages() {
    let resp = await messageList()
    messages.value = resp.data
}

const unreadMessages = computed(() => {
    let unread = messages.value.filter((x: { isRead: null; }) => x.isRead == null)
    return unread.length
})

async function getDetails(id: any) {
    // selectedMessage.value = messages.value[0]
    let { data } = await messageDetails(id)
    console.log(data);

    selectedMessage.value = data
    if (windowWidth.value < 992) messageBodyBlock.value.scrollIntoView()
    getMessages()
}

function deleteMessage(id: any) {
    fxn.Confirm(``, 'Confirm delete', 'warning')
        .then(async (result) => {
            if (result.isConfirmed) {
                await messageDelete(id)
                fxn.Toast('deleted', 'success')
                getMessages()
            }
        })
}

let interval = setInterval(() => {
    getMessages()
}, 10000)

onUnmounted(() => {
    clearInterval(interval)
})

</script>

<style scoped>
.over_all {
    min-height: 80vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding-bottom: 4rem;
    padding-top: 2rem;
}

.main {
    /* min-height: 300px; */
    min-height: 600px;
}

tr {
    cursor: pointer;
    /* background-color: red; */
}

tr:hover {
    box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075) !important;
    /* transform: scale(1.001); */
}

.unread-line td {
    font-weight: bold;
    /* color: var(--theme-color); */
}

.deleteBtn {
    color: red;
    background-color: rgba(255, 0, 0, 0.199);
}
</style>