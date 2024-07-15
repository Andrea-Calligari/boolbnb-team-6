<template>
    <div class="container">
        <div class="row row-cols-2">
            <div class="col-12">
                <!-- Advanced-Search -->
                <div class="accordion mt-2 mb-3" id="fullSerch">
                    <div class="accordion-item rounded-0">
                        <h2 class="accordion-header rounded-0">
                            <button class="accordion-button rounded-0 bg-brand font-brand collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#fullSerch1" aria-expanded="false"
                                aria-controls="fullSerch1">
                                Ricerca avanzata
                            </button>
                        </h2>
                        <div id="fullSerch1" class="accordion-collapse collapse ms_show" data-bs-parent="#fullSerch">
                            <div class="accordion-body">
                                <input type="text" @keyup="search" @keyup.enter="submitSearch"
                                    class="form-control mb-4 rounded-0 responsive-md" aria-label="Recipient's username"
                                    aria-describedby="button-addon2" id="address" name="address"
                                    v-model="store.search.address" placeholder="Inserisci indirizzo" list="position">
                                <datalist id="position">
                                    <option v-for="position in store.address.listAddresses">{{
                                        position.address.freeformAddress }}
                                    </option>
                                </datalist>
                                <!-- Km-distance -->
                                <label for="radius" class="form-label  mb-0">Distanza in Km: <input
                                        v-model="store.search.radius"
                                        :class="store.validate.isV(store.search.isVradius)" type="text" class="raunded"
                                        style="width: 32px;">
                                </label>
                                <div v-if="store.validate.isV(store.search.isVradius) === 'is-invalid'"
                                    class="mt-0 text-danger">
                                    La distanza non può superare i 100 Km.
                                </div>
                                <input type="range" class="form-range custom-range mb-4" min="1" max="50" step="1"
                                    id="radius" v-model="store.search.radius">
                                <!-- Rooms-Number -->
                                <label for="rooms_number" class="form-label mb-0">N˚ stanze <input
                                        v-model="store.search.rooms_number"
                                        :class="store.validate.isV(store.search.isVroomsNum)" type="text"
                                        class="raunded" style="width: 32px;">
                                </label>
                                <div v-if="store.validate.isV(store.search.isVroomsNum) === 'is-invalid'"
                                    class="mt-0 text-danger">
                                    Il numero di stanze non può essere maggiore di 15.
                                </div>
                                <input type="range" class="form-range mb-4 " min="1" max="15" step="1" id="rooms_number"
                                    v-model="store.search.rooms_number">
                                <!-- Beds-Number -->
                                <label for="beds_number" class="form-label mb-0">N˚ letti <input
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
                                <!--Accordion-Services -->
                                <div class="accordion-item rounded-0 mt-4">
                                    <h2 class="accordion-header rounded-0">
                                        <button class="accordion-button bg-brand font-brand rounded-0 collapsed"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#fullSerch2"
                                            aria-expanded="false" aria-controls="fullSerch2">
                                            Servizi
                                        </button>
                                    </h2>
                                    <!--Accordion-Body-Services -->

                                    <div id="fullSerch2" class="accordion-collapse collapse"
                                        data-bs-parent="#fullSerchA">
                                        <div class="accordion-body">
                                            <template v-for="serVice in store.options.services">
                                                <input type="checkbox" class="btn-check font-brand" :id="serVice.name"
                                                    :value="serVice.id" v-model="store.search.service_ids"
                                                    autocomplete="off">
                                                <label class="btn btn-outline-warning font-brand rounded-0 bg-brand m-1"
                                                    :for="serVice.name">{{
                                                        serVice.name }}</label>
                                            </template>
                                        </div>
                                    </div>
                                </div>
                                <button @click="store.search.getSearch()"
                                    class="btn btn-outline-dark mt-3 rounded-0">Cerca</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- If-No-Result -->
            <template v-if="store.search.apartments.length !== 0">
                <ApartmentCard v-for="apartment in store.search.apartments" :key="apartment.id + '-Apartment'"
                    :apartment="apartment" />

            </template>
            <template
                v-else-if='store.search.response == `{"paginated":{"current_page":1,"last_page":0,"apartments":[]}}`'>

                <h1 class="text-center text-dark p-3 w-100">
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
        <button @click="store.search.setPage(n)" class="btn bg-brand font-brand m-4 rounded-0"
            v-for="n in store.search.lastPage">{{ n
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
        search() {
            if (this.$route.fullPath !== '/apartment/search') {
                this.$router.push({ name: 'apartments.search' });
            }
            this.store.address.searchAddresses(this.store.search.address)
            this.store.search.resetDefaultSearch()
        }
    }
}
</script>

<style lang="scss" scoped>
@import '../../assets/scss/partials/variables.scss';
.bg-brand {
    background-color: $light-yellow ;
}

.font-brand {
    color: $dark-blue;
}

input[type="range"] {
    //-webkit-appearance: none;
    background-color: $blue;
    height: 3px;
    width: 100%;
}

input[type="range"]::-webkit-slider-thumb {
    background-color: $dark-yellow;
    border-radius: 0;
    border: none;
    height: 18px;
    opacity: 0.6;
    width: 20px;
}

input[type="range"]::-moz-range-thumb {
    background-color: $dark-yellow;
    border-radius: 0;
    border: none;
    height: 18px;
    opacity: 0.6;
    width: 20px;

}

input[type="range"]::-moz-range-track {
    background: $blue;
    opacity: 0.7;
    border: none;
}

@media screen and (min-width: 768px) {
    .responsive-md {
        display: none;
    }
}

@media screen and (min-width: 576px) {
    .responsive-md {
        display: none;
    }
}

@media screen and (max-width: 568px) {
    .responsive-md {
        display: inline;
    }

    .ms_show {
        display: block;
    }

}
</style>