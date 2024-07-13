<template>
    <div class="container py-5">
        <!-- Background-Video -->
        <video class="bg-video" src="../../../public/video/video-loop-create.mp4" autoplay muted loop playsinline
        alt="video bg"></video>
        <h1 class="text-center text-light py-4">
            Aggiungi il tuo appartamento!
        </h1>
        <div class="sign-up-modal">
                <!-- Logo -->
            <div class="text-center">
            <img src="/img/logo.svg" class="logo" alt="Vue logo" />
            </div>
                <!-- Form -->
            <form class="" @submit.prevent="onCreate" enctype="multipart/form-data">

                <!-- Title -->
                <div class="mb-3">
                    <label for="title" class="form-label">titolo *</label>
                    <input type="text" class="form-control" :class="store.validate.isV(isVtitle)" id="title"
                        name="title" v-model="title" placeholder="Inserisci titolo">
                    <div v-if="store.validate.isV(isVtitle) === 'is-invalid'" class="mt-0 text-danger">
                        Il campo non può essere vuoto e non deve superare i 254 caratteri
                    </div>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea class="form-control" v-model="description" rows="3"
                        :class="store.validate.isV(isVdescription)" id="description" name="description"
                        placeholder="Inserisci Descrizione"></textarea>
                    <div v-if="store.validate.isV(isVdescription) === 'is-invalid'" class="mt-0 text-danger">
                        Il testo non deve superare i 1000 caratteri
                    </div>
                </div>

                <!-- Price -->
                <div class="mb-3">
                    <label for="price" class="form-label">Prezzo *</label>
                    <input type="number" class="form-control" v-model="price" :class="store.validate.isV(isVprice)"
                        step="0.01" id="price" name="price" placeholder="Inserisci Prezzo">
                    <div v-if="store.validate.isV(isVprice) === 'is-invalid'" class="mt-0 text-danger">
                        Il prezzo massimo è di 9999,99 e non può essere vuoto
                    </div>

                </div>

                <!-- Rooms -->
                <div class="mb-3">
                    <label for="rooms_number" class="form-label">N° Stanze *</label>
                    <input type="number" class="form-control" v-model="rooms" :class="store.validate.isV(isVrooms)"
                        id="rooms_number" name="rooms_number" placeholder="Inserisci N° Stanze">
                    <div v-if="store.validate.isV(isVrooms) === 'is-invalid'" class="mt-0 text-danger">
                        l'inserzione deve avere almeno una stanza
                    </div>
                </div>

                <!-- Beds -->
                <div class="mb-3">
                    <label for="beds_number" class="form-label">N° letti *</label>
                    <input type="number" class="form-control" v-model="beds" :class="store.validate.isV(isVbeds)"
                        id="beds_number" name="beds_number" placeholder="Inserisci N° letti">
                    <div v-if="store.validate.isV(isVbeds) === 'is-invalid'" class="mt-0 text-danger">
                        l'inserzione deve avere almeno un posto letto
                    </div>

                </div>

                <!-- Baths -->
                <div class="mb-3">
                    <label for="baths_number" class="form-label">N˚ bagni *</label>
                    <input type="number" class="form-control" v-model="baths" :class="store.validate.isV(isVbaths)"
                        id="baths_number" name="baths_number" placeholder="Inserisci N˚ bagni">
                    <div v-if="store.validate.isV(isVbaths) === 'is-invalid'" class="mt-0 text-danger">
                        l'inserzione deve avere almeno un bagno
                    </div>
                </div>

                <!-- Square-Meter -->
                <div class="mb-3">
                    <label for="mtq" class="form-label">Metri quadri *</label>
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

                <!-- Address -->
                <div class="mb-3">
                    <label for="address" class="form-label">indirizzo *</label>
                    <input type="text" @keyup="store.address.searchAddresses(address)" class="form-control"
                        :class="store.validate.isV(isVaddress)" id="address" name="address" v-model="address"
                        placeholder="Inserisci indirizzo" list="position">
                    <datalist id="position">
                        <option v-for="position in store.address.listAddresses">{{ position.address.freeformAddress }}
                        </option>
                    </datalist>
                    <div v-if="store.validate.isV(isVaddress) === 'is-invalid'" class="mt-0 text-danger">
                        Il campo indirizzo non può essere vuoto e non può superare i 254 caratteri e deve essere valido
                    </div>
                </div>

                <!-- Images -->
                <div class="mb-3">
                    <label for="image" class="form-label">Immagini</label>
                    <input class="form-control" type="file" name="image" value="" id="image" multiple>
                </div>

                <!-- Category -->
                <div class="mb-3">
                    <label for="category" class="form-label">Categorie</label>
                    <select name="category" v-model="category" id="category">
                        <option :value="0">Seleziona una categoria</option>
                        <option v-for="cateGory in store.options.categories" :key="cateGory.id" :value="cateGory.id">{{
                            cateGory.name }}</option>
                    </select>
                    <div v-if="store.validate.isV(isVcategory) === 'is-invalid'" class="mt-0 text-danger">
                        Devi selezionare almeno una categoria
                    </div>
                </div>

                    <!-- Services -->
                <div v-if="services.length === 0" class="fs-4"> Seleziona almeno un servizio </div>
                <div class="row row-cols-1 row-cols-sm-1 row-cols-lg-2 mb-3 "
                    :class="isVservices === false ? 'border border-danger rounded' : ''">
                    <div class="col" v-for="serVice in store.options.services">
                        <input type="checkbox" class="btn-check checkbox-input" :id="serVice.name" :value="serVice.id" v-model="services">
                        <label class="btn border-light-subtle service-badge m-1" :for="serVice.name">{{ serVice.name }}</label>
                    </div>
                </div>

                <!-- Visible -->
                <div class="mb-3">
                    <label for="visible" class="form-label">Visibile</label>
                    <select name="visible" class="form-select w-25" v-model="visible" id="visible">
                        <option selected value="1">si</option>
                        <option value="0">no</option>
                    </select>
                </div>
                <button type="submit" class="btn  service-badge ">Crea</button>
               


            </form>
        </div>
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
            category: 0,
            isVcategory: 0,
            services: [],
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
        async onCreate(e) {
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
            }
        },
    },
    computed: {
    },
    mounted() {
    }
}
</script>

