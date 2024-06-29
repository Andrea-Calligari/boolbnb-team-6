<template>
  <AppHeader />
  <AppMain />
  <AppFooter />

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
  },
  computed: {
  },
  mounted() {
    this.store.user.id = 0;

    this.store.user.getUser();

    axios.get("http://localhost:8000/api/options")
      .then((res) => {
        this.store.options = res.data
      })
      .catch((err) => {
        console.log(err.response.data);
      })
  }
}

</script>

<style lang="scss">
/*
@use '../assets/scss/partials/_variables.scss' as *;
*/
</style>