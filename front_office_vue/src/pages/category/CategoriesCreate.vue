<template>
    <form @submit.prevent="onCreate">

        <label for="name">Nome *</label>
        <input id="name" type="text" class="form-control" v-model="name" :class="store.validate.isV(isVname)" required
            autocomplete="name" autofocus>

        <div v-if="store.validate.isV(isVname) === 'is-invalid'" class="mt-0 text-danger">
            Il campo non può essere vuoto e non deve superare i 254 caratteri
        </div>

        <label for="description">Descrizione *</label>
        <input id="description" type="text" class="form-control" v-model="description"
            :class="store.validate.isV(isVdescription)" required autocomplete="name" autofocus>

        <div v-if="store.validate.isV(isVdescription) === 'is-invalid'" class="mt-0 text-danger">
            Il campo non può essere vuoto e non deve superare i 254 caratteri
        </div>

        <button type="submit">Crea</button>

    </form>


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
            description: '',
            isVdescription: null
        }
    },
    methods: {
        isFormValidated() {

            this.isVname = this.store.validate._string(this.name)
            this.isVdescription = this.store.validate._string(this.description, 3, 1000)

            if (
                this.isVname &&
                this.isVdescription
            ) {
                return true
            } else {
                return false
            }
        },

        async onCreate() {
            if (this.isFormValidated()) {

                await axios.post("http://localhost:8000/api/categories", {
                    name: this.name,
                    description: this.description
                }).then((res) => {
                    console.log(res)
                }).catch((err) => {
                    console.log(err.response.data.message);
                });
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