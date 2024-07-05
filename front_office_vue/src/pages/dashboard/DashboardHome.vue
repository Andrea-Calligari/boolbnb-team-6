<template>
  <h1 @click="ciao">dashboard</h1>
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div id="dropin-container"></div>
        <button id="submit-button">Request payment method</button>
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
      store
    }
  },
  methods: {
    ciao() {
      var button = document.querySelector('#submit-button');

      axios.get('http://127.0.0.1:8000/api/payment/generate')
        .then((response) => {
          console.log(response.data);
          braintree.dropin.create({
            authorization: response.data,
            container: '#dropin-container'
          }, function (createErr, instance) {
            button.addEventListener('click', function () {
              instance.requestPaymentMethod(function (err, payload) {
                $.get('http://localhost:8000/api/payment/process', { payload }, function (response) {
                  if (response.success) {
                    alert('Payment successfull!');
                  } else {
                    alert('Payment failed');
                  }
                }, 'json');
              });
            });
          });
        })

    }
  },
  computed: {
  },
  mounted() {
  }
}
</script>


<style lang="scss" scoped></style>