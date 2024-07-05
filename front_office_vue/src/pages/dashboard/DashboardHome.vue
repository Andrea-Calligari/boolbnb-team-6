<template>

  <h1>dashboard</h1>
  <div class="container">
    <div class="row">
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
      payStatus: null
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