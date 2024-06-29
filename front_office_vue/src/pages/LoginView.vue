<template>
   <h1 class="bg-light text-center mb-3">Login</h1>
   <div class="container">
      <form @submit.prevent="onLogin" class="row">
         <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" required v-model="email">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
         </div>
         <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" required v-model="password">
         </div>
         <button type="submit" class="btn btn-primary">Login</button>
      </form>

   </div>
</template>

<script>
import { store } from '../store.js';
import axios from 'axios'
axios.defaults.withCredentials = true;
axios.defaults.withXSRFToken = true;
export default {
   data() {
      return {
         email: 'test@example.com',
         password: 'password',
         store,
      }
   },
   methods: {
      async onLogin() {
         this.store.user = 0;
         await axios.get("http://localhost:8000/sanctum/csrf-cookie");
         await axios.post("http://localhost:8000/api/login", {
            email: this.email,
            password: this.password
         }).then((res) => {
            console.log(res.data);
            this.userData();
            this.$router.push('/');
         }).catch((err) => {
            console.log(err.response.data.message);
         });

      },

      async userData() {
         this.store.user = null;
         await axios.get("http://localhost:8000/api/user")
            .then((res) => {
               this.store.user = res.data.name
            })
            .catch((err) => {
               console.log(err.response.data.message);
            })
      }
   },
   computed: {
   },
   mounted() {
   }
}
</script>


<style lang="scss" scoped></style>