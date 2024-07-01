<template>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Update Profile</div>

                    <div class="card-body">
                        <form @submit.prevent="onUpdate">

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
                                        :class="classValidate(isVsurname)" required autocomplete="surname" autofocus>


                                    <div v-if="classValidate(isVsurname) === 'is-invalid'" class="mt-0 text-danger">
                                        Il campo non può essere vuoto e non deve superare i 254 caratteri
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" v-model="email"
                                        :class="classValidate(isVemail)" required autocomplete="email">

                                    <div v-if="classValidate(isVemail) === 'is-invalid'" class="mt-0 text-danger">
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
        </div>
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
            name: '',
            isVname: null,
            surname: '',
            isVsurname: null,
            email: '',
            isVemail: null,
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

            this.isVname = this.store.validateString(this.name);
            this.isVsurname = this.store.validateString(this.surname);
            this.isVemail = this.store.validateString(this.email);

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
                await axios.post("http://localhost:8000/api/register", {
                    name: this.name,
                    surname: this.surname,
                    email: this.email
                }).then((res) => {
                    this.store.user.getUser();
                    this.store.loading.off();
                    this.$router.push('/');
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
