<template>
    <div class="account">
        <div class="container">
            <!-- <h5 class="mb-3 text-center"> Change Password: </h5> -->
            <div class="row justify-content-center gy-4">
                <div class="col-lg-4 col-md-5">
                    <div class="card border-0">
                        <div class="card-header border-0 py-3 bg-white fw-bold">Change Password:</div>
                        <div class="card-body p-4">
                            <form class="row g-3">
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
                                <div class="col-12 mt-4">
                                    <button v-if="!isSaving" @click.prevent="submit" type="submit"
                                        class="btn btn-dark w-100 btn-lg">Change</button>
                                    <button disabled v-else class="btn btn-dark w-100 btn-lg">Loading ..</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-7">
                    <div class="card border-0">
                        <div class="card-header py-3 bg-white fw-bold border-0">Account Details:</div>
                        <div class="card-body p-4">
                            <form class="row gy-3">
                                <div class="col-12">
                                    <label>Address:</label>
                                    <textarea v-model="contact.address" class="form-control"></textarea>
                                </div>

                                <div class="col-12">
                                    <label>Phone Number:</label>
                                    <input v-model="contact.phone" type="text" class="form-control form-control-lg">
                                </div>

                                <div class="col-12">
                                    <label>Email:</label>
                                    <input v-model="contact.email" type="text" class="form-control form-control-lg">
                                </div>


                                <div class="col-12 mt-4">
                                    <button v-if="!contact.saving" @click.prevent="saveContact" type="submit"
                                        class="btn btn-dark w-100 btn-lg">Update</button>
                                    <button disabled v-else class="btn btn-dark w-100 btn-lg">Updating ..</button>
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
import { ref, reactive, computed, onMounted } from 'vue';
import { passwordChange, getContact, updateContact } from '@/stores/functions/axiosInstance';
import useFunction from '@/stores/functions/useFunction';
import { useAccount } from '@/stores/admin/account';


// ################ PASSWORD START ############################# //
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
// ################ PASSWORD END  ############################# //


// ################ CONTACT START  ############################# //

const contact = reactive({
    address: '',
    phone: '',
    email: '',
    saving: false
})

onMounted(() => {
    loadContact()
})

async function loadContact() {
    let { data } = await getContact()
    contact.email = data.email
    contact.phone = data.phone
    contact.address = data.address
}

async function saveContact() {
    try {
        contact.saving = true
        await updateContact(contact)
        contact.saving = false
        fxn.Toast('contact updated', 'success')
        getContact()
    } catch (error) {
        contact.saving = false
        fxn.Toast('internet error', 'error')
    }
}


// ################ CONTACT END  ############################# //

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