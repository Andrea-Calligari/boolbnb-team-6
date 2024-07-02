<template>
  <header class="header">
    <div class="container">
      <div class="row align-items-center">
        <div class="col">
          <a href="./">
            <img src="/img/logo.png" class="logo" alt="Vue logo" />
          </a>
        </div>
        <div class="col-auto">

          <RouterLink :to="{ name: 'home' }" class="me-2" :class="$route.fullPath === '/' ? 'opacity-50' : ''">
            <CmpBtnLoad content="Home" />
          </RouterLink>

          <RouterLink :to="{ name: 'apartments.index' }" class="me-2"
            :class="$route.fullPath === '/apartments' ? 'opacity-50' : ''">
            <CmpBtnLoad content="Apartments" />
          </RouterLink>

          <RouterLink v-if="store.user.id" :to="{ name: 'dashboard' }" class="me-2"
            :class="$route.fullPath === '/dashboard' ? 'opacity-50' : ''">
            <CmpBtnLoad content="Dashboard" />
          </RouterLink>

          <RouterLink v-if="store.user.id" :to="{ name: 'apartments.create' }" class="me-2"
            :class="$route.fullPath === '/apartments/create' ? 'opacity-50' : ''">
            <CmpBtnLoad content="Create" />
          </RouterLink>

          <RouterLink v-if="!store.user.id" :to="{ name: 'register' }" class="me-2"
            :class="$route.fullPath === '/register' ? 'opacity-50' : ''">
            <CmpBtnLoad content="Register" />
          </RouterLink>

          <CmpBtnLoad @click="store.user.logout()" v-if="store.user.id"
            :content="store.user.name + ' ' + store.user.surname" :image="store.user.image" />


          <RouterLink v-else :to="{ name: 'login' }" :class="$route.fullPath === '/login' ? 'opacity-50' : ''">

            <CmpBtnLoad :content="store.user.id === 0 ? 'loading..' : 'Login'"
              :class="store.user.id === 0 ? 'loading' : ''" />

          </RouterLink>

        </div>
      </div>
    </div>
  </header>
</template>

<script>
import { store } from '../store.js';
import axios from 'axios'
import CmpBtnLoad from './CmpBtnLoad.vue'
export default {
  components: { CmpBtnLoad },
  data() {
    return {
      store,
    }
  },
}
</script>


<style lang="scss" scoped>
.logo {
  height: 6em;
  padding: 1.5em;
  will-change: filter;
  transition: filter 300ms;
}

.logo:hover {
  filter: drop-shadow(0 0 2em #2C3E50);
}
</style>