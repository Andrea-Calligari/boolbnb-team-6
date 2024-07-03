<template>
    <div class="container">
        <form @submit.prevent="onCreate" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="title" class="form-label">titolo</label>
                <input type="text" class="form-control" :class="store.validate.isV(isVtitle)" id="title" name="title"
                    v-model="title" placeholder="Inserisci titolo">
                <div v-if="store.validate.isV(isVtitle) === 'is-invalid'" class="mt-0 text-danger">
                    Il campo non può essere vuoto e non deve superare i 254 caratteri
                </div>
            </div>


            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" v-model="description" rows="3"
                    :class="store.validate.isV(isVdescription)" id="description" name="description"
                    placeholder="Inserisci Descrizione"></textarea>
                <div v-if="store.validate.isV(isVdescription) === 'is-invalid'" class="mt-0 text-danger">
                    Il testo non deve superare i 1000 caratteri
                </div>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input type="number" class="form-control" v-model="price" :class="store.validate.isV(isVprice)"
                    step="0.01" id="price" name="price" placeholder="Inserisci Prezzo">
                <div v-if="store.validate.isV(isVprice) === 'is-invalid'" class="mt-0 text-danger">
                    Il prezzo massimo è di 9999,99 e non può essere vuoto
                </div>

            </div>

            <div class="mb-3">
                <label for="rooms_number" class="form-label">N° Stanze</label>
                <input type="number" class="form-control" v-model="rooms" :class="store.validate.isV(isVrooms)"
                    id="rooms_number" name="rooms_number" placeholder="Inserisci N° Stanze">
                <div v-if="store.validate.isV(isVrooms) === 'is-invalid'" class="mt-0 text-danger">
                    l'inserzione deve avere almeno una stanza
                </div>
            </div>

            <div class="mb-3">
                <label for="beds_number" class="form-label">N° letti</label>
                <input type="number" class="form-control" v-model="beds" :class="store.validate.isV(isVbeds)"
                    id="beds_number" name="beds_number" placeholder="Inserisci N° letti">
                <div v-if="store.validate.isV(isVbeds) === 'is-invalid'" class="mt-0 text-danger">
                    l'inserzione deve avere almeno un posto letto
                </div>

            </div>

            <div class="mb-3">
                <label for="baths_number" class="form-label">N˚ bagni</label>
                <input type="number" class="form-control" v-model="baths" :class="store.validate.isV(isVbaths)"
                    id="baths_number" name="baths_number" placeholder="Inserisci N˚ bagni">
                <div v-if="store.validate.isV(isVbaths) === 'is-invalid'" class="mt-0 text-danger">
                    l'inserzione deve avere almeno un bagno
                </div>
            </div>

            <div class="mb-3">
                <label for="mtq" class="form-label">Metri quadri</label>
                <input type="number" class="form-control" :class="store.validate.isV(isVmtq)" id="mtq" name="mtq"
                    v-model="mtq" placeholder="Inserisci Metri quadri" list="position">
                <datalist id="position">
                    <option v-for="position in store.address.listAddresses">{{ position.address.freeformAddress }}
                    </option>
                </datalist>
                <div v-if="store.validate.isV(isVmtq) === 'is-invalid'" class="mt-0 text-danger">
                    l'inserzione deve avere come metratura minima 3mtq
                </div>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">indirizzo</label>
                <input type="text" @keyup="store.address.searchAddresses(address)" class="form-control"
                    :class="store.validate.isV(isVaddress)" id="address" name="address" v-model="address"
                    placeholder="Inserisci indirizzo" list="position">
                <datalist id="position">
                    <option v-for="position in store.address.listAddresses">{{ position.address.freeformAddress }}
                    </option>
                </datalist>
                <div v-if="store.validate.isV(isVaddress) === 'is-invalid'" class="mt-0 text-danger">
                    Il campo indirizzo non può essere vuoto e non può superare i 254 caratteri
                </div>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Immagini</label>
                <input class="form-control" type="file" name="image" value="" id="image" multiple>
            </div>

            <!-- <div class="mb-3">
                <label for="image" class="form-label">Immagini</label>
                <input type="text" class="form-control" :class="store.validate.isV(isVimage)" id="image" name="image"
                    v-model="image" placeholder="Inserisci titolo">
                <div v-if="store.validate.isV(isVimage) === 'is-invalid'" class="mt-0 text-danger">
                    Il campo non può essere vuoto e non deve superare i 254 caratteri
                </div>
            </div> -->

            <div class="mb-3">
                <label for="category" class="form-label">categorie</label>
                <select name="category" v-model="category" id="category">
                    <option v-for="cateGory in store.options.categories" :key="cateGory.id" :value="cateGory.id">{{
                        cateGory.name }}</option>

                </select>
            </div>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 mb-3">
                <div class="col" v-for="serVice in store.options.services">
                    <input type="checkbox" :id="serVice.name" :value="serVice.id" v-model="services">
                    <label :for="serVice.name">{{ serVice.name }}</label>
                </div>
            </div>



            <div class="mb-3">
                <label for="visible" class="form-label">Visibile</label>
                <select name="visible" v-model="visible" id="visible">
                    <option selected value="1">si</option>
                    <option value="0">no</option>
                </select>
            </div>



            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
