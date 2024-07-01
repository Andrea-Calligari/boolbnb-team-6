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
                            <form action="">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="exampleFormControlInput1"
                                        placeholder="name@example.com">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                <button class="btn btn-primary">Invia</button>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </div>

</template>

<script>
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

        }
    },

    methods: {
        async onDelete() {
            await axios.delete(`http://localhost:8000/api/apartments/${this.slug}`).then((res) => {
                this.$router.push({ name: 'apartments' });
            }).catch((err) => {
                console.log(err.response.data)
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