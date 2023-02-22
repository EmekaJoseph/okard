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
    deleteCategory
}