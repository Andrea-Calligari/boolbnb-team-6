<template>
    <div class="container">
        <div class="row row-cols-2">
            <div class="col-12">
                <h3 class="mb-0">Indirizzo</h3>
                <input type="text" class="mb-3" v-model="store.search.address">
                <h3 class="mb-0">radius</h3>
                <input type="text" class="mb-3" v-model="radius">
                <h3 class="mb-0">rooms_number</h3>
                <input type="text" class="mb-3" v-model="rooms_number">
                <h3 class="mb-0">beds_number</h3>
                <input type="text" class="mb-3" v-model="beds_number">

                <h3 class="mb-0">services</h3>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 mb-3">
                    <div class="col" v-for="serVice in store.options.services">
                        <input type="checkbox" :id="serVice.name" :value="serVice.id" v-model="service_ids">
                        <label :for="serVice.name">{{ serVice.name }}</label>
                    </div>
                </div>


                <button @click="search" class="btn btn-outline-dark">Cerca</button>
            </div>
            <template v-if="apartments.length !== 0">

                <div class="col" v-for="apartment in apartments" :key="apartment.id" :slug="apartment.slug">
                    <div class="card mb-3">
                        <template v-if="apartment.image !== null">
                            <div v-for="(image, i) in apartment.image.split(',')" :key="'image' + apartment.id">
                                <img v-if="i === 0"
                                    :src="image ? 'http://localhost:8000/' + image : 'http://localhost:8000/uploads/apartment/img_default/null.png'"
                                    height="300" class="card-img-top" alt="...">
                            </div>
                        </template>
                        <div class="card-body">
                            <h5 class="card-title">{{ apartment.title }}</h5>

                            <p class="card-text" v-if="apartment.distance">Distanza: {{ apartment.distance.toFixed(2) }}Km</p>
                            <p class="card-text" v-else>{{ apartment.description }}</p>
                            <p class="card-text">{{ apartment.address }}</p>
                            <RouterLink :to="{ name: 'apartments.show', params: { slug: apartment.slug } }"
                                class="btn btn-primary">
                                Mostra più dettagli
                            </RouterLink>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>

</template>

<script>
import axios from 'axios';
import { store } from '../../store.js';
export default {
    data() {
        return {
            store,
            apartments: [],
            radius: 20,
            rooms_number: 1,
            beds_number: 1,
            service_ids: [],
        }
    },

    methods: {
        search(){
            this.store.search.getSearch(this.radius, this.rooms_number, this.beds_number, this.service_ids).then((res)=>{
                this.apartments = res;
            })
        }
    },
    mounted() {
        this.store.apartment.getAll().then((res) => {
            this.apartments = res
        })
    }
}
</script>

<style lang="scss" scoped></style>