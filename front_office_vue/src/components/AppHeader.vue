<template>
  <header class="header">
    <div class="container">
      <div class="row align-items-center">
        <div class="col">
          <RouterLink :to="{ name: 'home' }">
            <img src="/img/logo.png" class="logo" alt="Vue logo" />
          </RouterLink>
        </div>
        <div class="col-auto">



          <!-- <RouterLink :to="{ name: 'categories.index' }" class="me-2">
            <CmpBtnLoad content="Categories" />
          </RouterLink> -->

          <!-- <input type="text" placeholder="search" class="rounded px-1 me-2" style="width: 150px;"> -->

          <input type="text" @keyup="search" class="form-control d-inline-block" style="width: 150px;" id="address"
            name="address" v-model="store.search.address" placeholder="Inserisci indirizzo" list="position">
          <datalist id="position">
            <option v-for="position in store.address.listAddresses">{{ position.address.freeformAddress }}
            </option>
          </datalist>
          <button class="btn btn-primary me-2" @click="store.search.getSearch()">
            <span class="material-symbols-rounded">
              search
            </span>
          </button>

          <RouterLink :to="{ name: 'apartments.search' }" class="me-2"
            :class="$route.fullPath === '/apartments' ? 'opacity-50' : ''">
            <CmpBtnLoad content="Apartments" />
          </RouterLink>


          <RouterLink v-if="!store.user.id" :to="{ name: 'register' }" class="me-2"
            :class="$route.fullPath === '/register' ? 'opacity-50' : ''">
            <CmpBtnLoad content="Register" />
          </RouterLink>

          <RouterLink v-if="store.user.id" :to="{ name: 'dashboard' }">
            <CmpBtnLoad :content="store.user.name + ' ' + store.user.surname" :image="store.user.image" />
          </RouterLink>

          <RouterLink v-else :to="{ name: 'login' }" :class="$route.fullPath === '/login' ? 'opacity-50' : ''">

            <CmpBtnLoad :content="store.user.id === 0 ? 'loading..' : 'Login'"
              :class="store.user.id === 0 ? 'loading' : ''" />

          </RouterLink>

          <button @click="store.user.logout()" v-if="store.user.id" class="btn btn-outline-danger p-1 ms-2 mb-2">
            <span class="material-symbols-rounded">
              logout
            </span>
          </button>
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
      address: 'Piazza di spagna, 31, Roma',
    }
  },
  methods: {
    search() {
      if (this.$route.fullPath !== '/apartment/search') {
        this.$router.push({ name: 'apartments.search' });
      }
      this.store.address.searchAddresses(this.store.search.address)
    }
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