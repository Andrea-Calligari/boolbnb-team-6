import { createWebHistory, createRouter } from 'vue-router'

import HomeView from './pages/HomeView.vue'
import LoginView from './pages/auth/LoginView.vue'
import ApartmentsIndex from './pages/apartment/ApartmentsIndex.vue'
import ApartmentsShow from './pages/apartment/ApartmentsShow.vue'
import ApartmentsCreate from './pages/apartment/ApartmentsCreate.vue'
import ApatmentsEdit from './pages/apartment/ApatmentsEdit.vue'
import RegisterView from './pages/auth/RegisterView.vue'
import DashboardHome from './pages/dashboard/DashboardHome.vue'
import ProfileUpdate from './pages/dashboard/ProfileUpdate.vue'
import ReceivedMessages from './pages/dashboard/ReceivedMessages.vue'
import UserApartments from './pages/dashboard/UserApartments.vue'
import CategoriesIndex from './pages/category/CategoriesIndex.vue'
import CategoriesCreate from './pages/category/CategoriesCreate.vue'
import CategoriesEdit from './pages/category/CategoriesEdit.vue'
import ApartmentsSearch from './pages/apartment/ApartmentsSearch.vue'


export default createRouter({
  history: createWebHistory(),
  routes: [
    // ####################################
    // rotte per tutti 
    { path: '/', name: 'home', component: HomeView },
    // ---- auth
    { path: '/login', name: 'login', component: LoginView },
    // ---- apartments
    { path: '/apartment', name: 'apartments.index', component: ApartmentsIndex },
    { path: '/apartment/search', name: 'apartments.search', component: ApartmentsSearch },
    { path: '/apartment/:slug', name: 'apartments.show', component: ApartmentsShow, props: true },

    // ####################################
    // rotte per utenti non loggati 
    // ---- auth
    { path: '/register', name: 'register', component: RegisterView },

    // ####################################
    // rotte per utenti loggati
    // ---- apartments
    { path: '/apartments/create', name: 'apartments.create', component: ApartmentsCreate },
    { path: '/apartments/:slug/edit', name: 'apartments.edit', component: ApatmentsEdit, props: true },
    // ---- categories
    { path: '/categories', name: 'categories.index', component: CategoriesIndex },
    { path: '/categories/create', name: 'categories.create', component: CategoriesCreate },
    { path: '/categories/:id/edit', name: 'categories.edit', component: CategoriesEdit, props: true },
    // ---- dashboard
    { path: '/dashboard', name: 'dashboard', component: DashboardHome },
    { path: '/dashboard/userapartments', name: 'dashboard.userapartments', component: UserApartments },
    { path: '/dashboard/profileupdate', name: 'dashboard.profileupdate', component: ProfileUpdate },
    { path: '/dashboard/receivedmessages', name: 'dashboard.receivedmessages', component: ReceivedMessages },
  ],
})