<template>
  <h1 class="bg-light text-center">Home</h1>
  <div class="container">
    <div class="row" v-if="store.options">
      <div class="col-12">
        <h2>categories</h2>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">name</th>
              <th scope="col">description</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="category in store.options.categories">
              <th scope="row">{{ category.id }}</th>
              <td>{{ category.name }}</td>
              <td>{{ category.description }}</td>
            </tr>
          </tbody>
        </table>
      </div>

      <hr class="my-5">

      <div class="col-12">
        <h2>promotions</h2>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">title</th>
              <th scope="col">price</th>
              <th scope="col">hours</th>
              <th scope="col">description</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="promotion in store.options.promotions">
              <th scope="row">{{ promotion.id }}</th>
              <td>{{ promotion.title }}</td>
              <td>{{ promotion.price }}</td>
              <td>{{ promotion.hours }}</td>
              <td>{{ promotion.description }}</td>
            </tr>
          </tbody>
        </table>
      </div>

      <hr class="my-5">

      <div class="col-12">
        <h2>services</h2>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">name</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="service in store.options.services">
              <th scope="row">{{ service.id }}</th>
              <td>{{ service.name }}</td>
            </tr>
          </tbody>
        </table>
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


<style lang="scss" scoped></style>