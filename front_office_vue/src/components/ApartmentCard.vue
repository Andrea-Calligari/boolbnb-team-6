<template>
    <div class="col-sm-12 col-md-6 col-lg-4 padding-right col-xl-3 py-4 d-flex justify-content-center">
        <div class="card apartment-card rounded-0 h-100 d-flex flex-column w-100">
            <RouterLink :to="{ name: 'apartments.show', params: { slug: apartment.slug } }">
                <img :src="apartmentImageUrl" class="card-img-top card-image rounded-0" alt="...">
                <img v-if="isSponsored(apartment)" src="/img/promotion.svg" class="promotion-tag" alt="promotion-tag">
            </RouterLink>
            <div class="card-body d-flex flex-column flex-grow-1">
                <div class="d-flex mb-2 text-muted gap-3 text-small">
                    <div class="d-flex align-items-center gap-1">
                        <span class="material-symbols-sharp pb-0">
                            home
                        </span>
                        <span>{{ apartment.rooms_number }}</span>
                    </div>
                    <div class="d-flex align-items-center gap-1">
                        <span class="material-symbols-sharp pb-0">
                            bed
                        </span>
                        <span>{{ apartment.beds_number }}</span>
                    </div>
                    <div class="mb-0 d-flex align-items-center gap-1">
                        <span class="material-symbols-sharp pb-0">
                            bathtub
                        </span>
                        <span>{{ apartment.baths_number }}</span>
                    </div>
                </div>
                <RouterLink :to="{ name: 'apartments.show', params: { slug: apartment.slug } }">
                    <h4 class="card-title mb-2">{{ apartment.title }}</h4>
                </RouterLink>
                <div v-if="apartment.distance" class="d-flex align-items-end gap-1 text-muted mb-2">
                    <span class="material-symbols-sharp">
                        location_on
                    </span>
                    <span class="small-text">
                        a {{ apartment.distance.toFixed(2) }} Km</span>
                </div>
                <div class="">
                    <span class="badge text-bg-light me-1" v-for="(service, i) in services" :key="i">{{ service.name
                        }}</span>
                    <template v-if="apartment.services.length > 3">
                        <button @click="toggleServices" class="badge services-toggle mb-2"
                            v-if="services.length <= 3"><span class="material-symbols-sharp">
                                more_horiz
                            </span></button>
                        <button @click="toggleServices" class="badge services-toggle mb-2" v-else><span
                                class="material-symbols-sharp">
                                keyboard_arrow_up
                            </span></button>
                    </template>
                </div>
                <div class="price-banner mt-auto py-3">
                    <h5 class="fw-bold ms-4 mb-0">&euro; {{ apartment.price }}</h5>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    props: {
        apartment: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            backOfficeUrl: 'http://localhost:8000/',
            services: []
        }

    },
    methods: {
        toggleServices() {
            if (this.services.length > 3) {
                this.services = this.apartment.services.slice(0, 3)
            } else {
                this.services = this.apartment.services
            }
        },
        isSponsored(apartment) {
            const nowDate = new Date();
            for (let i = 0; i < apartment.promotions.length; i++) {
                const startDate = new Date(apartment.promotions[i].pivot.start_date);
                const expirationDate = new Date(apartment.promotions[i].pivot.expiration_date)
                if (startDate < nowDate && expirationDate > nowDate) {
                    return true
                }
            }
            return false
        }
    },
    computed: {
        apartmentImageUrl() {
            if (this.apartment.image) {
                return this.backOfficeUrl + this.apartment.image.split(',')[0]
            } else {
                return this.backOfficeUrl + 'uploads/apartment/img_default/null.png'
            }

        }
    },
    mounted() {
        this.services = this.apartment.services.slice(0, 3);
    }
}
</script>

<style lang="scss" scoped>
@use '../assets/scss/partials/variables.scss' as *;

.padding-right{
    padding-right: 20px;
}

.apartment-card {

    .small-text {
        font-size: 15px;
    }

    .card-image {
        width: 100%;
        aspect-ratio: 1/1;
        box-shadow: 0 4px 4px -2px rgba(0, 0, 0, 0.2);
    }

    // &:hover {
    //     cursor: pointer;
    // }

    .price-banner {
        background: $light-yellow;
        background: linear-gradient(180deg, $light-yellow 40%, $dark-yellow 100%);
        margin: 0px -25px;
        box-shadow: 0 5px 4px -2px rgba(0, 0, 0, 0.2);
    }

    .promotion-tag {
        position: absolute;
        top: 0;
        right: 0;
        width: 40%;
        transform: translate(12.5%, -12.5%);
    }
}

.apartment-card:hover .card-title {
    color: $dark-yellow;
}

.services-toggle {
    background: none;
    border: none;
    outline: none;
    box-shadow: none;
    color: black;

    span {
        font-size: 15px;
        padding: none;
    }

    &:hover {
        background-color: #F8F9FA;
        border-radius: 5px;
    }
}
</style>