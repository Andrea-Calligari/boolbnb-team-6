<template>
  
</template>

<script>
import { store } from '../store.js';
import axios from 'axios';
export default {
  data() {
    return {
      store,
    }
  },
  methods: {
    fetchApartmentsHome(){
      axios.get('http://localhost:8000/api/homepage').then((res)=> {
        console.log(res)
      })
    }
  },
  computed: {
  },
  mounted() {
  }
}
</script>


<style lang="scss" scoped></style>