<template>
    <div v-for="(message, i) in messages" :slug="message.slug">
        <div v-if="message[0] !== undefined">
            <p>DA:{{ message[0].name }} {{ message[0].surname }} per l'annuncio
                <span v-for="apartment in apartments">
                    <span v-if="apartment.id === message[0].apartment_id">{{ apartment.title }}</span>
                </span> 
            </p>
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