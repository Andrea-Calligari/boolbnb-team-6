<template>
    <div class="container-fluid">
        <div class="row">
            <template v-if="store.user.apartments.length !== 0">
                <ApartmentCard v-for="apartment in store.user.apartments" :key="apartment.id + '-ApUs'"
                    :apartment="apartment" />
            </template>
            <div class="p-3" v-else>
                <h2>Non hai appartamenti al momento.</h2>
            </div>
        </div>
    </div>
</template>

<script>
import { store } from '../../store';
import ApartmentCard from '../../components/ApartmentCard.vue'
export default {
    components: {
        ApartmentCard
    },
    data() {
        return {
            store,
        }
    },
    mounted() {
        this.store.user.getApartments();
    }

}
</script>

<style lang="scss" scoped></style>