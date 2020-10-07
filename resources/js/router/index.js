import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    redirect: '/search',
  },
  {
    path: '/search',
    name: 'SearchForm',
    component: () => import('../views/search-form/SearchForm'),
  },
  {
    path: '/about',
    name: 'About',
    component: () => import('../views/pages/About.vue'),
  },
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes,
})

export default router
