import { reactive } from 'vue'

const fx = reactive({

    isEmail: (email: string) => {
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email)
    },

    testPassword: (password: any) => {
        var regex = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$/;
        return regex.test(password)
    },

    isExtension: (fileName: string, requiredFormats: string[]) => {
        let regex = new RegExp('[^.]+$');
        let ext: any = fileName.match(regex);
        // get the extension
        let fileExtension = ext[0].toLowerCase()
        //make sure the file is a valid  format
        if (!(requiredFormats.some(x => x == fileExtension.toLowerCase()))) return false
        else return true
    },

    truncateStr(str: string, num: number) {
        if (str.length > num) {
            return str.slice(0, num) + "...";
        } else {
            return str;
        }
    }
})

export default {
    fx
}