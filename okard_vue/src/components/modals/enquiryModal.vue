<template>
    <div>
        <div class="modal fade" id="enquiryModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-0 bg-light">
                        <!-- <span class="fw-bold">{{ item.name }}</span> -->
                        <span class="fw-bold">{{ item.type }}</span>
                        <span class="float-end">
                            <button ref="btnX" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </span>
                    </div>
                    <div class="modal-body p-sm-4">
                        <div class="row justify-content-center gy-3">
                            <div class="col-md-12">
                                <div v-if="item.img" class="image-holder fill">
                                    <img class="img-fluid" :src="`${hostURL}/slides/${item.img}`" alt="">
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <div class="bg-light p-2">
                                    <div class="mb-1"><b>Name:</b> {{ item.name }}</div>
                                    <div class="mb-1"> <b>Description</b>: {{ item.description }}</div>
                                    <div v-if="item.location"><b>Location</b>: {{ item.location }}</div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-7">
                                        <button v-if="!item.inCart" @click="addToCart" type="button"
                                            class="btn theme-btn w-100">
                                            Add to Cart
                                        </button>
                                        <button v-else @click="addToCart" type="button" class="btn btn-dark w-100">
                                            <i class="bi bi-cart-x"></i> Remove
                                        </button>
                                    </div>
                                    <div class="col-5">
                                        <button @click="showCart" type="button" class="btn btn-outline-dark w-100">
                                            <i class="bi bi-cart3"></i> Cart
                                        </button>
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
import { ref, reactive } from 'vue';
import { onBeforeRouteLeave } from 'vue-router';
import useFunction from '@/stores/functions/useFunction';
import { sendRequest, hostURL } from '@/stores/functions/axiosInstance';


const fxn = useFunction.fx


const emit = defineEmits(['showCart'])

const prop = defineProps({
    item: {
        type: Object,
        default: {},
        required: true
    }
})

const field = reactive({
    name: '',
    contact: '',
    message: '',
    isSending: false
})



function saveReq() {

    if (!field.name) {
        fxn.Toast('Please tell us your name', 'warning')
        return;
    }

    if (!field.contact) {
        fxn.Toast('Enter your phone/email or both', 'warning')
        return;
    }

    let obj = {
        name: field.name,
        contact: field.contact,
        message: !field.message.length ? null : field.message,
        refImage: prop.item.id,
        type: prop.item.type
    }
    sendReq(obj);
}

async function sendReq(obj: any) {
    field.isSending = true
    try {
        let resp = await sendRequest(obj)
        if (resp.status == 200) {
            field.isSending = false
            fxn.Toast('Thank You, We will contact you shortly', 'success')
            btnX.value.click()
        }
    } catch (error) {
        field.isSending = false
        fxn.Toast('Sorry, Error occoured, try again', 'error')
    }
}

function addToCart() {
    prop.item.inCart = !prop.item.inCart
    btnX.value.click()
}

function showCart() {
    btnX.value.click()
    emit('showCart')
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
    cursor: pointer;
    transition: all 0.5s ease;
    height: 270px;
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

