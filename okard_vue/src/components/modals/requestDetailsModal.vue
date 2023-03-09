<template>
    <div>
        <div class="modal fade" id="requestDetailsModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-0 bg-light">
                        <span class="fw-bold"> {{ reqName(requests.onBoard.type) }} </span>
                        <span class="float-end">
                            <button ref="btnX" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </span>
                    </div>
                    <div class="modal-body p-sm-4 mb-4">
                        <div class="row gy-3">
                            <div v-if="requests.onBoard.refImage" class="col-12">
                                <label class="">Enquiry made for:</label>
                                <div class=" theme-b p-2 card shadow-sm">
                                    <div class="table-responsive">
                                        <table class="table table-sm text-nowrap">
                                            <thead>
                                                <th>#</th>
                                                <th>Item</th>
                                                <th class="text-end">Price</th>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(item, i) in requests.onBoard.refImage" :key="i">
                                                    <!-- <th class="fw-bold"> <i class="bi bi-arrow-right xsmall"></i> </th> -->
                                                    <th>{{ (i + 1) }}</th>
                                                    <td>
                                                        {{ item.name }}
                                                        <span v-if="item.location">, {{ item.location }}</span>.
                                                        (x{{ item.qty }})
                                                    </td>

                                                    <td class="text-end">
                                                        {{ item.total.toLocaleString() }}
                                                    </td>
                                                </tr>
                                                <tr class="totalSpan">
                                                    <th colspan="2">TOTAL AMOUNT:</th>

                                                    <th class="text-end">
                                                        N {{ requests.onBoard.totalPrice.toLocaleString() }}
                                                    </th>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div v-if="requests.onBoard.message" class="col-12">
                                <label>Message:</label>
                                <div class=" card p-2 py-2 rounded-2">{{ requests.onBoard.message }}
                                </div>
                            </div>

                            <div v-if="requests.onBoard.doc" class="col-12">
                                <label>Attached Document:</label>
                                <div class="theme-bg p-2 card">
                                    <a class="theme-text text-decoration-none"
                                        :href="`${hostURL}/reqFiles/${requests.onBoard.doc}`" download>
                                        <i class="bi bi-download"></i> Download document
                                    </a>
                                </div>
                            </div>

                            <div v-if="requests.onBoard.voiceNote" class="col-12">
                                <label>Voice Note:</label>
                                <div class="theme-bg p-2 card">
                                    <a class="theme-text text-decoration-none"
                                        :href="`${hostURL}/reqFiles/${requests.onBoard.voiceNote}`" download>
                                        <i class="bi bi-mic"></i> Download voiceNote
                                    </a>
                                </div>
                            </div>

                            <div class="col-12 mt-5">
                                <button data-bs-dismiss="modal"
                                    class="btn float-end btn-outline-secondary px-4">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref, computed } from 'vue';
import { onBeforeRouteLeave } from 'vue-router';
import { useRequests, } from '@/stores/admin/requests';
import { hostURL } from '@/stores/functions/axiosInstance';

const requests = useRequests()
const btnX: any = ref(null)
onBeforeRouteLeave(() => {
    btnX.value.click()
    console.log(requests.onBoard);

})

const list = computed(() => { return requests.onBoard.refImage })

function reqName(name: string) {
    let title = ''
    if (name == 'Bill') title = 'Req for Bill of Quantity';
    if (name == 'Plan') title = 'Req for Bulding Plan';
    if (name == 'Property') title = 'Buying Property';
    if (name == 'Material') title = 'Buying Building Material';

    return title;
}


// const totalPrice = computed(() => {
//     return requests.onBoard.refImage.reduce((previous: any, current: any) => {
//         return previous + current.price
//     }, 0)
// })


</script>

<style scoped>
.totalSpan th {
    background-color: var(--bs-light);
    padding-block: 15px !important;
}
</style>

