<template>
    <div class="over_all">
        <div class="container">

            <div class="row justify-content-center">

                <div class="col-md-10 col-lg-8">
                    <h6 class="mb-3"> <i class="bi bi-newspaper"></i> New Blog Post:

                        <RouterLink class="btn btn-sm p-0 m-0 px-3 btn-outline-dark ms-5" to="/admin/account/blogpost">
                            <i class="bi bi-list"></i> Back to List
                        </RouterLink>
                    </h6>
                    <div class="card main">
                        <div class="card-body pt-5">
                            <div class="row justify-content-center gy-3">
                                <div class="col-md-12 col-lg-10">
                                    <label>Blog Title: <span class="text-danger">*</span></label>
                                    <input v-model="newPost.title" type="text" class="form-control form-control-lg">
                                </div>
                                <div class="col-md-12 col-lg-10">
                                    <label>Blog Text: <span class="text-danger">*</span></label>
                                    <textarea v-model="newPost.text" class="form-control form-control-lg"
                                        rows="8"></textarea>
                                </div>
                                <div class="col-md-12 col-lg-10">
                                    <label>Add Images (Maximum of 3):</label>
                                    <div class="images-span card">
                                        <div class="card-body">
                                            <div class="row gy-3">
                                                <div v-for="i in ImgArr" :key="i.id" class="col-6 col-md-4">
                                                    <div class="imagePreviewWrapper"
                                                        :style="{ 'background-image': `url(${i.url})` }">
                                                        <button @click="removeImage(i.url)"
                                                            class="btn btn-danger xsmall btn-sm m-2 p-0 px-2 float-end">
                                                            <i class="bi bi-x-lg"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div v-if="ImgArr.length < 3" class="col-6 col-md-4 ">
                                                    <span class="shadow" @click="fileBtn.click()" id="add_btn"><i
                                                            class="bi bi-plus-square-dotted"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-8 mt-5">
                                    <button v-if="!isSaving" @click="save" class="btn theme-btn float-end btn-lg">Submit
                                        Post</button>
                                    <button v-else class="btn theme-btn float-end btn-lg" disabled>Submitting...</button>
                                </div>

                                <!-- hidden block -->
                                <div class="col-md-12 col-lg-8 mt-5">
                                    <form ref="fileForm" class="d-none">
                                        <input type="file" ref="fileBtn" accept="image/jpeg, image/png, image/jpg"
                                            class="form-control form-control-lg" @change="loadImgarr">
                                    </form>
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
import { ref, onMounted, reactive } from 'vue';
import useFunction from '@/stores/functions/useFunction';
import { blogNew } from '@/stores/functions/axiosInstance';
import { fileUploader } from '@/stores/functions/fileUploader'

let { fileUploadFn, newFile, fileURL } = fileUploader();

onMounted(() => {
    window.scrollTo(0, 0);
})

const fxn = useFunction.fx
const ImgArr: any = ref([])
const fileBtn = ref<any>(null)
const fileForm = ref<any>(null)
const isSaving = ref<boolean>(false)

const newPost = reactive({
    title: '',
    text: ''
})

function loadImgarr(event: any) {
    fileUploadFn(event)

    setTimeout(() => {
        ImgArr.value.push({
            img: newFile.value,
            url: fileURL.value
        })
    }, 500);
}

function fileFormReset() {
    newFile.value = ''
    fileURL.value = ''
    fileForm.value.reset()
}

function removeImage(url: any) {
    ImgArr.value = ImgArr.value.filter((x: { url: any; }) => x.url !== url)
    fileFormReset()
}


function save() {
    if (!newPost.text || !newPost.text) {
        fxn.Toast('fill important fields', 'warning')
        return
    }

    let postObj = new FormData;
    postObj.append('title', newPost.title)
    postObj.append('text', newPost.text)
    if (ImgArr.value.length) {
        postObj.append('images', JSON.stringify(ImgArr.value.map((x: any) => x.url)))
    }
    addPost(postObj)
}


function addPost(obj: FormData) {
    fxn.Confirm(``, 'Add post?', 'question')
        .then(async (result) => {
            if (result.isConfirmed) {
                isSaving.value = true
                let resp = await blogNew(obj)
                if (resp.status == 203) {
                    fxn.Toast('Use another Title', 'warning');
                    isSaving.value = false
                    window.scrollTo(0, 0);
                    return
                }
                fileFormReset()
                newPost.title = ''
                newPost.text = ''
                ImgArr.value = []
                isSaving.value = false
                fxn.Toast('saved', 'success');
                window.scrollTo(0, 0);
            }
        })
}

</script>

<style scoped>
.over_all {
    min-height: 80vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding-bottom: 4rem;
    padding-top: 2rem;
}

.main {
    /* min-height: 300px; */
    min-height: 600px;
    padding-bottom: 4rem;
    border-color: var(--bs-black);
}

.images-span {
    background-color: #f8f8f8;
    min-height: 150px;
}

#add_btn {
    /* background-color: #f1eeee; */
    height: 150px;
    font-size: 5rem;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    border-radius: 10px;
}

#add_btn .bi {
    color: #969494 !important;
}

#add_btn .bi:hover {
    color: #706f6f !important;
}


.imagePreviewWrapper {
    background-repeat: no-repeat;
    /* min-width: 150px; */
    height: 150px;
    display: block;
    cursor: pointer;
    /* margin: 0 auto 30px; */
    background-size: cover;
    background-position: center center;
    border-radius: 10px;
    /* background-color: #eee; */
}
</style>