</template>

<script>
import { store } from '../../store.js';
import axios from 'axios'
axios.defaults.withCredentials = true;
axios.defaults.withXSRFToken = true;
export default {
    data() {
        return {
            store,
            title: '',
            isVtitle: null,
            address: '',
            isVaddress: null,
            mtq: '',
            position: null,
            description: '',
            isVdescription: null,
            price: 1,
            isVprice: null,
            rooms: 1,
            isVrooms: null,
            beds: 1,
            isVbeds: null,
            baths: 1,
            isVbaths: null,
            mtq: 1,
            isVmtq: null,
            visible: '1',
            isVvisible: null,
            image: [],
            isVimage: null,
            category: 1,
            services: []

        }
    },
    methods: {
        isFormValidated() {

            this.isVtitle = this.store.validate._string(this.title)
            this.isVdescription = this.store.validate._string(this.description, 0, 1000)
            this.isVprice = this.store.validate._decimal(this.price)
            this.isVrooms = this.store.validate._integer(this.rooms)
            this.isVbeds = this.store.validate._integer(this.beds)
            this.isVbaths = this.store.validate._integer(this.baths)
            this.isVmtq = this.store.validate._integer(this.mtq, 1, 99999)
            this.isVaddress = this.store.validate._string(this.address)
            // validate image 
            this.isVvisible = this.store.validate._boolean(this.visible)

            if (
                this.isVtitle &&
                this.isVdescription &&
                this.isVprice &&
                this.isVrooms &&
                this.isVbeds &&
                this.isVbaths &&
                this.isVmtq &&
                this.isVaddress &&
                this.isVvisible
            ) {
                return true
            } else {
                return false
            }
        },
        async onCreate(e) {
            // console.dir(e.target.elements["image"].value);

            if (this.isFormValidated()) {

                this.position = await fetch(`https://api.tomtom.com/search/2/geocode/${encodeURI(this.address)}.json?key=orDHPznfE908Jeu45AKVaFSiSMAebYfQ`)
                    .then((response) => response.json())
                    .then((data) => { return data.results[0].position })
                    .catch(function (error) {
                        reject(error);
                    });

                console.log(this.position);

                await axios.post("http://localhost:8000/api/apartments", {
                    title: this.title,
                    description: this.description,
                    price: this.price,
                    rooms_number: this.rooms,
                    beds_number: this.beds,
                    baths_number: this.baths,
                    mtq: this.mtq,
                    address: this.address,
                    latitude: this.position.lat,
                    longitude: this.position.lon,
                    visible: this.visible,
                    user_id: this.store.user.id,
                    category_id: this.category,
                    services_ids: this.services,
                    image: e.target.elements["image"].files
                }, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then((res) => {
                    const apartmentSlug = res.data.apartment.slug;
                    this.$router.push({ name: 'apartments.show', params: { slug: apartmentSlug } });
                }).catch((err) => {
                    console.log(err.response.data.message);
                });
            }
        },
    },
    computed: {
    },
    mounted() {
    }
}
</script>

<style lang="scss" scoped></style>