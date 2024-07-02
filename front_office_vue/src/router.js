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


export default createRouter({
  history: createWebHistory(),
  routes: [
    // ####################################
    // rotte per tutti 
    { path: '/', name: 'home', component: HomeView },
    // ---- auth
    { path: '/login', name: 'login', component: LoginView },
    // ---- apartments
    { path: '/apartments', name: 'apartments.index', component: ApartmentsIndex },
    { path: '/apartment/:slug', name: 'apartments.show', component: ApartmentsShow, props: true },

    // ####################################
    // rotte per utenti non loggati 
    // ---- auth
    { path: '/register', name: 'register', component: RegisterView },

    // ####################################
    // rotte per utenti loggati
    // ---- apartments
    { path: '/apartments/create', name: 'apartments.create', component: ApartmentsCreate },
    { path: '/apartment/:slug/edit', name: 'apartments.edit', component: ApatmentsEdit, props: true },
    // ---- dashboard
    { path: '/dashboard', name: 'dashboard', component: DashboardHome },
    { path: '/dashboard/userapartments', name: 'dashboard.userapartments', component: UserApartments },
    { path: '/dashboard/profileupdate', name: 'dashboard.profileupdate', component: ProfileUpdate },
    { path: '/dashboard/receivedmessages', name: 'dashboard.receivedmessages', component: ReceivedMessages },
  ],
})