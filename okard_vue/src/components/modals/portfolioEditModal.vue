<template>
    <div>
        <div class="modal fade" id="portfolioEditModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
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
                            <div class="col-md-12">
                                <div v-if="item.image" class="image-holder fill">
                                    <img class="img-fluid" :src="`${hostURL}/portfolios/${item.image}`" alt="">
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <form class="row g-3">
                                    <div class="col-md-12">
                                        <label>Title</label>
                                        <input v-model="thisItem.title" type="text" class="form-control">
                                    </div>
                                    <div class="col-md-12">
                                        <label>Information</label>
                                        <textarea v-model="thisItem.text" class="form-control" rows="3"></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label>Category</label>
                                        <input v-model="thisItem.category" type="text" class="form-control">
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
import { hostURL, portfolioUpdate } from '@/stores/functions/axiosInstance';
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
    title: prop.item.title,
    text: prop.item.text,
    category: prop.item.category
})

watchEffect(() => {
    thisItem.title = prop.item.title
    thisItem.text = prop.item.text
    thisItem.category = prop.item.category
})



async function updateDetails() {
    if (!thisItem.title || !thisItem.text) {
        fxn.Toast('Title & Text is compulsory', 'warning')
        return;
    }

    let obj: any = {}
    obj.title = thisItem.title
    obj.text = thisItem.text
    if (thisItem.category) obj.category = thisItem.category

    isSaving.value = true

    try {
        let resp = await portfolioUpdate(prop.item.id, obj)
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

