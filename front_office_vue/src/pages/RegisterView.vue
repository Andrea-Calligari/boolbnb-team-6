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


   <div class="container mt-4">
      <div class="row justify-content-center">
         <div class="col-md-8">
            <div class="card">
               <div class="card-header">Register</div>

               <div class="card-body">
                  <form @submit.prevent="onLogin">

                     <div class="mb-4 row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                        <div class="col-md-6">
                           <input id="name" type="text" class="form-control" v-mode="name" required autocomplete="name"
                              autofocus>

                           <!-- <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> -->

                        </div>
                     </div>

                     <div class="mb-4 row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                        <div class="col-md-6">
                           <input id="email" type="email" class="form-control" v-mode="email" required
                              autocomplete="email">

                           <!-- <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> -->
                        </div>
                     </div>

                     <div class="mb-4 row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                        <div class="col-md-6">
                           <input id="password" type="password" class="form-control" v-mode="password" required
                              autocomplete="new-password">

                           <!-- <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span> -->
                        </div>
                     </div>

                     <div class="mb-4 row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm
                           Password</label>

                        <div class="col-md-6">
                           <input id="password-confirm" type="password" class="form-control"
                              v-mode="password_confirmation" required autocomplete="new-password">
                        </div>
                     </div>

                     <div class="mb-4 row mb-0">
                        <div class="col-md-6 offset-md-4">
                           <button type="submit" class="btn btn-primary">
                              Register
                           </button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
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
         name: '',
         email: '@example.com',
         password: '',
         password_confirmation: '',
         store,
      }
   },
   methods: {
      async onRegister() {
         this.store.loading.on();
         this.store.user.id = 0;
         await axios.get("http://localhost:8000/sanctum/csrf-cookie");
         await axios.post("http://localhost:8000/api/login", {
            email: this.email,
            password: this.password
         }).then((res) => {
            console.log(res.data);
            this.store.user.getUser();
            this.store.loading.off();
            this.$router.push('/');
         }).catch((err) => {
            this.store.loading.off();
            console.log(err.response.data);
         });
      },
   },
   computed: {
   },
   mounted() {
   }
}
</script>


<style lang="scss" scoped></style>