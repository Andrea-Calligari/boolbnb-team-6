<template>
    <div v-for="(message, i) in messages">
        <div v-if="message[0] !== undefined">
            <p>DA:{{ message[0].name }} {{ message[0].surname }} per l'annuncio

                <span v-for="apartment in apartments">
                    <span v-if="apartment.id === message[0].apartment_id">{{ apartment.title }}</span>
                </span>
            </p>

        </div>

    </div>

    <div class="accordion" id="accordionExample">
        <div class="accordion-item" v-for="(message, i) in messages">
            <div v-if="message[0] !== undefined">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Da: {{ message[0].name }} {{ message[0].surname }} per l'annuncio 
                        <span v-for="apartment in apartments">
                            <span v-if="apartment.id === message[0].apartment_id"> {{ apartment.title }}</span>
                        </span>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <p>email: {{ message[0].sender_email }}</p>
                       <p>messaggio: {{ message[0].text }}</p>
                    </div>
                    <a :href="`mailto:${message[0].sender_email}`" class="btn btn-primary">Rispondi a {{ message[0].name }}</a>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
import axios from 'axios';
import { store } from '../store';
export default {
    data() {
        return {
            store,
            messages: [],
            apartments: null
        }
    },
    methods: {


    },
    mounted() {

        axios.get('http://localhost:8000/api/messages').then((res) => {
            for (let i = 0; i < res.data.results.apartments.length; i++) {

                this.messages.push(res.data.results.apartments[i].messages)

            }

            this.apartments = res.data.results.apartments

            console.log(res.data.results.apartments)
        })

    }

}
</script>

<style lang="scss" scoped></style>