<template>
    <section class="section" id="Contact">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="text-center mb-5">
                        <h6 class="theme-text text-uppercase mb-0">Contact Us</h6>
                        <h3 class="text-capitalize">Let's here from you!</h3>
                        <div class="title-border"></div>
                        <p class="text-muted mt-3 mx-md-5">Have any questions for us? or you want to share some info?
                            Please fll the form below.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <social_media_handles />

                </div>
                <!--edn col-->
                <div class="col-lg-6">
                    <span id="error-msg"></span>
                    <form class="form mt-4 mt-lg-0">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <input v-model="thForm.name" type="text" class="form-control" id="name"
                                        placeholder="Your Name">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-6">
                                <div class="mb-3">
                                    <input v-model="thForm.contact" type="text" class="form-control" id="number"
                                        placeholder="Email or Phone">
                                </div>
                            </div>

                            <!--end col-->
                            <div class="col-lg-12 col-md-6">
                                <div class="mb-3">
                                    <input v-model="thForm.subject" type="text" class="form-control" id="subject"
                                        placeholder="Subject">
                                </div>
                            </div>
                            <!--end col-->

                            <!--end col-->
                            <div class="col-lg-12">
                                <div class="mb-4 pb-3">
                                    <textarea v-model="thForm.text" class="form-control" placeholder="Leave a message here"
                                        id="comments" style="height: 100px;"></textarea>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                        <button v-if="!thForm.isSending" @click.prevent="sendMessage" type="submit" id="submit" name="send"
                            value="Send Message" class="btn float-end theme-btn">Send Message</button>
                        <button v-else @click.prevent="sendMessage" value="Send Message" class="btn float-end theme-btn"
                            disabled>Sending...</button>
                    </form>
                    <!--end form-->
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
</template>

<script lang="ts" setup>
import { reactive, onMounted } from 'vue';
import useFunction from '@/stores/functions/useFunction';
import { messageNew, getContact } from '@/stores/functions/axiosInstance';
import social_media_handles from '../social_media_handles.vue';


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


const thForm = reactive<any>({
    isSending: false,
    name: '',
    contact: '',
    subject: '',
    text: '',
})
const fxn = useFunction.fx


async function sendMessage() {
    if (!thForm.name || !thForm.contact) {
        fxn.Toast('Please fill out your name & contact', 'warning')
        return
    }

    if (!thForm.text) {
        fxn.Toast('Please fill your message', 'warning')
        return
    }

    let obj = {
        name: thForm.name,
        contact: thForm.contact,
        subject: !thForm.subject ? 'No subject' : thForm.subject,
        text: thForm.text,
    }

    thForm.isSending = true

    try {
        let resp = await messageNew(obj)
        if (resp.status == 200) {
            fxn.Toast('Message sent, thank you', 'success')
            thForm.isSending = false
            thForm.name = ''
            thForm.contact = ''
            thForm.subject = ''
            thForm.text = ''

        }
    } catch (error) {
        fxn.Toast('Network Error', 'error')
        thForm.isSending = false
    }
}


</script>

<style scoped>
.col {
    /* margin-block: 5px; */
    line-height: 20px;
    margin-bottom: 1rem;
}

h5 {
    font-weight: 500;
    line-height: 1.3;
    font-size: 1.25rem;
}



.form-control {
    font-size: 14px;
    color: #0f105e;
}

.form .form-control {
    padding: 14px 13px;
}

textarea.form-control {
    min-height: calc(1.5em + .75rem + 2px);
}

.form-control {
    display: block;
    width: 100%;
    /* padding: .375rem .75rem; */
    /* font-size: 1rem; */
    font-weight: 400;
    line-height: 1.5;
    /* color: #212529; */
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    /* -webkit-appearance: none; */
    /* -moz-appearance: none; */
    appearance: none;
    border-radius: .375rem;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}

.btn {
    padding: 12px 30px;
    font-size: 15px;
    font-weight: 600;
    letter-spacing: 0.5px;
    transition: all 0.5s;
    overflow: hidden;
    position: relative;
}

/* p {
    font-size: 16px;
    line-height: 25px;
    margin-bottom: 1rem;
} */

.f-19 {
    font-size: 19px;
}


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