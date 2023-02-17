import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/Home.vue'
import BuyPropertyView from '../views/Buy_Property.vue'
import BuyBuildingMaterialView from '../views/Buy_Building_Materials.vue'
import RequestForBillView from '../views/Request_for_Bill.vue'
import RequestForPlanView from '../views/Request_for_Building_Plan.vue'
import BlogLayout from '../views/Blog/_layout.vue'

import AdminLoginView from '../views/Admin/Login.vue'
import AdminLayout from '../views/Admin/_layout.vue'
import AdminDashboard from '../views/Admin/Dashboard.vue'
import AdminRequests from '../views/Admin/Requests.vue'
import BlogPosting from '../views/Admin/BlogPosting.vue'
import AdminUploads from '../views/Admin/Uploads.vue'
import AdminAccount from '../views/Admin/Account.vue'


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  linkActiveClass: 'active',
  routes: [
    { path: '/', name: 'Home', component: HomeView },
    { path: '/buy_property', name: 'Buy Property', component: BuyPropertyView },
    { path: '/buy_building_materials', name: 'Buy Building Materials', component: BuyBuildingMaterialView },
    { path: '/request_for_building_plan', name: 'Request for Building Plan', component: RequestForPlanView },
    { path: '/request_for_bill_of_quantity', name: 'Request for Bill of Quantity', component: RequestForBillView },

    {
      path: '/blog',
      component: BlogLayout,
      children: [
        { path: '', alias: 'home', name: 'Blog', component: () => import('../views/Blog/list.vue') },
        { path: 'details', name: 'Blog_Details', component: () => import('../views/Blog/details.vue'), props: route => ({ query: route.query }) }
      ],
    },

    { path: '/admin', alias: '/admin-login', name: 'Admin', component: AdminLoginView },
    {
      path: '/admin/account',
      component: AdminLayout,
      children: [
        { path: 'dashboard', alias: '', name: 'Dashboard', component: AdminDashboard },
        { path: 'blogpost', name: 'Blog-Post', component: BlogPosting },
        { path: 'requests', name: 'Requests', component: AdminRequests },
        { path: 'uploads', name: 'Uploads', component: AdminUploads },
        { path: 'account', name: 'Account', component: AdminAccount },
      ],
    },


    {
      path: '/:pathMatch(.*)*',
      name: '404',
      component: () => import('../views/404Page.vue')
    },

  ]
})



router.afterEach((to, from) => {
  document.title = 'OKARD-HGV | ' + to.name?.toString();
})


export default router
