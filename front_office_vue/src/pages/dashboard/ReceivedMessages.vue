<template>


    <div class="accordion" id="accordionExample" v-if="messages.length > 0">

        <div class="accordion-item" v-for="(message, i) in messages">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    :data-bs-target="`#collapse${i}`" aria-expanded="true" :aria-controls="`collapse${i}`">
                    Da: {{ message.name }} {{ message.surname }} per l'annuncio {{ message.titleApartment }}

                </button>
            </h2>
            <div :id="`collapse${i}`" class="accordion-collapse collapse" :class="i === 0 ? 'show' : ''"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p>email: {{ message.sender_email }}</p>
                    <p>messaggio: {{ message.text }}</p>
                </div>
                <a :href="`mailto:${message.sender_email}`" class="btn btn-primary">Rispondi a {{ message.name
                    }}</a>
            </div>
        </div>

    </div>
    <div class="p-3" v-else>
        <h2>Non hai messaggi.</h2>
    </div>

</template>

<script>
import { store } from '../../store';
export default {
    data() {
        return {
            store,
            messages: []
        }
    },
    methods: {
        loadMessage() {
            this.messages = [];
            this.store.user.apartments.forEach(apartment => {
                apartment.messages.forEach(message => {
                    message.titleApartment = store.user.apartments.find((e) => e.id === message.apartment_id).title
                    this.messages.push(message)
                });
            });
        }
    },
    mounted() {
        this.loadMessage();

        this.store.user.getApartments().then((res) => {
            console.log(res);
            this.loadMessage()
        })
    }

}
</script>

<style lang="scss" scoped></style>