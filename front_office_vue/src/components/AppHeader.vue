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
          <!-- Searchbar -->
          <div class="input-group ">
            <input type="text" @keyup="search" @keyup.enter="submitSearch" class="form-control"
              aria-label="Recipient's username" aria-describedby="button-addon2" id="address" name="address"
              v-model="store.search.address" placeholder="Inserisci indirizzo" list="position">
            <datalist id="position">
              <option v-for="position in store.address.listAddresses">{{
                position.address.freeformAddress }}
              </option>
            </datalist>
            <!-- Button search -->
            <button class="btn btn-outline-secondary" @click="submitSearch" type="button" id="button-addon2">
              <span class="material-symbols-sharp" style="padding-top: 4px;">
                search
              </span>
            </button>
          </div>
        </div>

        <!-- User dropdown -->

        <div class="col col-md-4 drop-menu  ">
          <div class="dropdown ">
            <button @click.self="openDropDown" class="dropbtn">
              <img @click.stop="openDropDown" v-if="store.user.id" class="avatar"
                :src="'http://localhost:8000/' + store.user.image" alt="User-Avatar">
              <span @click.stop="openDropDown" v-else class="material-symbols-sharp">
                person
              </span>
              <span @click.stop="openDropDown" v-if="store.user.id">{{ store.user.name + ' ' + store.user.surname
                }}</span>
            </button>
            <div v-if="store.user.id" id="myDropdown" class="dropdown-content  m-0 ">
              <div class="input">
                <button class="value">
                  <span class="material-symbols-sharp text-dark">
                    dashboard
                  </span>
                  <router-link :to="{ name: 'dashboard' }" class="dropdown-item text-dark ">Dashboard</router-link>
                </button>
                <button class="value">
                  <span class="material-symbols-sharp text-dark">
                    apartment
                  </span>
                  <router-link :to="{ name: 'dashboard.userapartments' }" class="dropdown-item text-dark ">I tuoi
                    appartamenti</router-link>
                </button>
                <button class="value">
                  <span class="material-symbols-sharp text-dark">
                    mail
                  </span>
                  <router-link :to="{ name: 'dashboard.receivedmessages' }" class="dropdown-item text-dark ">Messaggi
                    ricevuti</router-link>
                </button>
                <button class="value">
                  <span class="material-symbols-sharp text-dark">
                    person
                  </span>
                  <router-link :to="{ name: 'dashboard.profileupdate' }" class="dropdown-item text-dark ">Profilo
                  </router-link>
                </button>
                <button class="value text-start">
                  <span class="material-symbols-sharp text-danger">
                    logout
                  </span>
                  <button @click="store.user.logout()" v-if="store.user.id" class=" dropdown-item text-dark  ">
                    Logout
                  </button>
                </button>
              </div>
            </div>

            <!-- Guest dropdown -->
            <div v-else-if="!store.user.id" id="myDropdown" class="dropdown-content m-0">
              <div class="input ">
                <button class="value text-start">
                  <span class="material-symbols-sharp text-success">
                    login
                  </span>
                  <router-link :to="{ name: 'login' }" class="dropdown-item text-success"
                    :class="$route.fullPath === '/login' ? 'opacity-50' : ''">
                    <span>Login</span>
                  </router-link>
                </button>
                <button class="value text-start">

                  <span class="material-symbols-sharp text-dark">
                    app_registration
                  </span>
                  <router-link :to="{ name: 'register' }" class="me-2 dropdown-item text-dark"
                    :class="$route.fullPath === '/register' ? 'opacity-50' : ''">
                    <span>Registrati</span>
                  </router-link>
                </button>
              </div>
            </div>
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
    openDropDown() {
      document.getElementById("myDropdown").classList.toggle("show");
      window.onclick = function (event) {
        if (!event.target.matches('.dropbtn')) {
          const dropdowns = document.getElementsByClassName("dropdown-content");
          for (let i = 0; i < dropdowns.length; i++) {
            const openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
              openDropdown.classList.remove('show');
            }
          }
        }
        console.log('click')
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

.header {
  // background 

}

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
  border: none;
  font-size: 16px;
  border-radius: 24px;
  cursor: pointer;
}

/* Dropdown button on hover & focus */
.dropbtn:hover,
.dropbtn:focus {
  background-color: $light-blue;
  cursor: pointer;

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
  opacity: 1;
}

/* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
.show {
  display: flex;
  margin-top: 24px;
  flex-direction: column;
  align-items: start;
  gap: 4px;
  z-index: 999;
}




// Dropdown di prova
.input {
  background-color: #fafafa;
  display: flex;
  flex-direction: column;
  width: 200px;
  justify-content: center;
  border-radius: 10px;
  transition: 1s;
  padding: 10px;
  overflow: hidden;
}

.value {
  font-size: 15px;
  background-color: transparent;
  border: none;
  padding: 10px;
  color: white;
  display: flex;
  position: relative;
  gap: 5px;
  cursor: pointer;
  border-radius: 10px;
  transition: 1s;
  box-sizing: border-box;
}

.value:not(:active):hover,
.value:focus {
  display: flex;
  box-sizing: border-box;
  border: 2px solid #1a1f24;
  color: black
}

.value:focus,
.value:active {
  background-color: #fafafa;
  outline: none;
  margin-left: 17px;
}

.value::before {
  content: "";
  position: absolute;
  top: 5px;
  left: -15px;
  width: 5px;
  height: 80%;
  background-color: linear-gradient(#FFF5C3 10%, #9452A5 100%);
  border-radius: 5px;
  opacity: 0;
  transition: 1s;
}

.value:focus::before,
.value:active::before {
  opacity: 0;
}

.value svg {
  width: 20px;
}

.input:hover> :not(.value:hover) {
  transition: 800ms;
  filter: blur(0.7px);
  transform: scale(0.95, 0.95);
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