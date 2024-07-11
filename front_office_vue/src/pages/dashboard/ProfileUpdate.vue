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
                                        :class="store.validate.isV(isVsurname)" required autocomplete="surname"
                                        autofocus>


                                    <div v-if="store.validate.isV(isVsurname) === 'is-invalid'"
                                        class="mt-0 text-danger">
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

                            <div class="mb-3">
                                <label for="image" class="form-label">Immagini</label>
                                <input class="form-control" type="file" name="image" value="" id="image"
                                    autocomplete="image">
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

                        <div class="mb-4 row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                    Delete
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Modal -->
            <form @submit.prevent="onDelete()">
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Per eliminare l'account inserisci la password
                                <input id="password" type="password" class="inputField" v-model="password"
                                    :class="store.validate.isV(isVpassword)" required autocomplete="new-password"
                                    placeholder="Password">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Si</button>
                            </div>
                        </div>
                    </div>
                </div>
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
            name: '',
            isVname: null,
            surname: '',
            isVsurname: null,
            email: '',
            isVemail: null,
            image: null,
            password: '',
            isVpassword: null

        }
    },
    methods: {
        isFormValidated() {

            this.isVname = this.store.validate._string(this.name);
            this.isVsurname = this.store.validate._string(this.surname);
            this.isVemail = this.store.validate._string(this.email);
            this.isVpassword = this.store.validate._string(this.password);

            if (
                this.isVname &&
                this.isVsurname &&
                this.isVemail &&
                this.isVpassword
            ) {
                return true;
            } else {
                return false;
            }
        },
        async onUpdate(e) {
            if (this.isFormValidated()) {
                this.store.loading.on();
                //this.store.user.id = 0;
                await axios.get("http://localhost:8000/sanctum/csrf-cookie");
                await axios.post("http://localhost:8000/api/profile", {
                    name: this.name,
                    surname: this.surname,
                    email: this.email,
                    image: e.target.elements["image"].files[0]
                }, {
                    headers: {

                        'Content-Type': 'multipart/form-data'
                    }
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
                await axios.post("http://localhost:8000/api/profile/delete", {
                    password: this.password
                }).then((res) => {

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
                this.image = this.store.user.image
                store.loading.off();
                console.log(this.name)
                console.log(this.surname)
                console.log(this.email)
                console.log(this.image)
            })
            .catch((err) => {
                store.loading.off();
                console.log(err.response.data);
            })
    },

}
</script>


<style lang="scss" scoped></style>
