<template>
    <div class="container">
        <div class="row row-cols-2">
            <div class="col-12">


                <div class="accordion mb-3" id="fullSerch">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#fullSerch1" aria-expanded="false" aria-controls="fullSerch1">
                                Ricerca avanzata
                            </button>
                        </h2>
                        <div id="fullSerch1" class="accordion-collapse collapse" data-bs-parent="#fullSerch">
                            <div class="accordion-body">
                                <!-- <label for="address" class="mb-0">Indirizzo</label>
                                <input type="text" id="address" class="form-control mb-3"
                                    v-model="store.search.address"> -->

                                <label for="radius" class="form-label">Distanza in Km: <input
                                        v-model="store.search.radius"
                                        :class="store.validate.isV(store.search.isVradius)" type="text" class="raunded"
                                        style="width: 32px;">
                                </label>
                                <div v-if="store.validate.isV(store.search.isVradius) === 'is-invalid'"
                                    class="mt-0 text-danger">
                                    La distanza non può superare i 100 Km.
                                </div>
                                <input type="range" class="form-range mb-3" min="1" max="100" step="1" id="radius"
                                    v-model="store.search.radius">



                                <label for="rooms_number" class="form-label">N˚ stanze <input
                                        v-model="store.search.rooms_number"
                                        :class="store.validate.isV(store.search.isVroomsNum)" type="text"
                                        class="raunded" style="width: 32px;">
                                </label>
                                <div v-if="store.validate.isV(store.search.isVroomsNum) === 'is-invalid'"
                                    class="mt-0 text-danger">
                                    Il numero di stanze non può essere maggiore di 15.
                                </div>
                                <input type="range" class="form-range mb-3" min="1" max="15" step="1" id="rooms_number"
                                    v-model="store.search.rooms_number">


                                <label for="beds_number" class="form-label">N˚ letti <input
                                        v-model="store.search.beds_number"
                                        :class="store.validate.isV(store.search.isVbedsNum)" type="text" class="raunded"
                                        style="width: 32px;">
                                </label>
                                <div v-if="store.validate.isV(store.search.isVbedsNum) === 'is-invalid'"
                                    class="mt-0 text-danger">
                                    Il numero di letti non può essere maggiore di 15.
                                </div>
                                <input type="range" class="form-range mb-3" min="1" max="15" step="1" id="beds_number"
                                    v-model="store.search.beds_number">


                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#fullSerch2" aria-expanded="false"
                                            aria-controls="fullSerch2">
                                            Servizi
                                        </button>
                                    </h2>
                                    <div id="fullSerch2" class="accordion-collapse collapse"
                                        data-bs-parent="#fullSerchA">
                                        <div class="accordion-body">
                                            <template v-for="serVice in store.options.services">
                                                <input type="checkbox" class="btn-check" :id="serVice.name"
                                                    :value="serVice.id" v-model="store.search.service_ids"
                                                    autocomplete="off">
                                                <label class="btn btn-outline-primary m-1" :for="serVice.name">{{
                                                    serVice.name }}</label>
                                            </template>
                                        </div>
                                    </div>
                                </div>
                                <button @click="store.search.getSearch()"
                                    class="btn btn-outline-dark mt-3">Cerca</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <template v-if="store.search.apartments.length !== 0">
                <template v-for="apartment in store.search.apartments" :key="apartment.id" :slug="apartment.slug">
                    
                        <div class="col">
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
                                    <p class="card-text" v-if="apartment.distance === 0">Distanza: 0Km</p>
                                    <p class="card-text" v-if="apartment.distance">Distanza: {{
                                        apartment.distance.toFixed(2)
                                        }}Km</p>

                                    <p class="card-text" v-else>{{ apartment.description }}</p>
                                    <p class="card-text" v-if="isSponsored(apartment)">SPONSORIZZATA</p>
                                    <p class="card-text">{{ apartment.address }}</p>
                                    <RouterLink :to="{ name: 'apartments.show', params: { slug: apartment.slug } }"
                                        class="btn btn-primary">
                                        Mostra più dettagli
                                    </RouterLink>
                                </div>
                            </div>
                        </div>
                    
                
                
                    
                    
                </template>
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

        }
    },

    methods: {
        isSponsored(apartment){
            const nowDate = new Date();
            for(let i = 0; i< apartment.promotions.length;i++){
                const startDate = new Date(apartment.promotions[i].pivot.start_date);
                const expirationDate = new Date(apartment.promotions[i].pivot.expiration_date)
                if(startDate < nowDate && expirationDate > nowDate ){
                    return true
                }
            }
            return false
            
            //console.log(apartment)
            //return true
        }

    },
    mounted() {
        if (!this.store.search.apartments.length) {
            this.store.search.getAll();

        }


    }
}
</script>

<style lang="scss" scoped></style>