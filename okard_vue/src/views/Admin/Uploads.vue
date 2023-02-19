<template>
    <div class="dashboard">
        <div class="container">
            <h6 class="mb-2">
                Upload Images
                <!-- <span class="float-end btn btn-sm btn-secondary m-0 p-0 px-2">view list</span> -->
            </h6>

            <div class="card main">
                <div class="card-body pt-5 p-lg-5">
                    <div class="row gy-3">
                        <div class="col-md-6 px-lg-4">
                            <div class="row gy-4">
                                <div class="col-md-12">
                                    <div class="mb-1">Select Type:</div>
                                    <select v-model="typeSelect" class="form-control form-select">
                                        <option value="Property">Properties</option>
                                        <option value="Material">Building Materials</option>
                                    </select>
                                </div>

                                <div v-if="typeSelect" class="col-md-12">
                                    <div class="mb-1">Category under <span class="fw-bold">{{ typeSelect }}</span>
                                        <span class="float-end btn btn-secondary m-0 p-0 px-2 btn-sm"
                                            data-bs-toggle="modal" data-bs-target="#addCategoryModal"><i
                                                class="bi bi-plus"></i></span>
                                    </div>
                                    <select v-model="categorySelect" class="form-control  form-select">
                                        <option v-for="option in cateDropDown" :value="option.name">
                                            {{ option.name }}
                                        </option>
                                    </select>

                                </div>
                                <form ref="fileForm" class="d-none">
                                    <input type="file" ref="fileBtn"
                                        accept="image/jpeg, image/png, image/jpg, .doc,.docx,application/msword, .pdf, .txt, .xlsx, .xls"
                                        class="form-control form-control-lg" @change="fileUploadFn">
                                </form>
                                <div v-if="categorySelect" class="col-lg-12">
                                    <div class="mb-1">Upload Image:</div>
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
                                <div class="col-lg-12">
                                    <div v-show="fileURL" class="imagePreviewWrapper"
                                        :style="{ 'background-image': `url(${fileURL})` }">
                                    </div>
                                </div>

                                <div v-if="fileURL" class="col-md-6" :class="{ 'col-md-12': typeSelect != 'Property' }">
                                    <div>Image Name:</div>
                                    <input v-model="newImage.name" type="text" class="form-control form-control-lg">
                                </div>
                                <div v-if="typeSelect == 'Property' && fileURL" class="col-md-6">
                                    <div>Location:</div>
                                    <input v-model="newImage.location" type="text" class="form-control form-control-lg">
                                </div>

                                <div v-if="fileURL" class="col-lg-12">
                                    <div>Description:</div>
                                    <textarea v-model="newImage.description" class="form-control" rows="5"></textarea>
                                </div>

                                <div v-if="fileURL" class="col-lg-12">
                                    <button v-if="!isSaving" @click="saveImage" class="btn theme-btn w-100 btn-lg">Save
                                        Image</button>
                                    <button v-else class="btn btn-secondary w-100 btn-lg" disabled>Saving..</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 bg-light p-3">
                            <UploadList />
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <addCategoryModal :type="typeSelect" @added="updateCate" />
    </div>
</template>

<script setup lang="ts">
import { ref, computed, onMounted, reactive } from 'vue';
import addCategoryModal from '@/components/modals/addCategoryModal.vue'
import { fileUploader } from '@/stores/functions/fileUploader'
import useFunction from '@/stores/functions/useFunction';
import { getCategories, saveImageSlide } from '@/stores/functions/axiosInstance';
import { useImageSlides } from '@/stores/imageSlides';
import UploadList from './UploadList.vue';


onMounted(() => {
    window.scrollTo(0, 0);
    updateCate()
})

const images = useImageSlides()

let { fileUploadFn, fileURL, newFile, fileSize } = fileUploader();

const typeSelect = ref<string>('')
const categorySelect = ref<string>('')
const categories = ref<any>([])
const fileBtn = ref<any>(null);
const fileForm = ref<any>(null);
const isSaving = ref<boolean>(false)
const fxn = useFunction.fx

const newImage = reactive({
    name: '',
    description: '',
    location: '',
})


const cateDropDown = computed(() => {
    return categories.value.filter((item: any) => item.type == typeSelect.value)
})

function fileFormR() {
    fileURL.value = ''
    newFile.value = ''
    fileForm.value.reset()
}

async function updateCate() {
    let { data } = await getCategories();
    categories.value = data
}

function saveImage() {
    if (!newImage.name || !newImage.description) {
        fxn.Toast('Name & Description is important', 'warning')
        return;
    }
    isSaving.value = true
    let imgObj = new FormData()
    imgObj.append('name', newImage.name)
    imgObj.append('description', newImage.description)
    if (newImage.location) { imgObj.append('location', newImage.location) }
    imgObj.append('type', typeSelect.value)
    imgObj.append('category', categorySelect.value)
    imgObj.append('img', newFile.value)
    sendImage(imgObj);
}

async function sendImage(obj: any) {
    try {
        let resp = await saveImageSlide(obj)
        if (resp.status == 200) {
            fxn.Toast('saved', 'success')
            newImage.name = ''
            newImage.location = ''
            newImage.description = ''
            fileFormR();
            isSaving.value = false
            images.getImages()
        }
    } catch (error) {
        isSaving.value = false
    }
}

</script>

<style scoped>
.dashboard {
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

.form-select {
    line-height: 2rem;
    background-color: #fcfcfc !important;
}

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

.imagePreviewWrapper {
    background-repeat: no-repeat;
    min-width: 200px;
    min-height: 200px;
    display: block;
    cursor: pointer;
    margin: 0 auto 30px;
    background-size: contain;
    background-position: center center;
    /* border-radius: 50%; */
    /* background-color: #eee; */
}
</style>

