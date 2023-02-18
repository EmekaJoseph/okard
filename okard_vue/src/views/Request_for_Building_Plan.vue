<template>
  <div style="padding-bottom: 10rem;">
    <HeaderComponent />
    <div class="container">
      <section class="action-section">
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="text-center mb-5">
              <h4 class="text-capitalize topix">Request for Building Plan</h4>
              <div class="title-border"></div>
              <p class="text-muted mt-3 mx-md-5">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur dolores cupiditate inventore esse quas
                voluptas deleniti quidem! Vero ipsum culpa, saepe consectetur quas totam fuga commodi hic ducimus odio
                corporis.
              </p>
            </div>
          </div>
          <div class="col-lg-6 ">
            <Carousel :autoplay="3000" :wrap-around="true">
              <Slide v-for="slide in images.plan" :key="slide">
                <img class="carousel__item" :src="`${hostURL}/slides/${slide}`" alt="">
              </Slide>

              <template #addons>
                <Pagination />
                <Navigation class="no-mobile" />
              </template>
            </Carousel>
          </div>
          <div class="col-lg-6">

            <form class="form mt-4 mt-lg-0">
              <div class="row gy-4">
                <div class="col-md-12">
                  <input v-model="form.name" type="text" class="form-control form-control-lg" placeholder="Your Name">
                </div>

                <div class="col-lg-12">
                  <input v-model="form.contact" type="email" class="form-control form-control-lg"
                    placeholder="Email or Phone">
                </div>

                <div class="col-lg-12">
                  <textarea v-model="form.message" class="form-control " placeholder="Leave a message here"
                    style="height: 100px;"></textarea>
                </div>


                <form ref="fileForm" class="d-none">
                  <input type="file" ref="fileBtn"
                    accept="image/jpeg, image/png, image/jpg, .doc,.docx,application/msword, .pdf, .txt, .xlsx, .xls"
                    class="form-control form-control-lg" @change="fileUploadFn">
                </form>


                <div class="col-lg-12">
                  <label class="fs-5">Add a picture, PDF or Word Document ?</label>
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
                  <input ref="recordBtn" type="file" accept="audio/*" capture hidden />
                  <div @click="recordBtn.click()" class="fileBtnFake"><i class="bi bi-mic"></i> Record
                  </div>
                </div>

              </div>
              <!--end row-->
              <button @click="submitForm" type="button" class="btn float-end theme-btn mt-5">Send
                Message</button>
            </form>
          </div>
        </div>
      </section>
    </div>

  </div>
</template>


<script setup lang="ts">
import { onMounted, ref, reactive, inject } from 'vue';
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel';
import { useImageSlides } from '@/stores/imageSlides'
import { fileUploader } from '@/stores/functions/fileUploader'
import useFunction from '@/stores/functions/useFunction';

const hostURL = inject('hostURL')

onMounted(() => window.scrollTo(0, 0))

const fxn = useFunction.fx

let { fileUploadFn, fileURL, newFile, fileSize } = fileUploader();

const images = useImageSlides()

const fileBtn = ref<any>(null);
const recordBtn = ref<any>(null);
const fileForm = ref<any>(null);

function fileFormR() {
  fileURL.value = ''
  newFile.value = ''
  fileForm.value.reset()
}


const form = reactive({
  name: '',
  // phone: '',
  contact: '',
  message: '',
  file: ''
})

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
  $form.append('message', form.message);
  $form.append('file', newFile.value);
  sendbillRequest($form)
}


function sendbillRequest($form: FormData) {

}

</script>

<style scoped>
@media (min-width: 994px) {
  .topix {
    font-size: 2.4rem;
  }
}

.carousel__item {
  min-height: 200px;
  width: 100%;
  background-color: var(--vc-clr-primary);
  color: var(--vc-clr-white);
  font-size: 20px;
  border-radius: 8px;
  display: flex;
  justify-content: center;
  align-items: center;
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
</style>

