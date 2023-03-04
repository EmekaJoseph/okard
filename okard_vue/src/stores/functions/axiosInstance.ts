import axios from 'axios'


const hostURL = 'http://127.0.0.1:8000' //dev
// const hostURL = '' //build

const apiURL = `${hostURL}/api/`

const $instance = axios.create({
    baseURL: apiURL,
    headers: {
        Accept: 'application/json',
        'Content-Type': 'application/json;charset=UTF-8;text/json',
        withCredentials: true,
    },
})

const $instanceForm = axios.create({
    baseURL: apiURL,
    headers: {
        Accept: 'application/json',
        "Content-Type": "multipart/form-data",
        withCredentials: true,
    },
})


const sendRequest = (data: any) => $instanceForm.post(`sendRequest`, data)
const getRequests = () => $instance.get(`getRequests`)
const requestDetails = (id: any) => $instance.get(`requestDetails/${id}`)
const deleteRequest = (id: any) => $instance.delete(`deleteRequest/${id}`)

const saveImageSlide = (data: FormData) => $instanceForm.post(`saveImageSlide`, data)
const getImageSlides = () => $instance.get(`getImageSlides`)
const deleteImageSlide = (id: any) => $instance.delete(`deleteImageSlide/${id}`)

const newCategory = (data: object) => $instance.post(`newCategory`, JSON.stringify(data))
const getCategories = () => $instance.get(`getCategories`)
const deleteCategory = (id: any) => $instance.delete(`deleteCategory/${id}`)

const isVisitor = () => $instance.post(`isVisitor`)

const blogNew = (data: any) => $instanceForm.post(`blog`, data)
const blogList = () => $instance.get(`blog`)
const blogDetails = (id: any) => $instance.get(`blog/${id}`)
const blogDelete = (id: any) => $instance.delete(`blog/${id}`)

const login = (data: object) => $instance.post(`admin/login`, data)
const passwordChange = (data: object) => $instance.post(`admin/passwordChange`, data)
const getAccount = (id: any) => $instance.post(`admin/getAccount/${id}`,)

const messageNew = (data: any) => $instance.post(`message`, data)
const messageList = () => $instance.get(`message`)
const messageDetails = (id: any) => $instance.get(`message/${id}`)
const messageDelete = (id: any) => $instance.delete(`message/${id}`)





// const testCall = async () => {
//     let data_: any = ''
//     await axios.post("https://api.ciku.co/v1/verifyRegCode",
//         JSON.stringify({ email: 'email@mail.com', code: '345673' }),
//         {
//             headers: {
//                 Accept: 'application/json',
//                 'Content-Type': 'application/json;',
//                 withCredentials: true,
//             },
//         },
//     )
//         .then(function (response) {
//             data_ = response
//             console.log(response);

//         })
//     return data_
// }


export {
    hostURL,
    sendRequest,
    getRequests,
    requestDetails,
    deleteRequest,
    saveImageSlide,
    getImageSlides,
    deleteImageSlide,
    newCategory,
    getCategories,
    isVisitor,
    deleteCategory,
    blogNew,
    blogList,
    blogDetails,
    blogDelete,
    login,
    passwordChange,
    getAccount,
    messageNew,
    messageList,
    messageDetails,
    messageDelete,
    // testCall
}