<style lang="scss" scoped>
@use '../../assets/scss/partials/_variables.scss' as *;
@use '../../assets/scss/partials/_mixins.scss' as *;
.bg-video{
width: 100%;
  height: 100vh;
  object-fit: cover;
  position: fixed;

  z-index: -1;
  top: 0;
  left: 0;
}
.service-badge {
    @include simple-badge;
    border: solid 1px rgb(202, 202, 202);
    &:hover {
        background: #f4e5cc;
    }
}

.checkbox-input:checked+.service-badge {
    background-color: $dark-yellow;
    color: black;
}

.logo {
  width: 150px;
  padding: 0.5em;

}

.btn{
    background-color: white;
}

.btn:hover{
    background-color: $light-yellow;
}

.button.btn{
    background-color: green;
}

// Form 
.sign-up-modal p,
.sign-up-modal  {
	font-size: 1em;
	font-weight: 300;
}

.sign-up-modal .form-checkbox label {
	cursor: pointer;
}


.sign-up-modal {
	font-family: "Roboto", arial, sans-serif;
	color: #fefefe;
	// border-style: solid;
	// border-width: 2px;
	border-radius: 8px;
    background-color: rgba(231, 215, 215, 0.2);
    ;
    // background-image:url('https://th.bing.com/th/id/R.b5d50511a9209053396cba3208e44ea0?rik=QMMvmdUCiQStTg&pid=ImgRaw&r=0');
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