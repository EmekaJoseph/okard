import axios from 'axios'




const base = 'http://127.0.0.1:8000/api/' //dev
// const base = '/api/' //build

const $ax = axios.create({
    baseURL: base,
    headers: {
        Accept: 'application/json',
        'Content-Type': 'application/json;charset=UTF-8;text/json',
        withCredentials: true,
    },
})

const $axForm = axios.create({
    baseURL: base,
    headers: {
        Accept: 'application/json',
        "Content-Type": "multipart/form-data",
        withCredentials: true,
    },
})

// create interceptor for renewing token
// $ax.interceptors.request.use(
//     (config: any) => {
//         const token = localStorage.getItem('agudatechy_t');
//         if (token) config.headers.Authorization = `Bearer ${atob(token)}`;
//         return config;
//     }
// );

// axios.defaults.headers.common['X-CSRF-TOKEN'] = <any>localStorage.getItem('agudatechy_t');



function sendRequest(data: any) {
    return $axForm.post(`sendRequest`, data)
}
function getRequests() {
    return $ax.get(`getRequests`)
}
function requestDetails(id: any) {
    return $ax.get(`requestDetails/${id}`)
}
function deleteRequest(id: any) {
    return $ax.delete(`deleteRequest/${id}`)
}


function saveImageSlide(data: FormData) {
    return $axForm.post(`saveImageSlide`, data)
}
function getImageSlides() {
    return $ax.get(`getImageSlides`)
}
function deleteImageSlide(id: any) {
    return $ax.delete(`deleteImageSlide/${id}`)
}


function newCategory(data: object) {
    return $ax.post(`newCategory`, JSON.stringify(data))
}
function getCategories() {
    return $ax.get(`getCategories`)
}


function isVisitor(data: any) {
    return $ax.post(`newCategory`, JSON.stringify(data))
}

export {
    sendRequest,
    getRequests,
    requestDetails,
    deleteRequest,
    saveImageSlide,
    getImageSlides,
    deleteImageSlide,
    newCategory,
    getCategories,
    isVisitor
}