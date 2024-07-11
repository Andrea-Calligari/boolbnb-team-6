<template>
  <header class="header">
    <div class="container-lg container-sm">
      <div class="row align-items-center">
        <div class="col img  col-md-3 col-sm-2 ">
          <RouterLink :to="{ name: 'home' }">
            <img src="/img/logo.svg" class="logo" alt="Vue logo" />
          </RouterLink>
        </div>
        <div class="col col-md-5  ">
          <div class="input-group ">
            <input type="text" @keyup="search" @keyup.enter="submitSearch" class="form-control"
              aria-label="Recipient's username" aria-describedby="button-addon2" id="address" name="address"
              v-model="store.search.address" placeholder="Inserisci indirizzo" list="position">
            <datalist id="position">
              <option v-for="position in store.address.listAddresses">{{ position.address.freeformAddress }}
              </option>
            </datalist>
            <button class="btn btn-outline-secondary" @click="submitSearch" type="button" id="button-addon2">
              <span class="material-symbols-sharp" style="padding-top: 4px;">
                search
              </span>
            </button>
          </div>
        </div>
        <div class="col col-md-4 drop-menu  ">
          <!-- <div class="dropdown">
            <button class="btn btn-outline-warning dropdown-toggle" type="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              <img v-if="store.user.id" class="avatar" :src="'http://localhost:8000/' + store.user.image"
                alt="User-Avatar">
              <span v-else class="material-symbols-sharp">
                person
              </span>
              <span v-if="store.user.id">{{ store.user.name + ' ' + store.user.surname }}</span>
            </button>
            <ul v-if="store.user.id" class="dropdown-menu ">
              <li><router-link :to="{ name: 'dashboard' }" class="dropdown-item">Dashboard</router-link></li>
              <li><router-link :to="{ name: 'dashboard.userapartments' }" class="dropdown-item">I tuoi appartamenti
                </router-link>
              </li>
              <li><router-link :to="{ name: 'apartments.create' }" class="dropdown-item">Aggiungi un appartamento
                </router-link></li>
              <li><router-link :to="{ name: 'dashboard.receivedmessages' }" class="dropdown-item">Messaggi ricevuti
                </router-link></li>
              <li><router-link :to="{ name: 'dashboard.profileupdate' }" class="dropdown-item">Profilo </router-link>
              </li>
              <li class="align-self-end p-2"><button @click="store.user.logout()" v-if="store.user.id"
                  class="btn btn-outline-danger p-1 ms-2 mb-2">
                  <span class="material-symbols-sharp">
                    logout
                  </span>
                </button>
              </li>
            </ul>
            <ul v-else-if="!store.user.id" class="dropdown-menu  ">
              <li>
                <RouterLink :to="{ name: 'login' }" class="dropdown-item"
                  :class="$route.fullPath === '/login' ? 'opacity-50' : ''">
                  <span>Login</span>
                </RouterLink>
              </li>
              <router-link :to="{ name: 'register' }" class="me-2 dropdown-item"
                :class="$route.fullPath === '/register' ? 'opacity-50' : ''">
                <span>Registrati</span>
              </router-link>
            </ul> -->
          <div class="dropdown ">
            <button  @click="closeDropDown" class="dropbtn">
            <img v-if="store.user.id" class="avatar" :src="'http://localhost:8000/' + store.user.image" alt="User-Avatar">
            <span v-else class="material-symbols-sharp">
              person
            </span>
              <span v-if="store.user.id">{{ store.user.name + ' ' + store.user.surname }}</span></button>
              
            <ul v-if="store.user.id" id="myDropdown" class="dropdown-content m-0 ">
              
              <li><router-link :to="{ name: 'dashboard' }" class="dropdown-item">Dashboard</router-link></li>
              <li><router-link :to="{ name: 'dashboard.userapartments' }" class="dropdown-item">I tuoi
                  appartamenti</router-link></li>
              <li><router-link :to="{ name: 'apartments.create' }" class="dropdown-item">Aggiungi un
                  appartamento</router-link></li>
              <li><router-link :to="{ name: 'dashboard.receivedmessages' }" class="dropdown-item">Messaggi
                  ricevuti</router-link></li>
              <li><router-link :to="{ name: 'dashboard.profileupdate' }" class="dropdown-item">Profilo </router-link>
              </li>
              <li>
                <button @click="store.user.logout()" v-if="store.user.id" class="btn btn-outline-danger p-1 ms-2 mb-2">
                  <span class="material-symbols-sharp">
                    logout
                  </span>
                </button>
              </li>
            </ul>
            <ul v-else-if="!store.user.id" id="myDropdown" class="dropdown-content m-0">
              <li>
                <RouterLink :to="{ name: 'login' }" class="dropdown-item"
                  :class="$route.fullPath === '/login' ? 'opacity-50' : ''">
                  <span>Login</span>
                </RouterLink>
              </li>
              <li>
                <router-link :to="{ name: 'register' }" class="me-2 dropdown-item"
                  :class="$route.fullPath === '/register' ? 'opacity-50' : ''">
                  <span>Registrati</span>
                </router-link>
              </li>
            </ul>
          </div>
      
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
    closeDropDown() {
      document.getElementById("myDropdown").classList.toggle("show");
      window.onclick = function (event) {
        if (!event.target.matches('.dropbtn')) {
          var dropdowns = document.getElementsByClassName("dropdown-content");
          var i;
          for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
              openDropdown.classList.remove('show');
            }
          }
        }
      }
    },
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
@use '../assets/scss/partials/_variables.scss' as *;

.logo {
  height: 5em;
  padding: 0.5em;
  will-change: filter;
  transition: filter 300ms;
}

.logo:hover {
  filter: drop-shadow(0 0 2em #2C3E50);
}

.avatar {
  max-width: 30px;
  margin-right: 6px;
}

.anonimous {
  max-width: 30px;

}

.drop-menu {
  text-align: right;
}

/* Dropdown Button */
.dropbtn {
  background-color: $light-yellow;
  color: white;
  padding: 12px;
  border:none;
  font-size: 16px;
  border-radius: 24px;
  cursor: pointer;
}

/* Dropdown button on hover & focus */
.dropbtn:hover,
.dropbtn:focus {
  background-color: $dark-yellow;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  text-decoration: none;
  text-align: left;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {
  background-color: $light-yellow;
}

/* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
.show {
  display: flex;
  padding: 10px;
  flex-direction: column;
  // justify-content: flex-start;
  align-items: start;
  gap: 4px;
  z-index: 999;
}

//Media-Query
@media screen and (max-width: 768px) {
  .img {
    max-width: 80px;
  }

  .drop-menu {
    width: 20px;


  }

}
</style>