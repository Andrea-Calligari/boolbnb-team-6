<template>
    <div class="container-md container-sm mt-3">
        <div class="row">
            <div v-for="promotion in store.options.promotions" :key="promotion.id + 'prom'"
                class="col-md-6 col-lg-4 d-flex justify-content-center ">

                <AppPromotionCard :class="promotionSelected === promotion.id ? 'rotate' : ''"
                    @click="promotionSelected = promotion.id" :promotion="promotion" />

            </div>
            <div class="col-12">
                <div class="accordion" id="accordionPanelsStayOpenExample">
                    <p v-if="!promotionSelected">* Seleziona una promozione per pagare</p>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button">
                                PAGAMENTO
                            </button>
                            <p class="pay" v-if="promotionSelected"> Stai per effettura una transazione per il
                                {{ store.options.promotions[promotionSelected - 1].title }}</p>
                        </h2>
                        <div class="accordion-collapse collapse" :class="promotionSelected ? 'show' : ''">
                            <div class="accordion-body">
                                <h1 v-if="payStatus === false" class="col text-success">Dati della carta errati
                                </h1>
                                <h1 v-if="payStatus" class="col text-success">
                                    Pagamento effettuato con successo
                                </h1>
                                <h3 v-if="payStatus" class="col text-success">
                                    Promozione aggiunta carico l'appartamento
                                </h3>

                                <div v-else>
                                    <div id="dropin-container"></div>
                                    <button @click="sendPayment" class="btn btn-outline-success">Effettua
                                        pagamento</button>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>


        </div>
    </div>
</template>


<script>
import AppPromotionCard from '../../components/AppPromotionCard.vue';
import { store } from '../../store.js';
import axios from 'axios';
export default {
    components: {
        AppPromotionCard
    },
    props: {
        slug: {
            type: String,
            required: true
        }
    },
    data() {
        return {
            store,
            instance: null,
            payStatus: null,
            promotionSelected: null,
            ApartmentPromotions: []
        }
    },
    methods: {
        sendPayment() {
            if (this.promotionSelected) {
                this.instance.requestPaymentMethod((err, payload) => {
                    payload.apartmentSlug = this.slug
                    payload.promotionSelected = this.promotionSelected
                    $.get('http://localhost:8000/api/payment/process', { payload }, (res) => {
                        console.log(res);
                        if (res.success) {
                            this.payStatus = res.success
                            setTimeout(() => {
                                this.$router.push({ name: 'apartments.show', params: { slug: this.slug } });
                            }, 3000);
                        } else {
                            this.payStatus = res.success
                        }
                    }, 'json');
                });
            }
        },
        isSponsored(ApartmentPromotions, promotionIdToCheck) {
            const promotion = ApartmentPromotions.find((p) => p.id === promotionIdToCheck)
            if (promotion) {
                const nowDate = new Date();
                const startDate = new Date(promotion.start_date);
                const expirationDate = new Date(promotion.expiration_date);
                if (startDate < nowDate && expirationDate > nowDate || startDate > nowDate) {
                    return true
                }
            }
            return false
        }
    },
    computed: {
    },
    mounted() {
        this.store.loading.on()
        axios.get(`http://127.0.0.1:8000/api/apartments/${this.slug}`).then((res) => {
            console.log(res.data);
            res.data.apartment.promotions.forEach(promotion => {
                this.ApartmentPromotions.push({
                    id: promotion.id,
                    expiration_date: promotion.pivot.expiration_date,
                    start_date: promotion.pivot.start_date,
                })
            });

            console.log(this.ApartmentPromotions);

            axios.get('http://127.0.0.1:8000/api/payment/generate')
                .then((response) => {
                    // console.log(response.data)
                    braintree.dropin.create({
                        authorization: response.data,
                        container: '#dropin-container'
                    }, (createErr, instance) => {
                        this.instance = instance
                    });
                    this.store.loading.off()

                }).catch((err) => {
                    console.log(err)
                    this.store.loading.off()
                })

        }).catch((err) => {
            console.log(err)
            this.store.loading.off()
        })
    }
}
</script>


<style lang="scss" scoped>
.row {
    .col-12 {
        margin-bottom: 24px;
    }
}

.pay {
    font-size: 24px;
    padding-left: 18px;
}
</style>