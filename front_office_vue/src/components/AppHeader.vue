<template>
  <header class="header">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-4">
          <RouterLink :to="{ name: 'home' }">
            <img src="/img/logo.svg" class="logo" alt="Vue logo" />
          </RouterLink>
        </div>
        <div class="col">
          <div class="input-group ">
            <input type="text" @keyup="search" @keyup.enter="submitSearch" class="form-control"
              aria-label="Recipient's username" aria-describedby="button-addon2" id="address" name="address"
              v-model="store.search.address" placeholder="Inserisci indirizzo" list="position">
            <datalist id="position">
              <option v-for="position in store.address.listAddresses">{{ position.address.freeformAddress }}
              </option>
            </datalist>
            <button class="btn btn-outline-secondary" @click="submitSearch" type="button" id="button-addon2">
              <span class="material-symbols-rounded" style="padding-top: 4px;">
                search
              </span>
            </button>
          </div>
        </div>

        <div class="col ">
          <div class="dropdown ">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              {{store.user.name + ' ' + store.user.surname}}
            </button>
            <ul class="dropdown-menu  ">
              <!-- <li><router-link :to="{name: 'home'}"class="dropdown-item">Home</router-link></li> -->
              <li><router-link :to="{name: 'dashboard'}" class="dropdown-item">Dashboard</router-link></li>
              <li><router-link :to="{name:'apartments.index'}"class="dropdown-item">I tuoi appartamenti </router-link></li>
              <li><router-link :to="{name:'apartments.create'}"class="dropdown-item">Aggiungi un appartamento </router-link></li>
              <li><router-link :to="{name:'dashboard.receivedmessages'}"class="dropdown-item">Messaggi ricevuti </router-link></li>
              <li><router-link :to="{name:'dashboard.profileupdate'}"class="dropdown-item">Profilo </router-link></li>

              <li class="align-self-end p-2"><button @click="store.user.logout()" v-if="store.user.id"
                  class="btn btn-outline-danger p-1 ms-2 mb-2">
                  <span class="material-symbols-sharp">
                    logout
                  </span>
                </button>
              </li> 
            </ul>
          </div>

          <!-- <RouterLink :to="{ name: 'categories.index' }" class="me-2">
            <CmpBtnLoad content="Categories" />
          </RouterLink> -->

          <!-- <input type="text" placeholder="search" class="rounded px-1 me-2" style="width: 150px;"> -->

          <!-- <RouterLink :to="{ name: 'apartments.search' }" class="me-2"
            :class="$route.fullPath === '/apartments' ? 'opacity-50' : ''">
            <CmpBtnLoad content="Apartments" />
          </RouterLink> -->



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

          <!-- <button @click="store.user.logout()" v-if="store.user.id" class="btn btn-outline-danger p-1 ms-2 mb-2">
            <span class="material-symbols-sharp">
              logout
            </span>
          </button> -->
        </div>
      </div>
    </div>
  </header>
</template>

<script>
import { store } from '../store.js';
import axios from 'axios';
import CmpBtnLoad from './CmpBtnLoad.vue';
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
      this.store.search.resetDefaultSearch()
    },
    submitSearch() {
      if (this.$route.fullPath !== '/apartment/search') {
        this.$router.push({ name: 'apartments.search' });
      }
      this.store.search.getSearch();
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

@media screen and (max-width: 968px) {
  .header {
    background-color: lightgreen;
  }
  .dropdown{
    display: none;
  }
}
</style>