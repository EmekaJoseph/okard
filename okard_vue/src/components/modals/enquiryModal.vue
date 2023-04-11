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
                                    <div class="mb-2"><b>Name:</b> {{ item.name }}</div>
                                    <div class="mb-2"> <b>Description</b>: {{ item.description }}</div>
                                    <div class="mb-2" v-if="item.location"><b>Location</b>: {{ item.location }}</div>
                                    <div class="mb-2" v-if="item.price"><b>Price</b>: N{{ fxn.AddCommas(item.price) }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-7"></div>
                                    <div class="col-5 float-end">
                                        <button v-if="!item.inCart" @click="addToCart" type="button"
                                            class="btn  theme-btn-line w-100 ">
                                            <i class="bi bi-cart"></i> cart &nbsp; &nbsp;<i class="bi bi-square"></i>
                                        </button>
                                        <button v-else @click="addToCart" type="button" class="btn  theme-btn w-100">
                                            <i class="bi bi-cart"></i> cart &nbsp; &nbsp;<i
                                                class="bi bi-check-square-fill"></i>
                                        </button>
                                    </div>
                                    <!-- <div class="col-12">
                                        <button @click="showCart" type="button" class="btn btn-outline-dark w-100">
                                            <i class="bi bi-cart3"></i> View Cart
                                        </button>
                                    </div> -->
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
import { hostURL } from '@/stores/functions/axiosInstance';
import useFunction from '@/stores/functions/useFunction';

const fxn = useFunction.fx


const emit = defineEmits(['showCart'])

const prop = defineProps({
    item: {
        type: Object,
        default: {},
        required: true
    }
})


function addToCart() {
    prop.item.inCart = !prop.item.inCart
    btnX.value.click()
}

// function showCart() {
//     btnX.value.click()
//     emit('showCart')
// }


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

