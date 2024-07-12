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
                <ApartmentCard v-for="apartment in store.search.apartments" :key="apartment.id + '-Apartment'"
                    :apartment="apartment" />

            </template>
            <template
                v-else-if='store.search.response == `{"paginated":{"current_page":1,"last_page":0,"apartments":[]}}`'>

                <h1 class="text-center text-secondary p-3 w-100">
                    Non sono stati trovati appartamenti per "{{ store.search.address }}"
                </h1>
            </template>
            <div v-else class="col-12">
                <h1 class="text-center text-secondary p-3">
                    Effettua la ricerca
                </h1>
            </div>

        </div>
    </div>
    <div class="d-flex justify-content-center">
        <button @click="store.search.setPage(n)" class="btn btn-primary m-4" v-for="n in store.search.lastPage">{{ n
            }}</button>
    </div>
</template>

<script>
import { store } from '../../store.js';
import ApartmentCard from '../../components/ApartmentCard.vue'
export default {
    components: {
        ApartmentCard
    },
    data() {
        return {
            store,
        }
    },
    methods: {
    },
    mounted() {
        // if (!this.store.search.apartments.length) {
        //     this.store.search.getAll()
        // }
    }
}
</script>

<style lang="scss" scoped></style>