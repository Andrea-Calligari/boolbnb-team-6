<template>
    <div class="accordion" id="accordionExample" v-if="store.user.messages.length > 0">


        <div class="accordion" id="accordionExample">
            <!-- Accordion-Last-Messages -->
            <div class="accordion-item  rounded-0" v-for="(message, i) in store.user.messages">
                <h2 class="accordion-header rounded-0">
                    <button class="accordion-button collapsed bg-brand font-brand rounded-0" type="button"
                        data-bs-toggle="collapse" :data-bs-target="`#collapse${i}`" aria-expanded="false"
                        :aria-controls="`collapse${i}`">
                        Da: {{ message.name ? message.name : message.sender_email }} {{ message.surname }} per
                        l'annuncio {{
                            message.titleApartment }}
                    </button>
                </h2>
                <div :id="`collapse${i}`" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body container-fluid">

                        <div class="row">
                            <div class="col-12 col-md">
                                <p class="">email: {{ message.sender_email }}</p>
                                <p>messaggio: {{ message.text }}</p>
                            </div>
                            <div class="col-12 col-md-auto">
                                <a :href="`mailto:${message.sender_email}`" class="btn btn-blue rounded-0">
                                    <span class="material-symbols-sharp">
                                        outgoing_mail
                                    </span>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- If-there'snot-Last-Message -->
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
        }
    },
    methods: {

    },
    mounted() {
        this.store.user.getApartments()

    }
    ,
    updated() {
        this.store.loading.off()
    }

}
</script>
