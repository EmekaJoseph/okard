<template>
    <div class="card border-0 bg-transparent">
        <div class="card-header text-muted border-0 rounded-0">UPLOAD LIST :
            <button v-show="checkedImages.length" @click="deleteImages"
                class="btn btn-sm btn-danger p-0 m-0 px-2 float-end">
                <i class="bi bi-trash3-fill"></i> Delete
            </button>
        </div>
        <div class="card-body list-scroll">
            <div class="card-title mt-3 mb-4">
                <span class="tabb" :class="{ 'active-tabb': nowShowing == 'Property' }"
                    @click="nowShowing = 'Property'">Properties
                </span>
                <span class="tabb" :class="{ 'active-tabb': nowShowing == 'Material' }"
                    @click="nowShowing = 'Material'">Building Materials
                </span>
            </div>

            <div v-if="images.loading" class="p-4">
                <PageLoading />
            </div>


            <div v-else class="row gy-4 ">
                <div @click="show.isChecked = !show.isChecked" v-for="(show, i) in gallery" :key="i"
                    class="col-6 col-md-4">
                    <div class="image-holder fill">
                        <img class="img-fluid" :src="`${hostURL}/slides/${show.img}`" alt="">
                        <div class="details-overlay">
                            <div class="text-white small mt-4 text-capitalize show-name">{{ show.name }}</div>
                            <div class="check-bi">
                                <i v-if="show.isChecked" class="text-white h5 bi bi-check-square-fill"></i>
                                <i v-else class="text-white h5 bi bi-square"></i>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { computed, onMounted, ref, watchEffect } from 'vue';
import useFunction from '@/stores/functions/useFunction';
import { deleteImageSlide, hostURL } from '@/stores/functions/axiosInstance';
import { useImageSlides } from '@/stores/imageSlides';

onMounted(() => {
    images.getImages()
})

const images = useImageSlides()
const fxn = useFunction.fx

const nowShowing = ref<string>('Property')

const gallery = computed(() => {
    return nowShowing.value == 'Material' ? images.materials : images.properties
})
const checkedImages = ref<any>([])

watchEffect(() => {
    checkedImages.value = gallery.value.filter(x => x.isChecked == true)
})



function deleteImages() {
    fxn.Confirm(`Delete ${checkedImages.value.length} image(s)`, 'Continue', 'question')
        .then(async (result) => {
            if (result.isConfirmed) {
                let ids: any[] = checkedImages.value.map((x: any) => x.id)
                let str = ids.toString()
                try {
                    let resp = await deleteImageSlide(str)
                    if (resp.status == 200) {
                        images.getImages()
                        fxn.Toast('Deleted', 'success')
                    }
                } catch (error) {

                }
            }
        })
}

</script>

<style scoped>
.image-holder {
    cursor: pointer;
    transition: all 0.5s ease;
    height: 100px;
    width: auto;
}

.image-holder:hover {
    transform: scale(0.97);
}

.fill {
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden
}

.fill img {
    flex-shrink: 0;
    min-width: 100%;
    min-height: 100%
}

.details-overlay {
    position: absolute;
    height: 100%;
    width: 100%;
    bottom: 0;
    /* left: 0; */
    background-color: rgba(15, 1, 1, 0.555);
    /* border: 1px solid #eee; */
    padding: 10px;
    /* border-radius: 20px; */
    /* display: none; */
    /* font-size: 12px; */
}

.check-bi {
    position: absolute;
    top: 0;
    right: 0;
    margin-right: 5px;
    margin-top: 5px;
}

.show-name {
    position: absolute;
    bottom: 0;
    left: 0;
    margin-left: 5px;
    margin-bottom: 5px;
}


@media (max-width: 994px) {
    .details-overlay {
        font-size: 12px;
        /* height: 50%; */
    }
}


.tabb {
    cursor: pointer;
    margin-inline: 10px;
    padding: 3px 5px;
    /* border-radius: 4px; */
    font-size: 14px;
}

.active-tabb {
    background-color: var(--theme-color-bg);
    border-bottom: 1px solid var(--theme-color);
}
</style>