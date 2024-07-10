<template>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div id="carouselExampleCaptions" class="carousel slide">
          <div class="carousel-indicators">
            <button type="button" v-for="(apartment, i) in apartments" :key="apartment.id + 'btn'"
              data-bs-target="#carouselExampleCaptions" :data-bs-slide-to="i" :class="i === 0 ? 'active' : ''"
              :aria-current="i === 0 ? 'true' : ''" :aria-label="'Slide ' + (i + 1)"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item" v-for="(apartment, i) in apartments" :key="apartment.id + 'img'"
              :class="i === 0 ? 'active' : ''">
              <img :src="`http://localhost:8000/${apartment.image.split(',')[0]}`" class="d-block w-100 "
                style="height: 70vh;" alt="...">
              <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50">
                <RouterLink :to="{ name: 'apartments.show', params: { slug: apartment.slug } }"
                  class="btn btn-outline-light">
                  <h2>{{ apartment.title }}</h2>
                </RouterLink>

                <p class="fs-4">{{ apartment.description }}</p>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
    <div class="row">
      <ApartmentCard v-for="apartment in apartments" :key="apartment.id" :apartment="apartment" />
    </div>
  </div>
  <!-- <img :src="image ? 'http://localhost:8000/' + image : 'http://localhost:8000/uploads/apartment/null.png'" -->


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


<style lang="scss" scoped></style>