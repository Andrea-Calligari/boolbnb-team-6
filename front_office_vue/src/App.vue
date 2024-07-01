<template>
  <div :class="store.loading.state ? 'vh-100 overflow-hidden' : 'd-contents'">
    <CmpLoading v-if="store.loading.state" />
    <AppHeader />
    <AppMain />
    <AppFooter />
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
import CmpLoading from './components/CmpLoading.vue'
export default {
  components: { AppHeader, AppMain, AppFooter, CmpLoading },
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
    this.store.loading.on();

    this.store.user.getUser();

    axios.get("http://localhost:8000/api/options")
      .then((res) => {
        this.store.options = res.data
        this.store.loading.off();
      })
      .catch((err) => {
        console.log(err.response.data);
        this.store.loading.off();
      })
  }
}

</script>

<style lang="scss">
/*
@use '../assets/scss/partials/_variables.scss' as *;
*/
</style>