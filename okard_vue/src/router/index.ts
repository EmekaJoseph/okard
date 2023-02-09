import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/Home.vue'
import BuyPropertyView from '../views/Buy_Property.vue'
import BuyBuildingMaterialView from '../views/Buy_Building_Materials.vue'
import RequestForBillView from '../views/Request_for_Bill.vue'
import RequestForPlanView from '../views/Request_for_Building_Plan.vue'
import BlogView from '../views/Blog.vue'


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    { path: '/', name: 'Home', component: HomeView },
    { path: '/buy_property', name: 'Buy Property', component: BuyPropertyView },
    { path: '/buy_building_materials', name: 'Buy Building Materials', component: BuyBuildingMaterialView },
    { path: '/request_for_building_plan', name: 'Request for Building Plan', component: RequestForPlanView },
    { path: '/request_for_bill_of_quantity', name: 'Request for Bill of Quantity', component: RequestForBillView },
    { path: '/blog', name: 'Blog', component: BlogView },


    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/AboutView.vue')
    }
  ]
})

router.afterEach((to, from) => {
  document.title = 'OKARD-HGV | ' + to.name?.toString();
})


export default router
