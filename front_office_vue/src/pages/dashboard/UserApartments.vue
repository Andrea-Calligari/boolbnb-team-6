<template>
    <div class="container-fluid">
        <div class="row row-cols-2">
            <div class="col" v-for="apartment in store.user.apartments" :key="apartment.id" :slug="apartment.slug">
                <div class="card mb-3">
                    <img :src="apartment.image" height="300" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ apartment.title }}</h5>
                        <p class="card-text">{{ apartment.description }}</p>
                        <RouterLink :to="{ name: 'apartments.show', params: { slug: apartment.slug } }" class="btn btn-primary">
                            Mostra più dettagli</RouterLink>
                    </div>
                </div>
            </div>

        </div>
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
    mounted() {
        this.store.user.getApartments();
    }

}
</script>

<style lang="scss" scoped></style>