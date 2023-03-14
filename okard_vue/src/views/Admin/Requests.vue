<template>
    <div class="over_all">
        <div class="container">
            <h6 class="mb-3">
                <i class="bi bi-question-circle"></i> Requests:
                <span class="badge rounded-4 bg-light text-black fw-light small">{{ requests.unRead }} unread</span>
            </h6>

            <div class="row gy-3">
                <div class="col-md-6">
                    <div class="card w-100" style="min-height: 240px;">
                        <div class="card-header fw-bold bg-white shadow-sm border-0 py-3">Request for Building
                            Plan ({{ Planz.length }})</div>
                        <div class="card-body">
                            <div v-if="!Planz.length" class="text-center my-5 fs-6 text-muted2">No Reqests</div>
                            <div v-else class="table-responsive table-sm text-nowrap table-bordered ">
                                <table class="table">
                                    <tbody>
                                        <tr :class="{ 'unread-line': !line.isRead }" v-for="(line, index) in Planz"
                                            :key="index">
                                            <td>
                                                <i v-if="!line.isRead" class="bi bi-envelope-fill"></i>
                                                <i v-else class="bi bi-envelope-open"></i>
                                            </td>
                                            <td @click="getDetails(line.id)">{{ line.contact }}</td>
                                            <td @click="getDetails(line.id)">{{ line.name }}</td>
                                            <th @click="getDetails(line.id)" class="text-muted xsmall fw-light">{{ line.sent
                                            }}</th>
                                            <td @click="deleteReq(line.id)">
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

                <div class="col-md-6">
                    <div class="card w-100" style="min-height: 240px;">
                        <div class="card-header fw-bold bg-white shadow-sm border-0  py-3">Request for Bill of Qty
                            ({{ Billz.length }})</div>
                        <div class="card-body">
                            <div v-if="!Billz.length" class="text-center my-5 fs-6 text-muted2">No Reqests</div>
                            <div v-else class="table-responsive table-sm text-nowrap table-bordered ">
                                <table class="table">
                                    <tbody>
                                        <tr :class="{ 'unread-line': !line.isRead }" v-for="(line, index) in Billz"
                                            :key="index">
                                            <td>
                                                <i v-if="!line.isRead" class="bi bi-envelope-fill"></i>
                                                <i v-else class="bi bi-envelope-open"></i>
                                            </td>
                                            <td @click="getDetails(line.id)">{{ line.contact }}</td>
                                            <td @click="getDetails(line.id)">{{ line.name }}</td>
                                            <th @click="getDetails(line.id)" class="text-muted xsmall fw-light">{{ line.sent
                                            }}</th>
                                            <td @click="deleteReq(line.id)">
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



                <div class="col-md-6">
                    <div class="card w-100" style="min-height: 240px;">
                        <div class="card-header fw-bold bg-white shadow-sm border-0  py-3">Buying Properties
                            ({{ Propertyz.length }})</div>
                        <div class="card-body">
                            <div v-if="!Propertyz.length" class="text-center my-5 fs-6 text-muted2">No Reqests</div>
                            <div v-else class="table-responsive table-sm text-nowrap table-bordered ">
                                <table class="table">
                                    <tbody>
                                        <tr :class="{ 'unread-line': !line.isRead }" v-for="(line, index) in Propertyz"
                                            :key="index">
                                            <td>
                                                <i v-if="!line.isRead" class="bi bi-envelope-fill"></i>
                                                <i v-else class="bi bi-envelope-open"></i>
                                            </td>
                                            <td @click="getDetails(line.id)">{{ line.contact }}</td>
                                            <td @click="getDetails(line.id)">{{ line.name }}</td>
                                            <th @click="getDetails(line.id)" class="text-muted xsmall fw-light">{{ line.sent
                                            }}</th>
                                            <td @click="deleteReq(line.id)">
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



                <div class="col-md-6">
                    <div class="card w-100" style="min-height: 240px;">
                        <div class="card-header fw-bold bg-white shadow-sm border-0  py-3">Buying Materials
                            ({{ Materialz.length }})</div>
                        <div class="card-body">
                            <div v-if="!Materialz.length" class="text-center my-5 fs-6 text-muted2 ">No Reqests</div>
                            <div v-else class="table-responsive table-sm text-nowrap table-bordered ">
                                <table class="table">
                                    <tbody>
                                        <tr :class="{ 'unread-line': !line.isRead }" v-for="(line, index) in Materialz"
                                            :key="index">
                                            <td>
                                                <i v-if="!line.isRead" class="bi bi-envelope-fill"></i>
                                                <i v-else class="bi bi-envelope-open"></i>
                                            </td>
                                            <td @click="getDetails(line.id)">{{ line.contact }}</td>
                                            <td @click="getDetails(line.id)">{{ line.name }}</td>
                                            <th @click="getDetails(line.id)" class="text-muted xsmall fw-light">{{ line.sent
                                            }}</th>
                                            <td @click="deleteReq(line.id)">
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





            </div>



        </div>
        <requestDetailsModal />
        <button class="d-none" ref="modalButton" data-bs-toggle="modal" data-bs-target="#requestDetailsModal"></button>
    </div>
</template>

<script setup lang="ts">
import { ref, onMounted, onUnmounted, computed } from 'vue';
import { useRequests } from '@/stores/admin/requests';
import requestDetailsModal from '@/components/modals/requestDetailsModal.vue';
import useFunction from '@/stores/functions/useFunction';
import { requestDetails, deleteRequest } from '@/stores/functions/axiosInstance';

onMounted(() => {
    window.scrollTo(0, 0);
    requests.getList()
})

const requests = useRequests()
const modalButton = ref<any>(null)
const fxn = useFunction.fx

async function getDetails(id: any) {
    let { data } = await requestDetails(id)
    requests.onBoard = data
    requests.getList()
    modalButton.value.click()
}


const Planz = computed(() => {
    return requests.list.filter(x => x.type == 'Plan')
})

const Billz = computed(() => {
    return requests.list.filter(x => x.type == 'Bill')
})

const Propertyz = computed(() => {
    return requests.list.filter(x => x.type == 'Property')
})

const Materialz = computed(() => {
    return requests.list.filter(x => x.type == 'Material')
})






function deleteReq(id: any) {
    fxn.Confirm(``, 'Confirm delete', 'warning')
        .then(async (result) => {
            if (result.isConfirmed) {
                await deleteRequest(id)
                fxn.Toast('deleted', 'success')
                requests.getList()
            }
        })
}

let interval = setInterval(() => {
    requests.getList()
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

.text-muted2 {
    color: #ccc;
}
</style>