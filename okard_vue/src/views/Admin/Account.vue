<template>
    <div class="account">
        <div class="container">
            <h5 class="mb-3 text-center"> Change Password: </h5>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-5">
                    <div class="card p-2 py-5">
                        <div class="card-body">
                            <form class="row gy-3">
                                <div class="col-12">
                                    <label>Old Password</label>
                                    <input v-model="form.oldPass" :type="type" class="form-control form-control-lg">
                                </div>
                                <div class="col-12">
                                    <label>New Password</label>
                                    <input v-model="form.newPass1" :type="type" class="form-control form-control-lg">
                                </div>
                                <div v-if="form.newPass1" class="col-12">
                                    <label>Repeat New Password</label>
                                    <input v-model="form.newPass2" type="password" class="form-control form-control-lg">
                                </div>
                                <div v-if="form.newPass1" class="col-12">
                                    <div @click="isPassword = !isPassword"
                                        class="btn btn-link float-end text-dark text-decoration-none">
                                        <span v-if="isPassword">Show</span>
                                        <span v-else>Hide</span>
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <button v-if="!isSaving" @click.prevent="submit" type="submit"
                                        class="btn btn-dark w-100 btn-lg">Change</button>
                                    <button disabled v-else class="btn btn-dark w-100 btn-lg">Loading ..</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref, reactive, computed } from 'vue';
import { passwordChange } from '@/stores/functions/axiosInstance';
import useFunction from '@/stores/functions/useFunction';
import { useAccount } from '@/stores/admin/account';


const account = useAccount()
const fxn = useFunction.fx
const isSaving = ref(false)

const form = reactive({
    oldPass: '',
    newPass1: '',
    newPass2: ''
})

const isPassword = ref(true)
const type = computed(() => {
    return isPassword.value ? 'password' : 'text'
})


async function submit() {
    if (form.oldPass && form.newPass1 && form.newPass2) {
        if (form.newPass1 !== form.newPass2) {
            fxn.Toast('passwords must match', 'warning')
            return;
        }

        let obj = {
            id: account.state.id,
            oldPass: form.oldPass,
            newPass: form.newPass1
        }

        isSaving.value = true

        let resp = await passwordChange(obj)
        if (resp.status == 203) {
            fxn.Toast('password invalid', 'error')
            isSaving.value = false
            return;
        }

        fxn.Toast('changed successfully', 'success')
        form.oldPass = ''
        form.newPass1 = ''
        form.newPass2 = ''
        isSaving.value = false


    }
}

</script>

<style scoped>
.account {
    min-height: 80vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding-bottom: 4rem;
    padding-top: 2rem;
}

.main {
    min-height: 600px;
}
</style>