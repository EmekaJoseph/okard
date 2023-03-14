<template>
    <form class="form mt-4 mt-lg-0">
        <div class="row gy-3">
            <div class="col-md-12">
                <label>Your name:</label>
                <input v-model="form.name" type="text" class="form-control form-control-lg" placeholder="">
            </div>

            <div class="col-lg-12">
                <label>Contact: email or Phone</label>
                <input v-model="form.contact" type="email" class="form-control form-control-lg" placeholder="">
            </div>

            <div class="col-lg-12">
                <label for="">Leave a message here</label>
                <textarea v-model="form.message" class="form-control " placeholder="" style="height: 100px;"></textarea>
            </div>


            <form ref="fileForm" class="d-none">
                <input type="file" ref="fileBtn"
                    accept="image/jpeg, image/png, image/jpg, .doc,.docx,application/msword, .pdf, .txt, .xlsx, .xls"
                    class="form-control form-control-lg" @change="fileUploadFn">
            </form>


            <div class="col-lg-12">
                <label class="fs-">Add a picture, PDF or Word Document ?</label>
                <div @click="fileBtn.click()" v-if="!newFile" class="fileBtnFake">
                    <i class="bi bi-file-earmark-text"></i> Click Here
                </div>
                <div v-else class="fileBtnFake theme-bg">
                    <span>
                        <span class="theme-text">
                            {{ newFile.name }}
                        </span>
                        <span @click="fileFormR" class="fw-bold float-end theme-text">
                            <i class="bi bi-x-circle-fill"></i>
                        </span>
                    </span>
                </div>
            </div>

            <div class="col-lg-12 d-sm-none">
                <label class="fs-5">Add a Voice Note?</label>
                <input @change="getVoiceNote" ref="recordBtn" type="file" accept="audio/*" capture hidden />
                <div v-if="!voiceNote" @click="recordBtn.click()" class="fileBtnFake"><i class="bi bi-record-circle"></i>
                    Record
                </div>
                <div @click="removeVoiceNote" v-else class="fileBtnFake theme-bg"><i class="bi bi-x-lg"></i> Remove
                    Voice note
                </div>
                <div v-if="voiceURL" class="my-3"><audio class="form-control" :src="voiceURL" controls></audio>
                </div>
            </div>

        </div>
        <!--end row-->
        <button v-if="!isSending" @click="submitForm" type="button" class="btn float-end btn-lg theme-btn mt-5 w-100">Send
            Message</button>
        <button v-else type="button" class="btn float-end btn-lg theme-btn mt-5 w-100" disabled>Sending..</button>
    </form>
</template>

<script setup lang="ts">
import { onMounted, ref, reactive } from 'vue';
import { fileUploader } from '@/stores/functions/fileUploader'
import useFunction from '@/stores/functions/useFunction';
import { sendRequest } from '@/stores/functions/axiosInstance';

const prop = defineProps({
    requestType: {
        type: String,
        required: true
    }
})


onMounted(() => window.scrollTo(0, 0))

const fxn = useFunction.fx

let { fileUploadFn, fileURL, newFile, fileSize } = fileUploader();


const fileBtn = ref<any>(null);
const recordBtn = ref<any>(null);
const fileForm = ref<any>(null);
const isSending = ref<boolean>(false)

const voiceNote = ref<any>('')
const voiceURL = ref<any>('')

function fileFormR() {
    fileURL.value = ''
    newFile.value = ''
    fileForm.value.reset()
}

const form = reactive({
    name: '',
    contact: '',
    message: '',
})

function getVoiceNote(e: any) {
    voiceNote.value = e.target.files[0];
    voiceURL.value = URL.createObjectURL(voiceNote.value);
}

function removeVoiceNote() {
    voiceNote.value = '';
    voiceURL.value = '';
}

function submitForm() {
    if (!form.name) {
        fxn.Toast('please tell us your name', 'warning')
        return
    }
    if (!form.contact) {
        fxn.Toast('enter your email or phone', 'warning')
        return
    }
    if (!form.message && !newFile.value) {
        fxn.Toast('leave a message or include a file', 'warning')
        return
    }

    let $form = new FormData
    $form.append('name', form.name);
    $form.append('contact', form.contact);
    $form.append('type', prop.requestType);
    if (form.message)
        $form.append('message', form.message);
    if (newFile.value)
        $form.append('doc', newFile.value);
    if (voiceNote.value)
        $form.append('voiceNote', voiceNote.value);
    send($form)
}


async function send($form: FormData) {
    isSending.value = true
    try {
        let resp = await sendRequest($form)
        if (resp.status == 200) {
            isSending.value = false
            fileFormR();
            removeVoiceNote()
            form.name = ''; form.contact = ''; form.message = ''
            fxn.Toast('Thank You, We will contact you shortly', 'success')
        }
    } catch (error) {
        fxn.Toast('Internet error, try again', 'error')
        isSending.value = false
    }

}

</script>

<style scoped>
.fileBtnFake {
    background-color: var(--bs-light);
    padding: 15px 10px;
    border: 1px solid #ccc;
    cursor: pointer;
    font-weight: bold;
    border-radius: 10px;
}

.fileBtnFake:hover {
    background-color: #eee;
    /* color: var(--theme-color); */
}
</style>