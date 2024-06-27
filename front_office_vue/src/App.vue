<template>
  <AppHeader />
  <AppMain />
  <AppFooter />
  <div class="container text-white">
    <div class="login-card">
      <h2>Login</h2>
      <form @submit.prevent="onLogin">

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required v-model="email">

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required v-model="password">

        <button type="submit">Login</button>

      </form>
      <p >{{ user }}</p>

      <button @click="logout()">logout</button>

      <button @click="userData()">user</button>
      

    </div>
  </div>
</template>

<script>
import { store } from './store.js';
import axios from 'axios'
axios.defaults.withCredentials = true;
axios.defaults.withXSRFToken = true;
import AppHeader from './components/AppHeader.vue'
import AppMain from './components/AppMain.vue'
import AppFooter from './components/AppFooter.vue'
export default {
  components: { AppHeader, AppMain, AppFooter },
  data() {
    return {
      store,
    }
  },
  methods: {
    async onLogin() {
      await axios.get("http://localhost:8000/sanctum/csrf-cookie");
      await axios.post("http://localhost:8000/api/login", {
        email: this.email,
        password: this.password
      }).then((res) => {
        console.log(res.data);
      }).catch((err) => {
        console.log('error: ', err);
      });
     
    },

    async logout(){
      await axios.post("http://localhost:8000/api/logout").then((res) => {
        console.log(res.data);
      }).catch((err) => {
        console.log('error: ', err);
      });

      
       
    },

    async userData(){

      this.user = ''

      await axios.get("http://localhost:8000/api/user")
        .then((users) => {
          this.user = users.data.name
        })
        .catch((err) => {
          console.log('errori: ', err);
        })
    }
  },
  computed: {
  },
  mounted() {
    this.store.user = 0;
    axios.get("http://localhost:8000/api/user")
      .then((res) => {
        this.store.user = res.data.name
      })
      .catch((err) => {
        this.store.user = null;
        console.log(err.response.data.message);
      })
  }
}

</script>

<style lang="scss">
/*
@use '../assets/scss/partials/_variables.scss' as *;
*/
</style>