<template>
    <div class="dashboard">
        <div class="container">
            <h6 class="mb-2">
                <i class="bi bi-cloud-upload"></i> Images Uploads
            </h6>

            <div class="card bg-transparent border-0 main">
                <div class="card-body pt-3 p-lg-5">
                    <div class="row g-3 gy-5">
                        <div class="col-md-6 bg-white p-3">
                            <div class="card border-0 bg-transparent">
                                <div class="card-header text-muted border-0 rounded-0">UPLOAD IMAGE :
                                </div>
                                <div class="card-body">
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
                                                <span class="float-end btn btn-dark m-0 p-0 px-2 btn-sm"
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
                                            <input type="file" ref="fileBtn" accept="image/jpeg, image/png, image/jpg"
                                                @change="fileUploadFn">
                                        </form>
                                        <div v-if="categorySelect" class="col-lg-12">
                                            <div class="mb-1">Upload Image:</div>
                                            <div @click="fileBtn.click()" v-if="!newFile" class="fileBtnFake">
                                                <i class="bi bi-file-earmark-text"></i> Click Here to upload
                                            </div>
                                            <div v-else class="fileBtnFake theme-bg">
                                                <span>
                                                    <span class="theme-tex">
                                                        <!-- {{ newFile.name }} -->
                                                        image added..
                                                    </span>
                                                    <span @click="fileFormR" class="fw-bold float-end ">
                                                        <i class="bi bi-x-circle-fill"></i> remove
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div v-show="fileURL" class="imagePreviewWrapper"
                                                :style="{ 'background-image': `url(${fileURL})` }">
                                            </div>
                                        </div>

                                        <div v-if="fileURL" class="col-md-6"
                                            :class="{ 'col-md-12': typeSelect != 'Property' }">
                                            <div>Image Name:</div>
                                            <input v-model="newImage.name" type="text" class="form-control form-control-lg">
                                        </div>
                                        <div v-if="typeSelect == 'Property' && fileURL" class="col-md-6">
                                            <div>Location:</div>
                                            <input v-model="newImage.location" type="text"
                                                class="form-control form-control-lg">
                                        </div>

                                        <div v-if="fileURL" class="col-lg-6">
                                            <div>Price:</div>
                                            <input v-model="newImage.price" class="form-control" type="number" />
                                        </div>
                                        <div v-if="fileURL" class="col-lg-6">
                                            <div>&nbsp;</div>
                                            <input type="text" class="form-control bg-whit border-0 fw-bold"
                                                :value="'N' + newImage.price.toLocaleString()" disabled>
                                            <!-- {{ newImage.price.toLocaleString() }} -->
                                        </div>

                                        <div v-if="fileURL" class="col-lg-12">
                                            <div>Description:</div>
                                            <textarea v-model="newImage.description" class="form-control"
                                                rows="5"></textarea>
                                        </div>

                                        <div v-if="fileURL" class="col-lg-12">
                                            <button v-if="!isSaving" @click="saveImage"
                                                class="btn theme-btn w-100 btn-lg">Upload
                                            </button>
                                            <button v-else class="btn btn-secondary w-100 btn-lg" disabled>Saving..</button>
                                        </div>
                                    </div>


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
    price: ''
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

    if (!newImage.price) {
        fxn.Toast('Include Price', 'warning')
        return;
    }

    isSaving.value = true
    let imgObj = new FormData()
    imgObj.append('name', newImage.name)
    imgObj.append('description', newImage.description)
    imgObj.append('price', newImage.price)
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