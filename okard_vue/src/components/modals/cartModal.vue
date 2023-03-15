<template>
    <div>
        <div class="modal fade" id="cartModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-0 bg-light">
                        <span class="fw-bold">
                            <i class="bi bi-cart3"></i> Cart <span class="badge bg-secondary fw-light rounded px-2 m-0">
                                {{ images.cart.length }}
                            </span>
                        </span>
                        <span class="float-end">
                            <button ref="btnX" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </span>
                    </div>
                    <div class="modal-body p-sm-4">
                        <div v-if="!images.cart.length" class="d-flex justify-content-center align-content-center">
                            <div class="py-2 text-muted">
                                <i style="font-size: 5rem;" class="bi bi-cart-dash text-muted text-center"></i>
                                <br>
                                <span class="text-center">Cart is Empty</span>
                            </div>
                        </div>
                        <div v-else class="row justify-content-center gy-3">

                            <div class="col-md-12 ">
                                <div class=" card p-2 py-4 shadow-sm">
                                    <div class="table-responsive">
                                        <table class="table table-sm text-nowra">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Qty</th>
                                                    <th class="text-end">Price</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(item, i) in images.cart" :key="i">
                                                    <th class="fw-bold">{{ (i + 1) }}</th>
                                                    <td class="text-capitalize">{{ item.name }}
                                                        <span v-if="item.location">, {{ item.location }}</span>.
                                                    </td>

                                                    <td class="text-nowrap">
                                                        <button @click="decQty(item)"
                                                            class="btn btn-light fs-5 m-0 p-0 me-1 p-0">
                                                            <i class="bi bi-caret-left-fill text-dark"></i>
                                                        </button>

                                                        {{ itemQty(item) }}

                                                        <button @click="item.qty ? item.qty++ : item.qty = 2"
                                                            class="btn btn-light fs-5 m-0 p-0 ms-1">
                                                            <i class="bi bi-caret-right-fill text-success"></i>
                                                        </button>
                                                    </td>
                                                    <td class="text-end text-nowrap">
                                                        {{ (rowTotal(item)).toLocaleString() }}
                                                    </td>

                                                    <td>
                                                        <button @click="removeFromCart(item.id)" class="btn btn-sm m-0 p-0">
                                                            <i class="bi bi-x-lg"></i>
                                                        </button>
                                                    </td>
                                                </tr>

                                                <tr class="totalSpan">
                                                    <th colspan="3">TOTAL:</th>

                                                    <th class="text-end text-nowrap">
                                                        N {{ totalPrice.toLocaleString() }}
                                                    </th>
                                                    <th></th>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <input v-model="field.name" type="text" class="form-control form-control-lg"
                                    placeholder="your name..">
                            </div>
                            <div class="col-md-12">
                                <input v-model="field.contact" type="text" class="form-control form-control-lg"
                                    placeholder="email or phone">
                            </div>

                            <div class="col-md-12">
                                <textarea v-model="field.message" class="form-control" rows="4"
                                    placeholder="optional message"></textarea>
                            </div>

                            <div class="col-md-12">
                                <button v-if="!field.isSending" @click="saveReq" type="button"
                                    class="btn btn-lg theme-btn w-100">Submit
                                    Enquriry</button>
                                <button v-else type="button" class="btn btn-lg theme-btn w-100" disabled>Sending</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref, reactive, computed } from 'vue';
import { onBeforeRouteLeave } from 'vue-router';
import useFunction from '@/stores/functions/useFunction';
import { sendRequest } from '@/stores/functions/axiosInstance';
import { useImageSlides } from '@/stores/imageSlides';

const images = useImageSlides()


const fxn = useFunction.fx

const field = reactive({
    name: '',
    contact: '',
    message: '',
    isSending: false
})


const totalPrice = computed(() => {
    return images.cart.reduce((previous, current) => {
        return previous + current.total
    }, 0)
})


function decQty(item: any) {
    if (item.qty) {
        if (!(item.qty == 1)) {
            item.qty--
        }
    }
}

const itemQty = (item: any) => {
    item.qty = !item.qty ? 1 : item.qty
    return item.qty
}


const rowTotal = (item: any) => {
    item.total = item.qty ?
        (item.price * item.qty)
        : item.price

    return item.total
}




function saveReq() {

    if (!field.name) {
        fxn.Toast('Please tell us your name', 'warning')
        return;
    }

    if (!field.contact) {
        fxn.Toast('Enter your phone/email or both', 'warning')
        return;
    }


    // let imageIds = images.cart.map(x => x.id)

    let meappedReq = images.cart.map(x => (
        {
            name: x.name + `${x.location ? ', ' + x.location : ''}`,
            qty: x.qty,
            total: x.total
        }
    ))

    let obj = {
        name: field.name,
        contact: field.contact,
        message: !field.message.length ? null : field.message,
        refImage: JSON.stringify(meappedReq),
        type: images.cart[0].type,
        totalPrice: totalPrice.value
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
            clearCart()
        }
    } catch (error) {
        field.isSending = false
        fxn.Toast('Sorry, Error occoured, try again', 'error')
    }
}

function removeFromCart(id: any) {
    let thisItem = images.imageSlides.find(x => x.id == id)
    thisItem.inCart = false
}

function clearCart() {
    images.imageSlides.forEach(thisItem => {
        thisItem.inCart = false
    });
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


.totalSpan th {
    background-color: var(--bs-light);
    padding-block: 15px !important;
}
</style>

