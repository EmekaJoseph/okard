<template>
    <div class="thForm">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-8">
                    <div class="card">
                        <div class="card-header border-0 theme-bg fw-bold theme-text text-center py-3">OKARD-HGV
                            <span>| Admin</span>
                        </div>
                        <div class="card-body py-4">
                            <div class="row gy-3">
                                <div class="col-md-12">
                                    <label>username</label>
                                    <input v-model="form.username" type="text" class="form-control form-control-lg">
                                </div>
                                <div class="col-md-12">
                                    <label>passoword</label>
                                    <input v-model="form.password" type="password" class="form-control form-control-lg">
                                </div>
                                <div class="col-md-12">
                                    <button @click="checkForm" class="btn theme-btn btn-lg w-100">Login</button>
                                </div>
                            </div>
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

const fxn = useFunction.fx;
const router = useRouter()

const form = reactive({
    username: '',
    password: ''
})


function checkForm() {
    if (!form.username || !form.password) {
        fxn.Toast('complete the fields', 'warning');
        return;
    }

    // after axios call

    router.push({
        path: '/admin/account/dashboard'
    })

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