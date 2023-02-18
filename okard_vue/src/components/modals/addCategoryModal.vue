<template>
    <div>
        <div class="modal fade" id="addCategoryModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-header border-0 bg-light">
                        <span class="fw-bold">Under {{ type== 'Material' ? 'Building Materials' : 'Properties' }}</span>
                        <span class="float-end">
                            <button ref="btnX" class="btn btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </span>
                    </div>
                    <div class="modal-body p-sm-4">
                        <div class="row justify-content-center gy-3">
                            <div class="col-md-12">
                                <input v-model="fieldName" type="text" class="form-control form-control-lg"
                                    placeholder="category name">
                            </div>

                            <div class="col-md-12">
                                <button @click="save" type="button" class="btn btn-lg theme-btn w-100">ADD
                                    CATEGORY</button>
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
import { newCategory } from '@/stores/functions/axiosInstance';


const btnX: any = ref(null)
onBeforeRouteLeave(() => {
    btnX.value.click()
})

const prop = defineProps({
    type: {
        type: String,
        default: '',
        required: true
    }
})

const emit = defineEmits(['added'])

const fieldName = ref<string>('')

async function save() {
    if (fieldName.value) {
        let obj = {
            name: fieldName.value,
            type: prop.type
        }
        let data = await newCategory(obj);
        if (data.status = 200) {
            fieldName.value = '';
            btnX.value.click();
            emit('added');
        }
    }
}




</script>

<style scoped>
.info-panel {
    padding: 10px;
    border: none;
    background-color: var(--theme-color-bg);
    border-radius: 0%;
}
</style>

