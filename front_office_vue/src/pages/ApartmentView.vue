<template>
    <div class="container" v-if="apartment">
        <div class="row">
            <div class="col">
                <div class="card">
                    <img :src="apartment.image" class="card-img-top" style="height: 40vh;"
                        :alt="apartment.title + ' img'">
                    <div class="card-body">
                        <h2 class="card-title mb-0">{{ apartment.title }}</h2>
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
                    </div>
                    <RouterLink :to="{ name: 'apartments.edit', params: { slug: apartment.slug } }"
                        class="btn btn-primary">
                        Modifica
                    </RouterLink>


                    <button @click="onDelete()" class="btn btn-danger">Delete</button>

                    <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                        aria-controls="offcanvasExample">
                        Chiedi Informazioni
                    </a>


                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
                        aria-labelledby="offcanvasExampleLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <form @submit.prevent="onSend">

                                <div class="mb-4 row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" v-model="name"
                                            :class="classValidate(isVname)" required autocomplete="name" autofocus>

                                        <div v-if="classValidate(isVname) === 'is-invalid'" class="mt-0 text-danger">
                                            Il campo non può essere vuoto e non deve superare i 254 caratteri
                                        </div>

                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="surname" class="col-md-4 col-form-label text-md-right">Surname</label>

                                    <div class="col-md-6">
                                        <input id="surname" type="text" class="form-control" v-model="surname"
                                            :class="classValidate(isVsurname)" required autocomplete="surname"
                                            autofocus>


                                        <div v-if="classValidate(isVsurname) === 'is-invalid'" class="mt-0 text-danger">
                                            Il campo non può essere vuoto e non deve superare i 254 caratteri
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail
                                        Address</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" v-model="email"
                                            :class="classValidate(isVemail)" required autocomplete="email">

                                        <div v-if="classValidate(isVemail) === 'is-invalid'" class="mt-0 text-danger">
                                            Il campo non può essere vuoto e non deve superare i 254 caratteri
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="text" class="form-label">Testo messaggio</label>
                                    <textarea class="form-control" v-model="text" rows="3"
                                        :class="classValidate(isVtext)" id="text" name="text"
                                        placeholder="Inserisci messaggio"></textarea>
                                    <div v-if="classValidate(isVtext) === 'is-invalid'" class="mt-0 text-danger">
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

    </div>

</template>

<script>
import { store } from '../store';
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
                this.$router.push({ name: 'apartments' });
            }).catch((err) => {
                console.log(err.response.data)
            })


        },

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

        async onSend() {
            await axios.post("http://localhost:8000/api/messages", {
                name: this.name,
                surname: this.surname,
                sender_email: this.email,
                apartment_id: this.apartment.id,
                text: this.text

            }).then((res)=>{
                console.log(res)
            })

        }
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