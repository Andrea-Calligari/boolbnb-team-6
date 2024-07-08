<template>
    <div class="container" v-if="apartment">
        <div class="row">
            <div class="col">

                <div id="carouselExampleIndicators" class="carousel slide">

                    <div class="carousel-indicators">
                        <template v-if="apartment.image !== null">
                            <button v-for="(image, i) in apartment.image.split(',')" type="button"
                                data-bs-target="#carouselExampleIndicators" :data-bs-slide-to="i" class="active"
                                :aria-current="i === 0" :aria-label="'Slide ' + i"></button>
                        </template>
                    </div>
                    <div class="carousel-inner">
                        <template v-if="apartment.image !== null">
                            <div v-for="(image, i) in apartment.image.split(',')" class="carousel-item"
                                :class="i === 0 ? 'active' : ''">
                                <img :src="image ? 'http://localhost:8000/' + image : 'http://localhost:8000/uploads/apartment/null.png'"
                                    class="d-block w-100" :alt="apartment.title + ' img ' + i">
                            </div>
                        </template>

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                <div class="card-body">
                    <h2 class="card-title mb-0">{{ apartment.title }} </h2>
                    <span class="badge text-bg-warning ms-2 " v-for="promotion in apartment.promotions">{{
                        promotion.title }}</span>
                    <p class="card-text"><small class="text-body-secondary">{{ apartment.category.name }}</small>
                    </p>
                    <p class="card-text mb-0">Servizi: </p>
                    <span class="badge text-bg-light me-2 " v-for="service in apartment.services">{{ service.name
                        }}</span>
                    <p class="card-text mt-3 mb-0">Descrizione: </p>
                    <p class="card-text">{{ apartment.description }}</p>
                    <p class="card-text">{{ 'Stanze: ' + apartment.rooms_number }}</p>
                    <p class="card-text">{{ 'Bagni: ' + apartment.baths_number }}</p>
                    <p class="card-text">{{ 'Posti letto: ' + apartment.beds_number }}</p>
                    <p class="card-text">{{ `Propietario: ${apartment.user.name} ${apartment.user.surname}` }}</p>
                    <p class="card-text text-end"><small class="text-body-secondary">{{ apartment.address }}</small>
                    </p>

                    <div class="m-3">
                        <iframe style="width: 100%; height: 500px;" frameborder="0" scrolling="no" marginheight="0"
                            marginwidth="0"
                            :src="`https://maps.google.com/maps?q=${apartment.latitude},${apartment.longitude}&hl=it&z=14&amp;output=embed`">
                        </iframe>
                    </div>
                </div>



                <RouterLink v-if="apartment.user_id === store.user.id"
                    :to="{ name: 'apartments.edit', params: { slug: apartment.slug } }" class="btn btn-primary me-2">
                    Modifica
                </RouterLink>

                <RouterLink v-if="apartment.user_id === store.user.id"
                    :to="{ name: 'apartments.promotion', params: { slug: apartment.slug } }"
                    class="btn btn-warning me-2">
                    Sponsorizza
                </RouterLink>


                <button v-if="apartment.user_id === store.user.id" @click="onDelete()"
                    class="btn btn-danger">Delete</button>

                <a v-if="apartment.user_id !== store.user.id" class="btn btn-primary" data-bs-toggle="offcanvas"
                    href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                    Chiedi Informazioni
                </a>


                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
                    aria-labelledby="offcanvasExampleLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <form @submit.prevent="onSend">

                            <div class="mb-4 row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" v-model="name"
                                        :class="store.validate.isV(isVname)" autocomplete="name" autofocus>

                                    <div v-if="store.validate.isV(isVname) === 'is-invalid'" class="mt-0 text-danger">
                                        Il campo non può essere vuoto e non deve superare i 254 caratteri
                                    </div>

                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="surname" class="col-md-4 col-form-label text-md-right">Surname</label>

                                <div class="col-md-6">
                                    <input id="surname" type="text" class="form-control" v-model="surname"
                                        :class="store.validate.isV(isVsurname)" autocomplete="surname" autofocus>


                                    <div v-if="store.validate.isV(isVsurname) === 'is-invalid'"
                                        class="mt-0 text-danger">
                                        Il campo non può essere vuoto e non deve superare i 254 caratteri
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail
                                    Address *</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" v-model="email"
                                        :class="store.validate.isV(isVemail)" required autocomplete="email">

                                    <div v-if="store.validate.isV(isVemail) === 'is-invalid'" class="mt-0 text-danger">
                                        Il campo non può essere vuoto e non deve superare i 254 caratteri
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="text" class="form-label">Testo messaggio *</label>
                                <textarea class="form-control" v-model="text" rows="3"
                                    :class="store.validate.isV(isVtext)" id="text" name="text"
                                    placeholder="Inserisci messaggio"></textarea>
                                <div v-if="store.validate.isV(isVtext) === 'is-invalid'" class="mt-0 text-danger">
                                    Il testo non deve superare i 1000 caratteri
                                </div>
                            </div>

                            <div class="mb-4 row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        invia
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>

</template>

<script>
import { store } from '../../store';
import axios from 'axios';
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
            apartment: null,
            name: '',
            isVname: null,
            surname: '',
            isVsurname: null,
            email: '',
            isVemail: null,
            store,
            text: '',
            isVtext: null,
        }
    },

    methods: {
        async onDelete() {
            await axios.delete(`http://localhost:8000/api/apartments/${this.slug}`).then((res) => {
                this.$router.push({ name: 'apartments.index' });
            }).catch((err) => {
                console.log(err.response.data)
            })


        },

        isFormValidated() {

            this.isVname = this.store.validate._string(this.name, 0)
            this.isVsurname = this.store.validate._string(this.surname, 0)
            this.isVemail = this.store.validate._string(this.email)
            this.isVtext = this.store.validate._string(this.text, 3, 1000)

            if (
                this.isVname &&
                this.isVsurname &&
                this.isVemail &&
                this.isVtext
            ) {
                return true
            } else {
                return false
            }
        },

        async onSend() {
            if (this.isFormValidated()) {
                await axios.post("http://localhost:8000/api/messages", {
                    name: this.name,
                    surname: this.surname,
                    sender_email: this.email,
                    apartment_id: this.apartment.id,
                    text: this.text

                }).then((res) => {
                    console.log(res)
                })
            }
        },

    },
    mounted() {
        console.log(this.$route.params.slug);
        axios.get(`http://127.0.0.1:8000/api/apartments/${this.slug}`).then((res) => {
            console.log(res.data.results[0]);
            this.apartment = res.data.results[0];
        }).catch((err) => {
            console.log(err)
        })

    }
}
</script>

<style lang="scss" scoped></style>