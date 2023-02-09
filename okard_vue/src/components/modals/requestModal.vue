<template>
    <div>
        <div class="modal fade" id="requestModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-0 py-2 fw-bold bg-light">
                        <span>&nbsp; {{ imageFolder }}</span>
                        <span class="float-end">
                            <button ref="btnX" class="btn btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </span>
                    </div>
                    <div class="modal-body p-sm-4">
                        {{ item.desc }}
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
    },

    imageFolder: {
        type: String,
        default: '',
        required: true
    }
})

const btnX: any = ref(null)
onBeforeRouteLeave(() => {
    btnX.value.click()
})

</script>

