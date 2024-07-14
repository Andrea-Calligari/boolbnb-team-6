<template>
    <form @submit.prevent="onEdit">
        <!-- titolo indirizzo e numero stanze/bagni ecc-->
        <div class="container my-5 ">
            <!-- Background-Video -->
            <video class="bg-video" src="../../../public/video/video-loop-edit.mp4" autoplay muted loop playsinline
                alt="video bg"></video>
            <h2 class="text-center">Modifica Inserzione</h2>
            <div class="sign-up-modal">
                <div class="row">
                    <div class="col-12 mb-4">
                        <!-- Logo -->
                        <div class="text-center">
                            <img src="/img/logo.svg" class="logo" alt="Vue logo" />
                        </div>
                    </div>
                    <div class="carousel-col">
                        <div class="mb-3">
                            <label for="image" class="form-label">Immagini</label>
                            <input class="form-control" type="file" name="image" value="" id="image" multiple>
                        </div>
                        <div v-for="(img, i) in image" class="position-relative d-inline-block mx-2">
                            <img class="" :src="'http://localhost:8000/' + img" width="100" alt="">
                            <span role="button"
                                class="pointer position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger p-1 px-2"
                                @click="removeImage(i)">
                                x
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </div>
                    </div>
                    <div class="title-price-col">
                        <div class="title-price-section">
                            <div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Titolo</label>
                                    <input type="text" class="form-control" :class="store.validate.isV(isVtitle)"
                                        id="title" name="title" v-model="title" placeholder="Inserisci titolo">
                                    <div v-if="store.validate.isV(isVtitle) === 'is-invalid'" class="mt-0 text-danger">
                                        Il campo non può essere vuoto e non deve superare i 254 caratteri
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Indirizzo</label>
                                    <input type="text" @keyup="store.address.searchAddresses(address)"
                                        class="form-control" :class="store.validate.isV(isVaddress)" id="address"
                                        name="address" v-model="address" placeholder="Inserisci indirizzo"
                                        list="position">
                                    <datalist id="position">
                                        <option v-for="position in store.address.listAddresses">{{
                                            position.address.freeformAddress }}
                                        </option>
                                    </datalist>
                                    <div v-if="store.validate.isV(isVaddress) === 'is-invalid'"
                                        class="mt-0 text-danger">
                                        Il campo indirizzo non può essere vuoto e non può superare i 254 caratteri e
                                        deve
                                        essere valido
                                    </div>
                                </div>
                                <div class="d-flex mb-2 gap-3 text-small">
                                    <div>
                                        <label for="mtq" class="form-label">Metri quadri</label>
                                        <input type="number" class="form-control" :class="store.validate.isV(isVmtq)"
                                            id="mtq" name="mtq" v-model="mtq" placeholder="Inserisci Metri quadri">
                                        <div v-if="store.validate.isV(isVmtq) === 'is-invalid'"
                                            class="mt-0 text-danger">
                                            l'inserzione deve avere come metratura minima 3mtq
                                        </div>
                                    </div>
                                    <div>
                                        <div class="d-flex align-items-center gap-1 mb-2">
                                            <span class="material-symbols-sharp pb-0">
                                                home
                                            </span>
                                            <label for="rooms_number">Stanze</label>
                                        </div>
                                        <input type="number" class="form-control" v-model="rooms"
                                            :class="store.validate.isV(isVrooms)" id="rooms_number" name="rooms_number"
                                            placeholder="Inserisci N° Stanze">
                                        <div v-if="store.validate.isV(isVrooms) === 'is-invalid'"
                                            class="mt-0 text-danger">
                                            l'inserzione deve avere almeno una stanza
                                        </div>
                                    </div>
                                    <div>
                                        <div class="d-flex align-items-center gap-1 mb-2">
                                            <span class="material-symbols-sharp pb-0">
                                                bed
                                            </span>
                                            <label for="beds_number">Letti</label>
                                        </div>
                                        <input type="number" class="form-control" v-model="beds"
                                            :class="store.validate.isV(isVbeds)" id="beds_number" name="beds_number"
                                            placeholder="Inserisci N° letti">
                                        <div v-if="store.validate.isV(isVbeds) === 'is-invalid'"
                                            class="mt-0 text-danger">
                                            l'inserzione deve avere almeno un posto letto
                                        </div>
                                    </div>
                                    <div>
                                        <div class="mb-0 d-flex align-items-center gap-1 mb-2">
                                            <span class="material-symbols-sharp pb-0">
                                                bathtub
                                            </span>
                                            <label for="baths_number">Bagni</label>
                                        </div>
                                        <input type="number" class="form-control" v-model="baths"
                                            :class="store.validate.isV(isVbaths)" id="baths_number" name="baths_number"
                                            placeholder="Inserisci N˚ bagni">
                                        <div v-if="store.validate.isV(isVbaths) === 'is-invalid'"
                                            class="mt-0 text-danger">
                                            l'inserzione deve avere almeno un bagno
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="price-section ">
                                <div class="mb-3">
                                    <label for="price" class="form-label">Prezzo a notte

                                    </label>
                                    <input type="number" class="form-control" v-model="price"
                                        :class="store.validate.isV(isVprice)" step="0.01" id="price" name="price"
                                        placeholder="Inserisci Prezzo">
                                    <div v-if="store.validate.isV(isVprice) === 'is-invalid'" class="mt-0 text-danger">
                                        Il prezzo massimo è di 1200 e non può essere vuoto
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- info appartamento -->
                <div class=" row">
                    <div class="col">
                        <div class="host-btns-section">
                            <div class="my-3">
                                <label for="category" class="form-label me-2">Categorie</label>
                                <select class="form-select w-100" name="category" v-model="category" id="category">
                                    <option :value="0">Seleziona una categoria</option>
                                    <option v-for="cateGory in store.options.categories" :key="cateGory.id"
                                        :value="cateGory.id">{{
                                            cateGory.name }}</option>
                                </select>
                                <div v-if="store.validate.isV(isVcategory) === 'is-invalid'" class="mt-0 text-danger">
                                    Devi selezionare almeno una categoria
                                </div>
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
                        <p for="description" class="form-label">Servizi:</p>
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 mb-3"
                            :class="isVservices === false ? 'border border-danger rounded' : ''">
                            <div class="col" v-for="(serVice, i) in store.options.services " :key=serVice.id>
                                <input type="checkbox" class="btn-check checkbox-input"
                                    :checked="serVice.id === services[i]" :id="serVice.name" :value="serVice.id"
                                    v-model="services">
                                <label class="btn border-light-subtle service-badge rounded-0 m-1"
                                    :for="serVice.name">{{
                                        serVice.name
                                    }}</label>
                            </div>
                        </div>
                        <div v-if="services.length === 0"> Devi selezionare almeno 1 servizio</div>
                        <div class="mb-3">
                            <label for="visible" class="form-label">Visibile</label>
                            <select name="visible" class="form-select w-25" v-model="visible" id="visible">
                                <option selected value="1">si</option>
                                <option value="0">no</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-blue rounded-0">Submit</button>
                </div>
            </div>
        </div>
    </form>

