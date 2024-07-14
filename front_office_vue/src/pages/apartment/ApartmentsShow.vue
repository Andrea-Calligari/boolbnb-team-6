<template>

    <!-- Carousel and Title -->
    <section class="carousel-section py-4">
        <div class="container" v-if="apartment">
            <div class="row">
                <div class="carousel-col">
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
                </div>
                <div class="title-price-col">
                    <div class="title-price-section">
                        <div>
                            <h2 class="apartment-title">{{ apartment.title }} </h2>
                            <p class="text-muted">{{ apartment.address }}</p>
                            <div class="d-flex mb-2 text-muted gap-3 text-small">
                                <div>{{ apartment.mtq }} mq</div>
                                <div class="d-flex align-items-center gap-1">
                                    <span class="material-symbols-sharp pb-0">
                                        home
                                    </span>
                                    <span>{{ apartment.rooms_number }}</span>
                                </div>
                                <div class="d-flex align-items-center gap-1">
                                    <span class="material-symbols-sharp pb-0">
                                        bed
                                    </span>
                                    <span>{{ apartment.beds_number }}</span>
                                </div>
                                <div class="mb-0 d-flex align-items-center gap-1">
                                    <span class="material-symbols-sharp pb-0">
                                        bathtub
                                    </span>
                                    <span>{{ apartment.baths_number }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- Price section -->
                        <div class="price-section ">
                            <div class="price-badge d-flex gap-1 p-2">
                                <h4 class="mb-0 align-self-center">&euro;{{ apartment.price }}</h4><span
                                    class="align-self-end">
                                    a notte</span>
                            </div>
                            <p v-if="apartment.user_id === store.user.id" class="text-end mt-2">{{ expDate }}</p>
                            <!-- Contact-Form -->
                            <form @submit.prevent="onSend" v-if="apartment.user_id !== store.user.id" class="
                                message-form mt-4">
                                <h5>Contatta il proprietario</h5>
                                <div class="mb-2 d-flex">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>

                                    <div class="">
                                        <input id="name" type="text" class="form-control" v-model="name"
                                            :class="store.validate.isV(isVname)" autocomplete="name" autofocus>

                                        <div v-if="store.validate.isV(isVname) === 'is-invalid'"
                                            class="mt-0 text-danger">
                                            Il campo non può essere vuoto e non deve superare i 254 caratteri
                                        </div>

                                    </div>
                                </div>

                                <div class="mb-2 d-flex">
                                    <label for="surname" class="col-md-4 col-form-label text-md-right">Cognome</label>

                                    <div class="">
                                        <input id="surname" type="text" class="form-control" v-model="surname"
                                            :class="store.validate.isV(isVsurname)" autocomplete="surname" autofocus>


                                        <div v-if="store.validate.isV(isVsurname) === 'is-invalid'"
                                            class="mt-0 text-danger">
                                            Il campo non può essere vuoto e non deve superare i 254 caratteri
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-2 d-flex">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">E-mail
                                        *</label>

                                    <div class="">
                                        <input id="email" type="email" class="form-control" v-model="email"
                                            :class="store.validate.isV(isVemail)" required autocomplete="email">

                                        <div v-if="store.validate.isV(isVemail) === 'is-invalid'"
                                            class="mt-0 text-danger">
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

                                <div class="row mb-0">
                                    <div class="">
                                        <button type="submit" class="btn btn-blue rounded-0">
                                            invia
                                        </button>
                                    </div>
                                </div>
                                <div class="m-2  text-center text-success fs-3" v-if="send === true">Messaggio Inviato!</div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- info appartamento -->
    <section class="info-section pb-3">
        <div class="container" v-if="apartment">
            <div class="row">
                <div class="col">
                    <div class="host-btns-section">
                        <p>{{ apartment.category.name }} di proprietà di <span class="fw-bold dark-blue-font">{{
                            apartment.user.name }} {{
                                    apartment.user.surname
                                }}</span>
                        </p>
                        <div>
                            <RouterLink v-if="apartment.user_id === store.user.id"
                                :to="{ name: 'apartments.edit', params: { slug: apartment.slug } }"
                                class="btn btn-blue me-2 rounded-0">
                                Modifica
                            </RouterLink>

                            <RouterLink v-if="apartment.user_id === store.user.id"
                                :to="{ name: 'apartments.promotion', params: { slug: apartment.slug } }"
                                class="btn btn-blue me-2 rounded-0">
                                Sponsorizza
                            </RouterLink>

                            <RouterLink v-if="apartment.user_id === store.user.id"
                                :to="{ name: 'dashboard.statistic', params: { slug: apartment.slug } }"
                                class="btn btn-blue me-2 rounded-0">
                                Statistiche
                            </RouterLink>

                            <button v-if="apartment.user_id === store.user.id" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop" class="btn btn-blue rounded-0">Elimina</button>

                            <a v-if="apartment.user_id !== store.user.id" class="btn ask-info-btn btn-blue rounded-0"
                                data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                                aria-controls="offcanvasExample">
                                Chiedi Informazioni
                            </a>
                        </div>
                    </div>
                    <p class="card-text mt-2">{{ apartment.description }}</p>
                    <div class="d-flex"></div>
                    <span class="service-badge me-3 mt-2" v-for="service in apartment.services">
                        {{ service.name
                        }}
                    </span>
                </div>
            </div>
        </div>
    </section>

    <!--offcanvas -->
    <div class="container" v-if="apartment">
        <div class="row">
            <div class="col">
                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
                    aria-labelledby="offcanvasExampleLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Contatta il proprietario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"
                            id="close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <form @submit.prevent="onSend">

                            <div class="mb-4 row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" v-model="name"
                                        :class="store.validate.isV(isVname)" autocomplete="name" autofocus>

                                    <div v-if="store.validate.isV(isVname) === 'is-invalid'" class="mt-0 text-danger">
                                        Il campo non può essere vuoto e non deve superare i 254 caratteri
                                    </div>

                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="surname" class="col-md-4 col-form-label text-md-right">Cognome</label>

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
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-mail
                                    *</label>

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
                                    <button type="submit" class="btn btn-blue">
                                        invia
                                    </button>
                                </div>
                            </div>
                            <div class="mb-4 text-center text-success fs-3" v-if="send === true">Messaggio inviato con successo!</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- mappa google -->
    <section class="map-section">
        <div class="container" v-if="apartment">
            <div class="row">
                <div class="col">
                    <div class="m-3">
                        <iframe style="width: 100%; height: 500px;" frameborder="0" scrolling="no" marginheight="0"
                            marginwidth="0"
                            :src="`https://maps.google.com/maps?q=${apartment.latitude},${apartment.longitude}&hl=it&z=14&amp;output=embed`">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Sei sicuro di voler eliminare l'annuncio?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <button type="button" @click="onDelete()" class="btn btn-primary"
                        data-bs-dismiss="modal">Si</button>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
@use '../../assets/scss/partials/variables.scss' as *;
@use '../../assets/scss/partials/mixins.scss' as *;
section{
    background-image: url('../../public/img/bg-marmo.png');
    background-position: center;
    background-repeat: no-repeat;
}
.price-badge {
    @include simple-badge;
    background: $light-yellow;
    background: linear-gradient(180deg, $light-yellow 40%, $dark-yellow 100%);
}

.service-badge {
    @include simple-badge;
    background: #f4e5cc;
}

.apartment-title {
    color: $dark-yellow
}

.title-price-col {
    width: 50%;
    order: 2
}

.carousel-col {
    width: 50%;
    order: 1
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

.message-form {
    border: solid 2px rgb(239, 239, 239);
    padding: 15px;
    box-shadow: -2px 2px 4px rgba(0, 0, 0, 0.1);
}

.ask-info-btn {
    display: none
}

.btn-blue {
    background-color: $dark-blue;
    color: white;

    &:hover {
        background-color: $blue;
    }
}

.host-btns-section {
    display: flex;
    justify-content: space-between;
}

@media (max-width: 992px) {

    .title-price-section {
        display: flex;
        flex-direction: row;
        justify-content: space-between
    }

    .price-section {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: flex-end;
    }

    .message-form {
        display: none
    }

    .title-price-col {
        width: 100%;
        order: 1
    }

    .carousel-col {
        width: 100%;
        order: 2
    }

    .ask-info-btn {
        display: block
    }
}

@media (max-width: 576px) {

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

    .message-form {
        display: none
    }

    .title-price-col {
        width: 100%;
        order: 1
    }

    .carousel-col {
        width: 100%;
        order: 2
    }

    .ask-info-btn {
        display: block
    }

    .host-btns-section {
        display: block;
    }
}
</style>

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
            send: false,
            timeinterval: null,
            apartmentExpirationPromo: null,
            expDate: null
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

            //this.isVname = this.store.validate._string(this.name, 0)
            //this.isVsurname = this.store.validate._string(this.surname, 0)
            this.isVemail = this.store.validate._string(this.email)
            this.isVtext = this.store.validate._string(this.text, 3, 1000)

            if (
                //this.isVname &&
                //this.isVsurname &&
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
                    //console.log(res)
                    this.send = true

                    setTimeout(function () {
                        document.getElementById('close').click()
                    }, 2000);
                })
            }
        },
        expirationPromotion(apartment) {
            const nowDate = new Date();
            let apartmentExpirationPromo = false;
            apartment.promotions.forEach(promotion => {
                const startDate = new Date(promotion.pivot.start_date);
                const expirationDate = new Date(promotion.pivot.expiration_date)
                if (startDate < nowDate && expirationDate > nowDate) {
                    apartmentExpirationPromo = expirationDate
                }
            });
            if (apartmentExpirationPromo) {
                let oldExpirationDate = null;
                do {
                    oldExpirationDate = apartmentExpirationPromo;
                    apartment.promotions.forEach(promotion => {
                        const startDate = new Date(promotion.pivot.start_date);
                        const expirationDate = new Date(promotion.pivot.expiration_date)
                        const newDate = new Date(apartmentExpirationPromo.getTime() + 2000);
                        if (startDate < newDate && expirationDate > newDate) {
                            apartmentExpirationPromo = expirationDate
                        }
                    });
                } while (apartmentExpirationPromo !== oldExpirationDate);
            }
            if (apartmentExpirationPromo) {
                this.apartmentExpirationPromo = apartmentExpirationPromo
                this.timeinterval = setInterval(this.countdown, 1000);
            }

        },
        countdown() {
            if (this.apartmentExpirationPromo === null) {
                this.expirationPromotion(this.apartment);
            }
            if (this.apartmentExpirationPromo) {
                const t = Date.parse(this.apartmentExpirationPromo) - Date.parse(new Date());
                const seconds = Math.floor((t / 1000) % 60);
                const minutes = Math.floor((t / 1000 / 60) % 60);
                const hours = Math.floor((t / (1000 * 60 * 60)) % 24);
                const days = Math.floor(t / (1000 * 60 * 60 * 24));

                if (days > 0) {
                    this.expDate = `Promozione scade tra ${days}g - ${hours}h:${minutes}m:${seconds}s`
                } else {
                    this.expDate = `Promozione scade tra ${hours}h:${minutes}m:${seconds}s`
                }

                if (t <= 0) {
                    clearInterval(this.timeinterval);
                }
            }
        }

    },
    mounted() {
        console.log(this.$route.params.slug);
        axios.get(`http://127.0.0.1:8000/api/apartments/${this.slug}`).then((res) => {
            console.log(res, 'consol log res');
            // console.log(res.data.results[0]);
            this.apartment = res.data.apartment;

            this.countdown();

        }).catch((err) => {
            this.$router.push({ name: 'not-found' });
            console.log(err)
        })

    }
}
</script>