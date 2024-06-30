<template>
  <div class="h-100 bg-dark"></div>
  <h1>dashboard</h1>
  <RouterLink :to="{ name: 'profileupdate' }" class="btn btn-primary">
    Aggiorna profilo
  </RouterLink>
  <RouterLink :to="{ name: 'receivedmessages' }" class="btn btn-primary">
    messaggi ricevuti
  </RouterLink>
</template>

<script>
import { store } from '../store.js';
export default {
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
  }
}
</script>


<style lang="scss" scoped></style>