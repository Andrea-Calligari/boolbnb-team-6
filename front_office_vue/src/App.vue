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