import axios from 'axios'


// create instances
const $axiosInstance = axios.create({
    // baseURL: '/api/', //build
    baseURL: 'http://localhost/api/', //local
    headers: {
        Accept: 'application/json',
        'Content-Type': 'application/json;charset=UTF-8;text/json;multipart/form-data',
        withCredentials: true,
    },
})

// create interceptor for renewing token
$axiosInstance.interceptors.request.use(
    (config: any) => {
        const token = localStorage.getItem('agudatechy_t');
        if (token) config.headers.Authorization = `Bearer ${atob(token)}`;
        return config;
    }
);

axios.defaults.headers.common['X-CSRF-TOKEN'] = <any>localStorage.getItem('agudatechy_t');



function getCourses() {
    return $axiosInstance.get('courses')
}



export {

}