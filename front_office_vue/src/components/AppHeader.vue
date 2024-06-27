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
          <RouterLink to="/" class="btn me-2" :class="$route.fullPath === '/' ? 'btn-dark' : 'btn-outline-dark'">Home
          </RouterLink>
          <button @click="logout()" v-if="this.store.user" class="btn"
            :class="$route.fullPath === '/login' ? 'btn-dark' : 'btn-outline-danger'">
            {{ this.store.user }} <span class="material-symbols-rounded">logout</span>
          </button>
          <RouterLink v-else to="/login" class="btn"
            :class="$route.fullPath === '/login' ? 'btn-dark' : 'btn-outline-dark'">
            {{ this.store.user === 0 ? 'loading..' : "Login" }}
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
export default {
  data() {
    return {
      store,
    }
  },
  methods: {
    async logout() {
      this.store.user = 0;
      await axios.post("http://localhost:8000/api/logout").then((res) => {
        console.log(res.data);
        this.store.user = null;
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