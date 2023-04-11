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
                    <a v-if="display.whatsapp" class="hover-tiltY" target="_blank"
                        :href="'https://api.whatsapp.com/send?phone=' + display.whatsapp + '&text=__'"><i
                            class="bi bi-whatsapp"></i></a>
                    <a v-if="display.linkedin" class="hover-tiltY" target="_blank" :href="display.linkedin"><i
                            class="bi bi-linkedin"></i></a>
                    <a v-if="display.facebook" class="hover-tiltY" target="_blank" :href="display.facebook"><i
                            class="bi bi-facebook"></i></a>
                    <a v-if="display.instagram" class="hover-tiltY" target="_blank" :href="display.instagram"><i
                            class="bi bi-instagram"></i></a>
                    <a v-if="display.twitter" class="hover-tiltY" target="_blank" :href="display.twitter"><i
                            class="bi bi-twitter"></i></a>
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

    display.whatsapp = data.whatsapp
    display.facebook = data.facebook
    display.instagram = data.instagram
    display.linkedin = data.linkedin
    display.twitter = data.twitter
})


const display = reactive({
    address: '',
    phone: '',
    email: '',
    whatsapp: '',
    facebook: '',
    twitter: '',
    instagram: '',
    linkedin: '',
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


