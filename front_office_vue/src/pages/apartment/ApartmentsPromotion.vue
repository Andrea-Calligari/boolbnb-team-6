<template>
    <div class="container">
        <div class="row">
            <div class="col-12 my-3">
                <div class="form-check ps-0" v-for="(promotion, i) in store.options.promotions"
                    :key="promotion.id + 'prom'">
                    <input class="btn-check" type="radio" v-model="promotionSelected" :value="promotion.id"
                        name="radioPromotion" :id="'flexRadioDefault' + i" disabled>
                    <label class="btn w-100 text-start d-flex"
                        :class="promotion.id === promotionSelected ? 'btn-outline-success' : 'btn-outline-dark'"
                        :for="'flexRadioDefault' + i">
                        <div class="flex-grow-1">
                            <h2>{{ promotion.title }}</h2>
                            <p>{{ promotion.description }}</p>
                        </div>
                        <p>{{ promotion.price }}</p>

                    </label>
                </div>
            </div>
            <div class="col-12">
                <p v-if="!promotionSelected">* Seleziona una promozione per pagare</p>
            </div>
            <div class="col-12">
                <div class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button">
                                PAGAMENTO
                            </button>
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
                                    <button @click="sendPayment" class="btn btn-outline-success">Request payment
                                        method</button>
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
import { store } from '../../store.js';
import axios from 'axios';
export default {
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
            promotions: []
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

        }
    },
    computed: {
    },
    mounted() {
        axios.get(`http://127.0.0.1:8000/api/apartments/${this.slug}`).then((res) => {
            console.log(res.data.results[0].promotions);
            res.data.results[0].promotions.forEach(promotion => {
                this.promotions.push({
                    id: promotion.id,
                    expiration_date: promotion.pivot.expiration_date,
                    start_date: promotion.pivot.start_date,
                })
            });

            console.log(this.promotions);
        }).catch((err) => {
            console.log(err)
        })

        axios.get('http://127.0.0.1:8000/api/payment/generate')
            .then((response) => {
                braintree.dropin.create({
                    authorization: response.data,
                    container: '#dropin-container'
                }, (createErr, instance) => {
                    this.instance = instance
                });
            })
    }
}
</script>


<style lang="scss" scoped></style>