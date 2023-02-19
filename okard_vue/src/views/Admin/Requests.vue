<template>
    <div class="dashboard">
        <div class="container">
            <h5 class="mb-3">
                Requests: <small class="xsmall float-end">({{ requests.unRead }} unread)</small>
            </h5>
            <div class="card main">
                <div class="card-body pt-5">
                    <div class="table-responsive table-sm text-nowrap ">
                        <table class="table">
                            <tbody>
                                <tr :class="{ 'unread-line': line.isRead == '0' }"
                                    v-for="(line, index) in requests.list">
                                    <td>
                                        <i v-if="line.isRead == '0'" class="bi bi-envelope-fill"></i>
                                        <i v-else class="bi bi-envelope-open"></i>
                                    </td>
                                    <td @click="getDetails(line.id)">{{ line.name }}</td>
                                    <td @click="getDetails(line.id)">{{ line.contact }}</td>
                                    <th class="text-muted xsmall">{{ line.sent }}</th>
                                    <td @click="deleteRequest(line.id)">
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
        <requestDetailsModal />
        <button class="d-none" ref="modalButton" data-bs-toggle="modal" data-bs-target="#requestDetailsModal"></button>
    </div>
</template>

<script setup lang="ts">
import { useRequests } from '@/stores/admin/requests';
import requestDetailsModal from '@/components/modals/requestDetailsModal.vue';
import { ref } from 'vue';
import useFunction from '@/stores/functions/useFunction';

const requests = useRequests()
const modalButton = ref<any>(null)
const fxn = useFunction.fx

function getDetails(id: any) {
    // get details from api
    // update onBoard
    modalButton.value.click()
}

function deleteRequest(id: any) {
    fxn.Confirm(``, 'Confirm delete', 'warning')
        .then(async (result) => {
            if (result.isConfirmed) {

            }
        })
    // swall
}

</script>

<style scoped>
.dashboard {
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
    color: var(--theme-color);
}

.deleteBtn {
    color: red;
    background-color: rgba(255, 0, 0, 0.199);
}
</style>