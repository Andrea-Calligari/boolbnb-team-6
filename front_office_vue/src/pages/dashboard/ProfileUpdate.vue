<template>
    <div class="container mt-4">
        <div class="row justify-content-center flex-column">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Update Profile</div>
                    <div class="card-body">
                        <form @submit.prevent="onUpdate">

                            <div class="mb-4 row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" v-model="name"
                                        :class="store.validate.isV(isVname)" required autocomplete="name" autofocus>

                                    <div v-if="store.validate.isV(isVname) === 'is-invalid'" class="mt-0 text-danger">
                                        Il campo non può essere vuoto e non deve superare i 254 caratteri
                                    </div>

                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="surname" class="col-md-4 col-form-label text-md-right">Surname</label>

                                <div class="col-md-6">
                                    <input id="surname" type="text" class="form-control" v-model="surname"
                                        :class="store.validate.isV(isVsurname)" required autocomplete="surname" autofocus>


                                    <div v-if="store.validate.isV(isVsurname) === 'is-invalid'" class="mt-0 text-danger">
                                        Il campo non può essere vuoto e non deve superare i 254 caratteri
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" v-model="email"
                                        :class="store.validate.isV(isVemail)" required autocomplete="email">

                                    <div v-if="store.validate.isV(isVemail) === 'is-invalid'" class="mt-0 text-danger">
                                        Il campo non può essere vuoto e non deve superare i 254 caratteri
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4 row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Delete Profile</div>
                    <div class="card-body">
                        <form @submit.prevent="onDelete">
                            <div class="mb-4 row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-danger">
                                        Delete
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
import { store } from '../../store.js';
import axios from 'axios'
axios.defaults.withCredentials = true;
axios.defaults.withXSRFToken = true;
export default {
    data() {
        return {
            store,
            name: '',
            isVname: null,
            surname: '',
            isVsurname: null,
            email: '',
            isVemail: null,

        }
    },
    methods: {
        isFormValidated() {

            this.isVname = this.store.validate._string(this.name);
            this.isVsurname = this.store.validate._string(this.surname);
            this.isVemail = this.store.validate._string(this.email);

            if (
                this.isVname &&
                this.isVsurname &&
                this.isVemail
            ) {
                return true;
            } else {
                return false;
            }
        },
        async onUpdate() {
            if (this.isFormValidated()) {
                this.store.loading.on();
                this.store.user.id = 0;
                await axios.get("http://localhost:8000/sanctum/csrf-cookie");
                await axios.patch("http://localhost:8000/api/profile", {
                    name: this.name,
                    surname: this.surname,
                    email: this.email
                }).then((res) => {
                    this.store.user.getUser();
                    this.store.loading.off();
                    this.$router.push('/');
                    console.log(res.data)
                }).catch((err) => {
                    this.store.loading.off();
                    console.log(err.response.data);
                });
            }
        },
        async onDelete() {
            if (this.isFormValidated()) {
                this.store.loading.on();
                this.store.user.id = 0;
                await axios.get("http://localhost:8000/sanctum/csrf-cookie");
                await axios.delete("http://localhost:8000/api/profile").then((res) => {
                    this.store.user.id = 0;
                    this.store.loading.off();
                    this.$router.push('/');
                    console.log(res.data)
                }).catch((err) => {
                    this.store.loading.off();
                    console.log(err.response.data);
                });
            }
        },
    },
    computed: {
    },
    mounted() {
        store.loading.on();
        axios.get("http://localhost:8000/api/user")
            .then((res) => {
                this.store.user.fillUser(res.data);
                this.name = this.store.user.name;
                this.surname = this.store.user.surname;
                this.email = this.store.user.email;
                store.loading.off();
            })
            .catch((err) => {
                store.loading.off();
                console.log(err.response.data);
            })
    },

}
</script>


<style lang="scss" scoped></style>
