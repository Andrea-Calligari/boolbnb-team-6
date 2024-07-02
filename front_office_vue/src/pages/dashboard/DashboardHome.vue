<template>



  <h1>dashboard</h1>
  <!-- <input @keyup="searchdd()" type="text" v-model="textt"> -->

  <input @keyup="searchdd()" type="text" v-model="textt" list="position">
  <datalist id="position">
    <option v-for="positio in position">{{ positio.address.freeformAddress }}</option>
  </datalist>

  <p v-for="positio in position">
    {{ positio.address.freeformAddress }}
  </p>


</template>

<script>
import { store } from '../../store.js';
export default {
  data() {
    return {
      store,
      textt: '',
      position: null,
    }
  },
  methods: {
    async searchdd() {
      console.log(this.textt);
      this.position = await fetch(`https://api.tomtom.com/search/2/search/${encodeURI(this.textt)}.json?key=orDHPznfE908Jeu45AKVaFSiSMAebYfQ`)
        .then((response) => response.json())
        .then((data) => {
          console.log(data.results);

          return data.results
        })
        .catch(function (error) {
          reject(error);
        });

    }
  },
  computed: {
  },
  mounted() {
  }
}
</script>


<style lang="scss" scoped></style>