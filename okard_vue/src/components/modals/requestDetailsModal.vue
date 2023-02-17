<template>
    <div>
        <div class="modal fade" id="requestDetailsModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered"
                :class="{ 'modal-sm': !requests.onBoard.refImage }">
                <div class="modal-content">
                    <div class="modal-header border-0 bg-light">
                        <span class="fw-bold"> {{ reqName(requests.onBoard.type) }} </span>
                        <span class="float-end">
                            <button ref="btnX" class="btn btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </span>
                    </div>
                    <div class="modal-body p-sm-4 mb-4">
                        <div class="row gy-3">
                            <div v-if="requests.onBoard.refImage" class="col-12">
                                <label class="mb-3">Enquiry made for:</label>
                                <div class="image-holder fill">
                                    <img :src="`/slides/${requests.onBoard.refImage}`" alt="okard-hgv">
                                </div>
                            </div>

                            <div v-if="requests.onBoard.message" class="col-12">
                                <label>Message:</label>
                                <div class="theme-bg p-2 py-4 rounded-2">{{ requests.onBoard.message }}</div>
                            </div>

                            <div v-if="requests.onBoard.doc" class="col-12">
                                <label>Document:</label>
                                <div class="theme-bg p-2 rounded-2">
                                    <a class="theme-text text-decoration-none" href="#" download="">
                                        Download File
                                    </a>
                                </div>
                            </div>

                            <div v-if="requests.onBoard.voiceNote" class="col-12">
                                <label>Voice Note:</label>
                                <div class="theme-bg p-2 rounded-2">
                                    <a class="theme-text text-decoration-none" href="#" download>
                                        Download Audio
                                    </a>
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
import { ref } from 'vue';
import { onBeforeRouteLeave } from 'vue-router';
import { useRequests } from '@/stores/admin/requests';


const requests = useRequests()
const btnX: any = ref(null)
onBeforeRouteLeave(() => {
    btnX.value.click()
})

function reqName(name: string) {
    let title = ''
    if (name == 'Bill') title = 'Req for Bill of Quantity';
    if (name == 'Plan') title = 'Req for Bulding Plan';
    if (name == 'Property') title = 'Buying a Property';
    if (name == 'Materials') title = 'Buying Building Material';

    return title;
}

</script>

<style scoped>
.info-panel {
    padding: 10px;
    border: none;
    background-color: var(--theme-color-bg);
    border-radius: 0%;
}






.fill {
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden
}

.fill img {
    flex-shrink: 0;
    min-width: 100%;
    min-height: 100%
}
</style>

