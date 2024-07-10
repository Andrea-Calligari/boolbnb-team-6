<template>
    <div class="col-4 col-md-6 col-sm-12 py-3">
        <div class="card apartment-card rounded-0 h-100">
            <img :src="apartmentImageUrl" class="card-img-top rounded-0" alt="...">
            <div class="card-body">
                <div class="d-flex mb-2 text-muted">
                    <div class="card-subtitle ">Stanze: {{ apartment.rooms_number }}</div>
                    <div class="card-subtitle"><span class="material-symbols-rounded">
                            bed</span> {{ apartment.beds_number }}</div>
                    <div class="card-subtitle">Bagni: {{ apartment.beds_number }}</div>
                </div>
                <h5 class="card-title">{{ apartment.title }}</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        apartment: {
            type: Object,
            required: true
        }
    },
    data() {

    },
    computed: {

        apartmentImageUrl() {
            return `http://localhost:8000/${this.apartment.image.split(',')[0]}`
        }
    }
}
</script>

<style lang="scss" scoped>
@use '../assets/scss/partials/variables.scss';
</style>