</template>

<style lang="scss" scoped>
@use '../../assets/scss/partials/variables.scss' as *;
@use '../../assets/scss/partials/mixins.scss' as *;

.bg-video {
    width: 100%;
    height: 100vh;
    object-fit: cover;
    position: fixed;

    z-index: -1;
    top: 0;
    left: 0;
}

.logo {
    width: 150px;
    padding: 0.5em;

}

.price-badge {
    @include simple-badge;
    background: $light-yellow;
    background: linear-gradient(180deg, $light-yellow 40%, $dark-yellow 100%);
}

.service-badge {
    @include simple-badge;
    border: solid 1px rgb(202, 202, 202);
    background-color: white;

    &:hover {
        background: #f4e5cc;
    }
}

.checkbox-input:checked+.service-badge {
    background-color: #f4e5cc;
}

.apartment-title {
    color: $dark-yellow
}

.host-btns-section {
    display: flex;
    justify-content: space-between;
}

.btn-blue {
    background-color: $dark-blue;
    color: white;

    &:hover {
        background-color: $blue;
    }
}

.title-price-section {
    display: flex;
    flex-direction: column;
}

.price-section {
    margin-top: 10px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: flex-start;
}

.title-price-col {
    width: 100%;
    order: 1
}

.carousel-col {
    width: 100%;
    order: 2
}

// Form 
.sign-up-modal p,
.sign-up-modal {
    font-size: 1em;
    font-weight: 300;
}

.sign-up-modal .form-checkbox label {
    cursor: pointer;
}


.sign-up-modal {
    font-family: "Roboto", arial, sans-serif;
    // border-style: solid;
    // border-width: 2px;
    border-radius: 8px;
    background-color: rgba(231, 215, 215, 0.2);
    //background: url('https://images.pexels.com/photos/1571460/pexels-photo-1571460.jpeg') no-repeat 0 50%;
    background-size: cover;
    width: 100%;
    margin: 0 auto;
    padding: 25px;
}

.sign-up-modal form {
    margin: 0 auto;

}

.sign-up-modal .input-container {
    margin: 10px;
}

.sign-up-modal input[type="email"],
.sign-up-modal input[type="text"],
.sign-up-modal input[type="password"],
.sign-up-modal input[type="checkbox"]:focus,
.sign-up-modal input[type="submit"]:focus {

    outline: 0;
}

.sign-up-modal input[type="email"],
.sign-up-modal input[type="text"],
.sign-up-modal input[type="password"] {

    font-size: 1.4em;
    padding: 10px;
    border-color: rgba(180, 178, 173, 0.623);
    border-style: solid;

}

