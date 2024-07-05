<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="form-check" v-for="(promotion, i) in store.options.promotions">
                    <input class="btn-check" type="radio" v-model="promotionSelected" :value="i" name="radioPromotion"
                        id="flexRadioDefault1">
                    <label class="btn btn-outline-secondary" for="flexRadioDefault1">
                        {{ promotion.title }} {{ promotion.price }} {{
                            promotion.hours }} {{
                            promotion.description }}
                    </label>
                </div>
            </div>
            <div class="col-12">{{ promotionSelected }}</div>
            <div v-if="payStatus" class="col text-success">
                <h1>HAI APPENA VERSATO <br>&euro;1000000000</h1>
            </div>
            <div v-else class="col">
                <div id="dropin-container"></div>
                <button @click="sendPayment">Request payment method</button>
            </div>

        </div>
    </div>
</template>


<script>
import { store } from '../../store.js';
import axios from 'axios';
export default {
    data() {
        return {
            store,
            instance: null,
            payStatus: null,
            promotionSelected: null
        }
    },
    methods: {
        sendPayment() {
            this.instance.requestPaymentMethod((err, payload) => {
                $.get('http://localhost:8000/api/payment/process', { payload }, (res) => {
                    this.payStatus = res.success
                }, 'json');
            });
        }
    },
    computed: {
    },
    mounted() {
        axios.get('http://127.0.0.1:8000/api/payment/generate')
            .then((response) => {
                console.log(response.data);
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