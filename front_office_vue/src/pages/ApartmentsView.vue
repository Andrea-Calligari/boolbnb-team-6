<template>
    <div class="container">
        <div class="row row-cols-2">
            <div class="col" v-for="apartment in apartments" :key="apartment.id" :slug="apartment.slug">
                <div class="card mb-3">
                    <img :src="apartment.image" height="300" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ apartment.title }}</h5>
                        <p class="card-text">{{ apartment.description }}</p>
                        <RouterLink :to="{name:'apartment', params:{slug:apartment.slug}}" class="btn btn-primary">Mostra più dettagli</RouterLink>
                    </div>
                </div>
            </div>

        </div>
    </div>

</template>

<script>
import axios from "axios";
export default {
    data(){
        return{
            apartments:null
        }
    },

    methods: {
        fetchApartments() {
            axios.get("http://localhost:8000/api/apartments").then((res) => {
                console.log(res.data)
                this.apartments = res.data[0]
            });
        }
    },
    mounted() {
        this.fetchApartments()
    }
}

</script>

<style lang="scss" scoped></style>