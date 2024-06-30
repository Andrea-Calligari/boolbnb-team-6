import { createWebHistory, createRouter } from 'vue-router'

import HomeView from './pages/HomeView.vue'
import LoginView from './pages/LoginView.vue'
import ApartmentsView from './pages/ApartmentsView.vue'
import ApartmentView from './pages/ApartmentView.vue'
import ApartmentsCreate from './pages/ApartmentsCreate.vue'
import ApatmentEdit from './pages/ApatmentEdit.vue'
import RegisterView from './pages/RegisterView.vue'
import DashboardView from './pages/DashboardView.vue'

export default createRouter({
  history: createWebHistory(),
  routes: [
    { path: '/', name:'home',component: HomeView },
    { path: '/login', name:'login',component: LoginView },
    { path: '/register', name:'register',component: RegisterView },
    { path: '/dashboard', name:'dashboard', component: DashboardView },
    { path: '/apartments', name:'apartments', component: ApartmentsView },
    { path: '/apartment/:slug', name:'apartment', component: ApartmentView, props:true },
    { path: '/apartments/create', name:'create', component: ApartmentsCreate },
    { path: '/apartment/:slug/edit', name:'edit', component: ApatmentEdit, props:true}
  ],
})