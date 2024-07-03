<template>
    <div class="container">
        <div class="row row-cols-2">
            <div class="col-12">
                <p>Cerca</p>
                <input type="text" v-model="search">
                <button @click="getSearch" class="btn btn-outline-dark">Cerca</button>
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
                            <p class="card-text">{{ apartment.description }}</p>
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
            search: 'Via del Quadraro, 27, Roma'
        }
    },

    methods: {
        async getSearch() {
            const position = await fetch(`https://api.tomtom.com/search/2/geocode/${encodeURI(this.search)}.json?key=orDHPznfE908Jeu45AKVaFSiSMAebYfQ`)
                .then((response) => response.json())
                .then((data) => { return data.results[0].position })
                .catch(function (error) {
                    reject(error);
                });

            console.log(position);

            await axios.get(`http://localhost:8000/api/apartments/search?lat=${position.lat}&lon=${position.lon}`).then((res) => {
                console.log(res);
                this.apartments = res.data.apartments
            })


        }
    },
    mounted() {

    }
}
</script>

<style lang="scss" scoped></style>