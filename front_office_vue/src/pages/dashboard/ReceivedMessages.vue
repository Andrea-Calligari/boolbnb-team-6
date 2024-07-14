<template>


    <div class="accordion" id="accordionExample" v-if="store.user.messages.length > 0">

        <div class="accordion-item rounded-0" v-for="(message, i) in store.user.messages">
            <h2 class="accordion-header rounded-0">
                <button class="accordion-button rounded-0 bg-brand font-brand" type="button" data-bs-toggle="collapse"
                    :data-bs-target="`#collapse${i}`" aria-expanded="true" :aria-controls="`collapse${i}`">
                    Da: {{ message.name ? message.name : message.sender_email}} {{ message.surname }} per l'annuncio {{ message.titleApartment }}

                </button>
            </h2>
            <div :id="`collapse${i}`" class="accordion-collapse collapse" :class="i === 0 ? 'show' : ''"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p>email: {{ message.sender_email }}</p>
                    <p>messaggio: {{ message.text }}</p>
                </div>
                <a :href="`mailto:${message.sender_email}`" class="btn btn-blue rounded-0">Rispondi a {{ message.name
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

<style lang="scss" scoped>
@import '../../assets/scss/partials/variables.scss';
.bg-brand {
    background-color: $light-yellow ;
}

.font-brand {
    color: $dark-blue;
}

.btn-blue {
    background-color: $dark-blue;
    color: white;

    &:hover {
        background-color: $blue;
    }
}

</style>

