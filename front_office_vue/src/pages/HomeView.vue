<template>
  <div class="container mt-5">
    <video class="bg-video" src="../../../public/video/home-loop-video.mp4" autoplay muted loop playsinline
      alt="video bg"></video>
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="hero-section text-center d-flex flex-column align-items-center">
          <h1 class="mb-6 dark-blue-font hero-title">BENVENUTO A CASA, FUORI CASA.</h1>
          <p>StayHub è la vostra risorsa definitiva per trovare l'appartamento perfetto in affitto. Sia che stiate
            cercando un monolocale accogliente nel cuore della città o una spaziosa casa familiare in periferia, il
            nostro sito è progettato per rendere la ricerca facile e veloce. Con una vasta selezione di annunci
            aggiornati quotidianamente, filtri di ricerca avanzati e dettagliate descrizioni degli immobili, vi aiutiamo
            a trovare la soluzione abitativa che meglio risponde alle vostre esigenze. Esplorate oggi stesso le nostre
            offerte e scoprite quanto può essere semplice trovare la vostra nuova casa!
          </p>
          <router-link :to="{ name: 'apartments.search' }" class="btn-yellow mb-4">
            <span>Vai alla ricerca avanzata</span>
          </router-link>
          <div v-if="store.user.id === null">
            <p>Inoltre, se avete un appartamento da mettere in affitto, registratevi
              gratuitamente e pubblicate il vostro
              annuncio in pochi semplici passaggi. Unisciti alla nostra community di proprietari soddisfatti e trova
              subito gli inquilini ideali!
            </p>
            <router-link :to="{ name: 'register' }" class="btn-yellow mb-4">
              <span>Registrati</span>
            </router-link>
          </div>


        </div>
      </div>
    </div>
    <!-- Card-Apartments-in-Promotion -->
    <div class="row">
      <ApartmentCard v-for="apartment in apartments" :key="apartment.id" :apartment="apartment" />
    </div>
  </div>


</template>

<script>
import { store } from '../store.js';
import axios from 'axios';
import ApartmentCard from '../components/ApartmentCard.vue'
export default {
  components: {
    ApartmentCard
  },
  data() {
    return {
      store,
      apartments: []
    }
  },
  methods: {

  },
  computed: {
  },
  mounted() {
    this.store.loading.on();
    axios.get('http://localhost:8000/api/homepage').then((res) => {
      console.log(res)
      this.apartments = res.data.apartmentPivot
      this.store.loading.off();
    })
  }
}
</script>


<style lang="scss" scoped>
@use '../assets/scss/partials/variables.scss' as *;
@use '../assets/scss/partials/mixins.scss' as *;
@use '../assets/scss/partials/utilities.scss' as *;

.btn-yellow {
  background-color: $dark-yellow;
  color: black;
  padding: 5px 8px;

  &:hover {
    background-color: $light-yellow;
  }
}

.bg-video {
  width: 100%;
  height: 100vh;
  object-fit: cover;
  position: fixed;

  z-index: -1;
  top: 0;
  left: 0;
}

.hero-title {
  font-family: "League Spartan", sans-serif;
  font-weight: bold;
}

.hero-section {
  padding: 25px;
  background-color: rgba(231, 215, 215, 0.8);
}
</style>