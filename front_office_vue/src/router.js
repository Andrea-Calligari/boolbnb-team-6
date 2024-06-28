import { createWebHistory, createRouter } from 'vue-router'

import HomeView from './pages/HomeView.vue'
import LoginView from './pages/LoginView.vue'
import ApartmentsView from './pages/ApartmentsView.vue'
import ApartmentView from './pages/ApartmentView.vue'

export default createRouter({
  history: createWebHistory(),
  routes: [
    { path: '/', component: HomeView },
    { path: '/login', component: LoginView },
    { path: '/apartments', name:'apartments', component: ApartmentsView },
    { path: '/apartment/:slug', name:'apartment', component: ApartmentView, props:true },
  ],
})