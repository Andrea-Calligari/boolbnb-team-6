<template>
  <!-- <div class="bg-dark" style="display: flex; flex-direction: ;  align-items: stretch;"> -->
  <!-- <div class="bg-success" style="flex-grow: 1;">s</div> -->


  <!-- </div> -->
  <!-- 
  <div class="bg-dark flex-grow-1 d-flex">
    
 -->
  <aside class="sidebar text-white p-3 d-flex flex-column bg-dark">

    <RouterLink :to="{ name: 'profileupdate' }" class="btn btn-primary">
      Aggiorna profilo
    </RouterLink>

    <RouterLink :to="{ name: 'receivedmessages' }" class="btn btn-primary">
      messaggi ricevuti
    </RouterLink>
  </aside>
  <div class="main-dashbord flex-grow-1">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col">
          <h1>Dashboard</h1>
        </div>
        <div class="col-auto text-end">
          <span>ADD appartment</span>
          <button class="btn btn-outline-dark ms-2">+</button>
        </div>
      </div>
      
      <div class="row">

      </div>
    </div>
  </div>
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


<style lang="scss" scoped>
.main {
  display: flex;
}
</style>