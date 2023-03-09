<template>
    <div class="over_all">
        <div class="container">
            <h6 class="mb-3">
                <i class="bi bi-bag"></i> Portfolios:
            </h6>
            <div class="card bg-transparent border-0 main">
                <div class="card-body pt-5">
                    <div class="row g-3">
                        <div class="col-md-7">
                            <div class="card border-0 h-100">
                                <div class="card-header border-0">LIST:</div>
                                <div class="card-body">
                                    <div v-if="!portfolios.length" class="text-center my-5 fs-4 text-muted">Empty List</div>
                                    <div v-else class="table-responsive table-sm text-nowrap ">
                                        <table class="table">
                                            <tbody>
                                                <tr v-for="(line, index) in portfolios" :key="index">
                                                    <th>{{ (index + 1) }}.</th>
                                                    <td>{{ line.title }}</td>
                                                    <!-- <td >{{ line.subject }}</td> -->
                                                    <th class="text-muted xsmall">{{
                                                        (new Date(line.created_at)).toLocaleDateString() }}
                                                    </th>
                                                    <!-- <td @click="editModalOpen(line.id)">
                                                        <button class="btn btn-sm p-0 m-0 text-dark">
                                                            <i class="bi bi-pencil-fill"></i>
                                                        </button>
                                                    </td> -->

                                                    <td @click="deletePortfolio(line.id)">
                                                        <button class="btn btn-sm p-0 m-0 text-danger">
                                                            <i class="bi bi-trash3"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-5">
                            <div class="card border-0 h-100">
                                <div class="card-header border-0">NEW PORTFOLIO </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label>Title:</label>
                                            <input v-model="field.title" type="text" class="form-control">
                                        </div>

                                        <div class="col-12">
                                            <label>Information:</label>
                                            <textarea v-model="field.text" class="form-control" rows="4"></textarea>
                                        </div>

                                        <div class="col-12">
                                            <label>Category: <span class="text-muted"> (optional)</span></label>
                                            <input v-model="field.category" type="text" class="form-control">
                                        </div>

                                        <!-- hidden form -->
                                        <form ref="fileForm" class="d-none">
                                            <input type="file" ref="fileBtn" accept="image/jpeg, image/png, image/jpg"
                                                class="form-control form-control-lg" @change="fileUploadFn">
                                        </form>
                                        <!-- hidden form -->

                                        <div class="col-12">
                                            <div class="row g-4">
                                                <div class="col-12 col-sm-6">
                                                    <label class="mb-1">Image: <span class="text-muted"> (optional)</span>
                                                    </label> <br>
                                                    <button @click="fileBtn.click()" v-if="!newFile"
                                                        class="btn btn-secondary bg-white text-dark w-100"> Upload
                                                    </button>
                                                    <button v-else @click="fileFormR" class="btn btn-dark w-100"> Remove
                                                    </button>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div v-show="fileURL" class="imagePreviewWrapper"
                                                        :style="{ 'background-image': `url(${fileURL})` }">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 mt-5">
                                            <button v-if="!isSaving" @click="savePortfolio"
                                                class="btn theme-btn w-100">Save</button>
                                            <button disabled v-else class="btn theme-btn w-100">Saving..</button>
                                        </div>

                                    </div>
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
import { portfolioDelete, portfolioList, portfolioNew } from '@/stores/functions/axiosInstance';
import { fileUploader } from '@/stores/functions/fileUploader'


// ###################### UPLOADING START ####################### //
let { fileUploadFn, newFile, fileURL } = fileUploader();

const fxn = useFunction.fx
const fileBtn = ref<any>(null);
const fileForm = ref<any>(null);
const isSaving = ref<boolean>(false)

function fileFormR() {
    fileURL.value = ''
    newFile.value = ''
    fileForm.value.reset()
}

const field = reactive({
    title: '',
    text: '',
    category: '',
})


function savePortfolio() {
    if (!field.title || !field.text) {
        fxn.Toast('Title & Text is compulsory', 'warning')
        return;
    }

    isSaving.value = true
    let imgObj = new FormData()
    imgObj.append('title', field.title)
    imgObj.append('text', field.text)
    if (field.category) { imgObj.append('category', field.category) }
    imgObj.append('image', newFile.value)
    sendImage(imgObj);
}

async function sendImage(obj: any) {
    try {
        let resp = await portfolioNew(obj)
        if (resp.status == 200) {
            fxn.Toast('saved', 'success')
            field.title = ''
            field.category = ''
            field.text = ''
            getPortfolios()
            fileFormR();
            isSaving.value = false

        }
    } catch (error) {
        isSaving.value = false
    }
}





// ###################### UPLOADING END ####################### //


onMounted(() => {
    window.scrollTo(0, 0);
    getPortfolios()
})

const portfolios = ref<any>([])

async function getPortfolios() {
    let resp = await portfolioList()
    portfolios.value = resp.data
}

function deletePortfolio(id: any) {
    fxn.Confirm(``, 'Confirm delete', 'warning')
        .then(async (result) => {
            if (result.isConfirmed) {
                await portfolioDelete(id)
                fxn.Toast('deleted', 'success')
                getPortfolios()
            }
        })
}

function editModalOpen(id: any) {

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
}


.imagePreviewWrapper {
    background-repeat: no-repeat;
    width: auto;
    min-height: 100px;
    /* display: block; */
    /* cursor: pointer; */
    /* margin: 0 auto 30px; */
    /* margin-top: 0px; */
    background-size: contain;
    /* background-position: center center; */
    /* border-radius: 50%; */
    /* background-color: #eee; */
}
</style>