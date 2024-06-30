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

          <RouterLink to="/" class="me-2" :class="$route.fullPath === '/' ? 'opacity-50' : ''">
            <CmpBtnLoad content="Home" />
          </RouterLink>

          <RouterLink to="/apartments" class="me-2" :class="$route.fullPath === '/apartments' ? 'opacity-50' : ''">
            <CmpBtnLoad content="Apartments" />
          </RouterLink>

          <RouterLink v-if="store.user.id" :to="{ name: 'dashboard'}" class="me-2"
            :class="$route.fullPath === '/dashboard' ? 'opacity-50' : ''">
            <CmpBtnLoad  content="Dashboard" />
          </RouterLink>

          <RouterLink v-if="store.user.id" to="/apartments/create" class="me-2"
            :class="$route.fullPath === '/apartments/create' ? 'opacity-50' : ''">
            <CmpBtnLoad  content="Create" />
          </RouterLink>

          <RouterLink v-if="!store.user.id" to="/register" class="me-2"
            :class="$route.fullPath === '/register' ? 'opacity-50' : ''">
            <CmpBtnLoad  content="Register" />
          </RouterLink>

          <CmpBtnLoad @click="logout()" v-if="store.user.id" :content="store.user.name+ ' ' + store.user.surname + ' ->'"
            :class="$route.fullPath === '/login' ? 'opacity-50' : ''" />
          <RouterLink v-else to="/login" :class="$route.fullPath === '/login' ? 'opacity-50' : ''">

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
axios.defaults.withCredentials = true;
axios.defaults.withXSRFToken = true;
import CmpBtnLoad from './CmpBtnLoad.vue'
export default {
  components: { CmpBtnLoad },
  data() {
    return {
      store,
    }
  },
  methods: {
    async logout() {
      this.store.user.id = null;
      await axios.post("http://localhost:8000/api/logout").then((res) => {
        console.log(res.data);
        this.$router.push('/');
      }).catch((err) => {
        console.log('error: ', err);
      });
    },
  },
  computed: {
  },
  mounted() {
  }
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