.sign-up-modal input[type="email"]:focus,
.sign-up-modal input[type="text"]:focus,
.sign-up-modal input[type="password"]:focus {
    background: white;
    transition: all 0.3s ease;

}

.sign-up-modal a {
    color: #fefefe;
    text-decoration: underline;
}

.sign-up-modal a:hover {
    color: #d26960;
}

.sign-up-modal input[type="submit"] {
    font-weight: 700;
    font-size: 1.8em;
    color: #111;
    background: #fefefe;
    box-shadow: 0px 4px 0px 0px #d26a60;
    border-style: none;
    padding: 10px 50px;
    margin: 25px 0 15px 0;
    position: relative;
    display: inline-block;
    transition: all .1s linear;
}

.sign-up-modal input[type="submit"]:active {
    box-shadow: 0 2px 0 #d26a60;
    transform: translateY(3px);
    -webkit-transform: translateY(3px);
    -ms-transform: translateY(3px);
}

// MEDIA QUERY FORM

@media only screen and (min-width: 768px) {
    .sign-up-modal .form-checkbox {
        text-align: left;
    }

    .sign-up-modal .password-input {
        width: 47.5%;
        margin-left: -11.5%;
    }

    .sign-up-modal .username-input {
        width: 47.5%;
    }

    .sign-up-modal .email-input {
        margin-bottom: 20px;
        margin-top: 50px;
    }

    .sign-up-modal form {
        width: 70%;
    }
}
</style>

<script>
import { store } from '../../store.js';
import axios from 'axios'
axios.defaults.withCredentials = true;
axios.defaults.withXSRFToken = true;
export default {
    props: {
        slug: {
            type: String,
            required: true
        }
    },
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
            price: 0,
            isVprice: null,
            rooms: 0,
            isVrooms: null,
            beds: 0,
            isVbeds: null,
            baths: 0,
            isVbaths: null,
            mtq: 0,
            isVmtq: null,
            visible: '1',
            isVvisible: null,
            image: [],
            isVimage: null,
            category: 1,
            isVcategory: 0,
            services: [],
            user_id: 0,
            isVservices: null
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
            this.isVcategory = this.store.validate._integer(this.category, 1, store.options.categories.length)
            this.isVvisible = this.store.validate._boolean(this.visible)
            this.isVservices = this.services.length != 0

            if (
                this.isVtitle &&
                this.isVdescription &&
                this.isVprice &&
                this.isVrooms &&
                this.isVbeds &&
                this.isVbaths &&
                this.isVmtq &&
                this.isVaddress &&
                this.isVvisible &&
                this.isVservices &&
                this.isVcategory
            ) {
                return true
            } else {
                return false
            }
        },
        async onEdit(e) {
            if (this.isFormValidated()) {

                this.position = await fetch(`https://api.tomtom.com/search/2/geocode/${encodeURI(this.address)}.json?key=orDHPznfE908Jeu45AKVaFSiSMAebYfQ`)
                    .then((response) => response.json())
                    .then((data) => { return data.results[0].position })
                    .catch((error) => {
                        console.log(error);
                        window.scrollTo(0, 0)
                        this.isVaddress = false
                        return false
                    });
                if (this.position) {


                    console.log(this.position);

                    await axios.post(`http://localhost:8000/api/apartments/${this.slug}`, {
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
                        image: e.target.elements["image"].files,
                        oldImage: this.image.join(',')

                    }, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }).then((res) => {
                        console.log(res);
                        const apartmentSlug = res.data.apartment.slug;
                        this.$router.push({ name: 'apartments.show', params: { slug: apartmentSlug } });
                    }).catch((err) => {
                        console.log(err.response.data.message);
                    });
                }
            }
        },

        removeImage(i) {
            this.image = this.image.toSpliced(i, 1)
        }


    },
    computed: {
    },
    mounted() {
        axios.get(`http://localhost:8000/api/apartments/${this.slug}/data`).then((res) => {

            let results = res.data.apartment
            if (this.store.user.id === results.user_id) {
                this.user_id = results.user_id
            } else {
                this.$router.push({ name: 'not-found' });
            }
            this.title = results.title
            this.address = results.address
            this.mtq = results.mtq
            this.description = results.description
            this.position = {
                lon: results.longitude,
                lat: results.longitude
            }
            this.price = results.price
            this.rooms = results.rooms_number
            this.beds = results.beds_number
            this.baths = results.baths_number
            this.visible = results.visible
            if (results.image != null) {
                this.image = results.image.split(',')
            }

            this.category = results.category_id
            for (let i = 0; i < results.services.length; i++) {
                this.services.push(results.services[i].id)
            }
        }).catch((err) => {
            console.log(err)
        })


    },

}
</script>