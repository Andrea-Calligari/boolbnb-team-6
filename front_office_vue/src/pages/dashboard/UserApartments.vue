<template>
    <div class="container-fluid">
        <div class="row row-cols-2">
            <template v-if="store.user.apartments.length !== 0">
                <div class="col" v-for="apartment in store.user.apartments" :key="apartment.id" :slug="apartment.slug">
                    <div class="card mb-3">
                        <template v-if="apartment.image !== null">
                            <template v-for="(image, i) in apartment.image.split(',')" :key="'image'+ apartment.id">
                                <img v-if="i === 0"
                                    :src="image ? 'http://localhost:8000/' + image : 'http://localhost:8000/uploads/apartment/img_default/null.png'"
                                    height="300" class="card-img-top" alt="...">
                            </template>
                        </template>
                        <div class="card-body">
                            <h5 class="card-title">{{ apartment.title }}</h5>
                            <p class="card-text">{{ apartment.description }}</p>
                            <RouterLink :to="{ name: 'apartments.show', params: { slug: apartment.slug } }"
                                class="btn btn-primary">
                                Mostra più dettagli
                            </RouterLink>
                        </div>
                    </div>
                </div>
            </template>
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