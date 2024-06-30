<template>
    <div v-if="messages === []">
        <div v-for="message in messages">
            {{ message.text }}
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
            messages: []
        }
    },
    methods: {
        fetchMessage() {
            axios.get('http://localhost:8000/api/messages').then((res) => {
                for (let i = 0; i < res.data.results.messages.length; i++) {

                    this.messages.push(res.data.results.messages[i][0])
                }

                //console.log(this.messages)
            })
        }

    },
    mounted() {
        this.fetchMessage()
    }

}
</script>

<style lang="scss" scoped></style>