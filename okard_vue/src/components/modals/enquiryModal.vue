<template>
    <div>
        <div class="modal fade" id="enquiryModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-0 bg-light">
                        <span class="fw-bold">{{ item.name }}</span>
                        <span class="float-end">
                            <button ref="btnX" class="btn btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </span>
                    </div>
                    <div class="modal-body p-sm-4">
                        <div class="row justify-content-center gy-3">
                            <div class="col-md-12">
                                <div class="card info-panel">
                                    {{ item.desc }}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-lg" placeholder="your name..">
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-lg" placeholder="email or phone">
                            </div>

                            <div class="col-md-12">
                                <button type="button" class="btn btn-lg theme-btn w-100">Make Enquriry</button>
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


const prop = defineProps({
    item: {
        type: Object,
        default: {},
        required: true
    }
})

const btnX: any = ref(null)
onBeforeRouteLeave(() => {
    btnX.value.click()
})

</script>

<style scoped>
.info-panel {
    padding: 10px;
    border: none;
    background-color: var(--theme-color-bg);
    border-radius: 0%;
}
</style>

