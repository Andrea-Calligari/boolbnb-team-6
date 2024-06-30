import { createWebHistory, createRouter } from 'vue-router'

import HomeView from './pages/HomeView.vue'
import LoginView from './pages/LoginView.vue'
import ApartmentsView from './pages/ApartmentsView.vue'
import ApartmentView from './pages/ApartmentView.vue'
import ApartmentsCreate from './pages/ApartmentsCreate.vue'
import ApatmentEdit from './pages/ApatmentEdit.vue'
import RegisterView from './pages/RegisterView.vue'

export default createRouter({
  history: createWebHistory(),
  routes: [
    { path: '/', component: HomeView },
    { path: '/login', component: LoginView },
    { path: '/register', component: RegisterView },
    { path: '/apartments', name:'apartments', component: ApartmentsView },
    { path: '/apartment/:slug', name:'apartment', component: ApartmentView, props:true },
    { path: '/apartments/create', name:'create', component: ApartmentsCreate },
    { path: '/apartment/:slug/edit', name:'edit', component: ApatmentEdit, props:true}
  ],
})