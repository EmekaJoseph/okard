<template>
    <div class="thForm">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-8">
                    <div class="card">
                        <div class="card-header border-0  fw-bold  text-center py-3">OKARD-HGV
                            <span class="text-muted">| Admin</span>
                        </div>
                        <div class="card-body py-5 px-4">
                            <form class="row gy-3">
                                <div class="col-md-12">
                                    <label>username</label>
                                    <input v-model="form.username" type="text" class="form-control form-control-lg">
                                </div>
                                <div class="col-md-12">
                                    <label>passoword</label>
                                    <input v-model="form.password" type="password" class="form-control form-control-lg">
                                </div>
                                <div class="col-md-12 mt-5">
                                    <button v-if="!isSending" @click.prevent="sendLogin"
                                        class="btn theme-btn btn-lg w-100">Login</button>
                                    <button v-else disabled class="btn theme-btn btn-lg w-100">Please Wait..</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script lang="ts" setup>
import { ref, reactive } from 'vue';
import useFunction from '@/stores/functions/useFunction';
import { useRouter } from 'vue-router';
import { useAccount } from '@/stores/admin/account'
import { login } from '@/stores/functions/axiosInstance'

const fxn = useFunction.fx;
const router = useRouter()
const account = useAccount();
const isSending = ref(false)

const form = reactive({
    username: '',
    password: ''
})


async function sendLogin() {

    if (!form.username || !form.password) {
        fxn.Toast('complete empty fields', 'warning');
        return;
    }
    isSending.value = true

    try {
        let resp = await login({ username: form.username, password: form.password })

        if (resp.status == 203) {
            fxn.Toast('invalid login details', 'error');
            isSending.value = false
            return;
        }

        form.password = ''
        form.username = ''
        isSending.value = false
        account.state = resp.data
        router.push({
            path: '/admin/account/requests'
        })

    } catch (error) {
        isSending.value = false

    }







}

</script>



<style scoped>
/* .container {
    min-height: 95vh;
    display: flex;
    justify-content: center;
    align-items: center;
} */

.thForm {
    min-height: 100vh;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-pack: center;
    justify-content: center;
    -ms-flex-align: center;
    align-items: center;
    transition: 1.8s ease-in-out;
    overflow: hidden;
    background-color: #eee;
}
</style>