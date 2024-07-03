<template>



  <h1>dashboard</h1>
  <!-- <input @keyup="searchdd()" type="text" v-model="textt"> -->

  <input @keyup="store.address.searchAddresses(text)" type="text" v-model="text" list="position">
  <datalist id="position">
    <option v-for="position in store.address.listAddresses">{{ position.address.freeformAddress }}</option>
  </datalist>

  <p v-for="position in store.address.listAddresses">
    {{ position.address.freeformAddress }}
  </p>


</template>

<script>
import { store } from '../../store.js';
export default {
  data() {
    return {
      store,
      text: '',
      
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