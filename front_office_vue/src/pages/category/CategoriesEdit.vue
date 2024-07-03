<template>
    <form @submit.prevent="onEdit">

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
    props: {
        id: {
            type: String,
            required: true
        }
    },

    data() {
        return {
            store,
            name: '',
            isVname: null,
            description: '',
            isVdescription: null,
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

        async onEdit() {
            if (this.isFormValidated()) {

                await axios.post(`http://localhost:8000/api/categories/update`, {
                    id: this.id,
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
        axios.get(`http://127.0.0.1:8000/api/categories/${this.id}/edit`).then((res) => {

            this.name = res.data.category.name
            this.description = res.data.category.description

        }).catch((err) => {
            console.log(err)
        })

    }
}
</script>

<style lang="scss" scoped></style>