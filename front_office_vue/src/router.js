import { createWebHistory, createRouter } from 'vue-router'

import HomeView from './pages/HomeView.vue'
import LoginView from './pages/LoginView.vue'
import ApartmentsIndex from './pages/apartment/ApartmentsIndex.vue'
import ApartmentsShow from './pages/apartment/ApartmentsShow.vue'
import ApartmentsCreate from './pages/apartment/ApartmentsCreate.vue'
import ApatmentsEdit from './pages/apartment/ApatmentsEdit.vue'
import RegisterView from './pages/RegisterView.vue'
import DashboardView from './pages/DashboardView.vue'
import ProfileUpdate from './pages/ProfileUpdate.vue'
import ReceivedMessages from './pages/ReceivedMessages.vue'
import UserApartments from './pages/UserApartments.vue'


export default createRouter({
  history: createWebHistory(),
  routes: [
    // rotte per tutti 
    { path: '/', name: 'home', component: HomeView },
    { path: '/login', name: 'login', component: LoginView },
    { path: '/register', name: 'register', component: RegisterView },
    { path: '/apartments', name: 'apartments.index', component: ApartmentsIndex },
    { path: '/apartment/:slug', name: 'apartments.show', component: ApartmentsShow, props: true },

    // rotte per utenti loggati
    { path: '/apartments/create', name: 'apartments.create', component: ApartmentsCreate },
    { path: '/apartment/:slug/edit', name: 'apartments.edit', component: ApatmentsEdit, props: true },

    // -- dashboard
    { path: '/dashboard', name: 'dashboard', component: DashboardView },
    { path: '/dashboard/userapartments', name: 'userapartments', component: UserApartments },
    { path: '/dashboard/profileupdate', name: 'profileupdate', component: ProfileUpdate },
    { path: '/dashboard/receivedmessages', name: 'receivedmessages', component: ReceivedMessages },


  ],
})