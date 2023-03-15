<template>
    <div>
        <div class="modal fade" id="editImageSlideModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-0 bg-light">
                        <!-- <span class="fw-bold">{{ item.name }}</span> -->
                        <span class="fw-bold">Edit:</span>
                        <span class="float-end">
                            <button ref="btnX" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </span>
                    </div>
                    <div class="modal-body p-sm-4">
                        <div class="row justify-content-center gy-3">
                            <div class="col-md-12 ">
                                <form class="row g-3">
                                    <div class="col-md-12">
                                        <label>Name</label>
                                        <input v-model="thisItem.name" type="text" class="form-control">
                                    </div>
                                    <div class="col-md-12">
                                        <label>Description</label>
                                        <textarea v-model="thisItem.description" class="form-control" rows="3"></textarea>
                                    </div>
                                    <div v-if="thisItem.location" class="col-md-12">
                                        <label>location</label>
                                        <input v-model="thisItem.location" type="text" class="form-control">
                                    </div>
                                    <div class="col-md-12">
                                        <label>location</label>
                                        <input v-model="thisItem.price" type="text" class="form-control">
                                    </div>

                                    <div class="col-md-12 mt-3">
                                        <button v-if="!isSaving" @click.prevent="updateDetails"
                                            class="float-end theme-btn btn">Update
                                            Details</button>
                                        <button v-else class="float-end theme-btn btn" disabled>Updating...</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { reactive, ref, watchEffect } from 'vue';
import { onBeforeRouteLeave } from 'vue-router';
import { imageSlideUpdate } from '@/stores/functions/axiosInstance';
import useFunction from '@/stores/functions/useFunction';

const fxn = useFunction.fx
const isSaving = ref(false)
const emit = defineEmits(['done'])

const prop = defineProps({
    item: {
        type: Object,
        default: {},
        required: true
    }
})

const thisItem = reactive({
    name: prop.item.name,
    price: prop.item.price,
    description: prop.item.description,
    location: prop.item.location,
})

watchEffect(() => {
    thisItem.name = prop.item.name
    thisItem.price = prop.item.price
    thisItem.description = prop.item.description
    thisItem.location = prop.item.location
})



async function updateDetails() {
    if (!thisItem.name || !thisItem.description) {
        fxn.Toast('check compulsory fields', 'warning')
        return;
    }

    let obj: any = {}
    obj.name = thisItem.name
    obj.description = thisItem.description
    obj.price = thisItem.price
    obj.type = prop.item.type
    if (thisItem.location) obj.category = thisItem.location

    isSaving.value = true

    try {
        let resp = await imageSlideUpdate(prop.item.id, obj)
        if (resp.status == 200) {
            fxn.Toast('updated', 'success')
            emit('done')
            isSaving.value = false
            btnX.value.click()
        }
    } catch (error) {
        isSaving.value = false
    }

}


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

.image-holder {
    /* cursor: pointer; */
    transition: all 0.5s ease;
    height: 150px;
    width: auto;
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

