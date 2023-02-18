import { createApp } from 'vue'
import { createPinia } from 'pinia'

import App from './App.vue'
import router from './router'

import 'bootstrap-icons/font/bootstrap-icons.css'
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap.min.js'

import './assets/css/main.css'

import 'vue3-carousel/dist/carousel.css';

const app = createApp(App)

import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

import Datepicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css';
app.component('Datepicker', Datepicker);

import HeaderComponent from '@/components/HeaderComponent.vue'
app.component('HeaderComponent', HeaderComponent);


app.provide('hostURL', 'http://127.0.0.1:8000') //dev
// app.provide('hostURL', '') //build


app.use(VueSweetalert2);
app.use(createPinia())
app.use(router)

app.mount('#app')
