<template>

  ['address' => 'Via Roma, 7, Viterbo', 'lat' => '41.8724', 'lon' => '12.52727'],

  <h1 @click="getttt()">dashboard</h1>
  <template v-if="apartments">
    <p>$apartmentCorrect = [</p>
    <p v-for="apartment in apartments">{{ `['address' => '${apartment.address}', 'lat' => '${apartment.lat}', 'lon' =>
      '${apartment.lon}'],` }}</p>
    <p>];</p>
  </template>

</template>

<script>
import { store } from '../../store.js';
export default {
  data() {
    return {
      store,
      apartments: []
    }
  },
  methods: {
    getttt() {
      // fetch(`https://api.tomtom.com/search/2/search/${encodeURI('Corso Cavour, 75, Latina')}.json?key=orDHPznfE908Jeu45AKVaFSiSMAebYfQ`)
      let x = 0;
      setInterval(() => {
        fetch(`https://api.tomtom.com/search/2/reverseGeocode/${this.store.giust[x].lat},${this.store.giust[x].lon}.json?key=orDHPznfE908Jeu45AKVaFSiSMAebYfQ`)
          .then((response) => response.json())
          .then((data) => {
            if (data.addresses) {
              console.log(data.addresses[0].address.freeformAddress);
              const lat = data.addresses[0].position.split(",")[0]
              const lon = data.addresses[0].position.split(",")[1]
              const ciao = {
                lat,
                lon,
                address: data.addresses[0].address.freeformAddress
              }
              this.apartments.push(ciao);

            }


          })
          .catch((error) => {
            console.log("FINITOOOO");
          })
        x++;
      }, 500);

    }


  },
  computed: {
  },
  mounted() {
  }
}
</script>


<style lang="scss" scoped></style>