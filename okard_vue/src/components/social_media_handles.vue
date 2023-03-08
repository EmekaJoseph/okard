<template>
    <div class="col-md-12">

        <div class="col-md-12 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header fw-bold">Contact</div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <strong><i class="bi bi-geo-alt-fill"></i></strong>
                            {{ display.address }}
                        </li>
                        <li class="list-group-item">
                            <strong><i class="bi bi-telephone-fill"></i></strong>
                            {{ display.phone }}
                        </li>
                        <li class="list-group-item">
                            <strong><i class="bi bi-envelope-at-fill"></i></strong>
                            {{ display.email }}
                        </li>

                    </ul>
                </div>
            </div>
        </div>



        <div class="col-md-12">
            <fieldset class="border rounded-3 p-3">
                <legend class="text-muted float-none small p-0 px-2 w-auto">Social Media
                </legend>
                <div class="social-card">
                    <a class="hover-tiltY" target="_blank" href="https://api.whatsapp.com/send?phone=+234#######&text=__"><i
                            class="bi bi-whatsapp"></i></a>
                    <a class="hover-tiltY" target="_blank" href="https://twitter.com/####"><i class="bi bi-twitter"></i></a>
                    <a class="hover-tiltY" target="_blank" href="https://www.linkedin.com/company/#####/"><i
                            class="bi bi-linkedin"></i></a>
                    <a class="hover-tiltY" target="_blank" href="https://facebook.com/####"><i
                            class="bi bi-facebook"></i></a>
                </div>
            </fieldset>
        </div>
    </div>
</template>

<script lang="ts" setup>
import { onMounted, reactive } from 'vue';
import { getContact } from '@/stores/functions/axiosInstance';

onMounted(async () => {
    let { data } = await getContact()
    display.email = data.email
    display.phone = data.phone
    display.address = data.address
})


const display = reactive({
    address: '',
    phone: '',
    email: '',
})


</script>



<style scoped>
.social-card {
    /* background-color: var(--theme-main1-transparent); */
    /* padding: 10px 30px; */
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.social-card a {
    color: var(--theme-color) !important;
    font-size: 22px;
    background-color: var(--theme-color-bg);
    padding: 5px 10px;
    border-radius: 10px;
}

.list-group-item {
    text-align: left;
    padding-block: 15px;
}
</style>


