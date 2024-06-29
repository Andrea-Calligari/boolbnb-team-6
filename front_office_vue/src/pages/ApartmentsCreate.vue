<template>
    <div class="container">
        <form @submit.prevent="onCreate">

            <div class="mb-3">
                <label for="title" class="form-label">titolo</label>
                <input type="text" class="form-control" :class="classValidate(isVtitle)" id="title" name="title"
                    v-model="title" placeholder="Inserisci titolo">
                <div v-if="classValidate(isVtitle) === 'is-invalid'" class="mt-0 text-danger">
                    Il campo non può essere vuoto e non deve superare i 254 caratteri
                </div>
            </div>


            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <input type="textarea" class="form-control" :class="classValidate(isVdescription)" id="description"
                    name="description" placeholder="Inserisci Descrizione">
                <div v-if="classValidate(isVdescription) === 'is-invalid'" class="mt-0 text-danger">
                    Il testo non deve superare i 1000 caratteri
                </div>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input type="number" class="form-control" :class="classValidate(isVprice)" step="0.01" id="price" name="price"
                    placeholder="Inserisci Prezzo">
                <div v-if="classValidate(isVprice) === 'is-invalid'" class="mt-0 text-danger">
                    Il prezzo massimo è di 9999,99 e non può essere vuoto
                </div>

            </div>

            <div class="mb-3">
                <label for="rooms_number" class="form-label">N° Stanze</label>
                <input type="number" class="form-control" :class="classValidate(isVroom)" id="rooms_number"
                    name="rooms_number" placeholder="Inserisci N° Stanze">
                <div v-if="classValidate(isVroom) === 'is-invalid'" class="mt-0 text-danger">
                    l'inserzione deve avere almeno una stanza
                </div>
            </div>

            <div class="mb-3">
                <label for="beds_number" class="form-label">N° letti</label>
                <input type="number" class="form-control" :class="classValidate(isVbed)" id="beds_number"
                    name="beds_number" placeholder="Inserisci N° letti">
                <div v-if="classValidate(isVbed) === 'is-invalid'" class="mt-0 text-danger">
                    l'inserzione deve avere almeno un posto letto
                </div>

            </div>

            <div class="mb-3">
                <label for="baths_number" class="form-label">N˚ bagni</label>
                <input type="number" class="form-control" :class="classValidate(isVbath)" id="baths_number"
                    name="baths_number" placeholder="Inserisci N˚ bagni">
                <div v-if="classValidate(isVbath) === 'is-invalid'" class="mt-0 text-danger">
                    l'inserzione deve avere almeno un bagno
                </div>
            </div>

            <div class="mb-3">
                <label for="mtq" class="form-label">Metri quadri</label>
                <input type="number" class="form-control" :class="classValidate(isVmtq)"  id="mtq" name="mtq"
                    v-model="mtq" placeholder="Inserisci Metri quadri">
                <div v-if="classValidate(isVmtq) === 'is-invalid'" class="mt-0 text-danger">
                    l'inserzione deve avere come metratura minima 3mtq
                </div>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">indirizzo</label>
                <input type="text" class="form-control" :class="classValidate(isVaddress)" id="address" name="address"
                    v-model="address" placeholder="Inserisci indirizzo">
                <div v-if="classValidate(isVaddress) === 'is-invalid'" class="mt-0 text-danger">
                    Il campo indirizzo non può essere vuoto e non può superare i 254 caratteri
                </div>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Immagini</label>
                <input class="form-control" type="file" name="image" id="image" multiple>
            </div>


            <div class="mb-3">
                <label for="visible" class="form-label">Visibile</label>
                <select name="visible" id="visible">
                    <option value="">Scegli se rendere visibile il tuo annuncio</option>
                    <option value="1">si</option>
                    <option value="0">no</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
</template>

<script>
import { store } from '../store.js';
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
            isVdescription:null,
            price: 0,
            isVprice:null,
            rooms:0,
            isVroom:null,
            beds:0,
            isVbed:null,
            baths:0,
            isVbath:null,
            mtq:0,
            isVmtq:null,

        }
    },
    methods: {
        classValidate(e) {
            if (e === null) {
                return ''
            }
            if (e === true) {
                return 'is-valid'
            }
            if (e === false) {
                return 'is-invalid'
            }
        },
        isFormValidated() {
            this.isVtitle = this.title.length <= 254 && this.title.length >= 3 ? true : false;
            this.isVaddress = this.address.length <= 254 && this.address.length >= 3 ? true : false;

            if (this.isVtitle && this.isVaddress) {
                return true
            } else {
                return false
            }
        },
        async onCreate() {
            if (this.isFormValidated()) {

                this.position = await fetch(`https://api.tomtom.com/search/2/geocode/${encodeURI(this.address)}.json?key=orDHPznfE908Jeu45AKVaFSiSMAebYfQ`)
                    .then((response) => response.json())
                    .then((data) => { return data.results[0].position })
                    .catch(function (error) {
                        reject(error);
                    });

                console.log(this.position);

                //  this.store.user = 0;
                //  await axios.get("http://localhost:8000/sanctum/csrf-cookie");
                //  await axios.post("http://localhost:8000/api/apartments").then((res) => {
                //     console.log(res.data);
                //  }).catch((err) => {
                //     console.log(err.response.data.message);
                //  });
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