import { ref, watch, reactive, computed } from 'vue'

export function fileUploader() {
    const mainFile = ref<any>('')
    const fileURL = ref<any>('')

    const fileSize: any = reactive({
        kb: computed(() => {
            return (mainFile.value.size / 1024).toFixed(2)
        }),
        mb: computed(() => {
            return (fileSize.kb / 1024).toFixed(2)
        })
    })

    function fileUploadFn(event: any) {
        if (event.target.files.length === 0) {
            mainFile.value = ''
            fileURL.value = ''
            return
        }
        mainFile.value = event.target.files[0]
    }

    watch(mainFile, (mainFile) => {
        if (!(mainFile instanceof File)) {
            return;
        }
        let fileReader = new FileReader
        fileReader.readAsDataURL(mainFile)
        fileReader.addEventListener('load', () => {
            fileURL.value = fileReader.result
        })
    })

    return { fileUploadFn, fileURL, mainFile, fileSize }
}